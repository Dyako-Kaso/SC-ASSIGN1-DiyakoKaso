<?php

include "../db/db.php"; // Using database connection file here

$id = $_GET['id']; // get id through query string

$del = mysqli_query($con,"delete from pcrpatients where id = '$id'"); // delete query

if($del)
{
    mysqli_close($con); // Close connection
    header("location:pcrpatients.php"); // redirects to all records page
    exit;
}
else
{
      echo '<script >alert("Error delete")</script>';// display error message if not delete
}

?>
