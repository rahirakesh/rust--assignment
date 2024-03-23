<?php include 'header.php'; ?>

<?php
function getProjectId($conn, $projectName) {
    // Escape project name to prevent SQL injection
    $escapedProjectName = mysqli_real_escape_string($conn, $projectName);
    
    // Query to retrieve id based on project name
    $sql = "SELECT id FROM project_details WHERE project = '$escapedProjectName'";
    
    // Execute the query
    $result = $conn->query($sql);
    
    // Check if the query was successful and if a row was returned
    if ($result && $result->num_rows > 0) {
        // Fetch the row and return the id
        $row = $result->fetch_assoc();
        return $row['id'];
    } else {
        // Return null if no matching project found
        return null;
    }
}

$project1 = null;
if (isset($_POST["details"]) && isset($_SESSION['name'])) {
    $projectName = $_SESSION['name'];
    $id = getProjectId($conn, $projectName);           
    $sql2 = "SELECT * FROM project_details WHERE id='$id'";
    $result = $conn->query($sql2);
    $row = $result->fetch_assoc();  
    $_SESSION['name'] = $row['project'];
    $_SESSION['project_id'] = $id;
}

if (isset($_POST["submit"]) && isset($_SESSION['name'])) {
    $projectName = $_SESSION['name'];
    $id = getProjectId($conn, $projectName);
    $module = isset($_POST["module"]) ? $_POST["module"] : ''; // Check if 'module' is set
    $startdate = isset($_POST["start"]) ? $_POST["start"] : ''; // Check if 'start' date is set
    $deadline = isset($_POST["deadline"]) ? $_POST["deadline"] : ''; // Check if 'deadline' is set
    
    // Your SQL query to insert into the 'modules' table with 'project_id', 'module_name', 'start_date', and 'deadline'
    $sql = "INSERT INTO modules (project_id, module_name, startdate, deadline, createdAt)
            VALUES ('$id', '$module', '$startdate', '$deadline', '$date')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script type='text/javascript'>alert('Module Added Successfully');</script>";
    } else {
        $errortext = "Error: " . $sql . "<br>" . $conn->error;
        echo "<script type='text/javascript'>alert('$errortext');</script>";
    }
}
?>

<div class="page-wrapper">            
    <div class="container-fluid">   
        <table class="table" style="color: black;">
            <tr>
                <td>Project Name: <strong><?php echo $_SESSION['name']; ?><strong></td>                        
                <td>
                    <button type="button" data-toggle="modal" data-target="#mymodal" class="btn btn-success">+</button>                            
                </td>
            </tr>
        </table>
        <form class="form-horizontal form-material" action="" enctype="multipart/form-data" method="POST">
            <div class="modal" id="mymodal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"><b><?php echo $_SESSION['name']; ?></b></h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <p>Milestone Name</p>
                                <input type="text" name="module" required>

                                <p>Start Date</p>
                                <input type="date" name="start" required>
                                <p>Deadline</p>
                                <input type="date" name="deadline" required>

                                <input type="date" name ="start" required>
                                <input type="date" name ="deadline" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="submit" class="btn btn-primary">Add Module</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- Column -->
        <div class="col-md-12">
            <div class="row">
                <?php
                if(isset($_POST["update"])) {
                    $id = $_POST['mid'];
                    $module = $_POST['module'];
                    $sql = "UPDATE modules SET module_name='$module' WHERE id='$id'";
                    if ($conn->query($sql) === TRUE) {
                        echo "<script type='text/javascript'>alert('Project Updated Successfully');</script>";
                    } else {
                        $errortext = "Error: " . $sql . "<br>" . $conn->error;
                        echo "<script type='text/javascript'>alert('$errortext');</script>";
                    }
                }

                if(isset($_POST['delete'])) {
                    $delete = $_POST['delete'];
                    $sql = "DELETE FROM modules WHERE id='$delete'";
                    if ($conn->query($sql) === TRUE) {
                        echo "<script type='text/javascript'>alert('Project Deleted Successfully');</script>";
                    } else {
                        $errortext = "Error: " . $sql . "<br>" . $conn->error;
                        echo "<script type='text/javascript'>alert('$errortext');</script>";
                    }
                }
                $sql3 ="SELECT * FROM modules";
                $result3 = $conn->query($sql3);
                if($result3->num_rows > 0) {
                    while($row3 = $result3->fetch_assoc()) { 
                        ?>
                        <div class="card">
                            <div class="card-body" style="border: 1px solid black;">
                                <form class="form-horizontal form-material" action="sub_modules.php" enctype="multipart/form-data" method="POST">
                                    <button type="submit" name="button" value="<?php echo $row3['id']; ?>" class="btn btn-warning text-center" role="button" style="width: 150px; margin-bottom:5px;"><?php echo $row3['module_name']; ?></button>
                                </form><br>
                                <div class="col md-4">
                                    <form class="form-horizontal form-material" action="modules_update.php" enctype="multipart/form-data" method="POST">
                                        <button type="submit" name="edit" class="btn btn-primary" value="<?php echo $row3['id']; ?>">Edit</button>
                                        <button type="submit" name="delete" class="btn btn-danger" value="<?php echo $row3['id']; ?>">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
        <!-- End Column -->
    </div> 
</div>


<!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            <!-- </div> -->
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
<!-- 
</?php
if (isset($_POST["edit"]))
{
	
	$id = $_POST["edit"];
	$sql2 = "SELECT * FROM modules WHERE id='$id'";
	$result = $conn->query($sql2);
	$row = $result->fetch_assoc();
    $id=$row['id'];
    $module_name = $row['module_name'];
}
?>
<form class="form-horizontal form-material" action="" enctype="multipart/form-data" method="POST">
    <div class="modal" id="mmodal">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b><?php echo $_SESSION['name']; ?></b></h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>Project id</p>
                <input type="text" name="id" value="<?php echo $id ?>" readonly>
                <br><br>
                <p>Module Name</p>
                <input type="text" name="module" value="$module_name" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Add Module</button>
            </div>
            </div>
        </div>
    </div>
</form> 
< ?php ?> -->


<?php include 'footer.php'; ?>
