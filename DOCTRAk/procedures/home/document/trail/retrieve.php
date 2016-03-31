<?php

        if (session_status() == PHP_SESSION_NONE) 
        {
            session_start();
        }
        if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd']))
        {
            $_SESSION['in'] ="start";
            header('Location:../../../../index.php');
        }

        require_once("../../../connection.php");
        require_once("../common/encrypt.php");
        
        global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
        $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
        if (mysqli_connect_error()) 
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            die;
        }
        $query="select document_id,document_title,fk_template_id,fk_documenttype_id,documentlist.transdate,security_name, fk_office_name_documentlist,document_mime,template_name,document_description,office_description from documentlist join security_user on documentlist.fk_security_username = security_user.security_username join document_template on documentlist.fk_template_id = document_template.template_id 
				join office on documentlist.fk_office_name_documentlist = office.office_name where document_id = '".$_POST['documentTrail']."' ";
       
        $result=  mysqli_query($con, $query);
        
        while ($var=mysqli_fetch_array($result))
        {
            
       
        echo "<div id='details' class='retriveDataAllign'>";
        echo "<table >";
        echo "<tr><td>";
        echo "Barcode:"; echo"&nbsp;<b>".$var['document_id'].'</b>';
        echo "</td><td>"; 
        echo "Title:"; echo"&nbsp;<b>".$var['document_title'].'</b>';
        echo "</td><td>";
        echo "Template:"; echo"&nbsp;<b>".$var['template_name'].'</b>';
        echo "</td><td>";
        echo "Type:"; echo"&nbsp;<b>".$var['fk_documenttype_id'].'</b>';
        echo "</td></tr><tr><td>";
        echo "Decription:"; echo"&nbsp;<b>".$var['document_description'].'</b>';
        echo "</td></tr><tr><td>";
        echo "Input Date:"; echo"&nbsp;<b>".$var['transdate'].'</b>';
        echo "</td><td>";
        echo "Owner:"; echo"&nbsp;<b>".$var['security_name'].'</b>';
        echo "</td><td>";
        echo "Office:"; echo"&nbsp;<b>".$var['office_description'].'</b>';
        echo "</td><td>";
        echo "Attachment:"; //echo"&nbsp;<b>".$query['document_filename'].'</b>'; document_filename
        if ($var['document_mime']!=""){
            $encrypted=urlencode(base64_encode(encryptText($var['document_id'])));
            echo "<a target='_blank' href='/procedures/home/document/common/previewfile.php?download_file=".$encrypted."'>Download</a>";
        }
        else {
            echo "<a href='#'> No Attachment</a>";
        }
        break;
 }

        echo "</table>";
        echo "</td></tr>";
        echo "</div>";
        
        mysqli_free_result($result);
        
        
     
    echo '<div id="scroll">';
    echo '<table id="historydata" class="table scroll">';
    echo "<tr class='bgcolor'>";
    echo "<th>STEP</th>";
    echo "<th>OFFICE</th>";
    echo "<th>PROCESS</th>";
    echo "<th>DETAILS</th>";
    echo "<th>COMMENT</th>";
    echo "<th>DATE</th>";
    echo "</tr>";

    $rowcolor="blue";
  
    
    
    $query="select fk_documentlist_id,fk_officename,document_process,document_details,document_comment,documentlist_history.transdate,fk_officename,office_description from documentlist_history
    join office on documentlist_history.fk_officename=office.office_name  
     where fk_documentlist_id = '".$_POST['documentTrail']."'";
   
    $result=mysqli_query($con,$query);
    $intx=1;    
    while($var =  mysqli_fetch_array($result)) {

        if ($rowcolor=="blue")
        {
            echo '<tr id="'.$intx.'" class="usercolor">';
            // echo '<tr id="id" onclick="function(\'string\',\'string\')">';
            $rowcolor="notblue";
        }
        else
        {
            echo '<tr id="'.$intx.'" class="usercolor1">';
            // echo "<tr  id='".$var["SECURITY_NAME"]."' bgcolor='#2CC1F7'> <td>";
            $rowcolor="blue";
        }
        
        echo "<td>" .$intx. "</td>";
        echo "<td>" .$var['office_description']. "</td>";
        echo "<td>" .$var['document_process']. "</td>";
        echo "<td>" .$var['document_details']. "</td>";
        echo "<td>" .$var['document_comment']. "</td>";
        echo "<td>" .$var['transdate']. "</td>";

        
    echo "</tr>";
    $intx=$intx+1;
    }
	 echo "</table>";
         echo '</div>';
	
        
        
        mysqli_free_result($result);
        mysqli_close($con);
?>