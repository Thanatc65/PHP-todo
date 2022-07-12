<?php
include('server.php');

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email='$email' and password='$password'";
    $find = mysqli_query($conn, $query);

    if (mysqli_num_rows($find) == 1) {
        $user = mysqli_fetch_array($find);

        $_SESSION['email'] = $user['email'];
        $_SESSION['uid'] = $user['uid'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['password'] = $user['password'];

        header('location: todo.php');
    } else {
        echo "<script>alert('Wrong email or password')</script>";
    }
}
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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Todo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mr-3 ml-3">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item mr-3 ml-3">
                    <a class="nav-link" href="regist.php">Regist</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="card border-light mx-auto mt-5" style="max-width: 80vh;">
            <div class="card-body">
                <h1>Login</h1>
                <hr>
                <form method="POST" action="login.php">
                    <div class="form-group">
                        Email:
                        <input class="form-control" type="email" name="email">
                    </div>
                    <div class="form-group">
                        Password:
                        <input class="form-control" type="password" name="password">
                        Don't have accont ? regist <a href="regist.php">Here</a>
                    </div>
                    <button class="btn btn-primary btn-lg mt-5 w-100" type="submit" name="login">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>