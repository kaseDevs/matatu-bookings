<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/users.php"); 
adminOnly();
?>
        
     <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>
    
    <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>

    <!-- main-bar -->
    <div class="main-bar">
        <h1>New User</h1>
        <a href="users.html" class="add-btn">Manage Users</a>
        <!-- <br> -->
        <form class="form-serach">
            <input type="text" name="search" placeholder="Search here..."/>
            <button class="search-btn">find</button>
        </form>
        <hr>
        <div class="scrollit">
        <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>
           
        <form action="create.php" method="post">
                <div class="form-section">
                <!-- <label>Fullname</label> -->
                <style>
                    input{
                        color: white;
                    }
                </style>
                <input type="text" name="fullname" value="<?php echo $fullname; ?>" placeholder="fullname"/>
                <!-- <label>Username</label> -->
                <input type="text" name="username" value="<?php echo $username; ?>" placeholder="username"/>
                <!-- <label>Email</label> -->
                <input type="email" name="email" value="<?php echo $email; ?>" placeholder="email"/>
                <!-- <label>Mobile</label> -->
                <input type="text" name="mobile" value="<?php echo $mobile; ?>" placeholder="mobile"/>
                <!-- <label>Password</label> -->
                <input type="password" name="password" value="<?php echo $password; ?>" placeholder="password"/>
                <!-- <label>Confirm password</label> -->
                <input type="password" name="passwordConf" value="<?php echo $passwordConf; ?>" placeholder="confirm password"/>
                <?php if (isset($admin) && $admin == 1): ?>
                <label style="color: #fff">
                    <input type="checkbox" name="admin" checked>
                    Admin
                </label>
            <?php else: ?>
                <label>
                <style>
                    label{
                        color: white;
                    }
                </style>
                    <input type="checkbox" name="admin">
                    Admin
                </label>
            <?php endif; ?>
                <button  type="submit" name="create-admin">Save</button>
                </div>
            </form>
         
        </div>
    </div>
    <!-- // main-bar -->

    </div>
    <!-- end of main container -->
    <script>
        $(window).scroll(function(e){ 
  var $el = $('.fixedElement'); 
  var isPositionFixed = ($el.css('position') == 'fixed');
  if ($(this).scrollTop() > 200 && !isPositionFixed){ 
    $el.css({'position': 'fixed', 'top': '0px'}); 
  }
  if ($(this).scrollTop() < 200 && isPositionFixed){
    $el.css({'position': 'static', 'top': '0px'}); 
  } 
});
    </script>
  
</body>
</html>