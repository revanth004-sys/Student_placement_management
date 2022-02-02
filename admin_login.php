<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="login.css">
  <title>Admin Login Form</title>
</head>
<body>
  <div class="login-wrapper">
    <form method = post class="form">
      <img src="img/avatar.png" alt="">
      <h2>Admin Login</h2>
      <div class="input-group">
        <input type="text" name="au" id="loginUser" required>
        <label for="au">User Name</label>
      </div>
      <div class="input-group">
        <input type="password" name="ap" id="loginPassword" required>
        <label for="ap">Password</label>
      </div>
      <input type="submit" name="submit" value="Login" class="submit-btn">
    </form>

  </div>
</body>
</html> 

<?php
session_start();
if(isset($_POST["submit"])){
$au = $_POST['au'];
$ap = $_POST['ap'];
$_SESSION['admin_user']=$au;
$conn = mysqli_connect('localhost','root','','placements');
$s = 'SELECT * FROM admin';
$r = mysqli_query($conn,$s);
$c = 0;
if(mysqli_num_rows($r)>0){

    while($row = mysqli_fetch_assoc($r)){
       if($row["user"]==$au){
           if($row["password"]==$ap){
                   $c = $c+1;
           }
       }
        
    }
}
if($c>0){
   // $sql = "insert into details(username,password) VALUES('$u1','$p1')";
   // $result = mysqli_query($conn,$sql);
   header('Location:find_dept.html');
   
}
else{
    alert('you are not an admin');
}
}
?>