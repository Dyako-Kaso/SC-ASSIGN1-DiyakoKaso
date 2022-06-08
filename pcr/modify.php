
<?php
//connect to the database
require_once('../db/db.php');

//Then take all 8 values from the form data(input) and store it inside these varliables
  $id = $_GET['id'];
  $name = $_POST['name'];
  $gender = $_POST['gender'];
  $phone = $_POST['phone'];
  $date_of_birth = $_POST['date_of_birth'];
  $date_of_test = $_POST['date_of_test'];
  $date_of_issue = $_POST['date_of_issue'];
  $result = $_POST['result'];

//Then take all these 8 values and update it
  $sql="UPDATE pcrpatients SET
  name='$name',
  gender='$gender',
  phone='$phone',
  date_of_birth='$date_of_birth',
  date_of_test='$date_of_test',
  date_of_issue='$date_of_issue',
  result='$result'
  WHERE id= $id";

           
//this code to update PDF file, so it will overwrite the pdf file based on the edit information of patient

$style = array(
    'border' => 2,
    'vpadding' => 'auto',
    'hpadding' => 'auto',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, //array(255,255,255)
    'module_width' => 1, // width of a single module in points
    'module_height' => 1 // height of a single module in points
);

require_once('../pdf/examples/tcpdf_include.php');
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


			$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Zahraa');
$pdf->setTitle('PCR Test');
$pdf->setSubject('PCR Test');


// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);




// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->setFont('dejavusans', '', 10);
$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);
// add a page
$pdf->AddPage();

// writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
// writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)

// create some HTML content
$html = <<<EOD

<table  cellspacing="3" cellpadding="4">

    <tr>
        <td><img src="../images/img1.jpg" alt="Trulli" width="120" height="50" style= "margin-left: 526px;"></td>
        <td></td>
        <td><img src="../images/img.png" alt="Trulli" width="150" height="50"></td>
    </tr>

</table>
<p style="text-align: center;"> <strong>Certeificate of Coronavirus (COVID-19) PCR Testing</strong></p>

<hr />
<p></p>
<p></p>
<p></p>
<table  style="border-collapse: collapse; width: 60%; height: 25px; border: 1px solid black;">
<tr>
<td style="width: 26.9531%;">Full Name :</td>
<td style="width: 73.0469%;"> $name</td>
</tr>
<tr>
<td style="width: 26.9531%;"></td>
<td style="width: 73.0469%;"></td>
</tr>
<tr>
<td style="width: 26.9531%;">Gender:</td>
<td style="width: 73.0469%;"> $gender</td>
</tr>
<tr>
<td style="width: 26.9531%;"></td>
<td style="width: 73.0469%;"></td>
</tr>
<tr>
<td style="width: 26.9531%;">Date of birth:</td>
<td style="width: 73.0469%;"> $date_of_birth</td>
</tr>
<tr>
<td style="width: 26.9531%;"></td>
<td style="width: 73.0469%;"></td>
</tr>
<tr>
<td style="width: 26.9531%;">Phone number:</td>
<td style="width: 73.0469%;"> $phone</td>
</tr>
</table>
<p>&nbsp;</p>

<table  style="border-collapse: collapse; width: 60%; height: 25px; border: 1px solid black;">
<tr>
<td style="width: 26.9531%;">Date of test :</td>
<td style="width: 73.0469%;"> $date_of_test </td>
</tr>
<tr>
<td style="width: 26.9531%;"></td>
<td style="width: 73.0469%;"></td>
</tr>
<tr>
<td style="width: 26.9531%;">Date of issue: </td>
<td style="width: 73.0469%;">$date_of_issue</td>
</tr>
</table>
<p>&nbsp;</p>
<p>WE CERTIFY THAT A SWAB FROM THIS PERSON IS<br />TESTED FOR COVID-19 BY (REAL TIME -PCR)</p>

Result:
<table  style="border-collapse: collapse; width: 40%; height: 25px; border: 1px solid black;">
<tbody>
<tr>
<td style="text-align:center">&nbsp;$result</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
<table style="border-collapse: collapse; width: 100%;" border="1">
<tbody>
<tr>
<td style="width: 100%;">NO 2019 Novel Corona-virus (2019-nCov) RNA was detected in the specimen, and the concentration was lower than the sensitivity of the kit</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>

<p></p>
<p></p> <p>Use the mobile application to Scan the QR code</p>
<p></p> <p></p> <p></p>
<p style="text-align: left;">&nbsp;</p>
<p style="text-align: left;">Lab: Oscar Health Ltd</p>
<p style="text-align: left;">Address: salm street,Sulaymaniyah</p>
<p style="text-align: left;">Tel: 0771 4525 025</p>
<p style="text-align: left;">&nbsp;</p>
EOD;

// Print text using writeHTMLCell()
//$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

/// create QRCODE
$pdf->write2DBarcode($_SERVER['HTTP_HOST'].'/pcr/outputs/'.$id.'.pdf', 'QRCODE,M',  155, 235, 50, 50, $style, 'N');
$pdf->Output($_SERVER['DOCUMENT_ROOT'].'/wpnew/pcr/outputs/'.$id.'.pdf', 'F');

  if($con->query($sql) === TRUE){
    echo '<script >alert("data has been modified successfully!!")</script>';
    echo "<script>window.location = 'http://localhost/wpnew/pcr/pcrpatients.php'</script>";
  }
  else{
    echo "data has not been modified";
  }
