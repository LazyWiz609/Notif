<?php
session_start();

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("Location: userindex.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo - A To-Do List for the forgettable ones</title>

<!-- All the CSS goes here. -->
    <style>
        .notes{
            display: inline-block;
            background-color: #1A1B1D;
            text-align: center;
            padding: 2%;
            font-size: x-small;
            margin: 1%;
            box-shadow: 4px 6px 4px 0px rgba(0, 0, 0, 0.50);
        }

        .container{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Full viewport height */
        }

        .signup{
            outline: none;
            border: none;
            border-bottom: 2px solid black ;
            background-color: transparent;
            font-family: 'Times New Roman', Times, serif;
            color: white;
            height: 6vh;
            width: 20vw;
            margin-bottom: 10%;
            box-sizing: border-box ;
            padding-left: 8px;
        }

        
        .signup:focus{
            outline: none;
            transition: 500ms;
            border-bottom: 2px solid white;
            background-color: transparent;
        }

        .login{
            color: white;
        }

        .login:hover{
            text-decoration: underline;
        }

        .submit{
            display: inline-block;
            color: white;
            font-family: Ink Free;
            background-color: #1A1B1D;
            padding: 10px;
        }
        @media screen and (max-width: 768px){
            .notes{
                padding: 5%;
                width: 75%;
            }
            .signup{
                width: 60vw;
            }
            .lg{
                margin-bottom: 10%;
            }
        }
    </style>
<!-- End of CSS. -->

</head>
<body>
<!-- This is the div for navbar. -->

<?php 
function start_session() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}
require 'partials/nav.php' 
?>
    <?php
    $showAlert = null;
    if($_SERVER ["REQUEST_METHOD"] == "POST"){
            include 'partials/dbconnect.php';
            $name = $_POST["username"];
            $pass = $_POST["password"]; 
            $email = $_POST["email"];
            $sql = "SELECT * FROM `user` WHERE `username` = '$name'";
            $result = mysqli_query($conn, $sql);
            $exists = mysqli_num_rows($result);
            $sql = "SELECT * FROM `user` WHERE `email` = '$email'";
            $result = mysqli_query($conn, $sql);
            $exists2 = mysqli_num_rows($result);
            if (!empty($name) && !empty($pass) && !empty($email)){
            if($exists==0 && $exists2==0){
                $sql = "INSERT INTO `user`(`username`, `password`, `email`, `dt`) VALUES ('$name','$pass','$email', CURRENT_TIMESTAMP )";
                $result = mysqli_query($conn, $sql);
                if($result){
                    $showAlert = 1;
                }
            $sql = "CREATE TABLE $name (sno INT AUTO_INCREMENT PRIMARY KEY, notes LONGTEXT, dat DATETIME) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;";
            $result = mysqli_query($conn, $sql);
        }
        if($exists>0){
            $showAlert = 2;
        }
        if($exists2> 0){
            $showAlert = 3;
        }
    } else{
        $showAlert = 4;
    }
    }
            
    ?>
<!-- Navbar ends here. -->

<!-- Notes creation starts from here. -->
    <div class="container">
        <div class="notes">
            <h1 style="font-family: Irish Grover; color: white; margin-bottom: 10%;">Register</h1>
            <p style="color: white; font-size:x-small; font-family: Sans-serif; margin-bottom:5%">
                <?php 
                    if($showAlert == 1){
                        echo "Successfully Created ! Now You can Login";
                    }
                    if($showAlert == 2){
                        echo "Username is already taken.";
                    }
                    if($showAlert == 3){
                        echo "An account with the email $email already exists. <br> <br>Please Login :)";
                    }
                    if($showAlert == 4){
                        echo "Fields can't be empty";
                    }
                ?>
            </p>
            <form class="lgfrm" method="POST">
                <input type="text" name="username" class="signup" placeholder="Username"><br>
                <input type="password" name="password" class="signup" id="password" placeholder="Password"><ion-icon id="togglePassword" name="eye-outline" style="cursor: pointer; font-size:larger; margin-left:-14px;"></ion-icon><br>
                <input type="email" name="email" class="signup" placeholder="Email Address">
                <p style="color: white; font-size:x-small; font-family: Sans-serif;">Already have a account ? <a href="login.php" class="login"><b>Login</b></a></p><br><br>
                <input type="submit" name="submit" class="submit">
            </form>
        </div>
    </div>
<!-- Notes creation ends here. -->
<!-- All the scripts goes here. -->
    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordField = document.getElementById('password');

        togglePassword.addEventListener('click', function() {
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            this.setAttribute('name', type === 'password' ? 'eye-outline' : 'eye-off-outline');
        });
    </script>
<!-- End of Scripts -->
</body>
</html>