
<?php
// Enable MySQLi error reporting
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Initialize the connection variables
$host = "localhost";
$user = "root";
$pass = "";
$db = "lunas_garage";

// Establish the connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Clear customer and vehicle records on page load (if needed)
if (isset($_GET['reset'])) {
    $conn->query("DELETE FROM customer");
    $conn->query("DELETE FROM car_sales");
}

// Initialize variables for form input values (empty by default)
$name = $email = $address = "";
$make = $model = $year = "";

// Handle customer form submission
if (isset($_POST['add_customer'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $stmt = $conn->prepare("INSERT INTO customer (Name, Email, Address) VALUES (?, ?, ?)");
    if ($stmt) {
        $stmt->bind_param("sss", $name, $email, $address);
        if ($stmt->execute()) {
            // Redirect to avoid resubmission
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        } else {
            echo "<p>Error executing statement: " . $stmt->error . "</p>";
        }
        $stmt->close();
    } else {
        echo "<p>Error preparing statement: " . $conn->error . "</p>";
    }
}

// Handle vehicle form submission
if (isset($_POST['add_vehicle'])) {
    $make = $_POST['make'];
    $model = $_POST['model'];
    $year = $_POST['year'];

    $stmt = $conn->prepare("INSERT INTO car_sales (Make, Model, Year) VALUES (?, ?, ?)");
    if ($stmt) {
        $stmt->bind_param("ssi", $make, $model, $year);
        if ($stmt->execute()) {
            // Redirect to avoid resubmission
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        } else {
            echo "<p>Error executing vehicle statement: " . $stmt->error . "</p>";
        }
        $stmt->close();
    } else {
        echo "<p>Error preparing vehicle statement: " . $conn->error . "</p>";
    }
}

// Get all customers and vehicles
$customer_result = $conn->query("SELECT * FROM customer");
$vehicle_result = $conn->query("SELECT * FROM car_sales");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Luna's Garage</title>
</head>
<body>
<h1>Luna's Garage - Customer Management</h1>

<!-- Add Customer Form -->
<h2>Add Customer</h2>
<form method="post">
    <label>Name:</label><br>
    <input type="text" name="name" value="" required><br>
    <label>Email:</label><br>
    <input type="email" name="email" value="" required><br>
    <label>Address:</label><br>
    <input type="text" name="address" value="" required><br><br>
    <button type="submit" name="add_customer">Add Customer</button>
</form>

<div style="display: flex; gap: 150px; align-items: flex-start;">
    <div class="section">
<h2>Customer List</h2>
<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>ID</th><th>Name</th><th>Email</th><th>Address</th>
    </tr>
    <?php if ($customer_result && $customer_result->num_rows > 0): ?>
        <?php while ($row = $customer_result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['Customer_id']) ?></td>
                <td><?= htmlspecialchars($row['Name']) ?></td>
                <td><?= htmlspecialchars($row['Email']) ?></td>
                <td><?= htmlspecialchars($row['Address']) ?></td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr><td colspan="4">No customers found.</td></tr>
    <?php endif; ?>
</table>
    </div>

   
<!-- Add Vehicle Form -->
<div style="margin-top: -225px;">
<div class="section">
<h2>Add Vehicle</h2>
<form method="post" action="">
    <label>Make:</label><br>
    <input type="text" name="make" value="" required><br>
    <label>Model:</label><br>
    <input type="text" name="model" value="" required><br>
    <label>Year:</label><br>
    <input type="number" name="year" value="" required><br>
    <button type="submit" name="add_vehicle" style="margin-top: 18px;">Add Vehicle</button>

</form>


<h2>Vehicle List</h2>
<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Car ID</th><th>Make</th><th>Model</th><th>Year</th>
    </tr>
    <?php if ($vehicle_result && $vehicle_result->num_rows > 0): ?>
        <?php while ($row = $vehicle_result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['Car_id']) ?></td>
                <td><?= htmlspecialchars($row['Make']) ?></td>
                <td><?= htmlspecialchars($row['Model']) ?></td>
                <td><?= htmlspecialchars($row['Year']) ?></td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr><td colspan="4">No vehicles found.</td></tr>
    <?php endif; ?>

</table>
<!-- Link to reset data (clear all records) -->
<a href="?reset=true">Reset All Data</a>
    </div>
</div>

</body>
</html>

<?php $conn->close(); ?>
