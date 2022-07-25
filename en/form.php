
<?php
include_once 'additional/config.php';
session_start();
error_reporting(E_ERROR | E_PARSE);
// checking if these POST parameters are set
if(isset($_POST['name']) &&  isset($_POST['Prenom']) && isset($_POST['email']) && isset($_POST['Telephone']) && isset($_POST['Ecole']) ){
include 'additional/config.php';

// firstname + <space> + lastname = fullname
$fullname=mysqli_real_escape_string($conn,$_POST['name']) . ' ' .  mysqli_real_escape_string($conn,$_POST['Prenom']);


// doing filtering for the supplied input before storing in variable
$email=mysqli_real_escape_string($conn,$_POST['email']);
$num=mysqli_real_escape_string($conn,$_POST['Telephone']);
$result='';
$school=mysqli_real_escape_string($conn,$_POST['Ecole']);

// storing the date in $date variable
$date=date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']);

//storing fullname in Global variable $_SESSION[] for later validation
$_SESSION['fullname']= $fullname;

//inserting values into table




//$sql_check = mysqli_query($conn,"select * from users where email='a@x.com';");
//if(mysqli_num_rows($sql_check) > 0){echo "<script>alert('Email already taken');return;</script>";}

try{

$query="INSERT INTO `users` (`fullname`, `email`, `phone`, `school`, `result`, `date`) VALUES ('$fullname', '$email', '$num', '$school', '$result', '$date')";



//executing the query
$sql = mysqli_query($conn, $query);



header('location: test.php');




} catch (mysqli_sql_exception $e) {
$error=true;
}





}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
  <style>label,span{font-size: 17px;font-weight: 900;}</style>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up</title>
    <link rel="stylesheet" href="assets/css/form-style.css" />

<link rel="shortcut icon" href="assets/media/favicon.png"/>
    <link
      rel="stylesheet"
    />
  </head>
  <body>
<style>
button{cursor:pointer;}
</style>

<?php include 'additional/header.html';?>
    <div class="turn-page">
      <div class="d-flex">
<form id="frm" action="form.php" method="POST">
        <a href=""><img src="assets/media/arrow-left.png" alt="">Precedent</i></a>
        <button onclick='document.getElementById("frm").submit();' style="border:none;background-color:transparent;">Suivant<img src="assets/media/arrow-right.png"></button>

      </div>
    </div>
    <div class="personal-form container-fluid">
        <hr />
        <label >Name</label>
        <input required type="text" name="name" maxlength="50" placeholder="name" />
        <hr />
        <label>Last name</label>
        <input required type="text" name="Prenom" maxlength="50" placeholder="last name" />
        <hr />

        <label  stlye="display:flex;">Email Address</label>

        <input
	        required
          type="email"
          name="email"
          placeholder="Email Address"
          maxlength="72"
        />

<style>

@media (max-width:550px){#email-check{text-align:left;margin-right:100px;}}

</style>

<?php if(isset($error)){?>
<div style="position:relative;width:100%;max-height:20px;"><p id="email-check" style="color:red;font-size:18;font-weight:bold;text-align:center;padding-top:10px;"> * Email Already Taken.</p></div> <?php    }?>       <hr />
        <label>Phone</label>
        <input required type="number" name="Telephone" placeholder="phone" />
        <hr />
        <label>School</label>
        <input required type="text" maxlength="50" name="Ecole" placeholder="school" />
        <hr />
    </div>
    <div class="turn-page">
      <span class="d-flex">
        <a href=""><img src="assets/media/arrow-left.png" alt="">Precedent</i></a>
        <button  style="border:none;background-color:transparent;">Suivant<img src="assets/media/arrow-right.png"></button>
</form>
      </span>
    </div>
<?php include 'additional/footer.html';?>

  </body>
</html>
