<?php
    $name = $_GET['name'];
    $email = $_GET['email'];
    $phone = $_GET['phone'];
    $address = $_GET['address'];
    $city = $_GET['city'];
    $state = $_GET['state'];
    $zip = $_GET['zip'];
    $position = $_GET['position'];
    $resume = $_GET['resume'];
    $profile = $_GET['profile'];
?>
<table border="1">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>City</th>
        <th>State</th>
        <th>Zip</th>
        <th>Position</th>
        <th>Resume</th>
        <th>Profile</th>
    </tr>
    <tr>
        <td><?php echo $name; ?></td>
        <td><?php echo $email; ?></td>
        <td><?php echo $phone; ?></td>
        <td><?php echo $address; ?></td>
        <td><?php echo $city; ?></td>
        <td><?php echo $state; ?></td>
        <td><?php echo $zip; ?></td>
        <td><?php echo $position; ?></td>
        <td><a href="<?php echo $resume; ?>">Resume</a></td>
        <td><a href="<?php echo $profile; ?>">Profile</a></td>
    </tr>
</table>