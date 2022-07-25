<?php 

// hide warnings For better Security

error_reporting(E_ERROR | E_PARSE);

include_once 'additional/config.php';
if(!isset($_SESSION['isLoggedin'])){header('location: login.php');}




?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" href="assets/media/favicon.png"/>
    <meta charset="utf-8">
    <title>Intelligence Type</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>


<?php include 'additional/admin-header.html';?>

<?php
if(isset($_GET['del'])){
include 'additional/config.php';
// 
$id_q=mysqli_real_escape_string($conn,$_GET['del']);
mysqli_query($conn, "DELETE FROM questions_ar WHERE id='$id_q'");
echo '<div class="alert alert-success" role="alert"><strong class="ml-5">Question deleted </strong></div>';
}
?>



<!--- START ---->
<section>
<div class="" style="display:flex;justify-content:space-between;" >
    <h1 style="float:left;">&nbsp</h1>
<form method="GET" action="">    <span style="font-size: 25px;margin-right: 25px;" >  Search</span><input id="myInput"  class="mr-5" name="search"></form>
</div>

    <div  class="row mr-2">
        <div class="col-md-12 col-sm-12">
<div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th id="head">Question</th>
                        <th id="head">Action</th>
                    </tr>
                </thead>


                <tbody >

<?php

// checking if search GET parameter is set . if yes include search.php
if(isset($_GET['search'])){

include 'additional/search4.php';
}
// if search GET parameter  isn't set then include fetch.php
else{
include 'additional/fetch4.php';}
?>


                </tbody>

            </table>
        </div>
        <div style="float: right;" class="btn-group" role="group" aria-label="Basic example">

<?php
$cc=1;
// if get parameter is set
if(isset($_GET['search'])){											// injection protecjtion
        echo '<button type="button" class="btn btn-info" onclick="location.href=\'question_Table.php?spage=1&search=' . mysqli_real_escape_string($conn,$_GET['search']) . '\'">1</button>';
	// while loop
    while($totalpages > $cc){
        $cc++;													// injection protecjtion
        $out="<button class='btn btn-info' onclick='location.href=\"/question_Table.php?spage=$cc" . "&" .  'search=' . mysqli_real_escape_string($conn,$_GET['search']) .   "\"'>$cc</button>" ;
	// showing output
    echo $out;
}

}
else{
						// onclicking the button redirect me to question_Table.php?page=1
echo '<button type="button" class="btn btn-info" onclick="location.href=\'question_Table.php?page=1\'">1</button>';
            $c=1;
	// loop[
        while($totalpages > $c){
            $c++;
            $out="<button class='btn btn-info' onclick='location.href=\"question_Table.php?page=$c\"'>$c</button>" ;
        echo $out;
}}
?>



          </div>    </div>
         

</div>
<hr>
<a href="add_Question.php" style="color:white;text-decoration:none"><buttun type="button" class="btn btn-success"  style="border-radius: 20px;">New entry</button></a>


</div>
</section>
<!---- END ---->
<style type="text/css">
hr{
    border: grey 1px solid;
}
section{margin-top:0px;margin-left:40px;}

.toggleDisplay {
  display: none;
}
.toggleDisplay.in {
  display: table-cell;
}

#head{
    font-size: 16px;
}

#btn1 {
  color: #000;
  background-color: #0dcaf0;
  border-color: #0dcaf0;
  padding: 3px;



}
#btn1 a{
    text-decoration: none;
    color: white;
}

#btn2 {
  color: #fff;
  background-color: #dc3545;
  border-color: #dc3545;
  width: 60px;
  padding-left: 4px;
  padding: 3px;
}



#btn2 a{
    color: white;
    text-decoration: none;
}

</style>

<?php include 'additional/footer.html';?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("table tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

</body>
</html>
