<?php include("../../path.php"); ?>
    <?php include(ROOT_PATH . "/app/controllers/routes.php"); 
    adminOnly();
    ?>
    <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>
    
    <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>
<!-- main-bar -->
    <div class="main-bar">
        <h1>Table Routes</h1>
        <?php include(ROOT_PATH . '/app/includes/messages.php'); ?>
        <a href="create.php" class="add-btn">New Routes</a>
       
        <!-- <br> -->
        <form class="form-serach">
            <input type="text" name="search" placeholder="Search here..."/>
            <button class="search-btn">find</button>
        </form>
        <hr>
        <div class="scrollit">
            <table>
            <thead >
                <th class="fixedElement">#</th>
                <th class="fixedElement">Town</th>
                <th class="fixedElement">Action</th>
            </thead>
            <tbody>
                    <!-- <table> -->
                    <?php foreach ($routes as $key => $route): ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $route['route_name']; ?></td>
                                    <td><a href="edit.php?id=<?php echo $route['route_id']; ?>" class="btn">edit</a>
                                      <a href="index.php?delete_route=<?php echo $route['route_id']; ?>" class="delete">delete</a></td>
                                </tr>
                            <?php endforeach; ?>
                <!-- </table> -->
            </tbody>
        </table>
        <!-- </table> -->
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