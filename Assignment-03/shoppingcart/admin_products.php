<!-- Show all products with category name in a table with edit and delete button -->
<?php include 'header.php'; ?>
    <?php
    if($_SESSION['role'] == 'user') {
        header('Location: index.php');
    }
    ?>
    <?php
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<table class='table'>
        <thead>
        <tr>
        <th scope='col'>#</th>
        <th scope='col'>Product Name</th>
        <th scope='col'>Product Image</th>
        <th scope='col'>Price</th>
        <th scope='col'>Category</th>
        <th scope='col'>Action</th>
        </tr>
        </thead>
        <tbody>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $category_id = $row['category_id'];
            $sql2 = "SELECT * FROM categories WHERE category_id = $category_id";
            $result2 = $conn->query($sql2);
            $row2 = $result2->fetch_assoc();
            echo "<tr>
            <th scope='row'>".$row['product_id']."</th>
            <td>".$row['product_name']."</td>
            <td><img src='images/".$row['product_image']."' style='height: 50px;'></td>
            <td>".$row['price']."</td>
            <td>".$row2['category_name']."</td>
            <td>
            <a href='edit_product.php?id=".$row['product_id']."'><button type='button' class='btn btn-sm btn-outline-secondary'>Edit</button></a>
            <a href='delete_product.php?id=".$row['product_id']."'><button type='button' class='btn btn-sm btn-outline-secondary'>Delete</button></a>
            </td>
            </tr>";
        }
        echo "</tbody>
        </table>";
        echo "<a href='add_product.php'><button type='button' class='btn btn-sm btn-outline-secondary'>Add Product</button></a>";
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
<?php include 'footer.php'; ?>