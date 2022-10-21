<!-- Add category HTML form -->

<?php include 'header.php'; ?>
<form action="add_category.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="category_name">Category Name</label>
        <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter category name">
    </div>
    <div class="form-group">
        <label for="category_image">Category Image</label>
        <input type="file" class="form-control-file" id="category_image" name="category_image">
    </div>
    <input type="submit" name="submit" class="btn btn-primary" value="Add Category">
</form>
<?php include 'footer.php'; ?>

<!-- Add category -->

<?php
if(isset($_POST['submit'])) {
    $category_name = $_POST['category_name'];
    $category_image = $_FILES['category_image']['name'];
    $tmp_name = $_FILES['category_image']['tmp_name'];
    $path = "images/".$category_image;
    move_uploaded_file($tmp_name, $path);
    $sql = "INSERT INTO categories (category_name, category_image) VALUES ('$category_name', '$category_image')";
    if ($conn->query($sql) === TRUE) {
        header('Location: admin_category.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>
