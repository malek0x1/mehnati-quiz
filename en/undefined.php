<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inconsistent Answers</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css" />
</head>
<body>
    <?php 
    
   include 'additional/config.php';
    include 'additional/admin-header.html';
?>
<div class="container">
<h1>intelligence Test , </h1>
<div class="alert alert-danger" role="alert">
<b>Dear student, it seems that you did not answer the questions consistently, so your result will not be accurate. We invite you to try again!
</b>

</div>
<button class="btn btn-dark" onclick="location='test.php';">return To test</button>

</div>
<?php 
include 'additional/footer.html';
?>
</body>
</html>
