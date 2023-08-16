<?php
include "db_con.php";

$get= $_GET['edit_id'];
$select= "SELECT * FROM studentt WHERE id= $get";
$exee= mysqli_query($con,$select);
$fetch=mysqli_fetch_array($exee);

if(isset($_POST['edit_student'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $dept=$_POST['dept'];

    $edit= "UPDATE studentt SET name='$name', email='$email', department='$dept' WHERE id='$get'";
    $execute=mysqli_query($con,$edit);

    header("location:index.php");
}

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  </head>
  <body>
   <div class="container">
    <div class="row">
           <form action="" method="POST">
                <label for="">enter student name</label>
                <input value="<?php echo $fetch['name'] ?>" type="text" class="form-control" name="name">
               
                <label for="">enter student email</label>
                <input value="<?php echo $fetch['email'] ?>" type="email" class="form-control" name="email">
                
                <label for="">enter student department</label>
                <input value="<?php echo $fetch['department'] ?>" type="text" class="form-control" name="dept">
               
                <button name="edit_student" class="btn btn-primary m-2">edit</button>
            </form>
    </div>
   </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  </body>
</html>