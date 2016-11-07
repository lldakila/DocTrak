<?php


define('FPDF_FONTPATH','fpdf/font');
require_once('fpdf/fpdf.php');
require_once('fpdi/fpdi.php');
// initialize DB connection
require_once('../../essential/session.php');
include("../../essential/connection.php");

if (!AmIAdmin($_SESSION['username']))  die();
// $position=listOfOpenPosition();

// initiate FPDI
// $pdf = new FPDI();
// set the source file

// require('fpdf/fpdf.php');

// global $textAlignments;
$textAlignment="C";
class PDF extends FPDF
{

	var $widths;
	var $aligns;

function Header()
{
	$this->AddFont('BOOKOS','','BOOKOS.php');
	$this->AddFont('BOOKOS','B','BOOKOSB.php');
	$this->AddFont('BOOKOS','BI','BOOKOSBI.php');
	$this->AddFont('BOOKOS','I','BOOKOSI.php');

    $this->SetFont('BOOKOS','',10);

 	$this->Image('fpdf/resources/pglu.gif',8,9,24,24);
 	$this->Image('fpdf/resources/iloveLU.gif',180,9,28);

    $this->Ln(8);
    $this->Cell(195.9,4,'Republic of the Philippines',0,1,'C');
    $this->Ln(1);
    $this->SetFont('BOOKOS','B',12);
    $this->Cell(195,4,'PROVINCE OF LA UNION',0,1,'C');
    $this->Ln(1);
    $this->SetFont('BOOKOS','',10);
    $this->Cell(195.9,4,'City of San Fernando',0,1,'C');
    $this->Ln(5);
    $this->SetFont('BOOKOS','B',14);
    $this->Cell(195.9,4,'OFFICE OF THE GOVERNOR',0,1,'C');
    $this->Ln(2);
    $this->SetFont('BOOKOS','I',14);
    $this->Cell(195.9,4,'HUMAN RESOURCE MANAGEMENT DIVISION',0,1,'C');

	$this->Ln(2);
    $this->SetLineWidth(.5);
    $this->SetDrawColor(1,162,255);
    $this->Line(10,$this->GetY(),205.9,$this->GetY());
    $this->Ln(1.1);
    $this->SetLineWidth(.7);
    $this->Line(10,$this->GetY(),205.9,$this->GetY());
    $this->Ln(5);
    

    //////////////////////




}

function Footer()
{
    // Position at 1.5 cm from bottom
    // $this->SetY(-15);
    // // Arial italic 8
    // $this->SetFont('Arial','I',8);
    // // Page number
    // $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	$this->SetXY(10,$this->GetPageHeight()-20);
	$this->SetLineWidth(.7);
	$this->SetDrawColor(1,162,255);
	$this->Line(6,$this->GetY(),209,$this->GetY());
	$this->Ln(1.1);
	$this->SetLineWidth(.5);
	$this->Line(5.8,$this->GetY(),209.2,$this->GetY());

	$this->Ln(2);
	$this->SetFont('Times','',10);

	$this->Cell(195.9,4,'Tel. No. (072) 242-5550 loc. 215, 223, 224, 225, 256',0,1,'C');
	$this->Cell(195.9,4,'Direct Line: (072) 607-4552',0,1,'C');

	$this->SetXY(10,$this->GetPageHeight()-28);
	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}


function SetWidths($w)
{
    //Set the array of column widths
    $this->widths=$w;
}

function SetAligns($a)
{
    //Set the array of column alignments
    $this->aligns=$a;
}

function Row($data)
{
	global $textAlignment;
    //Calculate the height of the row
    $nb=0;
    for($i=0;$i<count($data);$i++)
        $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
    $h=5*$nb;
    //Issue a page break first if needed
    $this->CheckPageBreak($h);
    //Draw the cells of the row
    for($i=0;$i<count($data);$i++)
    {
        $w=$this->widths[$i];
        $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
        //Save the current position
        $x=$this->GetX();
        $y=$this->GetY();
        //Draw the border
        $this->Rect($x,$y,$w,$h);
        //Print the text
        $this->MultiCell($w,5,$data[$i],0,$textAlignment);
        //Put the position to the right of the cell
        $this->SetXY($x+$w,$y);
    }
    //Go to the next line
    $this->Ln($h);
}

function CheckPageBreak($h)
{
    //If the height h would cause an overflow, add a new page immediately
    if($this->GetY()+$h>$this->PageBreakTrigger)
    {
        $this->AddPage($this->CurOrientation,$this->CurPageSize);

    $this->SetFont('Helvetica',"B");
	$contentY=$this->GetY()+5;
	$this->SetFontSize(10);
	$this->Line(10, $contentY, 205, $contentY);
	$this->Line(10, $contentY+5, 205, $contentY+5);


	$this->SetXY(10, $contentY);
	$this->MultiCell(49, 5, "Applicant",1,'C');


	$this->SetXY(59, $contentY);
	$this->MultiCell(30, 5, "Position",1,'C');

	$this->SetXY(89, $contentY);
	$this->MultiCell(20, 5, "Item No",1,'C');

	$this->SetXY(109, $contentY);
	$this->MultiCell(20, 5, "SG",1,'C');

	$this->SetXY(129, $contentY);
	$this->MultiCell(49, 5, "Department",1,'C');

	$this->SetXY(178, $contentY);
	$this->MultiCell(30, 5, "Date Applied",1,'C');
	$this->SetFont('Helvetica',"");
	$this->SetFontSize(8);
    }
}

function NbLines($w,$txt)
{
    //Computes the number of lines a MultiCell of width w will take
    $cw=&$this->CurrentFont['cw'];
    if($w==0)
        $w=$this->w-$this->rMargin-$this->x;
    $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
    $s=str_replace("\r",'',$txt);
    $nb=strlen($s);
    if($nb>0 and $s[$nb-1]=="\n")
        $nb--;
    $sep=-1;
    $i=0;
    $j=0;
    $l=0;
    $nl=1;
    while($i<$nb)
    {
        $c=$s[$i];
        if($c=="\n")
        {
            $i++;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
            continue;
        }
        if($c==' ')
            $sep=$i;
        $l+=$cw[$c];
        if($l>$wmax)
        {
            if($sep==-1)
            {
                if($i==$j)
                    $i++;
            }
            else
                $i=$sep+1;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
        }
        else
            $i++;
    }
    return $nl;
}


}




