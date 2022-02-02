<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="login.css">
  <title>Student Login Form</title>
</head>
<body>
  <div class="login-wrapper">
    <form method = post class="form">
      <img src="img/avatar.png" alt="">
      <h2>Student Login</h2>
      <div class="input-group">
        <input type="text" name="sid" id="loginUser" required>
        <label for="sid">User Id</label>
      </div>
      <div class="input-group">
        <input type="password" name="sp" id="loginPassword" required>
        <label for="sp">Password</label>
      </div>
      <input type="submit" name="submit" value="Login" class="submit-btn">
      <a href="std_forget.php" class="forgot-pw">Forgot Password?</a><br><br>
      <a href="std_signin.php" class="forgot-pw">New User..?</a>
    </form>

  </div>
</body>
</html> 

<?php
session_start();
if(isset($_POST["submit"])){
$sid = $_POST['sid'];
$sp = $_POST['sp'];
$_SESSION['sess_id']= "$sid";
$conn = mysqli_connect('localhost','root','','placements');
$s = 'SELECT * FROM student';
$r = mysqli_query($conn,$s);
$c = 0;
if(mysqli_num_rows($r)>0){

    while($row = mysqli_fetch_assoc($r)){
       if($row["id"]==$sid){
           if($row["password"]==$sp){
                   $c = $c+1;
           }
       }
        
    }
}
if($c>0){
   // $sql = "insert into details(username,password) VALUES('$u1','$p1')";
   // $result = mysqli_query($conn,$sql);
   header('Location: std_status.php');
   
}
else{
    trigger_error("you are not an user");
}
}
?>