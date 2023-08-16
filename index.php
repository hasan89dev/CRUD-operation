<?php
include 'db_con.php';  
$err_name= $err_email= $err_dept='';
// working of submit button..........................
if(isset($_POST['add_student'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $dept=$_POST['dept'];

    // validation check..........................
     if(empty($name)){
        $err_name= "name is required";
    }
    else if(empty($email)){
        $err_email="email is required";
    }
    else if(empty($dept)){
        $err_dept="department is required";
    }

    else{
        // insert information into database.................................  
    $insert="INSERT INTO studentt(name,email,department) values('$name','$email','$dept')";
    $ex=mysqli_query($con,$insert);
    }
   
}


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <h1 class="bg-dark text-center p-2 text-white">ADD STUDENT</h1>

        <div class="row">
        <div class="col-lg-5">
            <!-- form creation for taking inputs -->
            <form action="" method="POST">
                <label for="">enter student name</label>
                <input type="text" class="form-control" name="name">
                <span class="text-warning"> <?php echo $err_name ?> </span><br>
                <label for="">enter student email</label>
                <input type="email" class="form-control" name="email">
                <span class="text-warning"> <?php echo $err_email ?> </span><br>
                <label for="">enter student department</label>
                <input type="text" class="form-control" name="dept">
                <span class="text-warning"> <?php echo $err_dept ?> </span><br>
                <button name="add_student" class="btn btn-primary m-2">submit</button>
            </form>
        </div>
        <div class="col-lg-7">
            <!-- table creation............... -->
            <table class="table">
                <thead>
                    <th>id</th>
                    <th>name</th>
                    <th>email</th>
                    <th>department</th>
                    <th>edit</th>
                    <th>delete</th>
                    
                </thead>

                <tbody>
             <?php

            //  query for selection of all info from the database.........................
             $select= "SELECT * FROM studentt";
             $exq=mysqli_query($con,$select);

             while($row=mysqli_fetch_array($exq)){ ?>
                  
                  <tr>
                    <td> <?php echo $row['id'] ?> </td>
                    <td> <?php echo $row['name'] ?> </td>
                    <td> <?php echo $row['email'] ?> </td>
                    <td> <?php echo $row['department'] ?> </td>
                    <td><a href="edit.php?edit_id=<?php echo $row ['id'] ?>"><button class="btn btn-success">edit</button></a></td>
                    <td><a onclick="return confirm('are you sure you want to delete')" href="delete.php?delete_id=<?php echo $row['id']  ?>"><button class="btn btn-warning">delete</button></a></td>
                  </tr>
             <?php }
             ?>
                    
                </tbody>
           </table>
        </div>
    </div>

    </div>

 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  </body>
</html>