$pdf = new PDF();

// $pdf->setSourceFile("format/letterhead.pdf");

// import page 1
// $tplIdx = $pdf->importPage(1);
$pdf->SetMargins(0,0,0);
$pdf->SetAutoPageBreak('on',25);
$pdf->SetLeftMargin(10);
$pdf->SetRightMargin(10);
$fontUsed='Helvetica';
$pdf->SetFont($fontUsed,"B");
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFontSize(12);
$pdf->AliasNbPages();
$pdf->AddPage("P","Letter");


// $pdf->useTemplate($tplIdx, null, null, 0, 0, true);
// $pdf->SetXY(54, $pdf->GetY());

if (($_GET['department']=='%')AND($_GET['position']=='%'))
{
	$pdf->MultiCell(195.9, 7, "List of Applicants",0,'C');
}
elseif (($_GET['department']=='%') AND ($_GET['position']!='%'))
{
	$pdf->MultiCell(195.9, 7, "List of Applicants for ".getPositionName($_GET['position'])."",0,'C');
}
elseif (($_GET['department']!='%') AND ($_GET['position']!='%'))
{
	$pdf->MultiCell(195.9, 7, "List of Application on ".getDepartmentName($_GET['department'])."",0,'C');
	$pdf->MultiCell(195.9, 7, "(".getPositionName($_GET['position']).")",0,'C');
}
elseif (($_GET['department']!='%') AND ($_GET['position']=='%'))
{
	$pdf->MultiCell(195.9, 7, "List of Application on ".getDepartmentName($_GET['department'])."",0,'C');
}

$pdf->SetFont($fontUsed);
// $pdf->SetXY(54, $pdf->GetY());
$pdf->SetFontSize(10);
$pdf->MultiCell(195.9, 7, "as of ".date("F j, Y")."",0,'C');


$pdf->SetFont($fontUsed,"B");
$contentY=$pdf->GetY()+5;
$pdf->Line(10, $contentY, 205, $contentY);
$pdf->Line(10, $contentY+5, 205, $contentY+5);


$pdf->SetXY(10, $contentY);
$pdf->MultiCell(49, 5, "Applicant",1,'C');


$pdf->SetXY(59, $contentY);
$pdf->MultiCell(30, 5, "Position",1,'C');

$pdf->SetXY(89, $contentY);
$pdf->MultiCell(20, 5, "Item No",1,'C');

$pdf->SetXY(109, $contentY);
$pdf->MultiCell(20, 5, "SG",1,'C');

$pdf->SetXY(129, $contentY);
$pdf->MultiCell(49, 5, "Department",1,'C');

