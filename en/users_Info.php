
<?php error_reporting(E_ERROR | E_PARSE);include_once 'additional/config.php';


if(!isset($_SESSION['isLoggedin'])){header('location: login.php');}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" href="assets/media/favicon.png"/>
    <meta charset="utf-8">
    <title>participant's Personal Information</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<!--- START ---->
<?php include 'additional/admin-header.html';?>
  

  <style>
button{cursor:pointer;}
body {
      background-color: white;
    }


</style>
<div class="container" style="float: left;margin-left: 40px;;">

<?php
// checking if delemail GET parameter is set
if(isset($_GET['delemail'])){
include 'additional/config.php';
// doing filtering for the supplied input before storing in variable
$email=mysqli_real_escape_string($conn,$_GET['delemail']);
// checking if email already exists

$sql1=mysqli_query($conn, "SELECT *  FROM users WHERE email='$email'");
if(mysqli_num_rows($sql1) > 0){
// if the email is exists delete it
  $sql2=mysqli_query($conn, "DELETE FROM users WHERE email='$email'");
  echo '<div class="alert alert-success" role="alert"><strong> Deleted Successfully.</strong></div>';
}
}
?>




 


<div class="mt-4 mb-4" style="display:flex;justify-content:space-between;" >
    <h1 style="float:left;">Participant's Personal Information</h1>
<form method="GET" action="">    <span style="font-size: 25px;margin-right: 25px;" >  Search</span><input  id="myInput" class="" style="width:200px;" name="search"><input   style="width:0px;height:0px;"  hidden name="spage" value="1"><input type="submit" hidden style="width:0px;height:0px;"></form>
</div>







    <div  class="row">
        <div class="col-12">
<div class="">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th id="head">Full Name</th>
                        <th id="head">Email</th>
                        <th id="head">Phone number</th>
                        <th id="head">School</th>
                        <th id="head">Result</th>
                        <th id="head">Date</th>
                        <th id="head">Action</th>
                    </tr>
                </thead>


                <tbody >

<?php
//checking if GET parameter "search" is set
if(isset($_GET['search'])){
    include 'additional/config.php';
// 
    $q=mysqli_real_escape_string($conn,$_GET['search']);

   include "additional/config.php";
				// storing how much rows in "var"
  $sql0=mysqli_query($conn, "SELECT count(email) AS var from users where fullname LIKE '%$q%';");

   $row0 = mysqli_fetch_assoc($sql0);
   $total=$row0['var'];

// if spage isn't set set the value "1"
   $page=max(intval(mysqli_real_escape_string($conn,$_GET['spage'])),1); 

   $itemsperpage = 10;
   $totalpages = max(ceil($total/$itemsperpage),1);

//sql query to select maximum 10 rows.
   $query = "SELECT * from users where fullname LIKE '%$q%' LIMIT ".(($page-1)*$itemsperpage).",".$itemsperpage;

//executing the query
   $sql1=mysqli_query($conn, $query);

   while($row = mysqli_fetch_assoc($sql1)){
   $out='                <tr>
                 <td>' . htmlentities($row["fullname"]) . '</td>
                 <td>' . htmlentities($row["email"]) . '</td>
                 <td>' . htmlentities($row["phone"]) . ' </td>
                 <td>' . htmlentities($row["school"]) . ' </td>
                 <td>' . htmlentities($row["result"]) . '</td>
                 <td>' . htmlentities($row["date"])  . '</td>
                 <td>
                 <span  id="btn2"><a href="users_Info.php?delemail=' . htmlentities($row["email"]) . '">delete</a></span>
                 </td>
               </tr>';
echo $out;
}}
else{
    include "additional/config.php";
    $sql0=mysqli_query($conn, "SELECT COUNT(email) AS var FROM users;");
    $row0 = mysqli_fetch_assoc($sql0);
    $total=$row0['var'];
    // if spage isn't set set the value "1"
    $page=max(intval(mysqli_real_escape_string($conn,$_GET['page'])),1);
    $itemsperpage = 10;

    //calculating total pages number
    $totalpages = max(ceil($total/$itemsperpage),1);

    //sql query to select maximum 10 rows.
    $query = "SELECT * FROM users LIMIT ".(($page-1)*$itemsperpage).",".$itemsperpage;
    $sql1=mysqli_query($conn, $query);
    while($row = mysqli_fetch_assoc($sql1)){
	$fxname=$row["fullname"];
	$sql2=mysqli_query($conn, "select score1,score2,score3 from results where fullname='$fxname'");$row2 = mysqli_fetch_assoc($sql2);
	$resultx=$row2["score1"] . ' ' . $row2["score2"] . ' ' . $row2["score3"];
    $out='                <tr>
                  <td>' . htmlentities($row["fullname"] ). '</td>
                  <td>' . htmlentities($row["email"]) . '</td>
                  <td>' . htmlentities($row["phone"]) . ' </td>
                  <td>' . htmlentities($row["school"]) . ' </td>
                  <td>' . htmlentities($resultx) . '</td>
                  <td>' . htmlentities($row["date"] )  . '</td>
                  <td>
                  <span  id="btn2"><a href="users_Info.php?delemail=' . htmlentities($row["email"]) . '">delete</a></span>
                  </td>
                </tr>';
echo $out;
}}
?>

                </tbody>

            </table>

        </div>
        <div style="float: right;" class="btn-group" role="group" >
<?php
$cc=1; //counter

//checking if search GET parameter is set
if(isset($_GET['search'])){
	echo '<button type="button" class="btn btn-info" onclick="location.href=\'users_Info.php?spage=1&search=' . mysqli_real_escape_string($conn,$_GET['search']) . '\'">1</button>';
    while($totalpages > $cc){
        $cc++; //incrementing by 1
        $out="<button class='btn btn-info' onclick='location.href=\"users_Info.php?spage=$cc" . "&" .  'search=' . mysqli_real_escape_string($conn,$_GET['search']) .   "\"'>$cc</button>" ;
    echo $out;
}

}

else{
echo '<button type="button" class="btn btn-info" onclick="location.href=\'users_Info.php?page=1\'">1</button>';
            $c=1; 
        while($totalpages > $c){
            $c++; //incrementing by 1
            $out="<button class='btn btn-info' onclick='location.href=\"users_Info.php?page=$c\"'>$c</button>" ;
        echo $out;
}}
?>

          </div>    </div>


</div>
<hr class="mt-5 ">


</div>
<!---- END ---->
<style type="text/css">
hr{
    border: grey 1px solid;
}

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
<div style="margin-top:500px;">
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

</div>
</body>
</html>
