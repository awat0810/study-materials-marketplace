<?php
  require'../connection/conn.php';
if(isset($_POST['add'])) {
  
	
	
	$name = $_POST['name'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$mobile = $_POST['mobile'];
	$position = $_POST['position'];
	$active = $_POST['active'];
	
	
    $user_add = "INSERT INTO `user`(`admin_name`, `username`, `mobile`, `password`, `position`, `active`) VALUES 
											('$name','$username','$mobile','$password','$position','$active')";
    $conn->query($user_add);
	

   echo "<script type='text/javascript'>window.location.href ='admin_list.php'</script>";
}

$Position_select = "SELECT * FROM `position` ";
$Position_r = $conn -> query($Position_select);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3>Add User</h3>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
				  <div class="mb-3">
                    <label for="username" class="form-label">User Name</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
				   
				  <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" class="form-control" id="password" name="password" required>
                </div>
				  <div class="mb-3">
                    <label for="mobile" class="form-label">Mobile</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" required>
             
				<div class="mb-3">
						<label for="position" class="form-label">Position</label>
							<select class="form-control" id="position" name="position" required>
								<option></option>
								<?php while($row = mysqli_fetch_array($Position_r)){?>
								<option value="<?php echo $row['position_id']?>"><?php echo $row['position_name']?></option>
								
								<?php }?>
							</select>
									</div>

				
				<div class="mb-3">
					<label class="form-label">Activation </label><br>
    
					<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="active" id="active" value="1">
					<label class="form-check-label" for="active">Active</label>
						</div>

					</div>

				
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" name="add" value="ADD">
					<a href="admin_list.php" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
