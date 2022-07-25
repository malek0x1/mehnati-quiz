<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <!-- <link rel="stylesheet" href="assets/css/form-style.css"> -->
</head>
<style>
    .container{
        min-height: 80vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .wrapper{
        border-radius: 15px;
        padding: 50px;
    }

    input:not(input[type="button"]){
        border: none;
        border-bottom: 2px solid black;
        width: 100%;
        margin: 15px 0px 15px 0px;
        transition: 0.2s;
        font-size: 26px;
        padding: 10px;
	outline:none;

    }

    .wrapper .btn{
        font-size: 22px;
        width: 100%;
    }

</style>
<body>

<?php 
$reg=false;
include 'additional/admin-header.html';
include 'additional/config.php';
if(isset($_POST['user']) && isset($_POST['pwd']) && isset($_POST['pwd'])  ){
$user=mysqli_real_escape_string($conn, $_POST['user']);
$pwd=mysqli_real_escape_string($conn,$_POST['pwd']);
$cpwd=mysqli_real_escape_string($conn,$_POST['cpwd']);
if($pwd===$cpwd	 ){
$sql = mysqli_query($conn, "INSERT INTO `admin` (`id`, `user`, `password`) VALUES (NULL, '$user', '$pwd')");
$reg=true;
}
else{

echo '<script>alert("passwords not match")</script>';

}

}
?>
    <div class="container">
<form method="POST">
        <div class="wrapper">
	<h1 style="text-align:center;padding-bottom:10px;">Register Page</h1>
        <input type="text" name="user" placeholder="Username">
        <br>
        <input type="password" name="pwd" placeholder="Password">
        <br>
        <input type="password" name="cpwd" placeholder="Confirm Password">
	<?php if($reg){?> <p class="text-center" style="color:green;font-weight:1000;font-size:20px;">User Added Successfully</p> <?php } ?>
        <input type="submit" class="btn btn-dark" value="Register">
        </div>
</form>
    	</div>
        <?php include 'additional/footer.html';?>

</body>
</html>
