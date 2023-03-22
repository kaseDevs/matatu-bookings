<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/users.php"); 
adminOnly();
?>
        
     <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>
    
    <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>

    <!-- main-bar -->
    <div class="main-bar">
        <h1>Customer Tickets</h1>
        <a href="users.html" class="add-btn">Manage Users</a>
        <!-- <br> -->
        <form class="form-serach">
            <input type="text" name="search" placeholder="Search here..."/>
            <button class="search-btn">find</button>
        </form>
        <hr>
        <div class="scrollit">
        <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>
           
        <form action="" method="post">
                <div class="form-section">
                <!-- <label>Fullname</label> -->
                <input type="hidden" name="id" value="<?php echo $id; ?>" >
                <style>
                    input{
                        color: white;
                    }
                </style>
                <input type="text" name="fullname" value="<?php echo $fullname; ?>" placeholder="fullname"/>
                <!-- <label>Username</label> -->
                <!-- <label>Email</label> -->
                <input type="email" name="email" value="<?php echo $email; ?>" placeholder="email"/>
                <!-- <label>Mobile</label> -->
                <input type="text" name="mobile" value="<?php echo $mobile; ?>" placeholder="mobile"/>
                <!-- <label>Password</label> -->
                <?php if ($id) {?>
                    <?php
                    $passenger = selectOnePassenger('bookings', ['user_passenger' => $id]);
                    $mat = selectOne('schedules', ['schedule_id' => $passenger['schedule_book_id']]);
                    $mat_name = selectOne('matatus', ['matatu_id' => $mat['mat_id']]);
                    $pass_book = $mat_name['matatu_plate'];
                        ?>
                         <input type="text" name="" value="Matatu: <?php echo $pass_book; ?>" placeholder="password"/>

                <?php }?>

                <?php if ($id) {?>
                    <?php
                    $passenger = selectOnePassenger('bookings', ['user_passenger' => $id]);
                    $Tdate = selectOne('schedules', ['schedule_id' => $passenger['schedule_book_id']]);
                    // $mat_name = selectOne('matatus', ['matatu_id' => $mat['mat_id']]);
                    $traveling_date = $Tdate['travel_date'];
                        ?>
                         <input type="text" name="" value="Travel-Date:<?php echo $traveling_date; ?>" placeholder="password"/>

                <?php }?>

                <?php if ($id) {?>
                    <?php
                    $passenger = selectOnePassenger('bookings', ['user_passenger' => $id]);
                    $Ttime = selectOne('schedules', ['schedule_id' => $passenger['schedule_book_id']]);
                    // $mat_name = selectOne('matatus', ['matatu_id' => $mat['mat_id']]);
                    $traveling_time = $Ttime['travel_time'];
                        ?>
                         <input type="text" name="" value="Travel-Time:<?php echo $traveling_time; ?>" placeholder="password"/>

                <?php }?>
               
    
                <!-- <button  type="submit" name="update-user">Update</button> -->
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