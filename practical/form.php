<?php
include("conn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD OPERATION</title>
</head>
<body>
    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="title">
                Registration form
            </div>
            <div class="form">
                <div class="input_field">
                    <label for="">First Name</label>
                    <input type="text" class="input" name="fname" required>
                </div>
                <div class="input_field">
                    <label for="">Last Name</label>
                    <input type="text" class="input" name="lname" required>
                </div>
                <div class="input-field">
                    <label for="">Gender</label>
                    <select name="gender" id="">
                        <option value="Not selected">Select</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="input_field">
                    <label for="">Email</label>
                    <input type="email" class="input" name="email" required>
                </div>
                <div class="input_field">
                    <label for="">Password</label>
                    <input type="password" class="input" name="password" required>
                </div>
                <div class="input-field">
                    <input type="submit" name="register" value="Register" class="btn">
                </div>
            </div>
        </form>
    </div>
</body>
</html>

<?php
if(isset($_POST['register'])) {
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $gender = $_POST['gender'];
    $email = trim($_POST['email']);
    $pswd = trim($_POST['password']);

    // Validate the inputs
    if($fname !== "" && $lname !== "" && $gender !== "Not selected" && $email !== "" && $pswd !== "") {
        
        // Validate first name and last name
        if(!preg_match("/^[a-zA-Z ]*$/", $fname)) {
            echo "Only letters and white space allowed in First Name!";
            exit;
        }

        if(!preg_match("/^[a-zA-Z ]*$/", $lname)) {
            echo "Only letters and white space allowed in Last Name!";
            exit;
        }

        // Validate email format
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format!";
            exit;
        }

        // Validate password length
        if(strlen($pswd) <= 6) {
            echo "Password must be greater than 6 characters!";
            exit;
        }

        // Check if email already exists in the database
        $email_query = "SELECT * FROM form WHERE email='$email'";
        $result = mysqli_query($conn, $email_query);
        if(mysqli_num_rows($result) > 0) {
            echo "Email already exists!";
            exit;
        }

        // Insert data into the database
        $query = "INSERT INTO form (fname, lname, gender, email, password) VALUES ('$fname', '$lname', '$gender', '$email', '$pswd')";
        $data = mysqli_query($conn, $query);
        if($data) {
            echo "Data Inserted Successfully!!";
        } else {
            echo "Failed to insert data.";
        }
    } else {
        echo "<script>alert('Fill the form first!')</script>";
    }
}
?>
