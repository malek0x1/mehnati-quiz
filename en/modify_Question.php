<?php error_reporting(E_ERROR | E_PARSE);include_once 'additional/config.php';

if(!isset($_SESSION['isLoggedin'])){header('location: login.php');}

?>

<?php
$q='';
// checking if "s" GET parameter is set
if(isset($_GET['s'])){
include 'additional/config.php';
// doing filtering for the supplied input before storing in variable
$q=mysqli_real_escape_string($conn,$_GET['s']);
// sql query
$sql = mysqli_query($conn, "SELECT * from questions where id='$q';");
$row = mysqli_fetch_assoc($sql);
if($sql){
$symbol=$row['symbole'];
$question=$row['question'];
}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
<link rel="shortcut icon" href="assets/media/favicon.png"/>  
  <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Modify a Question</title>
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

// JAVASCRIPT FUNCTIONS FOR TRANSLATION
      function toen_btn1(){
document.getElementById("yes").innerHTML = "yes";
        document.getElementById('eng_btn_').id = "eng_btn_1";
        if(document.getElementById('fr_btn_1')){
        document.getElementById('fr_btn_1').id = "fr_btn_";
        }
        if(document.getElementById('ar_btn_1')){
        document.getElementById('ar_btn_1').id = "ar_btn_";
        }

        document.getElementById("block-1-title").innerHTML = "Question English";
        
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
        document.getElementById("block-1-title").innerHTML = "Question Français";
        
        };
        function toar_btn1(){
document.getElementById("yes").innerHTML = "نعم";

        document.getElementById('ar_btn_').id = "ar_btn_1";
        if(document.getElementById('eng_btn_1')){
        document.getElementById('eng_btn_1').id = "eng_btn_";
        }
        else if(document.getElementById('fr_btn_1')){
        document.getElementById('fr_btn_1').id = "fr_btn_";
        }
        document.getElementById("block-1-title").innerHTML = "سؤال عربي";
        
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
        <h3 class="mb-2" >Modify a Question</h3>
        <div class="box">
          <h4>&nbsp;</h4>
          <div>
            <button id="eng_btn_" onclick="toen_btn1()" class="">English</button>
            <button id="fr_btn_1" onclick="tofr_btn1()" class="">French</button>
            <button id="ar_btn_" onclick="toar_btn1()" class="">Arabic</button>
          </div>
        </div>
        <div class="box mt-2 box-question">
          <h4 id="block-1-title" style="margin-left: 80px;" >Question English</h4>
          <div>
              <form action="modify_Question.php" method="POST">
              <input name="old" value="<?php echo $q;?>" hidden style="width:0px;height:0px;margin:0px;padding:0px;">
              <input name="question" type="text"  value="<?php echo $question; ?>" placeholder="" style="border: none;width: 410px;;" />
          </div>
        </div>
        <div style="height: 140px;background-color: white;" class="box box-question mt-3">
          <h4 style="margin-left: 200px;" id="yes">Yes</h4>
          <div>
              <select name="choose" style="border: none;width: 410px;border: 5px solid #eee;" class="form-select end" aria-label="Default select example">
              <option selected>Pick One</option>
              <?php
              include 'additional/config.php';
	      // SQL query
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
        <div class="action-box my-1" style="width: 340px;border-radius: 20px;height: 220px;">
            <b style="margin-right: 250px;" >Action</b>
            <a href="#" style="color:white;text-decoration:none"><button  class="btn btn-success" style="width: 100%;">Update Question</button></a></form>
            <a href="modify_Intelligence.php" style="color:white;text-decoration:none"><button  class="btn btn-secondary" style="width: 100%;">Add new Intelligence</button></a>
            <button  onclick="location.href='question_Table.php'" class="btn btn-primary" style="width: 100%;">back</button>
        </div>
        <div style="height: 40px;" class="message">
          <b  id="result" class="mb-5 mx-5" ></b>
<?php
// checking if choose,question,old POST parameters are set
if(isset($_POST['choose']) && isset($_POST['question']) && isset($_POST['old'])){
include 'additional/config.php';
// doing filtering for the supplied input before storing in variable
$new_question=mysqli_real_escape_string($conn,$_POST['question']);
$new_symbole=mysqli_real_escape_string($conn,$_POST['choose']);
$old_symbole=mysqli_real_escape_string($conn,$_POST['old']);
if($new_symbole==='Pick One'){echo '<script>document.getElementById("result").innerHTML="Choose Symbole";</script>' ; } // alert if user didnt choose a symbole
else{
// update the record
$sql3=mysqli_query($conn, "UPDATE questions SET question='$new_question',symbole='$new_symbole' WHERE id='$old_symbole';");
echo '<script>document.getElementById("result").innerHTML="Message action accompile";</script>';
}}?>
        </div>
      </div>
    </div>
    <?php include 'additional/footer.html';?>
<script>

</script>
  </body>
</html>
