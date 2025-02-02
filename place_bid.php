<?php

$servername= "localhost";
$username= "root";
$password= "";
$dbname= "market";

$conn = new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){

    die("Connection failed:" . $conn->connect_error);
}

if($_SERVER ["Request_Method"] == 'POST'){

    $job_id =$_POST['job_id'];
    $bidder_id = 2;
    $amount= $_POST['amount'];

    $sql= "INSERT INTO bid (job_id, bidder_id,amount) VALUES ('$job_id', '$bidder_id', '$amount')";
    $conn->query($sql);
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <input type ="hidden" name="job_id" value="1">
        <input type="number"  step="0.01" nme="amount" placeholder="bidamount">
        <button type="submit"> Placebit</button>
</form>
</body>
</html>