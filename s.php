<?php include 'header.php'; ?>


<!-- front side handling -->
<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <head>
        <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>School Admission Form</title>
                <!-- Bootstrap CSS -->
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
                <!-- Custom CSS -->
                <style>   
                     body {
                        background-color: #f5f5f5;
                        font-family: Arial, sans-serif;
                    }

                    .container {
                        max-width: 850px;
                        margin: 50px auto;
                        padding: 30px;
                        border-radius: 10px;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                        background-color: #fff;
                    }

                    h2 {
                        color: #007bff;
                        text-align: center;
                        margin-bottom: 30px;
                    }

                    .form-label {
                        color: #007bff;
                        font-weight: bold;
                    }

                    .form-control {
                        border-color: #007bff;
                    }

                    .btn-primary {
                        background-color: #007bff;
                        border-color: #007bff;
                    }

                    .btn-primary:hover {
                        background-color: #0056b3;
                        border-color: #0056b3;
                    }

                    .upper-section {
                        display: flex;
                        justify-content: space-between;
                    }

                    .left-section {
                        width: 48%; /* Adjusted width to accommodate both elements */
                    }

                    .right-section {
                        width: 48%; /* Adjusted width to accommodate both elements */
                    }

                    .image-show img {
                        width: 80%;
                        height: auto;
                        margin-left: 40px;
                    }

                    .image-upload {
                        text-align: center;
                        margin-left: 30px;
                    }

                    .btn-primary {
                        float: right;
                        margin-top: 10px;
                    }

                    .lower-section {
                        margin-top: 20px;
                        overflow: hidden; /* Clear floats */
                    }

                    .form-group {
                        margin-bottom: 10px;
                    }

                    .form-control {
                        width: 100%;
                    }

                    /* Modal styles */
                    .modal {
                        display: none; /* Initially hidden */
                        position: fixed; /* Stay in place */
                        z-index: 1; /* Sit on top */
                        left: 0;
                        top: 0;
                        width: 100%; /* Full width */
                        height: 100%; /* Full height */
                        overflow: auto; /* Enable scroll if needed */
                        background-color: rgba(0,0,0,0.4); /* Transparent black */
                    }

                    .modal-content {
                        position: relative;
                        background-color: #fefefe;
                        margin: 15% auto; /* 15% from top and centered */
                        padding: 20px;
                        border: 1px solid #888;
                        max-width: 700px; /* Maximum width set to 700px */
                        width: 80%; /* Fallback width for larger screens */
                        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
                        animation-name: animatetop;
                        animation-duration: 0.4s;
                    }

                    .modal-content h2 {
                        text-align: center;
                        margin-bottom: 20px;
                    }

                    .modal-content p {
                        margin-bottom: 10px;
                    }

                    /* Adjustments for smaller screens */
                    @media screen and (max-width: 300px) {
                        .container {
                            padding: 10px;
                        }
                    }
                    .close {
                        position: absolute;
                        top: 10px;
                        right: 10px;
                        cursor: pointer;
                    }

                    .info-area {
                        display: flex;
                        align-items: flex-start; /* Adjust alignment as needed */
                    }

                    .student-info {
                        flex: 1; /* Take up remaining space */
                        padding-right: 20px; /* Add spacing between info and photo */
                    }

                    .student-photo {
                        flex: 1; /* Take up remaining space */
                        max-width: 50%; /* Adjust photo width as needed */
                        text-align: center; /* Center photo horizontally */
                    }
                </style>

            </head>
            <div class="container">
                <h2>School Admission Form</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                    <div class="upper-section">
                        <!-- Left Section -->
                        <div class="left-section">
                            <div class="form-group mb-3">
                                <label for="student_name" class="form-label">Student Name:</label>
                                <input type="text" id="student_name" name="student_name" class="form-control" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="dob" class="form-label">Date of Birth:</label>
                                <input type="date" id="dob" name="dob" class="form-control" required>
                            </div>

                            <!-- document  -->
                            <div class="form-group mb-3">
                                <!-- dob proof certificate -->
                                <div class="left">
                                    <label for="dob-proof" class="form-label">DOB Proof</label>
                                    <input type="file" id="dob_proof" name="dob_proof" class="form-control" required>

                                </div>
                                <!-- Aadhar card -->
                                <div class="right">
                                    <label for="aadhar" class="form-label">Aadhar Card</label>
                                    <input type="file" id="aadhar" name="aadhar" class="form-control" required>

                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="grade" class="form-label">Grade Applying for:</label>
                                <select id="grade" name="grade" class="form-select">
                                    <option value="">Select Grade</option>
                                    <option value="Kindergarten">Kindergarten</option>
                                    <option value="Grade 1">Grade 1</option>
                                    <option value="Grade 2">Grade 2</option>
                                    <option value="Grade 3">Grade 3</option>
                                </select>
                            </div>
                        </div>
                        <!-- Right Section -->
                        <div class="right-section">
                            <div class="image-show mb-3">
                                <img src="cute.png" alt="Student Image" id="previewImage">
                            </div>
                            <div class="image-upload">
                                <input type="file" accept="image/*" id="fileInput" name="student_image">
                            </div>
                        </div>

                    </div>
                    <!-- Lower Section -->
                    <div class="lower-section">
                        <div class="form-group">
                            <label for="parent_name">Parent/Guardian Name:</label>
                            <input type="text" id="parent_name" name="parent_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number:</label>
                            <input type="tel" id="phone" name="phone" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <textarea id="address" name="address" rows="4" class="form-control" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
    </div>
