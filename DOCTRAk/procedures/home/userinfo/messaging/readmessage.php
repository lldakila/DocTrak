<?php
	if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
	if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd']))
	{
		$_SESSION['in'] ="start";
		header('Location:../../../../index.php');
	}

    require_once("../../../connection.php");
    
       switch($_POST['module'])
       {
           case 'OpenMail':
               ReadMessage();
               break;
           
           case 'CheckMail':
               CheckMail();
               break;
       }
        
        

        function ReadMessage() 
        {
	
	global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
	$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);

	$query="SELECT MAIL_ID,MAILCONTENT, FK_TABLE, MAILTITLE, MAILDATE,MAILSTATUS,security_user.SECURITY_NAME as username,fk_office_name FROM mail JOIN security_user ON mail.FK_SECURITY_USERNAME_SENDER = security_user.SECURITY_USERNAME  WHERE MAIL_ID
                = '".$_POST['MailId']."'";
	//$query="SELECT MAIL_ID,MAILCONTENT, MAILTITLE, MAILDATE,MAILSTATUS FROM MAIL WHERE MAIL_ID = '.$_POST[MailId].' ";

	
	$RESULT=mysqli_query($con,$query) or die(mysqli_error($con));
	echo "<table>";
	echo "<tr class='bg1'>
          <td>Message</td>
   		  </tr>";
	while ($row = mysqli_fetch_array($RESULT))
	{
            echo "<tr><td>";
            echo "Sender: <font style='font-weight:bold;'>".$row['username'];
            echo "</font><br>";
	    echo "Document: <font style='font-weight:bold;'>".$row['FK_TABLE'];
            echo "</font><br>";
            echo "Office: <font style='font-weight:bold;'>".$row['fk_office_name'];
            echo "</font><br>";
            echo "Date: <font style='font-weight:bold;'>".$row['MAILDATE'];
            echo "</font><br><br>";
            echo $row['MAILCONTENT'];
	}
	echo "</table>";
	$query="UPDATE mail SET MAILSTATUS=1 WHERE MAIL_ID = '".$_POST['MailId']."'";

	mysqli_query($con,$query);
        }
        
        
        
        
        function CheckMail()
        {
            
             global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
                 
	         $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
	         $query="SELECT mail_id, COUNT(mail_id) as mailcount FROM mail WHERE FK_SECURITY_USERNAME_OWNER = '".$_SESSION['usr']."' AND MAILSTATUS=0";
               
	         $result=mysqli_query($con,$query)or die(mysqli_error($con));
                 //$sql=;
	         while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
	         {
                        
                     if ($row['mailcount']<>0)
                     {
		         echo '<a href="../../../procedures/home/userinfo/inbox.php"><img  src="../../../images/home/icon/testmail.gif" width="30" height="20"  />'.$row['mailcount'].'</a>&nbsp';
                         break;
                     }
                     else
                     {
                         //echo 'FALSE';
                         break; 
                     }
	         }
	         //////////////////////////////////
	        
        }

