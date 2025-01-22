<?php
include("connect_db.php");

$sql = "SELECT s.id, s.name, s.age, s.date_of_birth, s.gender, s.phone, s.percentage, c.city_name, cs.course_name 
        FROM students AS s 
        LEFT JOIN city AS c ON s.city_id = c.id 
        LEFT JOIN course AS cs ON s.course_id = cs.id";

$query = mysqli_query($conn, $sql);

$output = ""; // Initialize $output as an empty string
while ($row = mysqli_fetch_assoc($query)) {
    $output .= "<tr>
        <td>{$row['id']}</td>
        <td>{$row['name']}</td>
        <td>{$row['age']}</td>
        <td>{$row['date_of_birth']}</td>
        <td>{$row['gender']}</td>
        <td>{$row['phone']}</td>
        <td>{$row['city_name']}</td>
        <td>{$row['percentage']}</td>
        <td>{$row['course_name']}</td>
        <td><button data-eid={$row['id']} class='btn btn-danger edit-button'>Edit</button></td>
        <td><button data-id={$row['id']} class='btn btn-danger delete-button'>Delete</button></td>
    </tr>";
}
echo $output;
?>