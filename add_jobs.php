<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "market";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $requriments = $_POST['requriments'];  
    $contact_info = $_POST['contact_info'];
    $expriation = $_POST['expriation'];  

   
    if (empty($title) || empty($description) || empty($requriments) || empty($contact_info) || empty($expriation)) {
        echo "All fields are required.";
    } else {
    
        $sql = "INSERT INTO jobs (title, description, requriments, contact_info, expriation) 
                VALUES ('$title', '$description', '$requriments', '$contact_info', '$expriation')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Job added successfully.";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Posting Form</title>
</head>
<body>

<form method="post">
    <input type="text" name="title" required placeholder="Title"><br>
    <input type="text" name="description" required placeholder="Description"><br>
    <input type="text" name="requriments" required placeholder="requriments"><br>
    <input type="text" name="contact_info" required placeholder="Contact Info"><br>
    <input type="datetime-local" name="expriation" required placeholder="expriation"><br>
    <button type="submit">Submit</button>
</form>

</body>
</html>
