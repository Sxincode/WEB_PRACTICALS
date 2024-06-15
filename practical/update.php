<?php
session_start();
include("conn.php");

$id = $_GET['id'];
$userprofile = $_SESSION['user_name'];
if($userprofile)
{

}
else{
    header('location:login.php');
}

$query = "SELECT * FROM form where id= '$id'";
$data = mysqli_query($conn,$query);
$total = mysqli_num_rows($data);
$result = mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE</title>
</head>
<body>
    <div class="container">
        <form action="#" method="POST">
            <div class="title">
                UPDATE DETAILS
            </div>
            <div class="form">
                <div class="input_field">
                    <label for="">First Name</label>
                    <input type="text" class="input" value="<?php echo $result['fname'];?>" name="fname" required>
                </div>
                <div class="input_field">
                    <label for="">Last Name</label>
                    <input type="text" class="input" value="<?php echo $result['lname'];?>" name="lname" required>
                </div>
                <div class="input-field">
                    <label for="">Gender</label>
                    <select name="gender" id="">
                        <option value="Not selected">Select</option>
                        <option value="Male"
                        <?php if($result['gender']=="Male")
                        {
                            echo "selected";
                        }?>
                        >Male</option>
                        <option value="Female"
                        <?php if($result['gender']=="Female")
                        {
                            echo "selected";
                        }?>>Female</option>
                    </select>
                </div>
                <div class="input_field">
                    <label for="">Email</label>
                    <input type="email" class="input" value="<?php echo $result['email'];?>" name="email" required>
                </div>
                <div class="input_field">
                    <label for="">Password</label>
                    <input type="password" class="input" value="<?php echo $result['password'];?>" name="password" required>
                </div>
                <div class="input-field">
                    <input type="submit" name="update" value="Update Details" class="btn">
                </div>
            </div>
        </form>
    </div>
</body>
</html>
<?php
    if(isset($_POST['update']))
    {
        $fname= $_POST['fname'];
        $lname= $_POST['lname'];
        $gender= $_POST['gender'];
        $email= $_POST['email'];
        $pswd= $_POST['password'];

        if($fname !="" && $lname !="" && $gender !=""&& $email !=""&& $pswd !="" ){

            $query = "UPDATE form set fname='$fname',lname='$lname',gender='$gender',email='$email',password='$pswd' where id=$id";
            $data = mysqli_query($conn,$query);
            if($data)
            {
                echo "<script>alert('Record Updated!!')</script>";
                header('location:display.php');
            }
            else{
                echo "Failed to Update";
            }
        }
        else
        {
            echo "<script>alert('Fill the form first!')</script>";
        }
    }

?>