$pdf->SetXY(178, $contentY);
$pdf->MultiCell(30, 5, "Date Applied",1,'C');

$pdf->SetFont($fontUsed);
$pdf->SetFontSize(8);
$Ycoord=$contentY+5;
$yPosition=$pdf->GetY();

global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);

$position = array();

	$sql="SELECT `jobopening`.`position` AS position, `jobopening`.`itemno` AS itemNo, `jobopening`.`salarygrade` AS salaryGrade, `m_department`.`description` AS department, `security_user`.`lname` AS lName, `security_user`.`fname` AS fName, `application`.`dateapplied` AS dateApplied FROM application JOIN jobopening ON application.jobopening_fk = jobopening.jobopening_pk JOIN security_user ON application.securityuser_fk = security_user.email JOIN m_department ON jobopening.department_fk = m_department.department_pk WHERE `application`.`status` = 'P' AND department_pk like '".$_GET['department']."' AND jobopening_pk LIKE '".$_GET['position']."' ";
$myQuery=mysqli_query($con,$sql);
	// $resultArray=array();
// $pdf->setX(10);
$pdf->SetWidths(array(49,30,20,20,49,30));
srand(microtime()*1000000);

while ($ApplicantData=mysqli_fetch_array($myQuery))
{
	// $pdf->setX(10);

	$pdf->Row(array($ApplicantData['lName'].", ". $ApplicantData['fName'],$ApplicantData['position'],$ApplicantData['itemNo'],$ApplicantData['salaryGrade'],$ApplicantData['department'],date_format(date_create($ApplicantData['dateApplied']), 'F d, Y')));
	// $pdf->SetXY(10, $Ycoord);
	 // $pdf->MultiCell(49, 5,$ApplicantData['lName'].", ". $ApplicantData['fName'],1,'L');
	
	// $yPosition==$pdf->GetY();

	// $pdf->SetXY(59, $Ycoord);
	// $pdf->MultiCell(30, 5,$ApplicantData['position'],1,'L');
	// if($yPosition<$pdf->GetY()) $yPosition=$pdf->GetY();

	// $pdf->SetXY(89, $Ycoord);
	// $pdf->MultiCell(20, 5,$ApplicantData['itemNo'],0,'C');
	// if($yPosition<$pdf->GetY()) $yPosition=$pdf->GetY();

	// $pdf->SetXY(109, $Ycoord);
	// $pdf->MultiCell(20, 5,$ApplicantData['salaryGrade'],0,'C');
	// if($yPosition<$pdf->GetY()) $yPosition=$pdf->GetY();

	// $pdf->SetXY(129, $Ycoord);
	// $pdf->MultiCell(49, 5,$ApplicantData['department'],0,'L');
	// if($yPosition<$pdf->GetY()) $yPosition=$pdf->GetY();

	// $pdf->SetXY(178, $Ycoord);
	// $pdf->MultiCell(30, 5,date_format(date_create($ApplicantData['dateApplied']), 'F d, Y'),0,'L');
	// if($yPosition<$pdf->GetY()) $yPosition=$pdf->GetY();

	// $Ycoord=$yPosition;







	// $pdf->Line(10, $yPosition, 208, $yPosition);


	
}


	// $pdf->Line(10, $contentY, 10, $yPosition);
	// $pdf->Line(59, $contentY, 59, $yPosition);
	// $pdf->Line(89, $contentY, 89, $yPosition);
	// $pdf->Line(109, $contentY, 109, $yPosition);
	// $pdf->Line(129, $contentY, 129, $yPosition);
	// $pdf->Line(178, $contentY, 178, $yPosition);
	// $pdf->Line(208, $contentY, 208, $yPosition);

// $pdf->Line(10, $yPosition, 208, $yPosition);
$pdf->Output();









function textAlign($text,$textAlign)
{
	global $textAlignment;
	$textAlignment=$textAlign;
	return $text;
}











function getDepartmentName($department_pk)
{
	global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
	$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);

	$sql="SELECT description FROM m_department WHERE department_pk = '".$department_pk."' ";
	$myQuery=mysqli_query($con,$sql);
	$result=mysqli_fetch_array($myQuery);
	mysqli_close($con);
	return $result['description'];

}

function getPositionName($positionID)
{
	global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
	$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_SCHEMA);

	$sql="SELECT position FROM jobopening WHERE jobopening_pk = '".$positionID."' ";
	$myQuery=mysqli_query($con,$sql);
	$result=mysqli_fetch_array($myQuery);
	mysqli_close($con);
	return $result['position'];
}
