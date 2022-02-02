<?php
session_start();

$conn = mysqli_connect('localhost','root','','placements');
$s = 'SELECT * FROM student';
$r = mysqli_query($conn,$s);
$c = 0;
if(mysqli_num_rows($r)>0){

    while($row = mysqli_fetch_assoc($r)){
       if($row["id"] == $_SESSION['sess_id']){
           if($row["w_f_p"]=='y'){
                 echo ' <script> alert( " you are successfully registered for placements.., UPDATES will be soon " ) </script> ';
           }
           else{
            echo ' <script> alert( " you are not allowed for placements " ) </script> '; 
           }
       }
        
    }
}

?>