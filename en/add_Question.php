	<?php error_reporting(E_ERROR | E_PARSE);include_once 'additional/config.php';

if(!isset($_SESSION['isLoggedin'])){header('location: login.php');}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
<link rel="shortcut icon" href="assets/media/favicon.png"/>  
  <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add new Question</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css" />
  <style>
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


    .fillout button{
      border: none;
      background-color: rgba(255, 255, 255,0);
      opacity: 0.3;
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
  <script>

      function toen_btn1(){
document.getElementById("yes").innerHTML = "yes";
        document.getElementById('eng_btn_').id = "eng_btn_1";
        if(document.getElementById('fr_btn_1')){
        document.getElementById('fr_btn_1').id = "fr_btn_";
        }
        if(document.getElementById('ar_btn_1')){
        document.getElementById('ar_btn_1').id = "ar_btn_";
        }

        document.getElementById("block-1-title").innerHTML = "Question";
        document.getElementById("block-1-title2").innerHTML = "Question English";
        };
        function tofr_btn1(){
document.getElementById("yes").innerHTML = "oui";
        document.getElementById('fr_btn_').id = "fr_btn_1";
        if(document.getElementById('eng_btn_1')){
        document.getElementById('eng_btn_1').id = "eng_btn_";
        }
        if(document.getElementById('ar_btn_1')){
        document.getElementById('ar_btn_1').id = "ar_btn_";
        }
        document.getElementById("block-1-title").innerHTML = "Question";
        document.getElementById("block-1-title2").innerHTML = "Question Français";
        };
        function toar_btn1(){
document.getElementById("yes").innerHTML = "نعم";
          console.log("hello");
        document.getElementById('ar_btn_').id = "ar_btn_1";
        if(document.getElementById('eng_btn_1')){
        document.getElementById('eng_btn_1').id = "eng_btn_";
        }
        else if(document.getElementById('fr_btn_1')){
        document.getElementById('fr_btn_1').id = "fr_btn_";
        }
        document.getElementById("block-1-title").innerHTML = "سؤال";
        document.getElementById("block-1-title2").innerHTML = "سؤال عربي";
        }
    </script>
    </head>
  <body>
<?php include 'additional/admin-header.html';?>
  

  <style>
body {
      background-color: rgb(241, 241, 241);
    }


</style>
    <div class="container wrapper">
      <div class="fillout container">
        <h3 class="mb-3" >Add new question</h3>
        <div class="box">
          <h4 id="block-1-title">Question</h4>
          <div>
            <button id="eng_btn_" onclick="toen_btn1()" class="">English</button>
            <button id="fr_btn_1" onclick="tofr_btn1()" class="">French</button>
            <button id="ar_btn_" onclick="toar_btn1()" class="">Arabic</button>
          </div>
        </div>
        <div class="box mt-2 box-question">
          <h4 id="block-1-title2" style="margin-left: 100px;" >Question English</h4>
          <div>
<form method="POST" action="add_Question.php">
            <input required type="text"  name="question" placeholder="write question" style="border: none;width: 410px;;" />
          </div>
        </div>
    
<div style="height: 140px;background-color: white;" class="box box-question mt-3">
    <h4 style="margin-left: 200px;" id="yes" >yes</h4>
    <div>
        <select  name="choose" style="border: none;width: 410px;border: 5px solid #eee;" class="form-select end" aria-label="Default select example" required>

            <option>Pick one</option>
<?php
include 'additional/config.php';
// sql query
$sql = mysqli_query($conn, "SELECT * from int_types;");
while($row = mysqli_fetch_assoc($sql)){
echo       '<option   value="' . $row['symbole'] . '"> ' . $row['symbole'] . '</option>';
}
?>
          </select>
</div>
  </div>
      </div>
      
      <div class="d-grid">
        <div class="action-box my-1" style="width: 340px;border-radius: 20px;height: 210px;">
            <b style="margin-right: 250px;" >Action</b>
            <a href="#" style="color:white;text-decoration:none"><button name="sbtn" class="btn btn-success" style="width: 100%;">Submit</button></a></form>
            <a href="question_Table.php" style="color:white;text-decoration:none"><button  class="btn btn-primary" style="width: 100%;">back</button></a>
          </div>
        <div style="height: 40px;" class="message">
          <b class="mb-5 mx-5" id="result"></b>


<?php
// checking if choose,question,sbtn POST parametrs are set
if(isset($_POST['choose']) && isset($_POST['question']) && isset($_POST['sbtn']) ){

include 'additional/config.php';

// doing filtering for the user supplied input before storing in variable
$symbole=mysqli_real_escape_string($conn,$_POST['choose']);
$question=mysqli_real_escape_string($conn,$_POST['question']);
// if user didnt choose symbole it will alert
if($symbole==='Pick one'){echo '<script>alert("choose Symbole");</script>' ; }
else{
// inserting the values into table
$sql = mysqli_query($conn, "INSERT into questions (question,symbole) VALUES('$question','$symbole')");}
echo '<script>document.getElementById("result").innerHTML="action Complete";</script>';

}
?>




        </div>
      </div>
    </div>
    <?php include 'additional/footer.html';?>
<script>

</script>
  </body>
</html>

