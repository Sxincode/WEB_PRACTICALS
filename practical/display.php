<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
</head>
<body>

</body>
</html>

<?php
include("conn.php");

$userprofile = $_SESSION['user_name'];
if($userprofile)
{

}
else{
    header('location:login.php');
}

$query = "SELECT * from form";
$data = mysqli_query($conn,$query);
$total = mysqli_num_rows($data);

if($total!=0)
{
?>
    <h2>Displaying All Records</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Operations</th>
        </tr>
<?php
while($result = mysqli_fetch_assoc($data))
{
    echo"
        <tr>
            <td>".$result['id']."</td>
            <td>".$result['fname']."</td>
            <td>".$result['lname']."</td>
            <td>".$result['gender']."</td>
            <td>".$result['email']."</td>
            <td>
                <a href='update.php?id=$result[id]'>
                <input type='submit' value='update' class='update'>
                </a>

                <a href='delete.php?id=$result[id]'>
                <input type='submit' onclick='return checkdelete()' value='delete' class='delete'>
                </a>
            </td>
        </tr>
            ";
}

}
else{
    echo "No record found!!";
}
?>
</table>

<script>
    function checkdelete()
    {
        return confirm("Are you sure to delete this data!!");
    }
</script>
<a href="logout.php">
    <input type="submit" name="" value="LogOut">
</a>

