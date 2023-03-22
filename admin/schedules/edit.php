<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/schedules.php"); 
adminOnly();
?>
        
     <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>
    
    <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>

    <!-- main-bar -->
    <div class="main-bar">
        <h1>Edit Schedule</h1>
        <a href="index.php" class="add-btn">Manage Schedule</a>
        <!-- <br> -->
        <form class="form-serach">
            <input type="text" name="search" placeholder="Search here..."/>
            <button class="search-btn">find</button>
        </form>
        <hr>
        <div class="scrollit">
        <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>
           
        <form action="edit.php" method="post">
                <div class="form-section">
                <input type="hidden" name="schedule_id" value="<?php echo $id ?>">
                <!-- <label>Fullname</label> -->

                <style>
                    select{
                        width: 400px;
                        height: 30px;
                        color: black;
                    }
                    input{
                        color: white;
                    }
                </style>
                 <select name="mat_id" class="text-input">
                    <option value="">--Select Matatu--</option>
                    <?php foreach ($matatus as $key => $matatu): ?>
                        <?php if (!empty($matatu_id) && $matatu_id == $matatu['matatu_id'] ): ?>
                            <option selected value="<?php echo $matatu['matatu_id'] ?>"><?php echo $matatu['matatu_plate'] ?></option>
                        <?php else: ?>
                            <option value="<?php echo $matatu['matatu_id'] ?>"><?php echo $matatu['matatu_plate'] ?></option>
                        <?php endif; ?>

                    <?php endforeach; ?>

                </select>
                <select name="travel_from" class="text-input">
                    <option value="">--Select From--</option>
                    <?php foreach ($routes as $key => $route): ?>
                        <?php if (!empty($travel_from) && $travel_from == $route['route_id'] ): ?>
                            <option selected value="<?php echo $route['route_id'] ?>"><?php echo $route['route_name'] ?></option>
                        <?php else: ?>
                            <option value="<?php echo $route['route_id'] ?>"><?php echo $route['route_name'] ?></option>
                        <?php endif; ?>

                    <?php endforeach; ?>

                </select>
                <select name="travel_to" class="text-input">
                    <option value="">--Select To--</option>
                    <?php foreach ($routes as $key => $route): ?>
                        <?php if (!empty($travel_to) && $travel_to == $route['route_id'] ): ?>
                            <option selected value="<?php echo $route['route_id'] ?>"><?php echo $route['route_name'] ?></option>
                        <?php else: ?>
                            <option value="<?php echo $route['route_id'] ?>"><?php echo $route['route_name'] ?></option>
                        <?php endif; ?>

                    <?php endforeach; ?>

                </select>
                <input type="number" name="price" value="<?php echo $price; ?>" placeholder="Price"/>
                <br>
                <input type="date" name="travel_date" value="<?php echo $travel_date; ?>" placeholder="Travel Date"/>
                <br>
                <input type="time" name="travel_time" value="<?php echo $travel_time; ?>" placeholder="Travel Time"/>
                <br>
                <button  type="submit" name="update-schedule">Update</button>
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