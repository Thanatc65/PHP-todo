<?php
include('server.php');

if(isset($_POST['add'])){
    $name = $_POST['name'];
    $des = $_POST['des'];
    $time = $_POST['time'];
    $date = $_POST['date'];
    $uid = $_POST['uid'];
    $DBtime = date('H:i', strtotime($time));

    $set = "INSERT INTO lists(list_name,list_des,list_time,list_date,users_uid) VALUE('$name','$des','$DBtime','$date','$uid')";
    $query = mysqli_query($conn,$set);

}
if(isset($_GET['del'])){
    $id = $_GET['del'];
    $del = "DELETE FROM lists WHERE id = $id";
    mysqli_query($conn,$del);

    echo "<script>alert('Deleted Successfully')</script>";
}
$uid = $_SESSION['uid'];
$selec = "SELECT * FROM users where uid = '$uid'";
$sel = mysqli_query($conn,$selec);
$user = mysqli_fetch_assoc($sel);


$select = "SELECT * FROM lists where users_uid = '$uid'";
$sel = mysqli_query($conn,$select);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="path/to/fontawesome.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div class="row">
        <div class="col-2">
            <div class="text-white bg-dark" style="width: 30vh;height: 100vh; position:fixed;">
                <ul class="nav nav-pills flex-column mb-auto">
                    <li>
                        <a href="todo.php" class="nav-link text-white active mt-3">
                            Todo
                        </a>
                    </li>
                    <li>
                        <a href="today.php" class="nav-link text-white">
                            Today Planed
                        </a>
                    </li>
                    <li>
                        <a href="important.php" class="nav-link text-white">
                            Important
                        </a>
                    </li>
                    <li>
                        <div class="btn-group dropup ">
                            <a style="margin-top: 70vh;" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $user['name']; ?>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="profile.php">Profile</a>
                                <a class="dropdown-item" href="index.php">Logout</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container">
            <h1 class="mt-4">Todo</h1>
            <hr>
            <div class="row">
                <div class="col">
                    <div class="card w-100 mt-5">
                        <div class="card-body">
                            <div class="row align-items-center d-flex justify-content-center">            
                                <a href="add.php"><i class="fa-solid fa-plus fa-5x"></i></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php while($row = mysqli_fetch_assoc($sel)) { ?>
            <div class="row">
                <div class="col">
                    <div class="card w-100 mt-5">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <h1 class="card-text ml-5"><?php echo $row['list_time'] ?><br><?php echo $row['list_date'] ?></h1>
                                <h1 class="card-text col-sm ml-5"><?php echo $row['list_name'] ?><br>
                                <small style="font-size:16px;"><?php echo $row['list_des'] ?>
                            </small></h1>
                                <a href="todo.php?del=<?php echo $row['id'];?>" class="mr-4"><i class="fa fa-check-circle fa-8x" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</body>

</html>