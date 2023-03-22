<?php include("path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/users.php");
// calling guestOnly()function
guestsOnly();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
            color: #fff;
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
        <form action="register.php" method="post">
            <h2 style="text-align: center; color: aliceblue;">Sign Up User</h2>
            <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>
            <input type="text" name="fullname" value="<?php echo $fullname; ?>" placeholder="Enter Fullname"/>
            <input type="text" name="username" value="<?php echo $username; ?>" placeholder="Enter Usrename"/>
            <input type="text" name="email" value="<?php echo $email; ?>" placeholder="Enter Email"/>
            <input type="text" name="mobile" value="<?php echo $mobile; ?>" placeholder="Enter Mobile"/>
            <!-- <label>Password</label> -->
            <input type="password" name="password" value="<?php echo $password; ?>" placeholder="Enter Password"/>
            <input type="password" name="passwordConf" value="<?php echo $passwordConf; ?>" placeholder="Confirm Password"/>
            <div class="navigations">
                <button type="submit" name="register-btn"  class="login">Sign Up</button>
                <a href="<?php echo BASE_URL . '/login.php' ?>">have account? Sign in</a>
                <a href="<?php echo BASE_URL . '/index.php' ?>">Go back? Home</a>
            </div>
          
        </form>
    </div>
</body>
</html>