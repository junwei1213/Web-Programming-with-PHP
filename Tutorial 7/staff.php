<html>
    <head></head>
    <body>
        <?php
        include("db.php");

        echo '<form action="' . $_SERVER['PHP_SELF'] . '" method="post"><table border="1"><tr><td><input type="text" name="searchquery" ></td><td><input type="submit" name="search" value="Search"></td></tr></table></form>';

        if(isset($_POST['search'])){
            $search = mysqli_real_escape_string( $db, $_POST['searchquery']);
            $query = mysqli_query( $db, "SELECT * FROM staff WHERE staffNo LIKE '%$search%'");

            if(mysqli_num_rows($query)!=0){
                echo '<table border="1"><tr>
                <td>Staff No</td>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Position</td>
                <td>Sex</td>
                <td>Date Of Birth</td>
                <td>Salary</td>
                <td>Branch No</td>
                <td></td>
		        <td></td>
                </tr>';

                while ($Row = mysqli_fetch_array($query)) {
                    echo '<tr><td>' . $Row[0] . '</td>
                    <td>' . $Row[1] . '</td>
                    <td>' . $Row[2] . '</td>
                    <td>' . $Row[3] . '</td>
                    <td>' . $Row[4] . '</td>
                    <td>' . $Row[5] . '</td>
                    <td>' . $Row[6] . '</td>
                    <td>' . $Row[7] . '</td>
                    <td><input type="button" onclick="window.location = \'edit.php?sn=' . $Row[0] . '\'" value=Edit></td>
                    <td><input type=button onclick="window.location = \'delete.php?sn=' . $Row[0] . '\'" value=Delete></td><tr>';
            }
            echo '</table>';
            exit();
        }else{
            echo '<h2>No result</h2>';
            exit();
        }
    }

        if(isset($_POST['submit'])){
            $staffNo = mysqli_real_escape_string($db, $_POST['staffno']);
            $fname = mysqli_real_escape_string( $db, $_POST['fname']);
            $lname = mysqli_real_escape_string( $db, $_POST['lname']);
            $position = mysqli_real_escape_string( $db, $_POST['position']);
            $sex = mysqli_real_escape_string( $db, $_POST['sex']);
            $dob = mysqli_real_escape_string( $db, $_POST['dob']);
            $salary = mysqli_real_escape_string( $db, $_POST['salary']);
            $branchNo = mysqli_real_escape_string( $db, $_POST['branchno']);

	        $sqlinset = "INSERT INTO staff(staffNo, fname,lname, position, sex, dob, salary, branchno) VALUES ('$staffNo','$fname','$lname','$position','$sex','$dob','$salary','$branchNo')";
	
	
	if(mysqli_query( $db, $sqlinset)){
    echo "Records inserted successfully.";
	echo "<br/>";
		} else{
            echo "ERROR: Could not able to execute $sqlQuery. " . mysqli_error( $db) . "<br>";
		}
        }

        $queryResult = mysqli_query($db, "SELECT * FROM staff");
        echo '<table border="1"><tr>
                <td>Staff No</td>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Position</td>
                <td>Sex</td>
                <td>Date Of Birth</td>
                <td>Salary</td>
                <td>Branch No</td>
                </tr>';
        
        $Row = mysqli_fetch_row($queryResult);
        do{
            echo '<tr><td>'.$Row[0].'</td>
            <td>'.$Row[1].'</td>
            <td>'.$Row[2].'</td>
            <td>'.$Row[3].'</td>
            <td>'.$Row[4].'</td>
            <td>'.$Row[5].'</td>
            <td>'.$Row[6].'</td>
            <td>'.$Row[7].'</td>
            <td><input type="button" onclick="window.location = \'edit.php?sn='.$Row[0].'\'" value=Edit></td>
            <td><input type=button onclick="window.location = \'delete.php?sn='.$Row[0].'\'" value=Delete></td><tr>';
            $Row = mysqli_fetch_row($queryResult);
        }while ($Row);
        echo "</table>";

        echo "<form method='POST'>";
        echo "<br><br><table border = '1' >";
        echo "<tr><td colspan='2'>Staff</td><tr>";
        echo "<tr><td>Staff No</td><td><input type='text' name='staffno'></td></tr>";
        echo "<tr><td>First Name</td><td><input type='text' name='fname'></td></tr>";
        echo "<tr><td>Last Name</td><td><input type='text' name='lname'></td></tr>";
        echo "<tr><td>Position</td><td><input type='text' name='position'></td></tr>";
        echo "<tr><td>Sex</td><td><input type='text' name='sex'></td></tr>";
        echo "<tr><td>Date of Birth</td><td><input type='text' name='dob'></td></tr>";
        echo "<tr><td>Salary</td><td><input type='text' name='salary'></td></tr>";

        echo "</select>";
        echo "</td></tr>";

        $BranchResult = mysqli_query($db, "SELECT branchNo FROM branch GROUP BY branchNo");
        echo "<td>Branch No</td>";
        echo "<td><select name='branchno'>";
        $BranchNo_Result = mysqli_num_rows($BranchResult);
        for ($i = 0; $i < $BranchNo_Result; $i++) {
            $row = mysqli_fetch_array($BranchResult);
            $branchNo = $row['branchNo'];
            echo "<option value='$branchNo'>$branchNo</option>";
        }
        echo "</select>";
        echo "</td></tr>";

        echo "<td colspan='2'><input type='submit' name='submit' value='submit'></td>";
    
        ?>
    </body>
</html>