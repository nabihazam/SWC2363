<?php
// Database connection
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "sales_db"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is received via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['manager_name']) && isset($_POST['sales_month']) && isset($_POST['sales_amount'])) {
        
        // Get form data safely
        $manager_name = $conn->real_escape_string($_POST['manager_name']);
        $sales_month = $conn->real_escape_string($_POST['sales_month']);
        $sales_amount = (float) $_POST['sales_amount'];  // Cast to float for numeric value

        // Determine commission rate
        $commission_rate = 0;
        if ($sales_amount >= 1 && $sales_amount <= 2000) {
            $commission_rate = 3;
        } elseif ($sales_amount >= 2001 && $sales_amount <= 5000) {
            $commission_rate = 4;
        } elseif ($sales_amount >= 5001 && $sales_amount <= 7000) {
            $commission_rate = 7;
        } elseif ($sales_amount > 7000) {
            $commission_rate = 10;
        }

        // Calculate commission amount
        $commission_amount = ($sales_amount * $commission_rate) / 100;

        // Insert data into database
        $sql = "INSERT INTO sales_data (manager_name, sales_month, sales_amount, commission_amount) 
                VALUES ('$manager_name', '$sales_month', $sales_amount, $commission_amount)";

        if ($conn->query($sql) === TRUE) {
            echo "<h2>Sales Data Submitted Successfully!</h2>";
            echo "<p>Manager Name: $manager_name</p>";
            echo "<p>Month: $sales_month</p>";
            echo "<p>Sales Amount: RM " . number_format($sales_amount, 2) . "</p>";
            echo "<p>Commission Rate: $commission_rate%</p>";
            echo "<p>Sales Commission: RM " . number_format($commission_amount, 2) . "</p>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Please fill all fields in the form.";
    }
}

// Close the connection
$conn->close();
?>
