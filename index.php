<?php 
include("path.php");
include(ROOT_PATH . "/app/controllers/routes.php");

$routes = array();
$routes = selectAll($table);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Matatu|Tickets</title>
</head>
<body>
    <!-- main container wrapping the whole page -->
    <div class="container">
        <!-- top navigation header -->
        <div class="header">
            <!-- logo section -->
            <div class="logo">
                <!-- <img src="assets/images/logo.jpg" alt="" class="image-logo" width="50px" height="50px"/> -->
            </div>
            <!-- //logo section -->
            <!-- project title -->
            <div class="project-title">
                <marquee><h1>ONLINE-MATATU-BOOKING-SYSTEM</h1></marquee>
            </div>
            <!-- //project title -->
            <!-- navigation menu -->
            <div class="nav-menu">
                <ul>
                    <style>
                          .nav-links{
                            border: solid 0.5px black;
                            margin-right: 10px;
                            text-decoration: none;
                            border-radius: 10px;
                            color: black;
                            background-color: white;
                        }
                        
                        .nav-links:hover{
                            background-color: black;
                            color:white
                        }

                    </style>
                   <a href="<?php echo BASE_URL . '/index.php' ?>" class="home-btn nav-links"><li>Home</li></a>
                    <?php if (isset($_SESSION['id'])): ?>
                    <style>
                        .home-btn{
                            border: solid 0.5px black;
                            margin-right: 10px;
                            text-decoration: none;
                            border-radius: 10px 0px 0px 10px;
                            color: #000;
                        }

                        .home-btn:hover{
                            background-color: white;
                            color:black
                        }

                        .profile-name:hover{
                            background-color: white;
                            color:black
                        }
                        .profile-name{
                            color: black;
                            text-decoration: none;
                            border: solid 0.5px black;
                            background: black;
                            color: white;
                            /* border-radius: 10px 0px 0px 10px; */
                        }
                        .profile-name span{
                            color: blue;
                        }

                        .logout:hover{
                            background-color: white;
                            color:black
                        }

                        .logout{
                            margin-left: 10px;
                            color: white;
                            text-decoration: none;
                            border: solid 0.5px black;
                            background: red;
                            border-radius: 0px 10px 10px 0px;
                        }

                    </style>
                    <a class="profile-name" href="<?php echo BASE_URL . '/account.php' ?>"><li><?php echo $_SESSION['username']; ?>|<span>Account</span></li></a>
                    <a class="logout" href="<?php echo BASE_URL . '/logout.php' ?>"><li>Logout</li></a>
                    <?php else: ?>
                    <a class="nav-links" href="<?php echo BASE_URL . '/login.php' ?>"><li>Login</li></a>
                    <a class="nav-links"  href="<?php echo BASE_URL . '/register.php' ?>"><li>Signup</li></a>
                    <?php endif; ?>
                </ul>
            </div>
            <!-- //navigation menu -->
          </div>
        <!-- end of top navigation header -->

        <!-- home landing area -->
        <div class="home">
            <!-- video section -->
            <div class="video-ad">
                <video width="700" height="400" autoplay muted loop id="myVideo">
                    <source src="assets/images/traffic.mp4" type="video/mp4">
                    <!-- <source src="movie.ogg" type="video/ogg"> -->
                    Your browser does not support the video tag.
                  </video>
                <p>Book your destination with us and experience better travel</p>
            </div>
            <!-- // video section -->
            <!-- form section -->
            <div class="route-form">
                <form action="index.php" method="post">
                <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>
                    <label>Travelling From</label>
                    <select name="travel_from">
                    <option>--Select Your Route--</option>
                    <?php foreach ($routes as $route): ?>
                        <option value="<?php echo $route['route_id']; ?>"><?php echo $route['route_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label>Travelling To</label>
                    <select name="travel_to">
                    <option>--Select Your Route--</option>
                    <?php foreach ($routes as $route): ?>
                        <option value="<?php echo $route['route_id']; ?>"><?php echo $route['route_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    </select>
                    <label>Date of Travel</label>
                    <input type="date" name="travel_date" />
                    <input type="submit" name="search" class="route-button" value="Search Now" />
                </form>
            </div>
            <!-- // form section -->
        </div>
        <!-- end of home landing area -->

    <!-- footer section -->
    <div class="footer">
        <!-- infomation -->
        <div class="information">
            <h3>List of available Matatus</h3>
            <style>
                table{
                    background: white;
                    padding: 20px;
                    color: black;
                }
                table th{
                    border: solid black 2px;
                    padding: 10px;
                }
                table td{
                    border: solid black 2px;
                    padding: 10px;
                }
            </style>
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
            </thead>
            <tbody>
            <?php
                if (isset($_POST["search"])) {
                    // (B1) SEARCH FOR USERS
                    require "3-search.php";
                  
                    // (B2) DISPLAY RESULTS
                    if (count($results) > 0) {?>
                   
                    <!-- <table> -->
                    <?php foreach ($results as $key => $r): ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $r['matatu_plate']; ?></td>
                                    <?php if ($r['travel_from']) {?>
                                        <?php
                                        $schedule_from = selectOne('routes', ['route_id' => $r['travel_from']]);
                                        $travel_from = $schedule_from['route_name'];
                                         ?>
                                        <td><?php echo $travel_from; ?></td>
                                   <?php }?>
                                    <?php if ($r['travel_to']) {?>
                                        <?php
                                        $schedule_to = selectOne('routes', ['route_id' => $r['travel_to']]);
                                        $travel_to = $schedule_to['route_name'];
                                         ?>
                                        <td><?php echo $travel_to; ?></td>
                                   <?php }?>
                                    <td><?php echo $r['travel_date']; ?></td>
                                    <td><?php echo $r['travel_time']; ?></td>
                                    <td><?php echo $r['price']; ?></td>
                                    <?php if (isset($_SESSION['id'])): ?>
                                    <td><a href="book.php?id=<?php echo $r['schedule_id']; ?>" class="btn">Book Now</a></td>
                                    <?php else: ?>
                                    <td><a style="background: blue; color: white;" href="<?php echo BASE_URL . '/login.php' ?>">Login to book</a></td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; ?>
                            <?php   }} else { ?>
                        
                        <?php echo "No results found search for matatus";}?>
            </tbody>
            
        </table>
                        
        </div>
        <!-- // information -->
        <!-- contact us -->
        <!-- <div class="contact-us">
            <h3>Contact Us</h3>
            <form>
                <input type="text" name="fullname" placeholder="Enter Name"/>
                <input type="text" name="email" placeholder="Enter Email" />
                <textarea cols="30" rows="10">

                </textarea>
            </form>
        </div> -->
        <!-- end of contact us -->
        <!-- social media accounts -->
        <div class="social-media">
            <h3>Our Social Media</h3>
            <ul>
                <li><img src="assets/images/icons/facebook.png" width="50px" height="50px" alt="social-media-icon"/></li>
                <li><img src="assets/images/icons/instagram.png" width="50px" height="50px" alt="social-media-icon"/></li>
                <li><img src="assets/images/icons/linkedin.png" width="50px" height="50px" alt="social-media-icon"/></li>
            </ul>
        </div>
    </div>
    <!-- //end of footer section -->

    </div>
    <!-- end of main container -->
</body>
</html>