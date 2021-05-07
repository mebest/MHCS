<div class="cell auto-size padding10 bg-white" id="cell-content">
    <h1 class="text-light">Student Portal</h1>
    <div class="cell auto-size padding20 bg-white" id="cell-content">  
        <div class="flex-grid">
            <div class="row">
                <div class="cell colspan3"></div>
                <div class="cell sub-header" style="text-align: left;">
                Accounts
                </div>
            </div>
            <br><hr class="thin bg-grayLighter"><br>
            <div class="row">
                <div class="cell colspan3"></div>
                <div class="cell colspan2" style="text-align: left;">
                Student Number: &nbsp;
                </div>
                <div class="cell " style="text-align: left;">
                &emsp;<?=$user_log['stdno']?>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="cell colspan3"></div>
                <div class="cell colspan2" style="text-align: left;">
                Email: &nbsp;
                </div>
                <div class="cell colspan2" style="text-align: left;">
                &emsp;<?=$user_log['email']?>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="cell colspan3"></div>
                <div class="cell colspan2" style="text-align: left;">
                Username: &nbsp;
                </div>
                <div class="cell colspan2" style="text-align: left;">
                &emsp;<?=$user_log['user']?>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="cell colspan3"></div>
                <div class="cell colspan2" style="text-align: left;">
                Password: &nbsp;
                </div>
                <div class="cell colspan2" style="text-align: left;">
                &emsp;*************** [ <a href="<?= base_url(); ?>schoolERP/Account_Change?user_id=<?= $user_log['id'] ?>" class="fg-white2 fg-hover-yellow">Edit</a></li> ]
                </div>
            </div>
            <br>
            
        </div> 
    </div>
    <div class="cell auto-size padding20 bg-white" id="cell-content">  
        <div class="flex-grid">
            <div class="row">
                <div class="cell colspan3"></div>
                <div class="cell sub-header" style="text-align: left;">
                Profile &nbsp;
                </div>
            </div>
            <br><hr class="thin bg-grayLighter"><br>
            
            <div class="row">
                <div class="cell colspan3"></div>
                <div class="cell colspan2" style="text-align: left;">
                Name: &nbsp;
                </div>
                <div class="cell colspan2" style="text-align: left;">
                &emsp;<?=$user_log['name']?>
                </div>
            </div>
            <br>
    
            <div class="row">
                <div class="cell colspan3"></div>
                <div class="cell colspan2" style="text-align: left;">
                Citizenship: &nbsp;
                </div>
                <div class="cell colspan2" style="text-align: left;">
                &emsp;Filipino
                </div>
            </div>
            <br>
            <div class="row">
                <div class="cell colspan3"></div>
                <div class="cell colspan2" style="text-align: left;">
                Section: &nbsp;
                </div>
                <div class="cell colspan2" style="text-align: left;">
                &emsp;N/A
                </div>
            </div>
            <br>
                        

        </div> 
    </div>
    <div class="cell auto-size padding20 bg-white" id="cell-content">  
        <div class="flex-grid">
            <div class="row">
                <div class="cell colspan3"></div>
                <div class="cell sub-header" style="text-align: left;">
                Enrollment &nbsp;
                </div>
            </div><hr class="thin bg-grayLighter"><br>
            
            <div class="row">
                <div class="cell colspan3"></div>
                <div class="cell colspan2" style="text-align: left;">
                Grade: &nbsp;
                </div>
                <div class="cell colspan2" style="text-align: left;">
                &emsp;N/A
                </div>
            </div>
            <br>
            
            <div class="row">
                <div class="cell colspan3"></div>
                <div class="cell colspan2" style="text-align: left;">
                Regestration Status: &nbsp;
                </div>
                <div class="cell colspan2" style="text-align: left;">
                &emsp;N/A
                </div>
            </div>
            <br>
            <div class="row">
                <div class="cell colspan3"></div>
                <div class="cell colspan2" style="text-align: left;">
                Grade Viewing: &nbsp;
                </div>
                <div class="cell colspan3" style="text-align: left;">
                &emsp;Temporary unavailable
                </div>
            </div>
            <br>
            
        </div> 
    </div>
</div>
</div>
</div>  
</body>