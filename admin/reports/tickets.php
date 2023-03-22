<?php include("../../path.php"); ?>
    <?php include(ROOT_PATH . "/app/controllers/users.php"); 
    adminOnly();
    ?>
    <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>
    
    <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>
<!-- main-bar -->
    <div class="main-bar">
        <h1>TICKETS REPORT</h1>
        <?php include(ROOT_PATH . '/app/includes/messages.php'); ?>       
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
                <th class="fixedElement">Fullname</th>
                <th class="fixedElement">Username</th>
                <th class="fixedElement">Mobile</th>
                <th class="fixedElement">Email</th>
                <th class="fixedElement">Action</th>
            </thead>
            <tbody>
                    <!-- <table> -->
                    <?php foreach ($admin_users as $key => $user): ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $user['fullname']; ?></td>
                                    <td><?php echo $user['username']; ?></td>
                                    <td><?php echo $user['mobile']; ?></td>
                                    <td><?php echo $user['email']; ?></td>
                                    <td><a href="view_ticket.php?id=<?php echo $user['id']; ?>" class="btn">View Ticket</a></td>
                            
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