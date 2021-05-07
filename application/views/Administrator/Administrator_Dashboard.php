<div class="cell auto-size padding10 bg-white" id="cell-content">
    <h1 class="text-light">Dashboard<span class="mif-apps place-right"></span></h1>
    <hr class="thin bg-grayLighter">
    <div class="cell auto-size padding20 bg-white" id="cell-content">  
        <div class="flex-grid">

            <div class="row">
                <div class="cell colspan1"></div>
                <div class="cell colspan3">
                    <div class="panel success">
                        <div class="heading bg-grayLight">
                            <span class="icon mif-clipboard"></span>
                            <span class="title text-shadow">Transactions</span>
                        </div>
                        <div class="content">
                            <center><br>
                                <h2 class="text-shadow"><?= $num3['count3'] ?> <span class="tag bg-lightGreen fg-white">Pending <span class="mif-paper-plane mif-ani-float fg-lighterBlue mif-lg mif-ani-slow"></span></span>
                                    <br>
                                    <?= $num4['count4'] ?> <span class="tag bg-indigo fg-white">Processing <span class="mif-heart mif-ani-heartbeat fg-red mif-lg mif-ani-slow"></span></span>
                                    <br>
                                    <?= $num5['count5'] ?> <span class="tag bg-lighterBlue fg-white">Paid <span class="mif-user-check mif-ani-heartbeat fg-lightGreen mif-lg mif-ani-slow"></span></span>

                                </h2>
                                <small><a href="<?= base_url(); ?>InfirmarySystem/student_daily_complain" class="text-shadow mif-search fg-blue"> Access</a></small>
                                <br>
                                <br>
                                <br>
                            </center>
                        </div>
                    </div> 
                </div>

                <div class="cell colspan1"></div>
                <div class="cell colspan3">
                    <div class="panel success">
                        <div class="heading bg-grayLight">
                            <span class="icon mif-profile"></span>
                            <span class="title text-shadow">User Profile</span>
                        </div>
                        <div class="content">
                            <center><br>
                                <br>
                                <h2 class="text-shadow"> <?= $num7['count7'] ?> <span class="tag bg-lightGreen fg-white">Admin <span class="mif-user fg-lighterBlue "></span></span>
                                    <br>
                                    <?= $num8['count8'] ?> <span class="tag bg-indigo fg-white">Students <span class="mif-users fg-red "></span></span>
                                </h2>
                                <small><a href="<?= base_url(); ?>InfirmarySystem/student_daily_complain" class="text-shadow mif-search fg-blue"> Access</a></small>
                                <br>
                                <br>
                                <br>
                            </center>
                        </div>
                    </div>
                </div>   
                <div class="cell colspan1"></div>
                <div class="cell colspan3">
                    <div class="panel success">
                        <div class="heading bg-grayLight">
                            <span class="icon mif-profile"></span>
                            <span class="title text-shadow">Calendar Events</span>
                        </div>
                        <div class="content">
                            <center><br>
                                <br>
                                <h2 class="text-shadow"> 
                                    <?= $num8['count8'] ?> <span class="tag bg-lightGreen fg-white">New Events <span class="mif-calendar fg-red "></span></span>
                                </h2>
                                <small><a href="<?= base_url(); ?>InfirmarySystem/student_daily_complain" class="text-shadow mif-search fg-blue"> Access</a></small>
                                <br>
                                <br>
                                <br>
                            </center>
                        </div>
                    </div>
                </div>  
            </div>
            <br>
            <br>


        </div> 
    </div>
</div>
</div>
</div>  
</body>
