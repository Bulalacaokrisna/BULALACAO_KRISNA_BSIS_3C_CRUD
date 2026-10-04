<?php

include "auth_check.php";
include "database.php";

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM students WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
$row = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Name</title>
</head>
<body>

<h2>Edit Name</h2>

<form action="update.php" method="POST">

    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

    <label>Name:</label><br>

    <input type="text"
           name="name"
           value="<?php echo htmlspecialchars($row['name']); ?>"
           required>

    <br><br>

    <button type="submit">Update</button>

    <a href="index.php">Cancel</a>

</form>

</body>
</html>