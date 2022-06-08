<?php
//connect to the database
include "../db/db.php";

//check if the user clicked on blood test button in the home page then direct him/her to this page
if(isset($_SESSION['blood'])){
    header('Location: bloodpatients.php');
}

//check if the user clicked on back button then direct him/her to home page
if(isset($_POST['back'])){
    header('Location: ../index.php');
}

?>


<!doctype html>
<html>
    <head>
      <link rel="stylesheet" href="../style/indexstyle.css">
      <link rel="stylesheet" href="../style/Sstyle.css">
    </head><!---->
<body>

    <div class="header"> <!--header-->
      <div class="topnav">
        <img src="../images/logo.png" alt="pcr logo" id="logo">
        <h2 id="title">PCR BARCODE</h2>
      		<form method='post' >
            <button type="submit" value="Back" name="back" class="button" >Back</button> <!-- this button will return back to the home page-->
            <button type="submit" value="Refresh"class="button" >Refresh</button><!-- this button will refresh the page-->
      		</form>
      </div>
    </div> <!-- end of header -->

    <div class="footer"> <!--footer-->
    <p>Made by Qaiwan International University (UTM Franchise) students | Contact us by using: <A href=mailto:haqiu190013@uniq.edu.iq?subject="subject text">This mail</A></p>
  </div> <!-- end of footer -->

    <div class="body"> <!--body-->

      <form method='post' action=""><!--start of the form that will display the search bar
        (once the user enter anything in the search bar it will direct him to (model/tables/itemDetailsSearchCreator2.php))
      then it will perfume the search process-->
  <input type="text"   class="searchstyle" name="keyword"  placeholder="Search for ID or name.." title="Type in a id">
  <button name="search"   class="searchstyle2"  >search</button>
</form>

<!-- display the table along with add patient button -->
<?php
include '../model/tables/itemDetailsSearchTableCreator2.php';
?>

  </div> <!-- end of body -->



    </body>
</html>
