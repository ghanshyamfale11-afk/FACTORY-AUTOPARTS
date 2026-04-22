<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 1. Your Database Credentials
    $servername = "localhost"; 
    $username = "YOUR_DB_USERNAME";
    $password = "YOUR_DB_PASSWORD";
    $dbname = "YOUR_DB_NAME";

    // 2. Create Connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // 3. Sanitize and Prepare Data (Now catching the new dropdowns)
    $year = $conn->real_escape_string($_POST['year']);
    $make = $conn->real_escape_string($_POST['make']);
    $model = $conn->real_escape_string($_POST['model']);
    $part_needed = $conn->real_escape_string($_POST['part_needed']);
    $full_name = $conn->real_escape_string($_POST['full_name']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $email = $conn->real_escape_string($_POST['email']);

    // 4. Insert into Table
    $sql = "INSERT INTO inquiries (year, make, model, part_needed, full_name, phone, email)
            VALUES ('$year', '$make', '$model', '$part_needed', '$full_name', '$phone', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "<h2>Thank you! Your inquiry has been logged successfully.</h2>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>