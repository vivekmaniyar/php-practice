<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Job Application Form</title>
</head>
<body>
    <h1>Job Application Form</h1>
    <table>
        <form action="save_data.php" method="post" enctype="multipart/form-data">
            <tr>
                <td>Name:</td>
                <td><input type="text" name="name" required></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="email" name="email" required></td>
            </tr>
            <tr>
                <td>Phone:</td>
                <td><input type="tel" name="phone" pattern="[0-9]{10}" required></td>
            </tr>
            <tr>
                <td>Address:</td>
                <td><textarea name="address" rows="3" cols="30"></textarea></td>
            </tr>
            <tr>
                <td>City:</td>
                <td><input type="text" name="city" required></td>
            </tr>
            <tr>
                <td>State:</td>
                <td><input type="text" name="state" required></td>
            </tr>
            <tr>
                <td>Zip:</td>
                <td><input type="number" name="zip"></td>
            </tr>
            <tr>
                <td>Position:</td>
                <td>
                    <select name="position" id="position" required>
                        <option value="Web Developer">Web Developer</option>
                        <option value="Graphic Designer">Graphic Designer</option>
                        <option value="Sales Associate">Sales Associate</option>
                        <option value="Customer Service">Customer Service</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Resume:</td>
                <td><input type="file" name="resume" accept=".pdf" required></td>
            </tr>
            <tr>
                <td>Profile:</td>
                <td><input type="file" name="profile" accept=".jpg,.jpeg"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Submit"></td>
            </tr>
        </form>
    </table>
</body>
</html>
