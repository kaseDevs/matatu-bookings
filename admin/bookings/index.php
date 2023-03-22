    <?php include("../../path.php"); ?>
    <?php include(ROOT_PATH . "/app/controllers/schedules.php"); 
    adminOnly();
    ?>
    <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>
    
    <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>
<!-- main-bar -->
    <div class="main-bar">
        <h1>Table Bookings</h1>
        <?php include(ROOT_PATH . '/app/includes/messages.php'); ?>
        <a href="schedules/index.php" class="add-btn">New Schedule</a>
       
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
                <th class="fixedElement">Passenger</th>
                <th class="fixedElement">Booking Date</th>
                <th class="fixedElement">Travel Date</th>
                <th class="fixedElement">Travel Time</th>
                <th class="fixedElement">Price</th>
                <th class="fixedElement">Action</th>
            </thead>
            <tbody>
                    <!-- <table> -->
                    <?php foreach ($bookings as $key => $book): ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <?php if ($book['schedule_book_id']) {?>
                                        <?php
                                        // $mat = selectOneMatatu('schedules', ['schedule_id' => $book['schedule_book_id']]);
                                        $mat = selectOneMatatu('schedules', ['schedule_id' => $book['schedule_book_id']]);
                                        $mat_name = selectOne('matatus', ['matatu_id' => $mat['mat_id']]);
                                        $matatubooked = $mat_name['matatu_plate'];
                                         ?>
                                        <td><?php echo $matatubooked; ?></td>
                                   <?php }?>
                                    <?php if ($book['user_passenger']) {?>
                                        <?php
                                        $passenger = selectOnePassenger('bookings', ['user_passenger' => $book['user_passenger']]);
                                        $pass_book = $passenger['fullname'];
                                         ?>
                                        <td><?php echo $pass_book; ?></td>
                                   <?php }?>
                                    <td><?php echo $book['book_date']; ?></td>
                                    <?php if ($book['schedule_book_id']) {?>
                                        <?php
                                        $mat = selectOneMatatu('schedules', ['schedule_id' => $book['schedule_book_id']]);
                                        $travelDate = $mat['travel_date'];
                                         ?>
                                        <td><?php echo $travelDate; ?></td>
                                   <?php }?>

                                   <?php if ($book['schedule_book_id']) {?>
                                        <?php
                                        $mat = selectOneMatatu('schedules', ['schedule_id' => $book['schedule_book_id']]);
                                        $travelTime = $mat['travel_time'];
                                         ?>
                                        <td><?php echo $travelTime; ?></td>
                                   <?php }?>

                                   <?php if ($book['schedule_book_id']) {?>
                                        <?php
                                        $mat = selectOneMatatu('schedules', ['schedule_id' => $book['schedule_book_id']]);
                                        $pricing = $mat['price'];
                                         ?>
                                        <td><?php echo $pricing; ?></td>
                                   <?php }?>
                                    <td><a href="edit.php?id=<?php echo $book['schedule_book_id']; ?>" class="btn">edit</a>
                                    <a href="index.php?delete_booking=<?php echo $book['book_id']; ?>" class="delete">delete</a></td>
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