
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
                <a href="" class="dropdown-toggle">Help</a>
                <ul class="d-menu" data-role="dropdown">
                    <li><a href="">Community support</a></li>
                    <li class="divider"></li>
                    <li><a href="">About</a></li>
                </ul>
            <li><a href=""><span id="time"></span></a></li>
        </ul>

        <div class="app-bar-element place-right">
            <span class="dropdown-toggle"><span class="mif-profile mif-ani-bounce"></span> Hello! <?= $user_log['user'] ?></span>
            <div class="app-bar-drop-container padding10 place-right no-margin-top block-shadow " data-role="dropdown" data-no-close="true" style="width: 220px">
                <h3 class="text-light text-shadow fg-lighterBlue"><?=$stat['status'];?></h3>
                <ul class="unstyled-list fg-dark">
                    <li><a href="" class="fg-white1 fg-hover-yellow">Profile</a></li>
                    <li><a href="" class="fg-white2 fg-hover-yellow">Security</a></li>
                    <li><a href="<?php echo base_url(); ?>InfirmarySystem/Logout" class="fg-white3 fg-hover-yellow">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>

         <div class="page-content">
        <div class="flex-grid" style="height: 100%;">
            <div class="row" style="height: 100%">
                <div class="cell size-x200" id="cell-sidebar" style="background-color: #7181d1; height: 100%">
                    <ul class="sidebar dark" >
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
                            <li><a href="<?= base_url(); ?>InfirmarySystem/Account_Management">
                                <span class="mif-profile icon"></span>
                                <span class="title">User Profile Management</span>
                                <span class="counter"><?= $num['count'] ?></span>
                            </a></li>
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
                
                
                <div class="cell auto-size padding10 bg-white" id="cell-content">
                    <h1 class="text-light">Inventory<span class="mif-medkit place-right"></span></h1>
                    <hr class="thin bg-grayLighter">
                    <div class="fancy-one" onclick="window.location='<?php echo base_url(); ?>InfirmarySystem/InventoryManagement';">
            <span class="fa fa-cart-plus fa-lg" style=" vertical-align: middle;"></span>
            <span class="my-text">Medicine</span>
	    </div>
                    <hr class="thin bg-grayLighter">
                    <table id="manageMedicineRecordTable" 
                           class="dataTables_wrapper no-footer hovered border bordered"  
                           data-searching="true">
                        <thead>
                            <tr>
                                <th>Qty.</th>
                                <th>Medicine Name</th>
                                <th>Stored Date</th>
                                <th>Expiration Date</th>
                                <th id="notif">Qty. Status</th>
                            </tr>
                        </thead>
                    </table>
                </div>             
            </div>              
        </div>
    </div>  
</body>