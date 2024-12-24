<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Search</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<!-- Search form -->
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="get">
    <input type="text" name="search" placeholder="Search..." value="<?php echo htmlspecialchars($filterValue); ?>">
    <input type="submit" value="Search">
</form>
<?php
include("connection.php");

// Initialize filterValue variable
$filterValue = '';

// Determine query based on whether a search is performed
if (isset($_GET['search']) && !empty(trim($_GET['search']))) {
    $filterValue = trim($_GET['search']);
    // Search query with wildcard matching
    $query = "SELECT * FROM user WHERE CONCAT(name, state, eduction) LIKE '%$filterValue%'";
} else {
    // Default query to fetch all data
    $query = "SELECT * FROM user";
}

// Execute the query
$result = mysqli_query($conn, $query);

// Check if there are rows to display
if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr>
            <th>ID</th>
            <th>Name</th>
            <th>State</th>
            <th>Education</th>
          </tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['state']}</td>
                <td>{$row['eduction']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No results found.</p>";
}

?>



</body>
</html>