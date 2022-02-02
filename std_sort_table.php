<?php
$br = $_GET['br'];
$sec = $_GET['sec'];
$conn = mysqli_connect('localhost','root','','placements');
$s = "SELECT * FROM student where branch = '$br' and section ='$sec' ";
$r = mysqli_query($conn,$s);
?>
<html>
    <head>
    <style>
    *{
        margin: 0;
        padding:0;
    }
    body{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    table{
        width: 50%;
        background: #262626;
        color: white;

    }
    table, th, td{
        border: 2px solid crimson;
        border-collapse : collapse;
    }
    th, td{
        padding : 3px 0;
        text-align:center;
    }
    table caption{
        font-size: 2rem;
        color: black;
    }
    table tr td a#g{
        text-decoration:none;
        color: green;
    }
    table tr td a#r{
        text-decoration:none;
        color: red;
    }
    table tr td a:hover{
        border-bottom: 1px solid white;
    }
    </style>
    </head>
    <body>
    
<?php
if(mysqli_num_rows($r)>0){
     
    echo "<table><caption>STUDENTS</caption><tr><th>NAME</th><th>ID</th><th>CGPA</th><th>willing</th></tr>";

    while($row = mysqli_fetch_assoc($r)){
        echo "<tr><td>".$row["name"]."</td><td>".$row["id"]."</td><td>".$row["cgpa"]."</td><td>".$row["w_f_p"]."</td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>
</body>
</html>