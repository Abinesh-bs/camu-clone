<?php
include("db.php");
include("attendence.php");
$flag=0;
$update=0;
 if(isset($_POST['submit']))
 {
    $date=date("y-m-d H:i:s");
    $records =mysqli_query($con,"select * from attendence_record where date ='$date'");
    $num=mysqli_num_rows($records);
    if($num){
        foreach($_POST['attendence_status'] as $id=> $attendence_status)
        {
            $student_name=$_POST['student_name'][$id];
            $register_number=$_POST['register_number'][$id];
            $department=$_POST['department'][$id];
        $result=  mysqli_query($con,"update attendence_record set student_name='$student_name',register_number='$register_number',department='$department',attendence_status='$attendence_status',date='$date' where date ='$date'");
}if($result){
    $update=1;
}
}
    else
    {
foreach($_POST['attendence_status'] as $id=> $attendence_status)
{
    $student_name=$_POST['name'][$id];
    $register_number=$_POST['rno'][$id];
    $department=$_POST['class_name'][$id];

$result=mysqli_query($con, "insert into attendence_record (	student_name,	register_number,	department,	attendence_status,date) values ('$student_name',	'$register_number',	'$department',	'$attendence_status','$date')");



if($result){
            $flag=1;
        }
}       
}
}


?>

<div class="panel panel-default">
    <div class="panel panel-heading">
        <h2>
            <a class="btn btn-info pull-right" href="viewall.php">View All</a>
        </h2>
       <div class="well  text-center">Date : <?php echo date("d-m-Y");?></div>
        <div class="panel panel-body">
            <form action="index.php" method="Post">
                <table class="table table-striped">
                    <tr>
                        
                        <th>Student name</th>
                        <th>Register number</th>
                       <th> Department</th>
                        <th>Attendence Status</th>
                </tr>
                   <?php  $result = mysqli_query($con, "select * from students  where rno like '20%' and class_name='Cognitive System' order by name asc");
                     
                    $rno = 0;
                    $counter = 0;
                    while ($row = mysqli_fetch_array($result)) {
                        $rno++;

                        ?>
                        <tr>
                            <td>
                                <?php echo $row['name']; ?>
                                <input type="hidden" value="<?php echo $row['name']; ?>" name="name[]">
                            </td>
                            <td>
                                <?php echo $row['rno']; ?> 
                            <input type="hidden" value="<?php echo $row['rno']; ?>" name="rno[]">
                            </td>
                            <td>
                                <?php echo $row['class_name']; ?>
                                <input type="hidden" value="<?php echo $row['class_name']; ?>" name="class_name[]">
                            </td>
                            <td>
                                <input type="radio" name="attendence_status[<?php echo $counter;?>]" value="Present">Present
                                <input type="radio" name="attendence_status[<?php echo $counter; ?>]" value="Absent">Absent
                            </td>
                        </tr>
                        <?php
                        $counter++;
                    }
                    ?>
                </table>
                <input type="submit" name="submit" value="Submit" class="btn btn-primary">
            </form>

        </div>

    </div>
</div>