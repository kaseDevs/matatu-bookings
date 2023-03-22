<?php include("../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/users.php"); 
adminOnly();
?>
        
     <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>
    
    <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>
    <!-- main-bar -->
    <div class="main-bar">
        <h1 style="text-align: center;">REPORTS</h1>
        <?php include(ROOT_PATH . '/app/includes/messages.php'); ?>
        <hr>
        <div class="scrollit">
            <table>
            <thead >
                <th class="fixedElement">Tickets</th>
                <th class="fixedElement">Income</th>
            </thead>
            <tbody>
                                <tr>
                                    <br>
                                    <td style="padding: 30px; border-radius: 20px; background-color: green;" class="dashboard-td"><a href="<?php echo BASE_URL . '/admin/reports/tickets.php'; ?>">View Now</a></td>
                                    <td style="padding: 30px; border-radius: 20px; background-color: blue;" class="dashboard-td"><a href="<?php echo BASE_URL . '/admin/reports/income.php'; ?>">View Now</a></td>
                                                  
                                </tr>
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