<?php error_reporting(E_ERROR | E_PARSE);



include_once 'additional/config.php';
if(!isset($_SESSION['isLoggedin'])){header('location: login.php');}

// checking if title,symbole,desc POST parameters are set

if(isset($_POST['title']) && $_POST['symbole'] && $_POST['desc'] ){
include 'additional/config.php';
// 
$title=mysqli_real_escape_string($conn,$_POST['title']);
$symbole=mysqli_real_escape_string($conn,$_POST['symbole']);
$desc=mysqli_real_escape_string($conn,$_POST['desc']);
$sql = mysqli_query($conn, "INSERT into int_types VALUES('$title','$symbole','$desc')");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
<link rel="shortcut icon" href="assets/media/favicon.png"/>  
  <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add intelligence</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css" />
  </head>
<!-------SOME STYLING -------->
  <style>
      textarea {
  resize: none;
  overflow: hidden;
  border: none;
  border-radius: 3px;

}

    
  

    .fillout {
      background-color: rgb(255, 255, 255);
      border-radius: 20px;
      padding: 10px;
      padding-bottom:50px ;
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
      margin: 50px;
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

    .message {display: flex;background-color: #fff;border-radius: 20px;text-align: center;padding: 45px 25px; }

    .box-question input {
      border: 1px solid black;
      border-radius: 5px;
      margin-left: 10px;
      width: 360px;
      padding: 5px 5px;
    }

    .fillout button{
      opacity: 0.3;
      border: none;
      background-color: rgba(255, 255, 255, 0.0);
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
<!-- <img  style="margin-top:20px;margin-left:40px" src="https://mehnati.org/assets/img/logo.png" width="120px;"> -->
	
<?php include "additional/admin-header.html";?>



<style>
body {
      background-color: rgb(241, 241, 241);
    }

</style>
    <div class="container wrapper" >
      <div class="fillout container">
        <h3 class="m-3" >Add new intelligence Type</h3>


        <!---BLOCK 1--->
        <div class="box mt-4">
            <h4 id="block-1-title">Title</h4>
            <div>
              <button id="eng_btn_" onclick="toen_btn1()" class="">English</button>
              <button id="fr_btn_1" onclick="tofr_btn1()" class="">French</button>
              <button id="ar_btn_" onclick="toar_btn1()" class="">Arabic</button>
            </div>
          </div>
          <div class="box mt-1 box-question">
            <b id="block-1-title2" style="margin-left: 40px;">Title English</b>

<form method="POST" action="add_Intelligence.php">            <div>
              <input type="text"  placeholder="Title English" style="border: none;width: 90%;margin-right: 300px;" name="title" required/>
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
       <input type="text"  placeholder="Symbole English" style="border: none;width: 90%;margin-right: 300px;" name="symbole" required/>
    </div>
  </div>

<div class="box mt-4">
    <h4 id="block-3-title">Description</h4>
    <div>
      <button id="eng_btn___" onclick="toen_btn3()" class="">English</button>
      <button id="fr_btn_3" onclick="tofr_btn3()" class="">French</button>
      <button id="ar_btn___" onclick="toar_btn3()" class="">Arabic</button>
    </div>
  </div>
  <div class="box mt-1 box-question" style="height:120px;">
    <b id="block-3-title2" style="margin-left: 40px;" class="mt-3">Description English</b>

    <div>
      <input type="text"  placeholder="Description English" style="border: none;width: 90%;margin-right: 300px;height:60px;" name="desc" required/>
    </div>
  </div>




      </div>

      <div class="d-grid">
        <div class="action-box my-1" style="width: 340px;border-radius: 20px;height: 180px;">
            <b style="margin-right: 250px;" >Action</b>
            <button  name="btn" class="btn btn-success" style="width: 100%;">ADD Entry</button></form>


            <a href="intelligence_Table.php" style="color:white;text-decoration:none"><button  class="btn btn-primary" style="width: 100%;">back to previous page</button></a>
          </div>
        <div style="height: 40px;margin-bottom: 180px;" class="message">
          <b class="mb-5 mx-5" >&nbsp;</b>
        </div>
      </div>
    </div>
    <script>

    var eng_btn_1 = document.getElementById("eng_btn_");
    var fr_btn_1 =document.getElementById("fr_btn_");
    var ar_btn_1 =document.getElementById("ar_btn_");
// JAVASCRIPT FUNCTIONS FOR TRANSLATION	
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
// JAVASCRIPT FUNCTIONS FOR TRANSLATION 

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
}</script>

<?php include "additional/footer.html";?>

  </body>
</html>
