<?php
$servername = "localhost"; 
$username = "sam";
$password = "12345";
$database = "hinga";

// Create a connection
$conn = new mysqli($localhost, $sam, $12345, $hinga);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Product ID: " . $row["product_id"] . "<br>";
        echo "Product Name: " . $row["product_name"] . "<br>";
        // Add more fields as needed
        echo "<br>";
    }
} else {
    echo "No products found";
}

$user_id = 1; // Replace with the actual user ID
$product_id = 2; // Replace with the actual product ID
$booking_date = "2023-09-14"; // Replace with the actual booking date

$sql = "INSERT INTO bookings (user_id, product_id, booking_date)
        VALUES ('$user_id', '$product_id', '$booking_date')";

if ($conn->query($sql) === TRUE) {
    echo "Booking created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Add Product
if (isset($_POST['addProduct'])) {
    $productName = $_POST['productName'];
    $sql = "INSERT INTO products (name) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $productName);

    if ($stmt->execute()) {
        echo "Product added successfully.";
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
}

// Remove Product
if (isset($_POST['removeProduct'])) {
    $productName = $_POST['productName'];
    $sql = "DELETE FROM products WHERE name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $productName);

    if ($stmt->execute()) {
        echo "Product removed successfully.";
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
}

// Fetch Products (for initial page load)
if (isset($_GET['fetchProducts'])) {
    $sql = "SELECT name FROM products";
    $result = $conn->query($sql);

    $products = array();
    while ($row = $result->fetch_assoc()) {
        $products[] = $row['name'];
    }

    echo json_encode($products);
}

$conn->close();
?>

