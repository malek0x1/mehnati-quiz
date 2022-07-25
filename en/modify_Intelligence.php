<?php error_reporting(E_ERROR | E_PARSE);
include_once 'additional/config.php';

if(!isset($_SESSION['isLoggedin'])){header('location: login.php');}
?>
<?php
$q='';
// if GET paramter "s" is set 
if(isset($_GET['s'])){
include 'additional/config.php';
// store its value in $q variable
$q=mysqli_real_escape_string($conn,$_GET['s']);
// sql Query
$sql = mysqli_query($conn, "SELECT * from int_types where symbole='$q';");
$row = mysqli_fetch_assoc($sql);
// if $sql is true 
if($sql){
// storing values in variables
$symbol=$row['symbole'];
$desc=$row['descr'];
$type=$row['type'];
}


else{
//error
echo '<script>alert("NO");</script>';

}


//isset()
}


?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="shortcut icon" href="assets/media/favicon.png"/>  
  <title>Modify intelligence Type</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css" />
  </head>
<!----SOME STYLING---->
  <style>
      textarea {
  resize: none;
  overflow: hidden;
  border: none;
  border-radius: 3px;

}

    body {
      background-color: rgb(241, 241, 241);
    }

    .fillout {
      background-color: rgb(255, 255, 255);
      border-radius: 20px;
      padding: 10px;
    }
    .box {
      padding: 10px;
      background-color: rgb(226, 226, 226);
      border-radius: 10px;
      display: flex;
      justify-content: space-between;
    }

    .wrapper {
      display: flex;
      gap: 20px;
      margin: 20px;
    }

    .action-box {
      background-color: #fff;
      border-radius: 20px;
      text-align: center;
      padding: 25px;
    }

    .action-box .btn {
      margin-top: 15px;

      border-radius: 20px;
    }

    .action-box #btn1 {
      color: #fff;
      background-color: #a2bf83;
      transition: 0.3s;
    }
    .action-box #btn2 {
      color: #fff;
      background-color: #5c39ba;
      transition: 0.3s;
    }

    .action-box #btn1:hover,
    #btn2:hover {
      opacity: 0.9;
      transition: 0.3s;
    }

    .message {
      display: flex;
      background-color: #fff;
      border-radius: 20px;
      text-align: center;
      padding: 45px 25px;
    }

    .box-question input {
      border: 1px solid black;
      border-radius: 5px;
      margin-left: 10px;
      width: 360px;
      padding: 5px 5px;
    }


    #eng_btn_1{
      opacity: 1;
    }
    #eng_btn_1:before{
      content: "";
      position: absolute;
      width: 50px;
      height: 2px;
      background-color: green;
    }
    #fr_btn_1{
      opacity: 1;
    }
    #fr_btn_1:before{
      content: "";
      position: absolute;
      width: 50px;
      height: 2px;
      background-color: green;
    }
    #ar_btn_1{
      opacity: 1;
    }
    #ar_btn_1:before{
      content: "";
      position: absolute;
      width: 50px;
      height: 2px;
      background-color: green;
    }
    /* Button 2 */
    #eng_btn_2{
      opacity: 1;
    }
    #eng_btn_2:before{
      content: "";
      position: absolute;
      width: 50px;
      height: 2px;
      background-color: green;
    }
    #fr_btn_2{
      opacity: 1;
    }
    #fr_btn_2:before{
      content: "";
      position: absolute;
      width: 50px;
      height: 2px;
      background-color: green;
    }
    #ar_btn_2{
      opacity: 1;
    }
    #ar_btn_2:before{
      content: "";
      position: absolute;
      width: 50px;
      height: 2px;
      background-color: green;
    }
    /* Button 3 */
    #eng_btn_3{
      opacity: 1;
    }
    #eng_btn_3:before{
      content: "";
      position: absolute;
      width: 50px;
      height: 2px;
      background-color: green;
    }
    #fr_btn_3{
      opacity: 1;
    }
    #fr_btn_3:before{
      content: "";
      position: absolute;
      width: 50px;
      height: 2px;
      background-color: green;
    }
    #ar_btn_3{
      opacity: 1;
    }
    #ar_btn_3:before{
      content: "";
      position: absolute;
      width: 50px;
      height: 2px;
      background-color: green;
    }
    .fillout button{
      opacity: 0.3;
      border: none;
      background-color: rgba(0, 0, 0,0);
    }

    @media (max-width: 761px) {
      .wrapper {
        display: block;
        margin: 0px;
      }
      .box {
        display: grid;
      }
      .box-question input {
        width: 100%;
      }
    }
  </style>
  <body>
  <?php include "additional/admin-header.html";?>
