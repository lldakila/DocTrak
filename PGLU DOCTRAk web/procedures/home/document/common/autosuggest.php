<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
  $_SESSION['in'] ="start";
 header('Location:../../../../index.php');
}

include_once("../common/SearchFilter.php");
require_once("../../../connection.php");
global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);


if(isset($_POST['search_string']))
{
    $name=trim($_POST['search_string']);
    switch ($_POST['searchtype'])
    
    {
        case 'forRelease':
            $query="select DOCUMENT_ID,DOCUMENT_TITLE,DOCUMENT_DESCRIPTION,DOCUMENT_FILENAME,FK_TEMPLATE_ID,FK_DOCUMENTTYPE_ID,fk_security_username,transdate from documentlist join security_user on documentlist.fk_security_username = security_user.security_username  WHERE (DOCUMENT_TITLE LIKE '%".$_POST['search_string']."%' OR DOCUMENT_ID LIKE '%".$_POST['search_string']."%')AND scrap=0";
            $RESULT=mysqli_query($con,$query);
            if ($RESULT)
            {
                
            
            echo "<ul>";
            echo '
            <table class="fixedheader">
                     <col width="100px" />
                      <col width="150px" />
                       <col width="80px" />
                      <tr><th>Barcode</th><th>Title</th><th>Date</th></tr>
                      </table>';
                    
            while ($rows=mysqli_fetch_array($RESULT))
            {
                if (SortOrder($rows["DOCUMENT_ID"],'forrelease')) 
                {
            ?>
            <li>
                <table class="fixedwidth">
                     <col width="100px" />
                      <col width="150px" />
                       <col width="80px" />
                    <tr onclick='fill("<?php echo $rows['DOCUMENT_ID']; ?>")'>
                        <td>
                    <?php echo $rows['DOCUMENT_ID']; ?>
                        </td>
                        <td>
                            <?php echo $rows['DOCUMENT_TITLE']; ?>
                        </td>
                             <td>
                    <?php echo $rows['transdate']; ?>
                        </td>
                    </tr>
                    
                </table>
            </li>
            
            <?php
                }}
                }
            break;
            
        case 'newDoc':
            $query="select DOCUMENT_ID,DOCUMENT_TITLE,DOCUMENT_DESCRIPTION,DOCUMENT_FILENAME,FK_TEMPLATE_ID,FK_DOCUMENTTYPE_ID,fk_security_username,transdate from documentlist join security_user on documentlist.fk_security_username = security_user.security_username  WHERE (DOCUMENT_TITLE LIKE '%".$_POST['search_string']."%' OR DOCUMENT_ID LIKE '%".$_POST['search_string']."%')AND scrap=0 and fk_office_name_documentlist ='".$_SESSION['OFFICE']."'";
            $RESULT=mysqli_query($con,$query);
            if ($RESULT)
            {
            
            echo "<ul>";
            echo '
            <table class="fixedheader">
                     <col width="100px" />
                      <col width="150px" />
                       <col width="80px" />
                      <tr><th>Barcode</th><th>Title</th><th>Date</th></tr>
                      </table>';
                    
            while ($rows=mysqli_fetch_array($RESULT))
            {
                
            ?>
            <li>
                <table class="fixedwidth">
                     <col width="100px" />
                      <col width="150px" />
                       <col width="80px" />
                    <tr onclick='fill("<?php echo $rows['DOCUMENT_ID']; ?>")'>
                        <td>
                    <?php echo $rows['DOCUMENT_ID']; ?>
                        </td>
                        <td>
                            <?php echo $rows['DOCUMENT_TITLE']; ?>
                        </td>
                             <td>
                    <?php echo $rows['transdate']; ?>
                        </td>
                    </tr>
                    
                </table>
            </li>
            
            <?php
                }}
            break;
            
        case 'ReceiveDoc':
            $query="select DOCUMENT_ID,DOCUMENT_TITLE,DOCUMENT_DESCRIPTION,DOCUMENT_FILENAME,FK_TEMPLATE_ID,FK_DOCUMENTTYPE_ID,fk_security_username,transdate from documentlist join security_user on documentlist.fk_security_username = security_user.security_username  WHERE (DOCUMENT_TITLE LIKE '%".$_POST['search_string']."%' OR DOCUMENT_ID LIKE '%".$_POST['search_string']."%')AND scrap=0";
            $RESULT=mysqli_query($con,$query);
            if ($RESULT)
            {
                
            
            echo "<ul>";
            echo '
            <table class="fixedheader">
                     <col width="100px" />
                      <col width="150px" />
                       <col width="80px" />
                      <tr><th>Barcode</th><th>Title</th><th>Date</th></tr>
                      </table>';
                    
            while ($rows=mysqli_fetch_array($RESULT))
            {
                if (SortOrder($rows["DOCUMENT_ID"],'receive')) 
                {
            ?>
            <li>
                <table class="fixedwidth">
                     <col width="100px" />
                      <col width="150px" />
                       <col width="80px" />
                    <tr onclick='fill("<?php echo $rows['DOCUMENT_ID']; ?>")'>
                        <td>
                    <?php echo $rows['DOCUMENT_ID']; ?>
                        </td>
                        <td>
                            <?php echo $rows['DOCUMENT_TITLE']; ?>
                        </td>
                             <td>
                    <?php echo $rows['transdate']; ?>
                        </td>
                    </tr>
                    
                </table>
            </li>
            
            <?php
                }}
                }
            break;
            
        case 'ReleaseDoc':
            $query="select DOCUMENT_ID,DOCUMENT_TITLE,DOCUMENT_DESCRIPTION,DOCUMENT_FILENAME,FK_TEMPLATE_ID,FK_DOCUMENTTYPE_ID,fk_security_username,transdate from documentlist join security_user on documentlist.fk_security_username = security_user.security_username  WHERE (DOCUMENT_TITLE LIKE '%".$_POST['search_string']."%' OR DOCUMENT_ID LIKE '%".$_POST['search_string']."%')AND scrap=0";
            $RESULT=mysqli_query($con,$query);
            if ($RESULT)
            {
                
            
            echo "<ul>";
            echo '
            <table class="fixedheader">
                     <col width="100px" />
                      <col width="150px" />
                       <col width="80px" />
                      <tr><th>Barcode</th><th>Title</th><th>Date</th></tr>
                      </table>';
                    
            while ($rows=mysqli_fetch_array($RESULT))
            {
                if (SortOrder($rows["DOCUMENT_ID"],'release')) 
                {
            ?>
            <li>
                <table class="fixedwidth">
                     <col width="100px" />
                      <col width="150px" />
                       <col width="80px" />
                    <tr onclick='fill("<?php echo $rows['DOCUMENT_ID']; ?>")'>
                        <td>
                    <?php echo $rows['DOCUMENT_ID']; ?>
                        </td>
                        <td>
                            <?php echo $rows['DOCUMENT_TITLE']; ?>
                        </td>
                             <td>
                    <?php echo $rows['transdate']; ?>
                        </td>
                    </tr>
                    
                </table>
            </li>
            
            <?php
                }}
                }
            break; 
            
        case 'Rollback':
            $query="select DOCUMENT_ID,DOCUMENT_TITLE,DOCUMENT_DESCRIPTION,DOCUMENT_FILENAME,FK_TEMPLATE_ID,FK_DOCUMENTTYPE_ID,fk_security_username,transdate from documentlist join security_user on documentlist.fk_security_username = security_user.security_username  WHERE (DOCUMENT_TITLE LIKE '%".$_POST['search_string']."%' OR DOCUMENT_ID LIKE '%".$_POST['search_string']."%')AND scrap=0";
            $RESULT=mysqli_query($con,$query);
            if ($RESULT)
            {
                
            
            echo "<ul>";
            echo '
            <table class="fixedheader">
                     <col width="100px" />
                      <col width="150px" />
                       <col width="80px" />
                      <tr><th>Barcode</th><th>Title</th><th>Date</th></tr>
                      </table>';
                    
            while ($rows=mysqli_fetch_array($RESULT))
            {
                if (SortOrder($rows["DOCUMENT_ID"],'rollback')) 
                {
            ?>
            <li>
                <table class="fixedwidth">
                     <col width="100px" />
                      <col width="150px" />
                       <col width="80px" />
                    <tr onclick='fill("<?php echo $rows['DOCUMENT_ID']; ?>")'>
                        <td>
                    <?php echo $rows['DOCUMENT_ID']; ?>
                        </td>
                        <td>
                            <?php echo $rows['DOCUMENT_TITLE']; ?>
                        </td>
                             <td>
                    <?php echo $rows['transdate']; ?>
                        </td>
                    </tr>
                    
                </table>
            </li>
            
            <?php
                }}
                }
            break;
            
        case 'docTracker':
            $query="select DOCUMENT_ID,DOCUMENT_TITLE,DOCUMENT_DESCRIPTION,DOCUMENT_FILENAME,FK_TEMPLATE_ID,FK_DOCUMENTTYPE_ID,fk_security_username,transdate from documentlist join security_user on documentlist.fk_security_username = security_user.security_username  WHERE (DOCUMENT_TITLE LIKE '%".$_POST['search_string']."%' OR DOCUMENT_ID LIKE '%".$_POST['search_string']."%')AND scrap=0 and fk_office_name_documentlist ='".$_SESSION['OFFICE']."'";
            $RESULT=mysqli_query($con,$query);
            if ($RESULT)
            {
                
            
            echo "<ul>";
            echo '
            <table class="fixedheader">
                     <col width="100px" />
                      <col width="150px" />
                       <col width="80px" />
                      <tr><th>Barcode</th><th>Title</th><th>Date</th></tr>
                      </table>';
                    
            while ($rows=mysqli_fetch_array($RESULT))
            {
               
            ?>
            <li>
                <table class="fixedwidth">
                     <col width="100px" />
                      <col width="150px" />
                       <col width="80px" />
                    <tr onclick='fill("<?php echo $rows['DOCUMENT_ID']; ?>")'>
                        <td>
                    <?php echo $rows['DOCUMENT_ID']; ?>
                        </td>
                        <td>
                            <?php echo $rows['DOCUMENT_TITLE']; ?>
                        </td>
                             <td>
                    <?php echo $rows['transdate']; ?>
                        </td>
                    </tr>
                    
                </table>
            </li>
            
            <?php
                }
                }
                
                
                break;
                
        case 'docTrail':
            $query="select DOCUMENT_ID,DOCUMENT_TITLE,DOCUMENT_DESCRIPTION,DOCUMENT_FILENAME,FK_TEMPLATE_ID,FK_DOCUMENTTYPE_ID,fk_security_username,transdate from documentlist join security_user on documentlist.fk_security_username = security_user.security_username  WHERE (DOCUMENT_TITLE LIKE '%".$_POST['search_string']."%' OR DOCUMENT_ID LIKE '%".$_POST['search_string']."%')AND scrap=0 and fk_office_name_documentlist ='".$_SESSION['OFFICE']."'";
            $RESULT=mysqli_query($con,$query);
            if ($RESULT)
            {
                
            
            echo "<ul>";
            echo '
            <table class="fixedheader">
                    <col width="100px" />
                    <col width="150px" />
                    <col width="80px" />
                    <tr><th>Barcode</th><th>Title</th><th>Date</th></tr>
                    </table>';
                    
            while ($rows=mysqli_fetch_array($RESULT))
            {
               
            ?>
            <li>
                <table class="fixedwidth">
                     <col width="100px" />
                      <col width="150px" />
                       <col width="80px" />
                    <tr onclick='fill("<?php echo $rows['DOCUMENT_ID']; ?>")'>
                        <td>
                    <?php echo $rows['DOCUMENT_ID']; ?>
                        </td>
                        <td>
                            <?php echo $rows['DOCUMENT_TITLE']; ?>
                        </td>
                             <td>
                    <?php echo $rows['transdate']; ?>
                        </td>
                    </tr>
                    
                </table>
            </li>
            
            <?php
                }
                }
                
                
                break;
                
        case 'newProcess':
            $query="select DOCUMENT_ID,DOCUMENT_TITLE,DOCUMENT_DESCRIPTION,DOCUMENT_FILENAME,FK_TEMPLATE_ID,FK_DOCUMENTTYPE_ID,fk_security_username,transdate from documentlist join security_user on documentlist.fk_security_username = security_user.security_username  WHERE (DOCUMENT_TITLE LIKE '%".$_POST['search_string']."%' OR DOCUMENT_ID LIKE '%".$_POST['search_string']."%')AND scrap=0 and fk_office_name_documentlist ='".$_SESSION['OFFICE']."'";
            $RESULT=mysqli_query($con,$query);
            if ($RESULT)
            {
                
            
            echo "<ul>";
            echo '
            <table class="fixedheader">
                    <col width="100px" />
                    <col width="150px" />
                    <col width="80px" />
                    <tr><th>Barcode</th><th>Title</th><th>Date</th></tr>
                    </table>';
                    
            while ($rows=mysqli_fetch_array($RESULT))
            {
               
            ?>
            <li>
                <table class="fixedwidth">
                     <col width="100px" />
                      <col width="150px" />
                       <col width="80px" />
                    <tr onclick='fill("<?php echo $rows['DOCUMENT_ID']; ?>")'>
                        <td>
                    <?php echo $rows['DOCUMENT_ID']; ?>
                        </td>
                        <td>
                            <?php echo $rows['DOCUMENT_TITLE']; ?>
                        </td>
                             <td>
                    <?php echo $rows['transdate']; ?>
                        </td>
                    </tr>
                    
                </table>
            </li>
            
            <?php
                }
                }
                
                
                break;
                
    }
    echo '</ul>';
    
    
   
}



mysqli_free_result($RESULT);
mysqli_close($con);
?>
