<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/routes.php"); 
adminOnly();
?>
        
     <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>
    
    <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>

    <!-- main-bar -->
    <div class="main-bar">
        <h1>New Routes</h1>
        <a href="index.php" class="add-btn">Manage Routess</a>
        <!-- <br> -->
        <form class="form-serach">
            <input type="text" name="search" placeholder="Search here..."/>
            <button class="search-btn">find</button>
        </form>
        <hr>
        <div class="scrollit">
        <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>
           
        <form action="edit.php" method="post">
        <input type="hidden" name="route_id" value="<?php echo $id; ?>" >
                <div class="form-section">
                <style>
                    input{
                        color: white;
                    }
                </style>
                <input type="text" name="route_name" value="<?php echo $route_name; ?>" placeholder="Route"/>
                <button type="submit" name="update-routes" class="btn btn-big">Update</button>
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