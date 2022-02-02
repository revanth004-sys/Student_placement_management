<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="login.css">
  <title>Student Sign-in Form</title>
</head>
<body>
  <div class="login-wrapper">
    <form method = post class="form">
      <img src="img/avatar.png" alt="">
  
      <h2>Student Sign-in</h2>

      <div class="input-group">
        <input type="text" name="sn" id="loginUser" required>
        <label for="sn">Name</label>
      </div>

      <div class="input-group">
        <input type="number" name="sid" id="loginUser" required>
        <label for="sid">Clg Id</label>
      </div>

      <div class="input-group">
        <input type="text" name="sb" id="loginUser" required>
        <label for="sb">Branch</label>
      </div>


      <div class="input-group">
        <input type="text" name="sc" id="loginUser" required>
        <label for="sc">Section</label>
      </div>

      <div class="input-group">
        <input type="number" name="cgpa" id="loginUser" required>
        <label for="cgpa">CGPA (present)</label>
      </div>

      

      <div class="input-group">
        <input type="password" name="sp" id="loginPassword" required>
        <label for="sp">Password</label>
      </div>

      <div class="input-group">
        <input type="password" name="scp" id="loginPassword" required>
        <label for="scp">Confirm Password</label>
      </div>

      <div class="input-group">
        <input type="text" name="will" id="loginUser" required>
        <label for="will">Willing for placements(y/n)?</label>
      </div>

      <input type="submit" name="submit" value="Sign-in" class="submit-btn">
    </form>
  </div>
</body>
</html> 

<?php
if(isset($_POST["submit"])){
$sn = $_POST['sn'];
$sid = $_POST['sid'];
$sb = $_POST['sb'];
$sc = $_POST['sc'];
$cgpa = $_POST['cgpa'];
$sp = $_POST['sp'];
$scp = $_POST['scp'];
$will = $_POST['will'];
$conn = mysqli_connect("localhost","root","","placements");
if($sp == $scp){
$sql = "insert into student(id,name,branch,section,cgpa,password,confirm_password,w_f_p) VALUES('$sid', '$sn', '$sb', '$sc', '$cgpa', '$sp', '$scp', '$will')";
}
$result = mysqli_query($conn,$sql);
    if($result){
        echo 'successfully updated';
        header('location:std_login.php');
    }
}

?>