    <?php include("../../path.php"); ?>
    <?php include(ROOT_PATH . "/app/controllers/schedules.php"); 
    adminOnly();
    ?>
    <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>
    
    <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>
<!-- main-bar -->
    <div class="main-bar">
        <h1>Table Schedules</h1>
        <?php include(ROOT_PATH . '/app/includes/messages.php'); ?>
        <a href="create.php" class="add-btn">New Schedule</a>
       
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
                <th class="fixedElement">Matatu</th>
                <th class="fixedElement">From</th>
                <th class="fixedElement">To</th>
                <th class="fixedElement">Date</th>
                <th class="fixedElement">Time</th>
                <th class="fixedElement">Price</th>
                <th class="fixedElement">Book Now</th>
                <th class="fixedElement">Action</th>
            </thead>
            <tbody>
                    <!-- <table> -->
                    <?php foreach ($schedules as $key => $schedule): ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $schedule['matatu_plate']; ?></td>
                                    <?php if ($schedule['travel_from']) {?>
                                        <?php
                                        $schedule_from = selectOne('routes', ['route_id' => $schedule['travel_from']]);
                                        $travel_from = $schedule_from['route_name'];
                                         ?>
                                        <td><?php echo $travel_from; ?></td>
                                   <?php }?>
                                    <?php if ($schedule['travel_to']) {?>
                                        <?php
                                        $schedule_to = selectOne('routes', ['route_id' => $schedule['travel_to']]);
                                        $travel_to = $schedule_to['route_name'];
                                         ?>
                                        <td><?php echo $travel_to; ?></td>
                                   <?php }?>
                                    <td><?php echo $schedule['travel_date']; ?></td>
                                    <td><?php echo $schedule['travel_time']; ?></td>
                                    <td><?php echo $schedule['price']; ?></td>
                                    <td><a href="book.php?id=<?php echo $schedule['schedule_id']; ?>" class="btn">Book</a></td>
                                    <td><a href="edit.php?id=<?php echo $schedule['schedule_id']; ?>" class="btn">edit</a>

                                    <a href="index.php?delete_schedule=<?php echo $schedule['schedule_id']; ?>" class="delete">delete</a></td>
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