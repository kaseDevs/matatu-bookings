<?php include('path.php'); ?>
<?php include(ROOT_PATH . "/app/controllers/users.php"); 
guestsOnly();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        .container{
            /* border: 2px solid red; */
            display: flex;
            padding: 40px;
            min-height: 500px;
            background: linear-gradient(to top, rgba(0,0,0,0.5)50%, rgba(0,0,0,0.5)50%), url(assets/images/on-road.jpg);
            background-size: 100% 100%;
        }
        .container form{
            margin: auto;
            display: flex;
            flex-direction: column;
            gap: 30px;
            background: linear-gradient(to top, rgba(0,0,0,0.65)50%, rgba(0,0,0,0.65)50%);
            padding: 20px;
        }
        .container form input{
            background: linear-gradient(to top, rgba(0,0,0,0.65)50%, rgba(0,0,0,0.65)50%);
            padding: 20px;
            width: 300px;
            color: white;
        }
        .login{
            padding: 20px;
            background-color: black;
            color: aliceblue;
        }
        .login:hover{
            background-color: rgb(255, 255, 255);
            color: rgb(0, 0, 0);
        }

        .navigations{
            /* border: 2px solid red; */
            width: 345px;
            display: flex;
            flex-direction: column;
            gap: 20px;
            text-align: center;
        }

        .navigations a{
            text-decoration: none;
            color: white;
        }

    </style>
</head>
<body>
    <div class="container">
        <form action="login.php" method="post">
            <h2 style="text-align: center; color: aliceblue;">Sign In User</h2>
            <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>
            <input type="text" name="username" value="<?php echo $username; ?>" placeholder="Enter Usrename"/>
            <!-- <label>Password</label> -->
            <input type="password" name="password" value="<?php echo $password; ?>" placeholder="Enter Password"/>
            <div class="navigations">
                <button type="submit" name="login-btn" class="login">Sign in</button>
                <a href="<?php echo BASE_URL . '/register.php' ?>">Do not have account? Signup</a>
                <a href="<?php echo BASE_URL . '/index.php' ?>">Go back? Home</a>
                <!-- <a href="dashboard.html">dashboard</a> -->
            </div>
          
        </form>
    </div>
</body>
</html>