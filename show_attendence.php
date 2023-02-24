<?php

include("db.php");
include("attendence.php");


?>
<div class="panel panel-default">
    <div class="panel panel-heading">
        <h2>
            <a class="btn btn-success" href="add.php">Add Students</a>
            <a class="btn btn-info pull-right" href="index.php">Back</a>
        </h2>
        <div class="panel panel-body">
            <form action="index.php" method="Post">
                <table class="table table-striped">
                    <tr>
                        <th>Serial number</th>
                        <th>Student name</th>
                        <th>Register number</th>
                        <th>Department</th>
                        <th>Attendance Status</th>
                    </tr>

                    <?php $result = mysqli_query($con, "select * from attendence_record where date='$_POST[date]'");
                    $registernumber = 0;
                    $counter = 0;
                    while ($row = mysqli_fetch_array($result)) {
                        $registernumber++;

                        ?>
                        <tr>
                            <td><?php echo $registernumber; ?> </td>
                            <td>
                                <?php echo $row['student_name']; ?>
                            </td>
                            <td>
                                <?php echo $row['register_number']; ?>
                            </td>
                            <td>
                                <?php echo $row['department']; ?>
                            </td>
                            <td>
                                <input type="radio" name="attendence_status[<?php echo $counter;?>]"
                                <?php if ($row['attendence_status'] == "Present")
                                echo "checked=checked";
                                ?>
                                value="Present">Present
                                <input type="radio" name="attendence_status[<?php echo $counter; ?>]"
                                <?php if ($row['attendence_status'] == "Absent")
                                echo "checked=checked";
                                ?>
                                value="Absent">Absent
                            </td>
                        </tr>
                        <?php
                        $counter++;
                    }
                    ?>
                </table>
                <input type="submit" name="submit" value="submit" class="btn btn-primary">
            </form>

        </div>

    </div>
</div>