<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <h1>LOGIN</h1>    
        <form action="#" method="POST">
            <input type="text" name="username" placeholder="username"> <br>
            <input type="password" name="password" placeholder="password"> <br>

            <input type="submit" name="login" value="Login" class="btn">
            <div class="signup">
                New Member? <a href="form.php">SignUp</a>
            </div>
        </form>
    </div>
</body>
</html>

<?php
include("conn.php");
if(isset($_POST["login"]))
{
    $username = $_POST['username'];
    $pswd = $_POST['password'];

    $query = "SELECT * FROM form where email = '$username' && password = '$pswd'";
    $data = mysqli_query($conn, $query);

    $total = mysqli_num_rows($data);

    if($total==1)
    {
        $_SESSION['user_name'] =$username;
        header('location:display.php');
    }
    else{
        echo "Login Failed!!";
    }
}
?>