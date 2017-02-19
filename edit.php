<?php 
error_reporting(E_ALL);
include('db.php');

if($_REQUEST['edit_id'] != ''){
	$sql = "SELECT * FROM employee_data WHERE id = '".$_REQUEST['edit_id']."'";
	$run = mysqli_query($conn, $sql);
	//Fetching data from query
	while($rows = mysqli_fetch_assoc($run)){
?>
			<div class="form-group">
				<lable class="control-label col-md-2">Employee name</lable>
				<div class="col-md-8">
					<input type="text" value="<?php echo $rows['employee_name']; ?>" id="employee_name" class="form-control" name="">
				</div>
			</div><!-- form-group -->
			<div class="form-group">
				<lable class="control-label col-md-2">Employee Designation</lable>
				<div class="col-md-3">
					<select class="form-control" id="employee_designation">
						<option value="">Select your designation</option>
						<option value="PHP Developer" <?php if($rows['employee_designation'] == "PHP Developer"){ echo 'selected';} ?>>PHP Developer</option>
						<option value="WordPress Developer" <?php if($rows['employee_designation'] == "WordPress Developer"){ echo 'selected';} ?>>WordPress Developer</option>
						<option value="UI Developer" <?php if($rows['employee_designation'] == "UI Developer"){ echo 'selected';} ?>>UI Developer</option>
						<option value="JS Developer" <?php if($rows['employee_designation'] == "JS Developer"){ echo 'selected';} ?>>JS Developer</option>
					</select>
				</div>
				<lable class="control-label col-md-2">Employee Salary</lable>
				<div class="col-md-3">
					<input type="number" class="form-control" value="<?php echo $rows['employee_salary']; ?>" name="" id="employee_salary">
				</div>
			</div><!-- form-group -->
			<div class="form-group">
				<div class="col-md-10 col-md-offset-2">
					<button class="btn btn-danger" onclick="ajaxrequest('update_record',<?php echo $_REQUEST['edit_id']; ?>);">Update Record</button>
				</div>
			</div><!-- form-group -->
<?php
	}
}
?>			