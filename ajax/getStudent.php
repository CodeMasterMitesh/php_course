<?php
include ("connect_db.php");

$sql = "SELECT s.id, s.name, s.age, s.date_of_birth, s.gender, s.phone, s.percentage, c.city_name, cs.course_name 
        FROM students AS s 
        LEFT JOIN city AS c ON s.city_id = c.id 
        LEFT JOIN course AS cs ON s.course_id = cs.id";
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
<!-- // Pagination Links  -->
        <!-- <nav>
            <ul class="pagination justify-content-center">
                <li class="page-item  <?//php if($page <= 1) echo 'disabled'; ?>">
                    <a class="page-link" href="?page=<?//php echo $page - 1; ?>">Previous</a>
                </li>
                <?//php 
                    // for($i = 1;$i <= $total_pages;$i++){
                        ?>
                        <li class="page-item">
                            <a class="page-link <?//php if($i == $page) echo 'active'; ?>" href="?page=<?//php echo $i; ?>"><?//php echo $i; ?></a>
                        </li>
                    <?//php } ?>
                <li class="page-item <?//php if($page >= $total_pages) echo 'disabled'; ?>">
                    <a class="page-link" href="?page=<?//php echo $page + 1; ?>">Next</a>
                </li>
            </ul>
        </nav> -->