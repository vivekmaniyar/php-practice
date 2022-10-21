<!-- Show all categories in a table with edit and delete button -->

<?php include 'header.php'; ?>
    <?php
    if($_SESSION['role'] == 'user') {
        header('Location: index.php');
    }
    ?>
    <?php
    $sql = "SELECT * FROM categories";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<table class='table'>
        <thead>
        <tr>
        <th scope='col'>#</th>
        <th scope='col'>Category Name</th>
        <th scope='col'>Category Image</th>
        <th scope='col'>Action</th>
        </tr>
        </thead>
        <tbody>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>
            <th scope='row'>".$row['category_id']."</th>
            <td>".$row['category_name']."</td>
            <td><img src='images/".$row['category_image']."' style='height: 50px;'></td>
            <td>
            <a href='edit_category.php?id=".$row['category_id']."'><button type='button' class='btn btn-sm btn-outline-secondary'>Edit</button></a>
            <a href='delete_category.php?id=".$row['category_id']."'><button type='button' class='btn btn-sm btn-outline-secondary'>Delete</button></a>
            </td>
            </tr>";
        }
        echo "</tbody>
        </table>";
        echo "<a href='add_category.php'><button type='button' class='btn btn-sm btn-outline-secondary'>Add Category</button></a>";
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
<?php include 'footer.php'; ?>