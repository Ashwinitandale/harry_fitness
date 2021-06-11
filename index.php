<?php
$insert= false;
if(isset($_POST['name'])){
// set connection variables
$server="localhost";
$username="root";
$password="";

// create a database connection
$con = mysqli_connect($server, $username, $password);


// check for connection success
if(!$con){
    die("connection to this database failed due to" .mysqli_connect_error());

}
// echo "Success connecting to the db";

// collect post variahles
 $name = $_POST['name'];
 $age = $_POST['age'];
 $gender = $_POST['gender'];


 $sql="INSERT INTO `gym`.`gym`( `name`,`age`, `gender` ,  `dt`) VALUES 
('$name','$age', '$gender',  current_timestamp())";
// echo $sql;

// exexcute the quary
if($con->query($sql) == true){
    // echo "successfuly inserted";

    // flag for succesful insertion
    $insert=true;
}
else{
    echo "Error: $sql <br> $con->error";
}
// close the database connection
$con->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Harry fitness</title>
</head>
<link rel="stylesheet" href="https://fonts.google.com/specimen/Heebo">
<link rel="stylesheet" href="css/style.css">
<style>
    body {
        margin: 0px;
        padding: 0px;
        background: url('gym.jpg');
        /* height: 4544px; */
        color: white;

    }

    .left {

        display: inline-block;
        /* border: 2px solid red; */
        position: absolute;
        left: 60px;
        top: 20px;
        font-size: 25px;

    }
    .left img{
        width: 23px;
        filter: invert();
        width: 136px;
    }
    .left div{
        line-height: 19px;
        font-size: 26px;
        text-align: center;
    }

    .mid {
        display: block;
        width: 43%;
        /* border: 2px solid green; */
        margin: 20px auto;
    }

    .right {
        position: absolute;
        right: 34px;
        top: 20px;
        display: inline-block;
        /* border: 2px solid yellow; */
        /* border: 2px solid green; */

    }
.submitMsg{
    color: green;
padding:16px 111px;
}
    .navbar {
        display: inline-block;
    }

    .navbar li {

        display: inline-block;
        font-size: 18px;
    }

    .navbar li a {
        color: white;
        text-decoration: none;
        padding: 34px 23px;
    }
    .navbar li a:hover, .navbar li a.active {
        text-decoration: underline;
        color: gray;
    }
    .btn{
        font-family: 'Ballu bai',cursive;
        margin: 0px 9px;
        color: white;
        background-color: black;
        padding: 4px 14px;
        border: 2px solid gray;
        border-radius: 5px;
        font-size: 20px;
        cursor: pointer;

    }
    .btn:hover{
        background-color: gray;
        color: darkolivegreen;
        
    }
    .container{
        /* border: 2px solid white; */
        margin: 107px 80px;
        padding: 75px;
        width:39%;
        border-radius: 17px;
    }
    .form-group input{
        font-family:'Ballu bai',cursive;
        border-radius: 7px;
        text-align: center;
        display: block;
        width: 500px;
        border:2px solid black;
        margin: 11px auto;
        padding: 1px;
        font-size: 27px;


    }
    .container h1{
        text-align: center;
    }
    .container button{
        display: block;
        width: 103%;
        margin:20px auto;
    }
</style>

<body>
    <header class="head">
        <!-- left box for logo -->
        <div class="left">
           <img src="logo.png" alt="">
           <div>harry fitness</div>
        </div>
        <!-- mid box fornavbar -->
        <div class="mid">
            <ul class="navbar">
                <li><a href="#">Home</a></li>
                <li><a href="#">About us</a></li>
                <li><a href="#">Fit calculetor</a></li>
                <li><a href="#">Contact us</a></li>
            </ul>

        </div>
        <!-- right box for buttons -->
        <div class="right">
          <button class="btn">call us now</button>
          <button class="btn">email us</button>
        </div>

    </header>
<div class="container">
    <h1>Join the best gym delhi now</h1>
    

    <?php
            if($insert == true){
            echo  "<p class='submitMsg'>Thanks for submiting your iinformation</p>";
             }
            ?>
    
            
    <form action="index.php" method="post"> 
        <div class="form-group">
            <input type=" text" name="name" id="name" placeholder="enter your name">
        </div>
        <div class="form-group">
            <input type=" text" name="age" id="age" placeholder="enter your age">
        </div>
        <div class="form-group">
            <input type=" text" name="gender" id="gender" placeholder="enter your gender">
        </div>
        <button class="btn">submit</button>
    </form>

</div>
</body>

</html>