<!DOCTYPE html>
<html>
    <head>    

         <title>Infirmary System - Ateneo De Manila High School </title>
        
        <link href="<?php echo base_url('css/metro.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('css/metro-icons.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('css/metro-responsive.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('css/Emerfiry.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('css/jquery-ui.css'); ?>" type="text/css" rel="stylesheet" media="all" />
        <link href="<?php echo base_url('css/ui.theme.css'); ?>" type="text/css" rel="stylesheet" media="all" /> 

        <script src="<?php echo base_url('js/jquery-2.1.3.min.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('js/metro.js'); ?>" type="text/javascript"></script> 

    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url('images/apple-icon-57x57.png'); ?>">
        <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url('images/apple-icon-60x60.png'); ?>">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url('images/apple-icon-72x72.png'); ?>">
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('images/apple-icon-76x76.png'); ?>">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url('images/apple-icon-114x114.png'); ?>">
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url('images/apple-icon-120x120.png'); ?>">
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url('images/apple-icon-144x144.png'); ?>">
        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url('images/apple-icon-152x152.png'); ?>">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('images/apple-icon-180x180.png'); ?>">
        <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url('images/android-icon-192x192.png'); ?>">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('images/favicon-32x32.png'); ?>">
        <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url('images/favicon-96x96.png'); ?>">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('images/favicon-16x16.png'); ?>">
        <link rel="manifest" href="<?php echo base_url('images/manifest.json'); ?>">
        <meta name="msapplication-TileColor" content="#153990">
        <meta name="msapplication-TileImage" content="<?php echo base_url('images/ms-icon-144x144.png'); ?>">
        <meta name="theme-color" content="#153990">
        
        <script type="text/javascript">
      function startTime()
      {
          var d = new Date();
          var cd = d.toLocaleDateString();
          var ct = d.toLocaleTimeString();
          document.getElementById("time").innerHTML = cd + " - " + ct;
          setTimeout('startTime()', 1000);
      }
        </script>
    </head>
    <body class="bg-indigo" onload="startTime()">
        <div class="app-bar fixed-top darcula" data-role="appbar">
            <a class="app-bar-element branding">Emirfary</a>
            <span class="app-bar-divider"></span>
            <ul class="app-bar-menu">
                <li><a href="<?= base_url(); ?>InfirmarySystem/LandingPage">Dashboard</a></li>
                <li>
                    <a href="" class="dropdown-toggle"><span class="mif-users fg-lightGreen"></span>Online Staff</a>
                    <ul class="d-menu" data-role="dropdown">
                        <?php
                        foreach ($online['user'] as $row) {
                            echo '<li><a><span class="mif-sun4 fg-lightOlive"></span>' . $row->username . '</a></li>';
                        }
                        ?>
                    </ul>
                </li>
                <li>
                    <a href="" class="dropdown-toggle">Help</a>
                    <ul class="d-menu" data-role="dropdown">
                        <li><a href="">Tech support</a></li>
                        <li class="divider"></li>
                        <li><a href="<?= base_url(); ?>InfirmarySystem/about">About</a></li>
                    </ul>
                </li>

                <li><a href=""><span id="time"></span></a></li>
            </ul>

            <div class="app-bar-element place-right">
                <span class="dropdown-toggle"><span class="mif-user-md mif-ani-heartbeat mif-ani-slow"></span> Hello! <?= $user_log['user'] ?></span>
                <div class="app-bar-drop-container padding10 place-right no-margin-top block-shadow " data-role="dropdown" data-no-close="true" style="width: 220px">
                    <h3 class="text-light text-shadow fg-lighterBlue"><?= $stat['status']; ?></h3>
                    <ul class="unstyled-list fg-dark">
                        <li><a href="<?= base_url(); ?>InfirmarySystem/Account_Settings?user_id=<?= $user_log['id'] ?>" class="fg-white1 fg-hover-yellow">Profile</a></li>
                        <li><a href="<?= base_url(); ?>InfirmarySystem/Account_Change?user_id=<?= $user_log['id'] ?>" class="fg-white2 fg-hover-yellow">Security</a></li>
                        <li><a href="<?= base_url(); ?>InfirmarySystem/Logout?user_id=<?= $user_log['id'] ?>" class="fg-white3 fg-hover-yellow">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="page-content">
            <div class="flex-grid" style="height: 100%;">
                <div class="row" style="height: 100%">
                    <div class="cell size-x51" id="cell-sidebar" style="background-color: #7181d1; height: 100%">
                        <ul class="sidebar compact" >
                            <li><a href="<?= base_url(); ?>InfirmarySystem/Student_Daily_Complain">
                                    <span class="mif-clipboard icon"></span>
                                    <span class="title">Student Daily Complain</span>
                                    <span class="counter"><?= $num['count'] ?></span>
                                </a></li>
                            <li><a href="<?= base_url(); ?>InfirmarySystem/Student_Management">
                                    <span class="mif-users icon"></span>
                                    <span class="title">Health Record Management</span>
                                    <span class="counter"><?= $num2['count2'] ?></span>
                                </a></li>
                            <?= $send['link'] ?>
                            <li><a href="<?= base_url(); ?>InfirmarySystem/Inventory_Management">
                                    <span class="mif-cabinet icon"></span>
                                    <span class="title">Inventory Management</span>
                                    <span class="counter"><?= $num['count'] ?></span>
                                </a></li>
                            <li><a href="<?= base_url(); ?>InfirmarySystem/Transaction_Management">
                                    <span class="mif-stethoscope icon"></span>
                                    <span class="title">Transaction Management</span>
                                    <span class="counter"><?= $num['count'] ?></span>
                                </a></li>
                            <li><a href="<?= base_url(); ?>InfirmarySystem/Calendar_Events">
                                    <span class="mif-calendar icon"></span>
                                    <span class="title">Calendar Event Management</span>
                                    <span class="counter"><?= $num['count'] ?></span>
                                </a></li>
                            <li><a href="<?= base_url(); ?>InfirmarySystem/">
                                    <span class="mif-medkit icon"></span>
                                    <span class="title">First-Aid Management</span>
                                    <span class="counter"><?= $num['count'] ?></span>
                                </a></li>
                            <li><a href="<?= base_url(); ?>InfirmarySystem/">
                                    <span class="mif-feed icon"></span>
                                    <span class="title">Feedback Management</span>
                                    <span class="counter"><?= $num['count'] ?></span>
                                </a></li>

                        </ul>
                    </div>