<style>body {
      background-color: rgb(241, 241, 241);
    }
</style>

<script>

// javascript functions for translation
function toen_btn1(){
document.getElementById('eng_btn_').id = "eng_btn_1";
if(document.getElementById('fr_btn_1')){
document.getElementById('fr_btn_1').id = "fr_btn_";
}
else if(document.getElementById('ar_btn_1')){
document.getElementById('ar_btn_1').id = "ar_btn_";
}

document.getElementById("block-1-title").innerHTML = "Title";
document.getElementById("block-1-title2").innerHTML = "Title English";
};
function tofr_btn1(){
document.getElementById('fr_btn_').id = "fr_btn_1";
if(document.getElementById('eng_btn_1')){
document.getElementById('eng_btn_1').id = "eng_btn_";
}
else if(document.getElementById('ar_btn_1')){
document.getElementById('ar_btn_1').id = "ar_btn_";
}
document.getElementById("block-1-title").innerHTML = "Titre";
document.getElementById("block-1-title2").innerHTML = "Titre Français";
};
function toar_btn1(){
document.getElementById('ar_btn_').id = "ar_btn_1";
if(document.getElementById('eng_btn_1')){
document.getElementById('eng_btn_1').id = "eng_btn_";
}
else if(document.getElementById('fr_btn_1')){
document.getElementById('fr_btn_1').id = "fr_btn_";
}
document.getElementById("block-1-title").innerHTML = "عنوان";
document.getElementById("block-1-title2").innerHTML = "العنوان عربي";
}

//Button 2

function toen_btn2(){
if(document.getElementById('eng_btn__')){
document.getElementById('eng_btn__').id = "eng_btn_2";
}
if(document.getElementById('fr_btn_2')){
document.getElementById('fr_btn_2').id = "fr_btn__";
}
if(document.getElementById('ar_btn_2')){
document.getElementById('ar_btn_2').id = "ar_btn__";
}
document.getElementById("block-2-title").innerHTML = "Symbol";
document.getElementById("block-2-title2").innerHTML = "Symbol English";
}
function tofr_btn2(){
if(document.getElementById('fr_btn__')){
document.getElementById('fr_btn__').id = "fr_btn_2";
}
if(document.getElementById('eng_btn_2')){
document.getElementById('eng_btn_2').id = "eng_btn__";
}
if(document.getElementById('ar_btn_2')){
document.getElementById('ar_btn_2').id = "ar_btn__";
}
document.getElementById("block-2-title").innerHTML = "Symbole";
document.getElementById("block-2-title2").innerHTML = "Symbole Français";
}
function toar_btn2(){
if(document.getElementById('ar_btn__')){
document.getElementById('ar_btn__').id = "ar_btn_2";
}
if(document.getElementById('fr_btn_2')){
document.getElementById('fr_btn_2').id = "fr_btn__";
}
if(document.getElementById('eng_btn_2')){
document.getElementById('eng_btn_2').id = "eng_btn__";
}
document.getElementById("block-2-title").innerHTML = "رمز";
document.getElementById("block-2-title2").innerHTML = "رمز عربي";
}

function toen_btn3(){
if(document.getElementById('eng_btn___')){
document.getElementById('eng_btn___').id = "eng_btn_3";
}
if(document.getElementById('fr_btn_3')){
document.getElementById('fr_btn_3').id = "fr_btn___";
}
if(document.getElementById('ar_btn_3')){
document.getElementById('ar_btn_3').id = "ar_btn___";
}
document.getElementById("block-3-title").innerHTML = "Description";
document.getElementById("block-3-title2").innerHTML = "Symbol English";
}
function tofr_btn3(){
if(document.getElementById('fr_btn___')){
document.getElementById('fr_btn___').id = "fr_btn_3";
}
if(document.getElementById('eng_btn_3')){
document.getElementById('eng_btn_3').id = "eng_btn___";
}
if(document.getElementById('ar_btn_3')){
document.getElementById('ar_btn_3').id = "ar_btn___";
}

document.getElementById("block-3-title").innerHTML = "La Description";
document.getElementById("block-3-title2").innerHTML = "La Description Français";
}
function toar_btn3(){
if(document.getElementById('ar_btn___')){
document.getElementById('ar_btn___').id = "ar_btn_3";
}
if(document.getElementById('fr_btn_3')){
document.getElementById('fr_btn_3').id = "fr_btn___";
}
if(document.getElementById('eng_btn_3')){
document.getElementById('eng_btn_3').id = "eng_btn___";
}
document.getElementById("block-3-title").innerHTML = "وصف";
document.getElementById("block-3-title2").innerHTML = "وصف عربي";
}
</script>
    <div class="container wrapper">
      <div class="fillout container">
        <h3 class="mb-3" >Modify intelligence Type</h3>


        <!---BLOCK 1--->
        <div class="box ">
            <h4 id="block-1-title">Title</h4>
            <div>
              <button id="eng_btn_" onclick="toen_btn1()" class="">English</button>
              <button id="fr_btn_1" onclick="tofr_btn1()" class="">French</button>
              <button id="ar_btn_" onclick="toar_btn1()" class="">Arabic</button>
            </div>
          </div>
          <div class="box mt-1 box-question">
            <b id="block-1-title2" style="margin-left: 40px;">Title English</b>
	<form method="POST" action="modify_Intelligence.php">
