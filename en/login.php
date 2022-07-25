<?php 

include 'additional/config.php';

session_start();

?>
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
if(isset($_POST['user']) && isset($_POST['pwd'])  ){
$user=mysqli_real_escape_string($conn,$_POST['user']);
$pwd=mysqli_real_escape_string($conn,$_POST['pwd']);

$sql = mysqli_query($conn, "SELECT * from  `admin` where user='$user' AND  password='$pwd'");
if(mysqli_num_rows($sql) > 0){

$_SESSION['isLoggedin']="OK";

echo '<script>location="intelligence_Table.php";</script>';

}


else{
$reg=true;}

}

?>
    <div class="container">
<form method="POST" autocomplete="off">
        <div class="wrapper">
	<h1 style="text-align:center;padding-bottom:10px;">Login Page</h1>
        <input  type="text" name="user" placeholder="Username">
        <br>
        <input type="password" name="pwd" placeholder="Password">
	<?php if($reg){?> <p class="text-center" style="color:red;font-weight:1000;font-size:20px;">username or password is wrong</p> <?php } ?>
        <hr>
        <input type="submit" class="btn btn-dark" value="Login">
        </div>
</form>
    	</div>
        <?php include 'additional/footer.html';?>

</body>
</html>
