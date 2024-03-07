<?php
    session_start();
    if(isset($_SESSION["user"])){
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <style>
        body{ 
        background-color: #5A6168; 
        }
    </style>

<section class="vh-100 gradient-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
    <div class="card bg-dark text-white" style="border-radius: 1rem;">
    <div class="card-body p-5 text-center">
    <div class="mb-md-5 mt-md-4 pb-5">

        <?php
            if(isset($_POST["login"])){
                $email=$_POST["email"];
                $password=$_POST["password"];
                    require_once "database.php";
                    $sql="SELECT * FROM user WHERE email='$email'";
                    $result=mysqli_query($conn, $sql);
                    $user=mysqli_fetch_array($result, MYSQLI_ASSOC);
                    if ($user) {
                        if (password_verify($password, $user["password"])) {
                            $_SESSION["user"]="yes";
                            $_SESSION["loggedin"]=true;
                            $_SESSION["user_id"] = $user['id'];
                            $_SESSION["email"] = $email;
                            header("Location: index.php");
                            die();
                        } else {
                            echo "<div class='alert alert-danger'> Password does not match</div>";
                        }
                    } else {
                        echo "<div class='alert alert-danger'>Email does not match </div>";
                    }
                }
        ?>

        <form action="login.php" method="post">
        <h2>Shiva G. Natal's<br>Personal Website</h2>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            
            <div class="form-btn">
                <input type="submit" value="Login" name="login" class="btn btn-primary">
            </div>
            
        </form>
        <div><p>Not Registered yet? <a href="registration.php">Register Here</a></div>
    </div>

</body>
</html>