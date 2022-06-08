<?php
//connect to the database by mysqli for displaying table
require_once('../db/db.php');

//connect to the database by pdo for diplaying tavle after search search
require_once('../db/db2.php');

//check if the user clicked on pcr test button in the home page then direct him/her to this page
if(isset($_SESSION['blood'])){
    header('Location: blood/bloodpatients.php');
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title></title>
		  <link rel="stylesheet" href="../style/tablestyle.css">
			</head>
	<body>

		<button class="add"> <a href="../blood/Badd.php"><b>ADD</b></a>  </button>



		<?php
    // here is the searching method which it will check 3 condition if true then continue the process if searching otherwise there is no search and go to else statment which it will display the whole table
    //first if search button has been clicked on  and an input(keyword) has been entered by the user and the input is not empty then perform the search
    	if (isset($_POST['search']) && isset($_POST['keyword']) && ($_POST['keyword'] != "")){

    $keywordfromform = $_POST["keyword"];
    $keyword = "%$keywordfromform%";
    $itemDetailsSearchSql = 'SELECT * FROM bloodpatients where id like ? or name like ? ORDER BY id DESC';
    $itemDetailsSearchStatement = $conn->prepare($itemDetailsSearchSql);
    $itemDetailsSearchStatement->execute(array($keyword,$keyword));

//store the table inside variable output
							$output = '<table id="itemDetailsTable">
										<tr>
											<th style="width:40px;">ID</th>
											<th style="width:140px;">Patient Name</th>
											<th style="width:50px;">Gender</th>
                      <th style="width:40px;">Blood type </th>
											<th>Phone Number</th>
											<th>Date of Birth</th>
											<th>Date of Test</th>
											<th>Date of issue</th>
											<th style="width:50px;">Result</th>
											<th>Action</th>
										</tr>
									';
            if($itemDetailsSearchStatement->rowCount() > 0){

						// Create table rows from the selected data
						while($row = $itemDetailsSearchStatement->fetch(PDO::FETCH_ASSOC)){

							$output .= '<tr>' .
											'<td style="width:40px;">' . $row['id'] . '</td>' .
											'<td style="width:140px;">' . $row['name'] . '</td>'.
											'<td style="width:50px;">' . $row['gender'] . '</td>' .
                      '<td style="width:40px;" >' . $row['blood_type'] . '</td>' .
											'<td>' . $row['phone'] . '</td>' .
											'<td>' . $row['date_of_birth'] . '</td>' .
											'<td>' . $row['date_of_test'] . '</td>' .
											'<td>' . $row['date_of_issue'] . '</td>' .
											'<td style="width:50px;">' . $row['result'] . '</td>' .
                      '<td><a href="../blood/delete1.php?id='.$row["id"] .'"><img src="../images/delete.png"  width="18" height="20" style="margin-top:-10px; text-decoration:none;"/> </a>
											<a href="../blood/edit1.php?id='.$row["id"] .'"><img src="../images/edit.png"  width="18" height="20" style="margin-top:-10px; text-decoration:none;"/> </a>
											<a href="../blood/outputs/'.$row["id"].'"><img src="../images/folder.png"  width="18" height="20" style="margin-top:-10px; text-decoration:none;"/> </a></td>'.
                      '</tr>';}
                      $itemDetailsSearchStatement->closeCursor();//free up space and close the connection

      '</tbody>
          <tfoot>
            <tr>
              <th style="width:40px;">ID</th>
              <th style="width:140px;">Patient Name</th>
              <th style="width:50px;">Gender</th>
              <th style="width:40px;">blood_type</th>
              <th>Phone Number</th>
              <th>Date of Birth</th>
            <th>Date of Test</th>
            <th>Date of issue</th>
            <th style="width:50px;">Result</th>
            <th>Actions</th>
            </tr>
          </tfoot>
        </table>';

              echo $output; //display the table
            }
            else { //if there is no matching results then display this message
              echo '<script >alert("NO RESULT!!")</script>';
              $output .= '</table>';
              echo $output;
                 }


}
//if there is no search then display the whole table
else{?>
	<table id="table1" class=" table1">
	<thead>
	<tr>
	<th style="width:40px;">ID</th>
	<th style="width:140px;">Patient Name</th>
	<th style="width:50px;">Gender</th>
  <th style="width:40px;">Blood type</th>
	<th>Phone Number</th>
	<th>Date of Birth</th>
  <th>Date of Test</th>
  <th>Date of issue</th>
  <th style="width:50px;">Result</th>
  <th>Action</th>
	</tr>

</thead>
<?php
// here is the process of dividing the table in order to display 5 patients only in each page
	if (isset($_GET['page_no']) && $_GET['page_no']!="") {
        $page_no = $_GET['page_no'];
         } else {
        $page_no = 1;
        }

				$total_records_per_page = 5;
				$offset = ($page_no-1) * $total_records_per_page;
        $previous_page = $page_no - 1;
        $next_page = $page_no + 1;
        $adjacents = "2";

        $result_count = mysqli_query($con,"SELECT COUNT(*) As total_records FROM bloodpatients");
				$total_records = mysqli_fetch_array($result_count);
				$total_records = $total_records['total_records'];
				$total_no_of_pages = ceil($total_records / $total_records_per_page);
				$second_last = $total_no_of_pages - 1; // total pages minus 1
				$result = mysqli_query($con,"SELECT * FROM bloodpatients ORDER BY id DESC LIMIT $offset, $total_records_per_page " );

        //display all the table rows one by one when while condition is working
        while($row = mysqli_fetch_array($result)){
		    echo "
				<table id='table1'>
				<tr >
			 <td style='width:40px;'>".$row['id']."</td>
			 <td style='width:140px;'>".$row['name']."</td>
			 <td style='width:50px;'>".$row['gender']."</td>
       <td style='width:40px;'>".$row['blood_type']."</td>
			 <td>".$row['phone']."</td>
			 <td>".$row['date_of_birth']."</td>
			 <td>".$row['date_of_test']."</td>
			 <td>".$row['date_of_issue']."</td>
			 <td style='width:50px;'>".$row['result']."</td>
       <td>". '<a href="../blood/delete1.php?id='.$row["id"] .'"><img src="../images/delete.png"  width="18" height="20" style="margin-top:-10px; text-decoration:none;"/> </a>
       <a href="../blood/edit1.php?id='.$row["id"] .'"><img src="../images/edit.png"  width="18" height="20" style="margin-top:-10px; text-decoration:none;"/> </a>
       <a href="../blood/outputs/'.$row["id"].'.pdf"><img src="../images/folder.png"  width="18" height="20" style="margin-top:-10px; text-decoration:none;"/> </a>'."</td>
			 </tr></table>";
		        }
		mysqli_close($con);//close the connection
	?>

<!-- here is the pagination process is performaed to display the number of pages and display next /previous/last/first page-->
<ul class="pagination" style="list-style: none;">
<?php if($page_no > 1){
echo "<li><a id='first'href='?page_no=1'>First Page</a></li>";
} ?>

<li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
<a id="prev"<?php if($page_no > 1){
echo "href='?page_no=$previous_page'";
} ?>>Previous</a>
</li>

<li <?php if($page_no >= $total_no_of_pages){
echo "class='disabled'";
} ?>>
<a <?php if($page_no < $total_no_of_pages) {
echo "href='?page_no=$next_page'";
} ?>>Next</a>
</li>

<?php if($page_no < $total_no_of_pages){
echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
} ?>
</ul>
<tbody>

</tbody>
</table>
<br /><br /><br />
<div id="page">
<strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
</div>
<?php

		}


?>
	</body>
</html>
