<?php
require "../connection/conn.php";
require "admin_menu.php";

if (isset($_POST['reklam1'])) {
    $reklam1_name = $_POST['reklam1_name'];
    $reklam1_school = $_POST['reklam1_school'];
    $reklam1_speciality = $_POST['reklam1_speciality'];
    $reklam1_image = $_FILES['reklam1_image']['name'];
    $reklam1_description = $_POST['reklam1_description'];
    $reklam1_exp_date = $_POST['reklam1_exp_date'];
	
	 // Handle image upload for reklam1
$target_dir = "../image/reklam_image/";
$timestamp = date("Y-m-d_H-i-s");
$file_name = $timestamp . "_" . basename($_FILES["reklam1_image"]["name"]);

if (!empty($_FILES["reklam1_image"]["name"])) {
    if (move_uploaded_file($_FILES["reklam1_image"]["tmp_name"], $target_dir . $file_name)) {
        $reklam1_image = $file_name;
    } else {
        $reklam1_image = "upload failed";
    }
} else {
    $reklam1_image = "no file";
}

 // Insert data into the database
$query = "INSERT INTO `reklam1` (reklam1_name, reklam1_school, reklam1_speciality, reklam1_image, reklam1_description, reklam1_exp_date) 
          VALUES ('$reklam1_name', '$reklam1_school', '$reklam1_speciality', '$reklam1_image', '$reklam1_description', '$reklam1_exp_date')";

    if ($conn->query($query) === TRUE) {
        echo "New record created successfully.";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}

// Check if the form is submitted for reklam2
if (isset($_POST['reklam2'])) {
    $name = $_POST['name'];
    $school = $_POST['school'];
    $speciality = $_POST['speciality'];
    $exp_date = $_POST['exp_date'];

    // Handle image upload for reklam2
    $target_dir = "../image/reklam_image/";
    $timestamp = date("Y-m-d_H-i-s"); 
    $file_name = $timestamp . "_" . basename($_FILES["image"]["name"]);

    if (!empty($_FILES["image"]["name"])) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir . $file_name)) {
            $image = $file_name;
        } else {
            $image = "upload failed";
        }
    } else {
        $image = "no file";
    }

    // Insert data into the database for reklam2
    $insert_query = "INSERT INTO `reklam2` (reklam2_name, reklam2_school, reklam2_speciality, reklam2_exp_date, reklam2_image) 
                     VALUES ('$name', '$school', '$speciality', '$exp_date', '$image')";

    if ($conn->query($insert_query) === TRUE) {
        echo "<script>alert('Record added successfully!');</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}


// Include your database connection here
// include('db_connection.php');

// Check if the form is submitted
if (isset($_POST['submit_reklam3'])) {
    // Check if form data is not empty
    
    $exp_date = $_POST['reklam3_exp_date'];

    // Handle image upload for reklam3
    $target_dir = "../image/reklam_image/";
    $timestamp = date("Y-m-d_H-i-s"); 
    $file_name = $timestamp . "_" . basename($_FILES["reklam3_image"]["name"]);

    if (!empty($_FILES["reklam3_image"]["name"])) {
        if (move_uploaded_file($_FILES["reklam3_image"]["tmp_name"], $target_dir . $file_name)) {
            $image = $file_name;
        } else {
            $image = "upload failed";
        }
    } else {
        $image = "no file"; // Handle no file scenario
    }

    // Insert data into the database for reklam3
    $insert = "INSERT INTO `reklam3`(`reklam3_image`, `reklam3_exp_date`) VALUES ('$image','$exp_date')";
    
    // Debugging the query
    echo "SQL Query: $insert";

    if ($conn->query($insert) === TRUE) {
        echo "<script>alert('Record added successfully!');</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}





$query_reklam1 = "SELECT * FROM `reklam1`";
$result_reklam1 = $conn->query($query_reklam1);

$query_reklam2 = "SELECT * FROM `reklam2`";
$result_reklam2 = $conn->query($query_reklam2);

$query_reklam3 = "SELECT * FROM `reklam3`";
$result_reklam3 = $conn->query($query_reklam3);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reklam Management</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <!-- Form for reklam1 -->
    <div class="card mb-4">
        <div class="card-header">
            <h4 class="text-primary">Insert New Reklam1</h4>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="reklam1_name">Name</label>
                            <input type="text" name="reklam1_name" id="reklam1_name" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="reklam1_school">School</label>
                            <input type="text" name="reklam1_school" id="reklam1_school" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="reklam1_speciality">Speciality</label>
                            <input type="text" name="reklam1_speciality" id="reklam1_speciality" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="reklam1_image">Image</label>
                            <input type="file" name="reklam1_image" id="reklam1_image" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="reklam1_description">Description</label>
                    <textarea name="reklam1_description" id="reklam1_description" class="form-control" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="reklam1_exp_date">Expiration Date</label>
                    <input type="date" name="reklam1_exp_date" id="reklam1_exp_date" class="form-control" required>
                </div>
                <button type="submit" name="reklam1" class="btn btn-primary mt-3">Add Reklam1</button>
            </form>
        </div>
    </div>

    <!-- Form for reklam2 -->
    <div class="card mb-4">
        <div class="card-header">
            <h4 class="text-primary">Insert New Reklam2</h4>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
				<div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                </div>
                <div class="mb-3">
                    <label for="school" class="form-label">School</label>
                    <input type="text" class="form-control" id="school" name="school" required>
                </div>
                <div class="mb-3">
                    <label for="speciality" class="form-label">Speciality</label>
                    <input type="text" class="form-control" id="speciality" name="speciality" required>
                </div>
                <div class="mb-3">
                    <label for="exp_date" class="form-label">Expiration Date</label>
                    <input type="date" class="form-control" id="exp_date" name="exp_date" required>
                </div>
             
                <button type="submit" name="reklam2" class="btn btn-primary mt-3">Add Reklam2</button>
            </form>
        </div>
    </div>




<!-- Insert Form -->
<div class="card mb-4">
    <div class="card-header">
        <h4 class="text-primary">Insert New Reklam3</h4>
    </div>
    <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <div class="form-group">
                    <label for="reklam3_image">Image</label>
                    <input type="file" class="form-control" id="reklam3_image" name="reklam3_image" required>
                </div>
                <div class="form-group">
                    <label for="reklam3_exp_date">Expiration Date</label>
                    <input type="date" class="form-control" id="reklam3_exp_date" name="reklam3_exp_date" required>
                </div>
                <button type="submit" class="btn btn-primary mt-3" name="submit_reklam3">Add Reklam3</button>
            </div>
        </form>
    </div>
</div>

<!-- Table -->
<hr>
<hr>


    <!-- Display Reklam1 List -->
    <h2 class="text-primary">Reklam1 List</h2>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
					 <th>Image</th>
                    <th>School</th>
                    <th>Speciality</th>
                   
                    <th>Description</th>
                    <th>Expiration Date</th>
					<th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($result_reklam1)) { ?>
                    <tr>
                        <td><?php echo $row['reklam1_id']; ?></td>
                        <td><?php echo $row['reklam1_name']; ?></td>
                        <td><img src="../image/reklam_image/<?php echo $row['reklam1_image']; ?>" alt="Image" style="width: 100px;"></td>
                        <td><?php echo $row['reklam1_school']; ?></td>
                        <td><?php echo $row['reklam1_speciality']; ?></td>

                        <td><?php echo $row['reklam1_description']; ?></td>
                       
					   
					   				<td><?php echo $row['reklam1_exp_date']; ?>
				<a href="javascript:void(0);" onclick="showDatePicker('<?php echo $row['reklam1_id']; ?>')">
					<i class="fa fa-calendar"></i> <!-- Calendar Icon -->
				</a>
				
				<!-- Date picker form for reklam2 -->
				<form id="updateDateForm_<?php echo $row['reklam1_id']; ?>" action="" method="POST" style="display: none;">
					<input type="date" class="form-control" name="new_date" value="<?php echo $row['reklam1_exp_date']; ?>" required>
					<input type="hidden" name="id" value="<?php echo $row['reklam1_id']; ?>">
					<button type="submit" name="submit1" class="btn btn-primary mt-3">Update</button>
				</form>
			</td>

			<script>
				function showDatePicker(id) {
					var form = document.getElementById('updateDateForm_' + id);
					form.style.display = (form.style.display === 'none') ? 'block' : 'none';
				}
			</script>
			
			<?php


				if (isset($_POST['submit1'])) {
					$id = $_POST['id'];
					$new_date = $_POST['new_date'];

					// Update the expiration date in the database
					$update_query = "UPDATE reklam1 SET reklam1_exp_date = '$new_date' WHERE reklam1_id = '$id'";

					if ($conn->query($update_query) === TRUE) {
						// Alert message and redirect back to the page
						echo "<script>alert('Date updated successfully!'); window.location.href = 'reklam.php';</script>";
					} else {
						echo "<script>alert('Error: " . $conn->error . "'); window.location.href = 'reklam.php';</script>";
					}
				}
				?>
					   
					   
						<td><a href="reklam1_delete.php?id=<?php echo $row['reklam1_id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this Reklam?')">Delete</a></td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Display Reklam2 List -->
	<hr>
<hr>

    <h2 class="text-primary">Reklam2 List</h2>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
					<th>Image</th>
                    <th>School</th>
                    <th>Speciality</th>
                    <th>Expiration Date</th>
					<th>Action</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($result_reklam2)) { ?>
                    <tr>
                        <td><?php echo $row['reklam2_id']; ?></td>
                        <td><?php echo $row['reklam2_name']; ?></td>
                        <td><img src="../image/reklam_image/<?php echo $row['reklam2_image']; ?>" alt="Image" style="width: 100px;"></td>
                        <td><?php echo $row['reklam2_school']; ?></td>
                        <td><?php echo $row['reklam2_speciality']; ?></td>
						<td><?php echo $row['reklam2_exp_date']; ?>
				<a href="javascript:void(0);" onclick="showDatePicker('<?php echo $row['reklam2_id']; ?>')">
					<i class="fa fa-calendar"></i> <!-- Calendar Icon -->
				</a>
				
				<!-- Date picker form for reklam2 -->
				<form id="updateDateForm_<?php echo $row['reklam2_id']; ?>" action="" method="POST" style="display: none;">
					<input type="date" class="form-control" name="new_date" value="<?php echo $row['reklam2_exp_date']; ?>" required>
					<input type="hidden" name="id" value="<?php echo $row['reklam2_id']; ?>">
					<button type="submit" name="submit2" class="btn btn-primary mt-3">Update</button>
				</form>
			</td>

			<script>
				function showDatePicker(id) {
					var form = document.getElementById('updateDateForm_' + id);
					form.style.display = (form.style.display === 'none') ? 'block' : 'none';
				}
			</script>
			
			<?php


				if (isset($_POST['submit2'])) {
					$id = $_POST['id'];
					$new_date = $_POST['new_date'];

					// Update the expiration date in the database
					$update_query = "UPDATE reklam2 SET reklam2_exp_date = '$new_date' WHERE reklam2_id = '$id'";

					if ($conn->query($update_query) === TRUE) {
						// Alert message and redirect back to the page
						echo "<script>alert('Date updated successfully!'); window.location.href = 'reklam.php';</script>";
					} else {
						echo "<script>alert('Error: " . $conn->error . "'); window.location.href = 'reklam.php';</script>";
					}
				}
				?>
			
						<td><a href="reklam2_delete.php?id=<?php echo $row['reklam2_id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this Reklam?')">Delete</a></td>
						
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Display Reklam3 List -->
	<hr>
<hr>

    <h2 class="text-primary">Reklam3 List</h2>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Expiration Date</th>
					<th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($result_reklam3)) { ?>
                    <tr>
                        <td><?php echo $row['reklam3_id']; ?></td>
                        <td><img src="../image/reklam_image/<?php echo $row['reklam3_image']; ?>" alt="Image" style="width: 100px;"></td>
                        <td><?php echo $row['reklam3_exp_date']; ?></td>
						<td>
    <?php echo $row['reklam3_exp_date']; ?>
    <a href="javascript:void(0);" onclick="showDatePicker('<?php echo $row['reklam3_id']; ?>')">
        <i class="fa fa-calendar"></i> <!-- Calendar Icon -->
    </a>
    
   
    <form id="updateDateForm_<?php echo $row['reklam3_id']; ?>" action="" method="POST" style="display: none;">
        <input type="date"  class="form-control" name="new_date" value="<?php echo $row['reklam3_exp_date']; ?>"required>
        <input type="hidden" name="id" value="<?php echo $row['reklam3_id']; ?>">
        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
</td>
<script>
    function showDatePicker(id) {
        var form = document.getElementById('updateDateForm_' + id);
        form.style.display = (form.style.display === 'none') ? 'block' : 'none';
    }
</script>
<?php


if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $new_date = $_POST['new_date'];

    // Update the expiration date in the database
    $update_query = "UPDATE `reklam3` SET `reklam3_exp_date` = '$new_date' WHERE `reklam3_id` = '$id'";

    if ($conn->query($update_query) === TRUE) {
        // Alert message and redirect back to the page
        echo "<script>alert('Date updated successfully!'); window.location.href = 'reklam.php';</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "'); window.location.href = 'reklam.php';</script>";
    }
}
?>



						<td><a href="reklam3_delete.php?id=<?php echo $row['reklam3_id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this Reklam?')">Delete</a></td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>

<script src="../js/bootstrap.bundle.min.js"></script>

</body>
</html>
