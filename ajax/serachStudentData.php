<?php
include ("connect_db.php");
$serachTerm = $_POST['searchData'];
$sql = "SELECT s.id, s.name, s.age, s.date_of_birth, s.gender, s.phone, s.percentage, c.city_name, cs.course_name 
        FROM students AS s 
        LEFT JOIN city AS c ON s.city_id = c.id 
        LEFT JOIN course AS cs ON s.course_id = cs.id 
        WHERE s.name LIKE '%$serachTerm%' OR s.phone LIKE '%$serachTerm%' OR c.city_name LIKE '%$serachTerm%'
        OR cs.course_name LIKE '%$serachTerm%'";
$query = mysqli_query($conn, $sql);
$output = "";
while ($row = mysqli_fetch_assoc($query)) {
    $output = "<tr>
        <td>{$row['id'] }</td>
        <td>{$row['name']}</td>
        <td>{$row['age']}</td>
        <td>{$row['date_of_birth']}</td>
        <td>{$row['gender']}</td>
        <td>{$row['phone']}</td>
        <td>{$row['city_name'] }</td>
        <td>{$row['percentage']}</td>
        <td>{$row['course_name']}</td>
        <td><a data-eid={$row['id']} class='btn btn-primary edit-btn'>Edit</a></td>
        <td><a class='btn btn-danger delete-btn' data-id={$row['id']}>Delete</a></td>
    </tr>";
    echo $output;
}
?>