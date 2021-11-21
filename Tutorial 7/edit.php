<?php
include("db.php");


if (isset($_POST['update'])) {
    $staffNo = mysqli_real_escape_string($db, $_POST['staffno']);
    $fname = mysqli_real_escape_string($db, $_POST['fname']);
    $lname = mysqli_real_escape_string($db, $_POST['lname']);
    $position = mysqli_real_escape_string($db, $_POST['position']);
    $sex = mysqli_real_escape_string($db, $_POST['sex']);
    $dob = mysqli_real_escape_string($db, $_POST['dob']);
    $salary = mysqli_real_escape_string($db, $_POST['salary']);
    $branchNo = mysqli_real_escape_string($db, $_POST['branchno']);

    $update = mysqli_query($db, "UPDATE staff SET fname='$fname', lname='$lname', position='$position', sex='$sex', dob='$dob', salary='$salary', staffNo='$staffNo', branchNo='$branchNo' WHERE staffNo='{$_POST['staffno']}'");

    if ($update) {
        echo 'Successfully edit record.';
    } else {
        echo 'Failed to edit record because ' . mysqli_error();
    }
}


$query = mysqli_query($db, "SELECT * FROM staff WHERE staffNo='{$_REQUEST['sn']}' ");
while ($row = mysqli_fetch_array($query)) {
    $sn = $row['staffNo'];
    $f = $row['fName'];
    $l = $row['lName'];
    $ps = $row['position'];
    $s = $row['sex'];
    $dob = $row['DOB'];
    $sal = $row['salary'];
    $bn = $row['branchNo'];
}

?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>?sn=<?php echo $_REQUEST['sn']; ?>" method="post">
    <input type="hidden" value="<?php echo $_REQUEST['sn']; ?>" name="staffno">
    <table border="1">
        <tr>
            <td colspan="2"><input type="button" value="Back" onclick="window.location = 'staff.php'"></td>
        </tr>
        <tr>
            <td colspan="2">
                <h2>Staff</h2>
            </td>
        </tr>
        <tr>
            <td>First Name:</td>
            <td><input type="text" name="fname" value="<?php echo $f; ?>"></td>
        </tr>
        <tr>
            <td>Last Name:</td>
            <td><input type="text" name="lname" value="<?php echo $l; ?>"></td>
        </tr>
        <tr>
            <td>Position:</td>
            <td><input type="text" name="position" value="<?php echo $ps; ?>"></td>
        </tr>
        <tr>
            <td>Sex:</td>
            <td><input type="text" name="sex" value="<?php echo $s; ?>"></td>
        </tr>
        <tr>
            <td>Date of Birth:</td>
            <td><input type="text" name="dob" value="<?php echo $dob; ?>"></td>
        </tr>
        <tr>
            <td>Salary:</td>
            <td><input type="text" name="salary" value="<?php echo $sal; ?>"></td>
        </tr>
        <tr>
            <td>Branch No:</td>
            <td><select name="branchno">
                    <?php
                    $branch = mysqli_query($db, "SELECT DISTINCT branchNo FROM branch");
                    while ($branchrow = mysqli_fetch_array($branch)) {
                        echo '<option value="' . $branchrow['branchNo'] . '" ';
                        if ($branchrow['branchNo'] == $bn) {
                            echo 'selected="selected"';
                        }
                        echo ' >' . $branchrow['branchNo'] . '</option>';
                    }
                    ?>
                </select></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="update" value="Update"></td>
        </tr>
    </table>
</form>