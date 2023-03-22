<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <style>
        body{
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .top-header{
            background-color: black;
            width: 100%;
            color: aliceblue;
            /* border: 2px solid red; */
            border-radius: 20px;
            display: flex;
            justify-content: space-between;
        }

        .logo{
            margin: 10px;
            display: flex;

        }
        .logo img{
            margin: auto;
            width: 60px;
            height: 60px;
        }
        .logo marquee {
          border-right: solid 2px yellow;
          /* border-top: dashed 2px yellow; */
        }
 
        .logo marquee h2{
          border-bottom: dashed 0.5px yellow;
          border-top: dashed 0.5px yellow;
          background-color: gray;
        }

        .header-label{
            margin-right: 100px;
        }

        .profile ul{
            display: flex;
            margin: 10px;
            padding: 20px;
        }

        .profile ul li{
            margin: auto;
            margin-left: 10px;
            list-style-type: none;
            background: #fff;
            color: #000;
            padding: 8px;
            border-radius: 0px 0px 0px 30px;
            padding-left: 100px;
            padding-right: 100px;
            /* margin-bottom: ;
            margin-left: ;
            margin-right: ;*/
            
        }
        .profile ul .logout{
            margin: auto;
            margin-left: 10px;
            text-decoration: none;
            background: red;
            color: #fff;
            padding: 8px;
            border-radius: 0px 0px 0px 30px;
            padding-left: 50px;
            padding-right: 50px;
            border-radius: 0px 0px 0px 30px;
        }

        .side-bar{
            float: left;
            /* background-color: cadetblue; */
            /* background: linear-gradient(to top, #000000 0%, #ff99cc 100%); */
            background: linear-gradient(to top, #000000 0%, #99ccff 100%);
            /* background: linear-gradient(to bottom, #66ff66 0%, #3399ff 100%); */
            width: 20%;
            display: flex;
            min-height: 500px;
            border-radius: 20px;
        }
        .side-bar .sidebar-list{
            /* border: yellow dotted 2px; */
            margin: 20px auto;
            width: 80%;
            border-radius: 20px;
            background: linear-gradient(to top, rgba(0,0,0,0.65)50%, rgba(0,0,0,0.65)50%);
            padding-top: 30px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        .side-bar .sidebar-list a{
            text-decoration: none;
            color: #fff;
            display: flex;
            gap: 10px;
        
        }

        .side-bar .sidebar-list a .dash-icons{
            width: 30px;
            height: 30px;
        }

        .side-bar .sidebar-list a li{
            list-style-type: none;
            margin-top: 6px;
        }
        .side-bar .sidebar-list a:hover{
          margin-left: 30px;
          border-bottom: dotted yellow 1px;
          border-top: dotted yellow 1px;
        }
        .main-bar{
            width: 78%;
            float: right;
            background: linear-gradient(to top, #000000 0%, #99ccff 100%);
            /* border: #000 solid 2px; */
            min-height: 500px;
            max-height: 500px;
            border-radius: 20px;
            padding: 0px 10px;
        }

        .main-bar a{
            margin-left: 50px;
        }

        /* .main-bar h1{
            text-align: center;
        } */

        .main-bar table{
            margin-left: 25px;
        }

        .scrollit {
        overflow:scroll;
        min-height:355px;
        max-height:345px;
        }
        .main-bar form{
            /* border: #000 solid 2px; */
            width: 85%;
        }
        .main-bar form input{
            width: 70%;
            /* margin-left: 20px; */
            padding: 10px;
        }

        .main-bar form .search-btn{
            width: 20%;
            /* margin-left: 30px; */
            padding: 10px;
            background-color: cadetblue;
            border-radius: 30px;
        }

        .main-bar form .search-btn:hover{
            background-color: #000;
            color: yellow;
            cursor: pointer;
        }

        .main-bar .add-btn{
            background-color: rgb(245, 214, 39);
            color: rgb(0, 0, 0);
            padding: 8px;
            border-radius: 20px;
            float: right;
            text-decoration: none;
            /* margin-bottom: 30px; */

        }

        /* main style */
        /* .main{
            display: flex;
        } */
        /* end main style */

        /* table styling */
        .main-bar table{
            border: 2px solid white;
            padding: 20px;
            width: 85%;
            background-color: aliceblue;
            border-radius: 20px;
            margin-bottom: 20px;
        }

        .main-bar table th{
            border: #000 solid 2px;
            position: sticky;
            padding: 6px;
            border-radius: 10px;
            color: rgb(242, 247, 0);
            background-color: #000;
        }
        .main-bar table tbody td{
            border: #000 solid 2px;
            padding: 6px;
            /* border-radius: 10px; */
        }
        .main-bar table tbody td a{
            background-color: rgba(2, 134, 134, 0.205);
            text-decoration: none;
            padding: 2px;
            color: #000;
            border-radius: 10px;
            border: #000 1px solid;

        }
        .main-bar table tbody td a:hover{
            background-color: rgba(255, 251, 10, 0.205);
            border: #000 1px solid;

        }

        .main-bar table tbody td .delete{
            background-color: rgba(255, 22, 22, 0.205);
            text-decoration: none;
            padding: 2px;
            color: #000;
            border-radius: 10px;
            border: #000 1px solid;

        }
        .main-bar table tbody td .delete:hover{
            background-color: rgba(255, 251, 10, 0.205);
            border: #000 1px solid;

        }


        .fixedElement {
    /* background-color: #c0c0c0; */
    position:absolute;
    top:0;
 /* width:100%; */
    z-index:100;
}
        /* end table styling */

        .scrollit form{
            display: flex;
            flex-direction: column;
            border: #000 2px solid;
            gap: 20px;
            padding: 20px;
            /* padding-left: 40px; */
            /* background-color: aliceblue; */
            background: url(../assets/images/vanback.jpg);
            background-position: static;
            background-size: 100% 100%;
            background-repeat: no-repeat;
            min-height: 300px;
            width: 95%;
            
        }
        .scrollit form *{
            margin-left: 10px;
        }
        .scrollit form .form-section{
            display: flex;
            flex-wrap: wrap;
            gap: 25px;
            background: linear-gradient(to top, rgba(0,0,0,0.66)50%, rgba(0,0,0,0.66)50%);
            padding: 5px;
            border-radius: 30px;
            min-height: 250px;
          

        }
        .scrollit form input{
            width: 300px;
            margin: auto;
            background: linear-gradient(to top, rgba(0,0,0,0.3)50%, rgba(0,0,0,0.3)50%);
            border-radius: 10px;
            border: 1px solid yellow;
            padding: 10px;
        }
        .scrollit form button{
            width: 350px;
            padding: 10px;
            border-radius: 20px;
            /* background-color: #000000; */
            background: linear-gradient(to top, rgba(0,0,0,0.3)50%, rgba(0,0,0,0.3)50%);
            color: #fff;
            border: #fff solid 1px;
            margin-left: 280px;
        }
        .scrollit form button:hover{
            background-color: #fff;
            color: #000;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <!-- top header -->
    <div class="top-header">
        <!-- logo -->
        <div class="logo">
            <img src="<?php echo BASE_URL . '/assets/images/logo.svg'; ?>" alt="logo-image" />
            <marquee><h2 style="color: yellow;">ADMIN PANEL</h2></marquee>
        </div>
        <!-- //logo -->

        <!-- profile -->
        <div class="profile">
        <?php if (isset($_SESSION['username'])): ?>
            <ul>
            <li>
                <!-- <a href="#"> -->
                    <?php echo $_SESSION['username']; ?>
                <!-- </a> -->
            </li>
            <a href="<?php echo BASE_URL . '/logout.php'; ?>" class="logout">
           Logout
            </a>
            </ul>
          
        <?php endif; ?>
           
        </div>
        <!-- //profile -->
    </div> <!-- // top header -->