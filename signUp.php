<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signUp.css">
    <title>Sign Up</title>
</head>
<body>

    <?php
        require('./connection.php');
        if (isset($_POST['signUP_btn'])){
            $name = $_POST['name'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $passord = $_POST['password'];
            $confiPassord = $_POST['confiPassword'];

            if(!empty($_POST['name'])&& !empty($_POST['lastName'])&& !empty($_POST['email'])&& !empty($_POST['password'])){
                if($passord == $confiPassord){
                    $p = curd::conect()->prepare('INSERT INTO curdtable(name,lastName,email,pass) VALUES(:n,:l,:e,:p)');
                    $p->bindValue(':n', $name);
                    $p->bindValue(':l', $lastName);
                    $p->bindValue(':e', $email);
                    $p->bindValue(':p', $passord);
                    $p->execute();
                    echo 'Successfully';
                } else{
                    echo 'Password does not match';
                }
            }
        }


    ?>

    <div class="form">
        <div class="title">
            <p>Sign UP form</p>
        </div>
        <form action="" method="post">
            <input type="text" name="name" placeholder="Name" required>
            <input type="text" name="lastName" placeholder="Last name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="confiPassword" placeholder="Confirm password" required>
            <input type="submit" value="Sign UP" name="signUP_btn">
        </form>
    </div>
</body>
</html>