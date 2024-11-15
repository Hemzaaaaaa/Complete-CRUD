<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signUp.css">
    <title>Login</title>
    <style>
        .form{
            width: 280px;
            height: 350px;
        }
    </style>
</head>
<body>

    <?php
        require('./connection.php');
        if (isset($_POST['login_btn'])){
            $_SESSION['validate'] = false;
            $name = $_POST['name'];
            $password = $_POST['password'];
            $p = curd::conect()->prepare('SELECT * FROM curdtable WHERE name=:n and pass=:p');
            $p->bindValue(':n', $name);
            $p->bindValue(':p', $password);
            $p->execute();
            $d = $p->fetch(PDO::FETCH_ASSOC);
            if ($p->rowCount() > 0) {
                $_SESSION['name'] = $name;
                $_SESSION['pass'] = $password;
                $_SESSION['validate'] = true;
                header('location:home.php');
            } else{
                echo 'Make sure that you are registered';
            }
        }
    ?>

    <div class="form">
        <div class="title">
            <p>Login form</p>
        </div>
        <form action="" method="post">
            <input type="text" name="name" placeholder="Name" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Login" name="login_btn">
        </form>
    </div>
</body>
</html>