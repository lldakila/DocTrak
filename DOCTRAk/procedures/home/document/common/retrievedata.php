<?php
    if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
    if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
        $_SESSION['in'] ="start";
        header('Location:../../../../index.php');
}

    require_once("../../../connection.php");
    require_once("../common/encrypt.php");
    
    $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
 
    $sql="select document_id,document_title,fk_template_id,fk_documenttype_id,documentlist.transdate,security_name, sortorder,documentlist_tracker.office_name,received_by,received_date,received_comment,released_by,released_date,released_comment,security_user.fk_office_name,document_filename, forrelease_val,forrelease_comment,forrelease_date,documentlist.fk_office_name_documentlist,document_mime,received_from,released_to,template_name,document_description,office_description from 
					documentlist join 
					documentlist_tracker on documentlist.document_id = documentlist_tracker.fk_documentlist_id join 
					security_user on documentlist.fk_security_username = security_user.security_username join 
					document_template on documentlist.fk_template_id = document_template.template_id
					join office on documentlist.fk_office_name_documentlist = office.office_name where document_id = '".$_POST['documentTracker']."' ";
		
		$result=mysqli_query($con,$sql);
		$query=mysqli_fetch_array($result);
	
    echo "<div id='details' class='retriveDataAllign'>";
    echo "<div class='row'>";
		    echo "<div class='col-xs-6 col-sm-3'>";
		    					echo "Barcode:"; echo"&nbsp;<b style='color:#00556F;'>".$query['document_id'].'</b>';
		    echo "</div>";  
		    echo "<div class='col-xs-6 col-sm-3'>";
		    					echo "Title:"; echo"&nbsp;<b style='color:#00556F;'>".$query['document_title'].'</b>';
		    echo "</div>";
		    echo "<!-- Add the extra clearfix for only the required viewport -->
		  					<div class='clearfix visible-xs-block'></div>";
		    echo "<div class='col-xs-6 col-sm-3'>";
		    					echo "Template:"; echo"&nbsp;<b style='color:#00556F;'>".$query['template_name'].'</b>';
		    echo "</div>";
		    echo "<div class='col-xs-6 col-sm-3'>";
		    					echo "Type:"; echo"&nbsp;<b style='color:#00556F;'>".$query['fk_documenttype_id'].'</b>';
		    echo "</div>";
    echo "</div>";
    
    echo "<br>";
            
    echo "<div class='row'>";
		    echo "<div class='col-xs-6 col-sm-3'>";
		    					echo "Description:"; echo"&nbsp;<b style='color:#00556F;'>".$query['document_description'].'</b>';
		    echo "</div>";
		    echo "<div class='col-xs-6 col-sm-3'>";
		    					echo "Input Date:"; echo"&nbsp;<b style='color:#00556F;'>".$query['transdate'].'</b>';
		    echo "</div>";
		    echo "<!-- Add the extra clearfix for only the required viewport -->
		  					<div class='clearfix visible-xs-block'></div>";
		    echo "<div class='col-xs-6 col-sm-3'>";
		    					echo "Owner:"; echo"&nbsp;<b style='color:#00556F;'>".$query['security_name'].'</b>';
		    echo "</div>";
		    echo "<div class='col-xs-6 col-sm-3'>";
		    					echo "Office:"; echo"&nbsp;<b style='color:#00556F;'>".$query['office_description'].'</b>';
		    echo "</div>";
    echo "</div>";
    
   
    
    
    
    
    
//    echo "Attachment:"; //echo"&nbsp;<b>".$query[0]['document_filename'].'</b>'; document_filename
//    if ($query[0]['document_mime']!=""){
//        $encrypted=urlencode(base64_encode(encryptText($query[0]['document_id'])));
//        echo "<a target='_blank' href='/procedures/home/document/common/previewfile.php?download_file=".$encrypted."'>Download</a>";
//    }
//    else {
//        echo "<a href='#'> No Attachment</a>";
//    }

   
    echo "</div>";

 //echo "<div id='details' class=''>";
//    echo "<table >";
//    echo "<tr><td>";

//	echo "<div class='row'>";
////	echo "<div class='span12'>";
//    echo "<div class='span1'> Barcode:"; echo"<b>".$query[0]['document_id'].'</b></div>';
////    echo "</td><td>"; 
//    echo "<div class='span9'> Title:"; echo"<b>".$query[0]['document_title'].'</b></div>';
////    echo "</td><td>";
//echo "<div class='span1'> Input Date:"; echo"<b>".$query[0]['transdate'].'</b></div>';
//   
////    echo "</td><td>";
//    echo "<div class='span1'> Type:"; echo"<b>".$query[0]['fk_documenttype_id'].'</b></div>';
//    echo "</div>";
//    
//    
////    echo "</td></tr><tr><td>";
//    echo "Description:"; echo"&nbsp;<b>".$query[0]['document_description'].'</b>';
////    echo "</td></tr><tr><td>";
// echo "Office:"; echo"&nbsp;<b>".$query[0]['office_description'].'</b>';
//     
////    echo "</td><td>";
//    echo "Owner:"; echo"&nbsp;<b>".$query[0]['security_name'].'</b>';
////    echo "</td><td>";
//   echo "Template:"; echo"&nbsp;<b>".$query[0]['template_name'].'</b>';