</div>


<!-- font end sript for change defoult pic to uploaded pic -->
<script>
    document.getElementById('fileInput').addEventListener('change', function() {
        var file = this.files[0];
        var reader = new FileReader();
        
        reader.onload = function(event) {
            document.getElementById('previewImage').setAttribute('src', event.target.result);
        }
        
        reader.readAsDataURL(file);
    });
</script>

<!-- form data upload -->
<?php
    
    // Function to generate unique student ID
    function generateStudentId($conn) {
        // Execute query to get the last inserted ID
       
        $result = $conn->query("SELECT MAX(enrollment_id) AS highest_enrollment_id FROM SchoolAdmission");

        // Check if the query was successful
        if ($result && $result->num_rows > 0) {
            // Fetch the row and extract the highest enrollment ID
            $row = $result->fetch_assoc();
            return "student_" . $row['highest_enrollment_id'];
        } else {
            // Return null if query fails or no rows are returned
            return null;
        }
    }


    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Include database configuration
        include 'config.php';

        // Retrieve form data
        $student_name = $_POST['student_name'];
        $dob = $_POST['dob'];
        $grade = $_POST['grade'];
        $parent_name = $_POST['parent_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        // Process student image upload if a file is selected
        $image_path_student = null;
        if (isset($_FILES['student_image']) && $_FILES['student_image']['error'] == UPLOAD_ERR_OK) {
            $image_name_student = "Std_pic." . pathinfo($_FILES['student_image']['name'], PATHINFO_EXTENSION);
            $image_tmp_name_student = $_FILES['student_image']['tmp_name'];
            $image_size_student = $_FILES['student_image']['size'];
            $image_type_student = $_FILES['student_image']['type'];

            // Generate unique student ID and create folder
            $student_id = generateStudentId($conn);
            $student_folder = "uploads/" . $student_id;
            if (!file_exists($student_folder)) {
                mkdir($student_folder, 0777, true);
            }

            // Move uploaded image to student's folder with new name
            $image_path_student = $student_folder . '/' . $image_name_student;
            move_uploaded_file($image_tmp_name_student, $image_path_student);
        }

        // Process dob_proof upload if a file is selected
        $image_path_dob_proof = null;
        if (isset($_FILES['dob_proof']) && $_FILES['dob_proof']['error'] == UPLOAD_ERR_OK) {
            $image_name_dob_proof = "dob_certificate." . pathinfo($_FILES['dob_proof']['name'], PATHINFO_EXTENSION);
            $image_tmp_name_dob_proof = $_FILES['dob_proof']['tmp_name'];
            $image_size_dob_proof = $_FILES['dob_proof']['size'];
            $image_type_dob_proof = $_FILES['dob_proof']['type'];

            // Move uploaded image to a folder with new name
            $upload_path_dob_proof = $student_folder . '/';
            $image_path_dob_proof = $upload_path_dob_proof . $image_name_dob_proof;
            move_uploaded_file($image_tmp_name_dob_proof, $image_path_dob_proof);
        }

        // Process aadhar upload if a file is selected
        $image_path_aadhar = null;
        if (isset($_FILES['aadhar']) && $_FILES['aadhar']['error'] == UPLOAD_ERR_OK) {
            $image_name_aadhar = "aadhar." . pathinfo($_FILES['aadhar']['name'], PATHINFO_EXTENSION);
            $image_tmp_name_aadhar = $_FILES['aadhar']['tmp_name'];
            $image_size_aadhar = $_FILES['aadhar']['size'];
            $image_type_aadhar = $_FILES['aadhar']['type'];

            // Move uploaded image to a folder with new name
            $upload_path_aadhar = $student_folder . '/';
            $image_path_aadhar = $upload_path_aadhar . $image_name_aadhar;
            move_uploaded_file($image_tmp_name_aadhar, $image_path_aadhar);
        }



        
            // Insert data into database
            $sql = "INSERT INTO SchoolAdmission (student_name, dob, grade, parent_name, email, phone, address, picPath, dob_proof, aadhar) 
            VALUES ('$student_name', '$dob', '$grade', '$parent_name', '$email', '$phone', '$address', '$image_path_student', '$image_path_dob_proof', '$image_path_aadhar')";

    if ($conn->query($sql) === TRUE) {
        // Retrieve the last inserted ID
        $enrollment_id = generateStudentId($conn);

        // Fetch student data using the enrollment ID
        $sql_fetch_student = "SELECT student_name, dob, grade, parent_name, email, phone, address, picPath, dob_proof, aadhar FROM schooladmission WHERE enrollment_id = $enrollment_id";
        $result = $conn->query($sql_fetch_student);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $student_name = $row['student_name'];
            $dob = $row['dob'];
            $grade = $row['grade'];
            $parent_name = $row['parent_name'];
            $email = $row['email'];
            $phone = $row['phone'];
            $address = $row['address'];
            $photo_path = $row['picPath'];
            $dob_proof_path = $row['dob_proof'];
            $aadhar_path = $row['aadhar'];
            // Display modal with student information
            echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                // Get the modal
                var modal = document.getElementById('myModal');

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName('close')[0];

                // Set student information in the modal
                document.getElementById('studentName').textContent = '$student_name';
                document.getElementById('dob').textContent = '$dob';
                document.getElementById('grade').textContent = '$grade';
                document.getElementById('parentName').textContent = '$parent_name';
                document.getElementById('email').textContent = '$email';
                document.getElementById('phone').textContent = '$phone';
                document.getElementById('address').textContent = '$address';
                document.getElementById('studentPhoto').src = '$photo_path';

                // When the page is loaded, display the modal
                modal.style.display = 'block';

                // When the user clicks on <span> (x), close the modal
                span.onclick = function() {
                    modal.style.display = 'none';
                }

                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = 'none';
                    }
                }
            });
        </script>";
    } else {
    echo "Student data not found.";
    }
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close database connection
    $conn->close();
    }
?>


<!-- Modal -->
<div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Congratulations! Student Admission is Completed </h2>
        <div class="info-area">
            <div class="student-info">
                <p><strong>Student Name:</strong> <span id="studentName"></span></p>
                <p><strong>Date of Birth:</strong> <span id="dob"></span></p>
                <p><strong>Grade:</strong> <span id="grade"></span></p>
                <p><strong>Parent/Guardian Name:</strong> <span id="parentName"></span></p>
                <p><strong>Email:</strong> <span id="email"></span></p>
                <p><strong>Phone Number:</strong> <span id="phone"></span></p>
                <p><strong>Address:</strong> <span id="address"></span></p>
            </div>
            <div class="student-photo">
                <img id="studentPhoto" src="" alt="Student Photo">
            </div>
        </div>
    </div>
</div>

        <!-- code for footer section -->
<?php include'footer.php';?>