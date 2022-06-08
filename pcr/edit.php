<?php
//check if the is is provided or not
if(!isset($_GET['id'])){
  die('id not provided');
}

//connect to the database
require_once('../db/db.php');

$id =$_GET['id'];

//selecting all from table
// here our table name is pcrpatient
$sql="select * from pcrpatients where id='$id'";
$result =$con->query($sql);

//every patient has a uniq id
//check if there is no one row(0 and multiple row are not accepted because id must be uniq that means will find only one of each number)
 //to display error message
if($result->num_rows != 1)
{
  die('id is not in the db');
}

//otherwise if exist then fetch all the data
$data = $result->FETCH_ASSOC();
 ?>

 <html >
 	<head>
 		<meta charset="utf-8">
      <link rel="stylesheet" href="../style/addpatientStyles.css">
      <link rel="stylesheet" href="../style/indexstyle.css">
      <script type="text/javascript" src="js.js"></script>
 	</head>
 	<body>
    <div class="header"> <!--header-->

      <div class="topnav">
        <img src="../images/logo.png" alt="pcr logo" id="logo">
        <h2 id="title">PCR BARCODE</h2>
          <form method='post' >
              <button type="submit" value="Refresh"class="button" >Refresh</button>
          </form>
      </div>

    </div> <!-- end of header -->

    <div class="body"> <!--body-->

 						<div  class="New_Patient_Form" >
 	          <div class="title">Edit Form</div>
            <form action="modify.php?id=<?= $id ?>" method="post" name="myForm" onsubmit="return validateForm()"> <!--edit form-->
            <div class="form_wrap">

            <div class="basic">
 										 <div class="input_grp">
 											 <div class="input_wrap">
 												 <label for="name">Full Name</label>
 												 <input type="text" id="fname"  name="name" value="<?= $data['name']?>">
 											 </div>
 																</div>
 																<br>
 										 <div class="input_wrap">
 											 <label>Gender</label>
 													 <label class="radio_wrap" >
 														 <input type="text" name="gender"  class="input_radio"  value="<?= $data['gender']?>" required/>
 													 </label>

 										 </div>

 											 <div class="input_wrap"<br>
 												 <label for="phone" >Phone Number</label>
 												 <input type="tel" id="phone" name="phone" size="30" id="num" value="<?= $data['phone']?>">
 											 </div>
            </div>



            <div class="date">
 										 <div class="input_wrap">
 												<label for="date_of_birth">Birthday:</label>
 												 <input type="date" id="birthday" name="date_of_birth" class="submit_btn" value="<?= $data['date_of_birth']?>">

 										 </div>

 										 <div class="input_wrap">
 												<label for="date_of_test">Date of test:</label>
 												 <input type="date" id="D_test" name="date_of_test" class="submit_btn" value="<?= $data['date_of_test']?>">

 										 </div>
 										 <div class="input_wrap">
 												<label for="date_of_issue">Date of issue:</label>
 												 <input type="date" id="D_issue" name="date_of_issue" class="submit_btn" value="<?= $data['date_of_issue']?>">

 										 </div>
              </div>


              <div class="RESULT">
 						  <div class="input_wrap">
 											 <label>Result</label>
 													 <label class="radio_wrap">
 														 <input type="text" name="result" class="input_radio" value="<?= $data['result']?>" required>
 										 </div>
               </div>

 										 <div >
 											 <input type="submit" name="editform" value="submit" class="submit_btn" style="margin-top:10px; margin-bottom:-10px;">
 										 </div><br>


 												<div >
 												<input type = "button" class="submit_btn" data-dismiss = "modal" value="cancel" onclick="window.location='pcrpatients.php'">
 	 											</div ><br>
 									 </div>

 								 </form>
 			         </div>
      </div> <!-- end of body -->

      <div class="footer"> <!--footer-->
      <p>Made by Qaiwan International University (UTM Franchise) students | Contact us by using: <A href=mailto:haqiu190013@uniq.edu.iq?subject="subject text">This mail</A></p>
    </div> <!-- end of footer -->


 	</body>
 </html>
