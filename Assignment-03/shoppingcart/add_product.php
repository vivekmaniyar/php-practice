<!-- add product HTML page -->
<?php include 'header.php'; ?>
<form action="add_product.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="product_name">Product Name</label>
        <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter product name">
    </div>
    <div class="form-group">
        <label for="product_price">Product Price</label>
        <input type="text" class="form-control" id="product_price" name="product_price" placeholder="Enter product price">
    </div>
    <div class="form-group">
        <label for="category_id">Category</label>
        <select class="form-control" id="category_id" name="category_id">
            <?php
            include 'connection.php';
            $sql = "SELECT * FROM categories";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $category_id = $row['category_id'];
                    $category_name = $row['category_name'];
                    echo "<option value='$category_id'>$category_name</option>";
                }
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="product_image">Product Image</label>
        <input type="file" class="form-control-file" id="product_image" name="product_image">
    </div>
    <input type="submit" name="submit" class="btn btn-primary" value="Add Product">
</form>
<?php include 'footer.php'; ?>

<!-- add product -->
<?php
include 'connection.php';
if (isset($_POST['submit'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $category_id = $_POST['category_id'];
    //upload image and get image name
    $product_image = $_FILES['product_image']['name'];
    $tmp_name = $_FILES['product_image']['tmp_name'];
    $path = "images/".$product_image;
    move_uploaded_file($tmp_name, $path);
    $sql = "INSERT INTO products (product_name, price, category_id, product_image) VALUES ('$product_name', '$product_price', '$category_id', '$product_image')";
    if ($conn->query($sql) === TRUE) {
        header('Location: admin_products.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>