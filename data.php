<?php 
error_reporting(E_ALL);
include('db.php');

if($_REQUEST['req'] != ''){
	if($_REQUEST['req'] == 'add_new_record'){
		$emp_name = $_REQUEST['emp_name'];
		$emp_designation = $_REQUEST['emp_designation'];
		$emp_salary = $_REQUEST['emp_salary'];
		$ins_sql = "INSERT INTO `employee_data`(`employee_name`,`employee_designation`,`employee_salary`) VALUES ('$emp_name','$emp_designation','$emp_salary')";
		$run_sql = mysqli_query($conn, $ins_sql);
	}elseif($_REQUEST['req'] == 'delete_record'){
		$del_id = $_REQUEST['id'];
		$del_sql = "DELETE FROM `employee_data` WHERE id = '$del_id'";
		$run_sql = mysqli_query($conn, $del_sql);
	}elseif($_REQUEST['req'] == 'update_record'){
		$emp_name = $_REQUEST['emp_name'];
		$emp_designation = $_REQUEST['emp_designation'];
		$emp_salary = $_REQUEST['emp_salary'];
		$update_id = $_REQUEST['id'];
		$ins_sql = "UPDATE `employee_data` SET `employee_name`='$emp_name',`employee_designation`='$emp_designation',`employee_salary`='$emp_salary' WHERE `id` = '$update_id'";
		$run_sql = mysqli_query($conn, $ins_sql);
	}
}

$sql = "SELECT * FROM employee_data";
$run = mysqli_query($conn, $sql);
//Fetching data from query
while($rows = mysqli_fetch_assoc($run)){
?>
<tr>
	<td>1</td>
	<td><?php echo $rows['employee_name']; ?></td>
	<td><?php echo $rows['employee_designation']; ?></td>
	<td><?php echo $rows['employee_salary']; ?></td>
	<td>
		<div class="dropdown">
			<button class="btn btn-primary" data-toggle="dropdown">Actions <span class="caret"></span></button>
			<ul class="dropdown-menu">
				<li><a href="javascript:void(0);" onclick="editrequest(<?php echo $rows['id']; ?>);">Edit</a></li>
				<li><a href="javascript:void(0);" onclick="ajaxrequest('delete_record',<?php echo $rows['id']; ?>);">Delete</a></li>
			</ul>
		</div>
	</td>
</tr>
<?php
}
?>