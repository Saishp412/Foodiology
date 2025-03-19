<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    
    // Validate form data
    if (empty($name) || empty($email) || empty($message)) {
        echo "Please fill in all fields.";
    } else {
        // Connect to database (replace placeholders with actual database credentials)
        $servername = "localhost";
        $username = "username";
        $password = "password";
        $dbname = "database_name";
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            // Insert feedback into database
            $sql = "INSERT INTO feedback (name, email, message) VALUES ('$name', '$email', '$message')";
            
            if ($conn->query($sql) === TRUE) {
                echo "Feedback submitted successfully!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            
            // Close database connection
            $conn->close();
        }
    }
} else {
    echo "Invalid request.";
}
?>
