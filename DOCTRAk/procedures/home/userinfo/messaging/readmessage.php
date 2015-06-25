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
	global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
	$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);

	$query="SELECT MAIL_ID,MAILCONTENT, MAILTITLE, MAILDATE,MAILSTATUS,SECURITY_NAME FROM mail JOIN security_user ON
	mail.FK_SECURITY_USERNAME_SENDER = security_user.SECURITY_USERNAME WHERE MAIL_ID
	= '".$_POST['MailId']."'";
	//$query="SELECT MAIL_ID,MAILCONTENT, MAILTITLE, MAILDATE,MAILSTATUS FROM MAIL WHERE MAIL_ID = '.$_POST[MailId].' ";

	//echo $query;
	$RESULT=mysqli_query($con,$query) or die(mysqli_error($con));
	echo "<tr class='bg1'>
          <td>Message</td>
   		  </tr>";
	while ($row = mysqli_fetch_array($RESULT))
	{
	echo "<tr><td>";
	echo "Sender: <font style='font-weight:bold;'>".$row['SECURITY_NAME'];
	echo "</font><br>";
	echo "Title: <font style='font-weight:bold;'>".$row['MAILTITLE'];
	echo "</font><br>";
	echo "Date: <font style='font-weight:bold;'>".$row['MAILDATE'];
	echo "</font><br><br>";
	echo $row['MAILCONTENT'];
	}

	$query="UPDATE mail SET MAILSTATUS=1 WHERE MAIL_ID = '".$_POST['MailId']."'";
	mysqli_query($con,$query);

?>