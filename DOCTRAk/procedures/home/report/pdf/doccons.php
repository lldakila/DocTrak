<?php


define('FPDF_FONTPATH','fpdf/font');
session_start();
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
    $_SESSION['in'] ="start";
    header('Location:../../../../index.php');
}

require_once('fpdf/fpdf.php');
require_once('fpdi/fpdi.php');
require_once("../../../connection.php");

if(!json_decode($_POST['data'], true)) exit();
// var_dump($_POST['data']);
// $_POST['data'] = html_entity_decode($_POST['data']);
 // var_dump($_POST['data']);
$_POST['data'] = json_decode($_POST['data'], true);
 // var_dump($_POST['data']);

 //  exit();


date_default_timezone_set($_SESSION['Timezone']);

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
    // $this->Cell(195.9,4,'OFFICE OF THE GOVERNOR',0,1,'C');
    $this->Ln(4);
    // $this->SetFont('BOOKOS','I',14);
    // $this->Cell(195.9,4,'HUMAN RESOURCE MANAGEMENT DIVISION',0,1,'C');

	$this->Ln(8);
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
    $this->MultiCell(30, 5, "Barcode",1,'C');

    $this->SetXY(40, $contentY);
    $this->MultiCell(40, 5, "Title",1,'C');

    $this->SetXY(80, $contentY);
    $this->MultiCell(50, 5, "Office",1,'C');

    $this->SetXY(130, $contentY);
    $this->MultiCell(40, 5, "Owner",1,'C');

    $this->SetXY(170, $contentY);
    $this->MultiCell(38, 5, "Date",1,'C');
    $this->SetFont('Helvetica');
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

$pdf->SetMargins(0,0,0);
$pdf->SetAutoPageBreak('on',25);
$pdf->SetLeftMargin(10);
$pdf->SetRightMargin(10);
$fontUsed='Helvetica';
$pdf->SetFont($fontUsed,"B");
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFontSize(10);
$pdf->AliasNbPages();
$pdf->AddPage("P","Letter");




// $a=json_encode($_POST);


    // $pdf->Cell(195.9,4,$a,0,1,'C');
$contentY=$pdf->GetY()+5;

$pdf->SetXY(10, $contentY);
$pdf->MultiCell(30, 5, "Barcode",1,'C');

$pdf->SetXY(40, $contentY);
$pdf->MultiCell(40, 5, "Title",1,'C');

$pdf->SetXY(80, $contentY);
$pdf->MultiCell(50, 5, "Office",1,'C');

$pdf->SetXY(130, $contentY);
$pdf->MultiCell(40, 5, "Owner",1,'C');

$pdf->SetXY(170, $contentY);
$pdf->MultiCell(38, 5, "Date",1,'C');

//Table with 20 rows and 4 columns
$pdf->SetWidths(array(30,40,50,40,38));
srand(microtime()*1000000);
$pdf->SetFont($fontUsed);
$pdf->SetFontSize(8);


// $key=array();
// $key=$_POST['data'];
// echo $key['data'][0]['no'];
// // exit();
// print_r($_POST['data']['data'][0]);
// exit();

// var_dump($_POST);
// exit();
foreach ($_POST['data']['data'] as $key ) 
{
    $pdf->Row(array($key['barcode'],$key['title'],$key['office'],$key['owner'],$key['date']));
}


$pdf->Output();

function getDepartment($username)
{
	global $DB_HOST, $DB_USER,$DB_PASS, $DB_SCHEMA;
	$con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);



}