<?php include("../../path.php"); ?>
<?php 
include(ROOT_PATH . "/app/controllers/schedules.php"); 
//  include(ROOT_PATH . "/app/controllers/bookings.php"); 
adminOnly();
?>
        
     <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>
    
    <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>

    <!-- main-bar -->
    <div class="main-bar">
        <h1>Edit Bookings</h1>
        <a href="index.php" class="add-btn">Manage Bookings</a>
        <!-- <br> -->
        <form class="form-serach">
            <input type="text" name="search" placeholder="Search here..."/>
            <button class="search-btn">find</button>
        </form>
        <hr>
        <div class="scrollit">
        <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>
           
        <form action="book.php" method="post">
        <input type="hidden" name="schedule_book_id" value="<?php echo $id ?>">
                <div class="form-section">
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
                 <select name="" class="text-input" readonly>
                    <?php foreach ($matatus as $key => $matatu): ?>
                        <?php if (!empty($matatu_id) && $matatu_id == $matatu['matatu_id'] ): ?>
                            <option selected value="<?php echo $matatu['matatu_id'] ?>"><?php echo $matatu['matatu_plate'] ?></option>
                        <?php endif; ?>

                    <?php endforeach; ?>

                </select>
                <select name="" class="text-input" readonly>
                    <?php foreach ($routes as $key => $route): ?>
                        <?php if (!empty($travel_from) && $travel_from == $route['route_id'] ): ?>
                            <option selected value="<?php echo $route['route_id'] ?>">From: <?php echo $route['route_name'] ?></option>
                        <?php endif; ?>

                    <?php endforeach; ?>

                </select>
                <select name="" class="text-input" readonly>
                    <?php foreach ($routes as $key => $route): ?>
                        <?php if (!empty($travel_to) && $travel_to == $route['route_id'] ): ?>
                            <option selected value="<?php echo $route['route_id'] ?>">To: <?php echo $route['route_name'] ?></option>
                        <?php endif; ?>

                    <?php endforeach; ?>

                </select>
                <div style="display: flex; flex-direction: column; width: 600px;">
                <input style="margin-left: 0px; " type="number" name="" value="<?php echo $price; ?>" placeholder="Price" readonly/>
                <br>
                <input  style="margin-left: 0px;" type="date" name="" value="<?php echo $travel_date; ?>" placeholder="Travel Date" readonly/>
                <br>
                <input style="margin-left: 0px;" type="time" name="" value="<?php echo $travel_time; ?>" placeholder="Travel Time" readonly/>
                </div>    
            </div>
                <table>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>1X</td>
                    <td style="background: black; color: white;">Driver</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>6</td>
                    <td>7</td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>9</td>
                    <td>10</td>
                </tr>
            
            </tbody>
        </table>
        <br>
        <select name="seat_number" class="text-input" readonly>
                    <option value="">Select Seat<option>
                    <option value="1x">1X<option>
                    <option value="1">1<option>
                    <option value="2">2<option>
                    <option value="3">3<option>
                    <option value="4">4<option>
                    <option value="5">5<option>
                    <option value="6">6<option>
                    <option value="7">7<option>
                    <option value="8">8<option>
                    <option value="9">9<option>
                    <option value="10">10<option>

                </select>
                <select name="user_passenger" class="text-input">
                    <option value="">--Select Passenger--</option>
                    <?php foreach ($users as $key => $user): ?>
                            <option value="<?php echo $user['id'] ?>"><?php echo $user['fullname'] ?></option>
                    <?php endforeach; ?>

                </select>

                <!-- <button  type="submit" name="add-book">Save</button> -->
                <button  type="submit" name="update_booking">Update</button>
            </form>
            <?php
            $db = mysqli_connect('localhost', 'root', '', 'matatubookingsdb');
            $errors = array();
            $schedule_book_id = "";
            $user_passenger = "";
            $seat_number = "";
            if (isset($_POST['register'])) {
                $schedule_book_id = $_POST['schedule_book_id'];
                $user_passenger = $_POST['user_passenger'];
                $seat_number = $_POST['seat_number'];

            if (empty($bookings['seat_number'])) {
                echo '<script>alert("book a seat")</script>';
            }


            if (empty($bookings['user_passenger'])) {
                echo '<script>alert("select user")</script>';
            }


                $sql_u = "SELECT * FROM bookings WHERE schedule_book_id='$schedule_book_id' AND seat_number='$seat_number'";
                // $sql_e = "SELECT * FROM users WHERE email='$email'";
                $res_u = mysqli_query($db, $sql_u);
                // $res_e = mysqli_query($db, $sql_e);
                // print_r($res_u);
                // exit;
          
                if (mysqli_num_rows($res_u) > 0) {
                    // array_push($errors, 'Sorry... seats already taken');	
                    // echo "taken";
                    echo '<script>alert("Sorry this seat is booked")</script>';
                }else{
                     $query = "INSERT INTO bookings (schedule_book_id, user_passenger, seat_number) 
                              VALUES ('$schedule_book_id', '$user_passenger', '$seat_number')";
                     $results = mysqli_query($db, $query);
                     echo '<script>alert("You have booked successfully")</script>';
                     exit();
                }
                return $errors;
            }
          ?>
            ?>
            <!-- <div class="scrollit"> -->
          
        <!-- </table> -->
    <!-- </div> -->
         
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