<?php

include "auth_check.php";
include "database.php";

$result = $conn->query("SELECT * FROM students");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Student CRUD</title>
</head>
<body>

<h2>Student CRUD System</h2>

<p>
    Welcome, <?php echo $_SESSION['username']; ?>!
    <a href="logout.php">Logout</a>
</p>

<hr>

<h3>Add Name</h3>

<form action="add.php" method="POST">

    <input type="text" name="name" placeholder="Enter name" required>

    <button type="submit">Add</button>

</form>

<br>

<table border="1" cellpadding="10">

    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Action</th>
    </tr>

    <?php while ($row = $result->fetch_assoc()) { ?>

    <tr>

        <td><?php echo $row['id']; ?></td>

        <td><?php echo htmlspecialchars($row['name']); ?></td>

        <td>

            <a href="edit.php?id=<?php echo $row['id']; ?>">
                Edit
            </a>

            |

            <a href="delete.php?id=<?php echo $row['id']; ?>"
               onclick="return confirm('Are you sure you want to delete this name?');">
                Delete
            </a>

        </td>

    </tr>

    <?php } ?>

</table>

</body>
</html>