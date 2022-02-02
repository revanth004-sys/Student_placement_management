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
  
      <h2>Password change</h2>

      <div class="input-group">
        <input type="number" name="sid" id="loginUser" required>
        <label for="sid">Clg Id</label>
      </div>

      <div class="input-group">
        <input type="number" name="cgpa" id="loginUser" required>
        <label for="cgpa">CGPA (present)</label>
      </div>

      

      <div class="input-group">
        <input type="password" name="sp" id="loginPassword" required>
        <label for="sp">New Password</label>
      </div>

      <div class="input-group">
        <input type="password" name="scp" id="loginPassword" required>
        <label for="scp">Confirm Password</label>
      </div>

      <input type="submit" name="submit" value="Change" class="submit-btn">
    </form>
  </div>
</body>
</html> 

<?php
if(isset($_POST["submit"])){

$sid = $_POST['sid'];
$cgpa = $_POST['cgpa'];
$sp = $_POST['sp'];
$scp = $_POST['scp'];

$conn = mysqli_connect("localhost","root","","placements");

$s = 'SELECT * FROM student';
$r = mysqli_query($conn,$s);
$c = 0;
if(mysqli_num_rows($r)>0){

    while($row = mysqli_fetch_assoc($r)){
       if($row["id"]==$sid){
           if($row["cgpa"]==$cgpa){
                   $c = $c+1;
           }
       }
        
    }
}


if($c > 0){
    if($sp == $scp){
        $sql = "update student set password='$sp' , confirm_password='$scp' where id='$sid' ";
    }
}
$result = mysqli_query($conn,$sql);
    if($result){
        echo 'successfully updated';
        header('location:std_login.php');
    }
}

?>