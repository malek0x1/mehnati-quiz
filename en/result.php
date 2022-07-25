<?php error_reporting(E_ERROR | E_PARSE);include_once 'additional/config.php';
?>

<?php
session_start();
// if user sign up
if( isset($_SESSION['fullname'])){
include 'additional/config.php';
// store user fullname in $_SESSION fullname global variable
$user=$_SESSION['fullname'];

if(isset($_GET['result'])){
    //xmlhttprequest will recieve the top 3 inteliglegance types in this format "A|B|C"
    $result=mysqli_real_escape_string($conn,$_GET['result']); 
 
    if(!empty($result)){
	// split the top 3 inteliglegance types into array
        $arr=explode("|",$result);
        $val1=$arr[0];
        $val2=$arr[1];
        $val3=$arr[2];
        include 'additional/config.php';
					// insert into table
        $sql = mysqli_query($conn,"insert into results (fullname,score1,score2,score3) values('$user','$val1','$val2','$val3')");
    }}
    if(!isset($_GET['result'])){
        include 'additional/config.php';
				// showing the results
    $sqlx=mysqli_query($conn,"SELECT * FROM results WHERE fullname='$user';");
    $rowx = mysqli_fetch_assoc($sqlx);
    $val1=$rowx['score1'];
    $val2=$rowx['score2'];
    $val3=$rowx['score3'];



        $sql2=mysqli_query($conn,"SELECT * FROM `int_types` WHERE symbole='$val1';");
        while($row = mysqli_fetch_assoc($sql2)){
            $type1=$row['type'];
            $desc1=$row['descr'];
        }


        $sql3=mysqli_query($conn,"SELECT * FROM `int_types` WHERE symbole='$val2';");
        while($row2= mysqli_fetch_assoc($sql3)){
            $type2=$row2['type'];
            $desc2=$row2['descr'];
        }




        $sql4=mysqli_query($conn,"SELECT * FROM `int_types` WHERE symbole='$val3';");
        while($row3 = mysqli_fetch_assoc($sql4)){
            $type3=$row3['type'];
            $desc3=$row3['descr'];
        }

    }

}else{
// if user didnt signup yet or we can redirect the user automatically to /form.php
die('signup please <a href="form.php">Signup from here</a>');


//header('location: /form.php');
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" href="assets/media/favicon.png"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intelligence Results</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <style>
        .container{
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .box1 .titleX{
           background-color: #f14055; 
        }
        .box2 .titleX{
            background-color: #5c39ba;
        }
        .box3 .titleX{
            background-color: #a2bf83;
        }

        .titleX{
            border-radius: 1000000px;
            margin-bottom: 5px;
            display: grid;
            justify-items: center;
            background-color: red;
            width: 200px;
            height: 200px;
            color: #fff;
            padding: 50px 50px 50px 35px;
        }

        .description{
            border: 2px solid black;
            display: grid;
            align-items: center;
            text-align: center;
            width: 200px;
            height: 200px;
            background-color: #eee;

        }

        @media(max-width:700px){
            .container{
                display: grid;
                grid-template-columns: 1fr 1fr;
                justify-items: center;
            }
        }

        @media(max-width:470px){
            .container{
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
<?php include 'additional/header.html';?>
    <h1 class="text-center">Congratulations Your Intelligence Are</h1>
    <div class="container">
        <div class="box box1">
            <div class="titleX">
                <h3 id="symbol"><?php echo $val1;?></h3>
                <h4 id="symbol-title"><?php echo $type1; ?></h4>
            </div>
            <div class="description">
                <b><?php echo $desc1; ?></b>
            </div>
        </div>
        <div class="box box2">
            <div class="titleX">
                <h3 id="symbol"> <?php echo $val2;?> </h3>
                <h4 id="symbol-title"><?php echo $type2; ?></h4>
            </div>
            <div class="description">
                <b><?php echo $desc2; ?></b>
            </div>
        </div>
        <div class="box box3">
            <div class="titleX">
                <h3 id="symbol"><?php echo $val3;?></h3>
                <h4 id="symbol-title"><?php echo $type3; ?></h4>
            </div>
            <div class="description">
                <b><?php echo $desc3; ?></b>
            </div>
        </div>
    </div>
<?php include 'additional/footer.html';?>
</body>
</html>