<input name="tag" value="<?php echo $q;?>" hidden style="width:0px;height:0px;margin:0px;padding:0px;">
   <div>
              <input type="text" name="type" placeholder="" value="<?php echo $type; ?>" style="border: none;width: 90%;margin-right: 300px;" required/>
            </div>
          </div>

<div class="box mt-4">
    <h4 id="block-2-title">Symbol</h4>
    <div>
      <button id="eng_btn__" onclick="toen_btn2()" class="">English</button>
      <button id="fr_btn_2" onclick="tofr_btn2()" class="">French</button>
      <button id="ar_btn__" onclick="toar_btn2()" class="">Arabic</button>
    </div>
  </div>
  <div class="box mt-1 box-question">
    <b id="block-2-title2" style="margin-left: 40px;">Symbol English</b>

    <div>
        <input name="symb" required type="text"  value="<?php echo $symbol; ?>"  style="border: none;width: 90%;margin-right: 300px;" />
    </div>
  </div>

<div class="box mt-4" >
    <h4 id="block-3-title">Desctiprion</h4>
    <div>
      <button id="eng_btn___" onclick="toen_btn3()" class="">English</button>
      <button id="fr_btn_3" onclick="tofr_btn3()" class="">French</button>
      <button id="ar_btn___" onclick="toar_btn3()" class="">Arabic</button>
    </div>
  </div>
  <div class="box mt-1 box-question" style="height: 140px;">
    <b id="block-3-title2" style="margin-left: 20px;">Desctiprion English</b>
    <div >
        <textarea name="desc" required  style="border: none;width: 90%;margin-right: 300px;height: 80px;padding-bottom: 60px;"><?php echo $desc;?></textarea>

    </div>

  </div>
      </div>

      <div class="d-grid">
        <div class="action-box my-1" style="width: 340px;border-radius: 20px;height: 230px;">
            <b style="margin-right: 250px;" >Action</b>
            <button  class="btn btn-success" style="width:100%;" >Update</button></form>
            <a href="add_Intelligence.php" style="color:white;text-decoration:none;"><button  class="btn btn-secondary" style="width: 100%;">Add new intelligence type</button></a>
            <a href="intelligence_Table.php" style="color:white;text-decoration:none;"><button  class="btn btn-primary"   style="width: 100%;">back</button></a>
          </div>
        <div style="height: 40px;margin-bottom: 220px;" class="message">
          <b id="result" class="mb-5 mx-5" ></b>

<?php
// checking if type,symb,desc,tag POST parameters are set
if(isset($_POST['type']) && isset($_POST['symb']) && isset($_POST['desc']) && isset($_POST['tag']) ){
include_once "additional/config.php";
// storing them in variables
$new_type=mysqli_real_escape_string($conn,$_POST['type']);
$new_symb=mysqli_real_escape_string($conn,$_POST['symb']);
$new_desc=mysqli_real_escape_string($conn,$_POST['desc']);
$tag=mysqli_real_escape_string($conn,$_POST['tag']);
// sql query to Update the record
$sql2=mysqli_query($conn, "UPDATE int_types SET type='$new_type',symbole='$new_symb',descr='$new_desc' WHERE symbole='$tag'");
echo '<script>document.getElementById("result").innerHTML="Message action accompile";</script>';
}
?>


        </div>
      </div>
    </div>
    <?php include "additional/footer.html";?>
<script>
</script>
  </body>
</html>
