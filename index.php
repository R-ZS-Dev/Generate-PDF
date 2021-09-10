<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student Form</title>
	<link rel="stylesheet" type="text/css" href="Bootstrap.css">
</head>
<body>
	<style>
		body{
			background-color: #e9ebee;
		}
	</style>
	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div style="background-color:white; border: 1px solid #cccccc; padding: 16px; margin-top: 40px;">
					<center><h3>Employee Record</h3></center>
					<table class="table table=hover">
						<tr>
							<th>View Online</th>
							<th>Download</th>
						</tr>
						<?php 
	//DB connection
		$con = new PDO("mysql:host=localhost;dbname=onefield", "root", "");
		$query = "SELECT * FROM onedata";
		$result = $con->prepare($query);
		$result->execute();
			if ($result->rowCount()) {
				while ($employee = $result->fetch()) {
					?>
						<tr>
							<td>
								<a href="employee.php?em_id=<?php echo $employee['id']; ?>">View Online</a>
							</td>
							<td>
								<a href="employee.php?em_id=<?php echo $employee['id']; ?>" download="employee.php?em_id=<?php echo $employee['id']; ?>">Download Now</a>
							</td>
						</tr>
					<?php
				}
			}
			else{
				echo "<br><br>Data Not Found";
			}
	?>
					</table>
				</div>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
</body>
</html>