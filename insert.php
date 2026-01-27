<?php
$servername = "localhost";
$username = "fourtt209"; 
$password = "ZV753"; 
$dbname = "4tt209.4tt2_09_creative"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect and sanitize form data
$artist_name = mysqli_real_escape_string($conn, $_POST['artist_name']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$style_id = (int)$_POST['style']; // style is now the id


// Insert data into database
$sql = "INSERT INTO artists (artist_name, description, style_id) 
        VALUES ('$artist_name', '$description', $style_id)";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>