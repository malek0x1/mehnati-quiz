<?php 
error_reporting(E_ERROR | E_PARSE);

include_once 'additional/config.php';
session_start();
// if user didnt signup yet redirect the user to /form.php 
if(!isset($_SESSION['fullname']) ){

//redirect to /form.php
header('location: form.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
<link rel="shortcut icon" href="assets/media/favicon.png"/>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Intelligence Test</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/r.css" />
    <link rel="stylesheet" href="assets/css/s.css">
<script>
document.getElementsByClassName('x').required; // making checkboxes required
</script>
    <style>
      .tab{display:none;}

      .turn-page button{
        border: none;
        background-color: rgba(0, 0, 0, 0);
        opacity: 0.6;
        transition: .3s;
      }

      .turn-page button:hover{
        opacity: 1;
        transition: .3s;
      }

      .turn-page button img{
        width: 70px;
        height: 50px;
      }

      .tab {
        display: none;
      }
      * {
        box-sizing: border-box;
      }

      body {
        margin: 0%;
        padding: 0%;
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      }
      .questions {
        width: 75%;
      }

      .box {
        padding: 15px;
        font-size: 25px;
        margin-left: 50%;
        text-align: center;
      }

      hr {
        border: black 1px solid;
      }

      input[type="radio"] {
        vertical-align: top;
        border: 2px solid #ddd;
        border-radius: 100px;
        width: 40px;
        height: 40px;
        text-align: center;
        accent-color: black;
      }

      .child {
        padding-left: 15px;
      }

      .child p {
        padding-top: 5px;
        text-align: left;
      }
    </style>
  </head>
  <body>
<p id="ppp"></p>


<!----------------------------------------->

<?php include 'additional/header.html';?>
 

<!----------------------------------------->




  <center>
    <div class="turn-page">
      <p id="me"></p>
        <button class="" type="button" id="prev" onclick="next(-1)" ><img src="assets/media/arrow-left.png" alt="">Precedent</button>
        <button class="" type="button" id="nextBtn" onclick="next(1)" >Suivant<img src="assets/media/arrow-right.png"></button>
    </div>
  </center>

    <div class="questions container-fluid">
      <form action="" id="regForm">
      <div class="tab">

      <?php 
      include 'additional/config.php';

	// sql query
      $sql = mysqli_query($conn, "SELECT * from questions;");
      $c=1; //records counter
      $counter2=1;

	//executing the query
      while($row = mysqli_fetch_assoc($sql)){

      $out='
      <hr>
      <h5>' . $row['question'] . '</h5>
      <div class="box d-flex">
        <div class="child">
          <input class="x inputx"  value="' . $row['symbole'] .'" type="radio" required name="option-question-' . $counter2 . '" id="" />
          <p>yes</p>
        </div>
        <div class="child">
        <input class="inputx" value="no" type="radio" required name="option-question-' . $counter2 . '" id="" />
        <p>No</p>
        </div>
      </div>
      ';

      echo $out;
      $counter2++;

      $c++;

	// if the question counter is less bigger than 10 then set it's values to 1 and close the previous div and open new one below it for the next 10 question that are in the next page
      if($c> 10){

	//closing the previous div
      echo '</div>'; 
      $c=1;

	// opening the new div
      echo '<div class="tab">';
      }}
      ?>
        </div>
      </form>
    </div>

  <center>
    <div class="turn-page">
      <p id="me2"></p>
        <button class="" type="button" id="prev2" onclick="next(-1)" ><img src="assets/media/arrow-left.png" alt="">Precedent</button>
        <button class="" type="button" id="nextBtn" onclick="next(1)" >Suivant<img src="assets/media/arrow-right.png"></button>
    </div>
  </center>

<!--------JS CODE---->
<script>
// defining 3 variables to null values;
let val1=null;
let val2=null;
let val3=null;

// empty array
uniqueCount=[];
var currentTab = 0; 
show(currentTab); 
function show(n) {
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  if (n == 0) {

	// if we are in the first page hide the privous button 
    document.getElementById("prev").style.display = "none";
    document.getElementById("prev2").style.display = "none";

  }




  else {
document.getElementById('ppp').scrollIntoView();

// page count
document.getElementById("me").innerHTML ="Page " + currentTab + "/" + parseInt(x.length - 1);
document.getElementById("me2").innerHTML ="Page " + currentTab + "/" + parseInt(x.length - 1);

	// if we are not on the first page then show me the privous button
    document.getElementById("prev").style.display = "inline";
    document.getElementById("prev2").style.display = "inline";

  }
}
c=0;
function next(n) {
  var x = document.getElementsByClassName("tab");

	//hide current tab
  x[currentTab].style.display = "none";
	// current tab + n = the next tab
  currentTab = currentTab + n;

  // if the user finished all pages
  if (currentTab >= x.length) {

    var ele = document.getElementsByClassName('inputx');

	// for loop through all radio buttos
  for (let index = 0; index < ele.length; index++) {
	if(ele[index].checked===true){
	c+=1;
    if(ele[index].value!="no"){
//      c+=1; //overall score
	
// append to our array the values of the radio button if user choosed oui/yes
      uniqueCount.push(ele[index].value);
    }

	}
}

// getting how much radio buttons for further validation
let all_len= parseInt(document.getElementsByClassName('inputx').length);

// if the user finished all the test 
if(c===(all_len/2)){ 
//alert(c);
var count = {};

// gettig how much each Intelligence type got repeated
uniqueCount.forEach(function(i) { count[i] = (count[i]||0) + 1;});

// sort the object and get the three highest values "3 heighst Intelligence types which we append them to the array previously"
const top3 = Object
  .entries(count)
  .sort(([, a],[, b]) => b-a) 
  .slice(0,3) 
  .map(([n])=> n); 


// putting the hieghest 3 Intelligence types in variables
val1=top3[0];
val2=top3[1];
val3=top3[2];



if(val1 == undefined || val2 == undefined || val3 == undefined){
//alert("undefined VALUES DETECTED");
location.href = 'undefined.php';
return;
}







// concatinating the 3 highest Intelligence types with '|' delimeter for later use
let last=val1+"|" + val2+"|"+val3 ; 

// sending the "last" variable value to result.php in result GET parameter 

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
                location.href='result.php';
       }
    };
xhttp.open("GET", "result.php?result="+last, true);
xhttp.withCredentials = true;
    xhttp.send();










}

//if user didnt complete the test and want to submit it will show alert and repeat the exam by reloading the page
else{
//alert('complete the questions');
//if(c===(all_len/2)){alert("TEST DONE");}
c=0;
currentTab = 0;


show(currentTab);
alert('complete the questions');
//console.log(c);

//console.log("all_len/2 :",all_len/2)
		//location.reload();

}

}

  show(currentTab);
}
</script>


<!--------JS CODE---->

<!---FOOTER---->
<?php include 'additional/footer.html';?>

<!---FOOTER-------->
  </body>
</html>
