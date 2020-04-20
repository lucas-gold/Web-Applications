<?php 
include('dbconnect.php');

$update = false;
$username="";
$password="";
$email="";
$address="";
$phone_number="";
$accountType="";

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $record = mysqli_query($conn, "SELECT * from users WHERE id=$id");

    if($record->num_rows == 1){
        $n = mysqli_fetch_array($record);
        $username=$n['username'];
        $password=$n['password'];
        $email=$n['email'];
        $address=$n['address'];
        $phone_number=$n['phone_number'];
        $accountType=$n['accountType'];
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>MaintainDB - Users</title></head>
<body>

    <?php if(isset($_SESSION['message'])):?>
    <div>
        <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);    
        ?>
    </div>
    <?php endif ?>

    <form method="post" action="maintaindb.php">
        <div>
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <label>Username</label>
            <input type="text" name="username" value="<?php echo $username;?>" required>
            <label>Password</label>
            <input type="text" name="password" value="<?php echo $password;?>" required>
            <label>Email</label>
            <input type="text" name="email" value="<?php echo $email;?>" required>
            <label>Phone Number</label>
            <input type="text" name="phone_number" value="<?php echo $phone_number;?>" required>
            <label>Address</label>
            <input type="text" name="address" value="<?php echo $address;?>" required>
            <label>Account Type</label>
            <select name="accountType" required>
                <option disabled selected>Select one...</option>
                <option value="A">Admin</option>
                <option value="R">Regular</option>
            </select>
            <?php if ($update == true): ?>
                <button class="btn" type="submit" name="update_user">Update</button> 
            <?php else: ?>
                <button class="btn" type="submit" name="add_user">Add</button>
            <?php endif ?>
        </div>
    </form>

    <?php $results = mysqli_query($conn, "SELECT * FROM users"); ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Password</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>Account Type</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>

        <?php while($row = mysqli_fetch_array($results)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['password']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone_number']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['accountType']; ?></td>
                <td>
                    <a href="db_users.php?edit=<?php echo $row['id'];?>">Edit</a>
                </td>
                <td>
                    <a href="maintaindb.php?del_user=<?php echo $row['id'];?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>

</body>
</html>