//    echo "</td>";
//    echo "Attachment:"; //echo"&nbsp;<b>".$query[0]['document_filename'].'</b>'; document_filename
//    if ($query[0]['document_mime']!=""){
//        $encrypted=urlencode(base64_encode(encryptText($query[0]['document_id'])));
//        echo "<a target='_blank' href='/procedures/home/document/common/previewfile.php?download_file=".$encrypted."'>Download</a>";
//    }
//    else {
//        echo "<a href='#'> No Attachment</a>";
//    }


//    echo "</table>";
//    echo "</td></tr>";
 //   echo "</div>";
    
echo "<div id='scroll'>";
    echo '<table id="historydata" data-height="450"
		      data-toggle="table"
		      class="display table table-bordered"
		      data-striped="true">';
    echo "<thead>
    			<tr>
						<th>Step</th>
						<th>Office</th>
						<th>Received by</th>
						<th>Received from</th>
						<th>Received date</th>
						<th>Received comment</th>
						<th>For release</th>	
						<th>For release comment</th>	
						<th>For release date</th>
						<th>Release by</th>		
						<th>Release to</th>
						<th>Release date</th>		
						<th>Release comment</th>				
			    </tr>
			  	</thead>";
		mysqli_free_result($result);
		$result=mysqli_query($con,$sql);
    while ($query=mysqli_fetch_array($result))
    {
    	echo "<tr>";
    	echo "<td>".$query['sortorder']."</td>";
    	echo "<td>".$query['office_name']."</td>";
    	echo "<td>".$query['received_by']."</td>";
    	echo "<td>".$query['received_from']."</td>";
    	echo "<td>".$query['received_date']."</td>";
    	echo "<td>".$query['received_comment']."</td>";
    	if ($query['forrelease_val']==1)
    	{
    		echo "<td>ready</td>";
    	}
    	else
    	{
    		echo "<td></td>";
    	} 
    	echo "<td>".$query['forrelease_comment']."</td>";
    	echo "<td>".$query['forrelease_date']."</td>";
    	echo "<td>".$query['released_by']."</td>";
    	echo "<td>".$query['released_to']."</td>";
    	echo "<td>".$query['released_date']."</td>";   	
    	echo "<td>".$query['released_comment']."</td>";

    	echo "</tr>";
    }
    echo "</table>";
//    echo "<tr class='bgcolor'>";
//    echo "<th>STEP</th>";
//    echo "<th>OFFICE</th>";
//    echo "<th>RECEIVED BY</th>";
//    echo "<th>RECEIVED FROM</th>";
//    echo "<th>RECEIVED DATE</th>";
//    echo "<th>RECEIVED COMMENT</th>";
//    echo "<th>FOR RELEASE</th>";
//    echo "<th>FOR RELEASE COMMENT</th>";
//   
//    echo "<th>FOR RELEASE DATE</th>";
//
//    echo "<th>RELEASED BY</th>";
//    echo "<th>RELEASED TO</th>";
//    echo "<th>RELEASED DATE</th>";
//    echo "<th>RELEASED COMMENT</th>";
//    echo "</tr>";
  //  echo "</table>";
//    $rowcolor="blue";
//    if ($query) {
//		//echo "<table id='historydata'>";
//    foreach($query as $var) {
//
//        if ($rowcolor=="blue")
//        {
//            echo '<tr id="'.$var["sortorder"].'" class="usercolor">';
//            // echo '<tr id="id" onclick="function(\'string\',\'string\')">';
//            $rowcolor="notblue";
//        }
//        else
//        {
//            echo '<tr id="'.$var["sortorder"].'" class="usercolor1">';
//            // echo "<tr  id='".$var["SECURITY_NAME"]."' bgcolor='#2CC1F7'> <td>";
//            $rowcolor="blue";
//        }
//        echo "<td>" .$var['sortorder']. "</td>";
//        echo "<td>" .$var['office_name']. "</td>";
//        
//			echo "<td>" .$var['received_by']. "</td>";
//			echo "<td>" .$var['received_from']. "</td>";
//        echo "<td>" .$var['received_date']. "</td>";
//        echo "<td>" .$var['received_comment']. "</td>";
//
//        if ($var['forrelease_val']==1) 
//	{
//            echo "<td class='tdCenter'> ready </td>";
//        }
//        else 
//	{
//            echo "<td></td>";
//        }
//	    echo "<td>" .$var['forrelease_comment']. "</td>";
//	    echo "<td>" .$var['forrelease_date']. "</td>";
//
//	echo "<td>" .$var['released_by']. "</td>";
//	echo "<td>" .$var['released_to']. "</td>";
//	
//        echo "<td>" .$var['released_date']. "</td>";
//        echo "<td>" .$var['released_comment']. "</td>";
//    echo "</tr>";
//    }
//	 echo "</table>";
//	}

echo "</div>";

?>


