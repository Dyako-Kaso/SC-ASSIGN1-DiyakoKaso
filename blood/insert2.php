<!DOCTYPE html>
<html>

<head>
    <title>Insert Page page</title>
</head>

<body>
    <center>
        <?php
		// style for QRCODE 
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

        include "../db/db.php";
        // Taking all 9 values from the form data(input)
   	    $name = $_REQUEST["name"];
        $gender = $_REQUEST["gender"];
        $blood_type = $_REQUEST["blood_type"];
       	$phone = $_REQUEST["phone"];
       	$date_of_birth = $_REQUEST["date_of_birth"];
       	$date_of_test = $_REQUEST["date_of_test"];
       	$date_of_issue = $_REQUEST["date_of_issue"];
       	$result = $_REQUEST["result"];

        // Performing insert query execution
        // here our table name is patient
        $sql = "INSERT INTO bloodpatients(name,gender,blood_type,phone,date_of_birth,date_of_test,date_of_issue,result) VALUES('$name' , '$gender','$blood_type','$phone',
	     ' $date_of_birth', '$date_of_test','$date_of_issue','$result')";

        if(mysqli_query($con, $sql)){
            echo '<script >alert("New patient has been added successfully!!")</script>';
            echo "<script>window.location = 'http://localhost/wpnew/blood/bloodpatients.php'</script>";

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
        <td><img src="../images/img3.jpg" alt="Trulli" width="120" height="70" style= "margin-left: 526px;"></td>
        <td></td>
        <td><img src="../images/img4.jpg" alt="Trulli" width="150" height="50"></td>
    </tr>

</table>
<p style="text-align: center;"> <strong>Certeificate of Blood Testing</strong></p>

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
<td style="width: 26.9531%;">blood type:</td>
<td style="width: 73.0469%;"> $blood_type</td>
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
<p>WE CERTIFY THAT A SWAB FROM THIS PERSON IS<br />TESTED FOR Blood BY </p>

Result:
<table  style="border-collapse: collapse; width: 40%; height: 25px; border: 1px solid black;">
<tbody>
<tr>
<td style="text-align:center">&nbsp;$result</td>
</tr>
</tbody>
</table> 
<p>&nbsp;</p>

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
$pdf->write2DBarcode($_SERVER['HTTP_HOST'].'/wpnew/blood/outputs/'.mysqli_insert_id($con).'.pdf', 'QRCODE,M',  155, 235, 50, 50, $style, 'N');



//Close and output PDF document
$pdf->Output($_SERVER['DOCUMENT_ROOT'].'/wpnew/blood/outputs/'.mysqli_insert_id($con).'.pdf', 'F');
            echo '<script >alert("New patient has been added successfully!!")</script>';
            echo "<script>window.location = 'http://localhost/wpnew/'</script>";


        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($con);
        }

        // Close connection
        mysqli_close($con);
        ?>
    </center>
</body>



</html>
