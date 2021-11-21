<?php
include("db.php");

if (isset($_POST['delete'])) {
    $delete = mysqli_query($db, "DELETE FROM staff WHERE staffNo='{$_POST['sn']}'");

    if ($delete) {
        echo '<h2>Successfully delete record!<h2><br><a href="staff.php">Back to Homepage</a>';
        exit();
    } else {
        echo 'Failed to delete record because ' . mysqli_error($db);
    }
}
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <input type="hidden" value="<?php echo $_REQUEST['sn'];  ?>" name="sn">
    <table>
        <tr>
            <td>Are you sure you want to delete?</td>
            <td><input type="submit" name="delete" value="Yes"><input type="button" value="Cancel" onclick="window.location='Tutorial6.php'"></td>
        </tr>
    </table>
</form>