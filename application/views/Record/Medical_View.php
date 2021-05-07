<div class="cell auto-size padding10 bg-white" id="cell-content">
    <h1 class="text-light">Check-Up Information<span class="mif-medkit place-right"></span></h1>
    <hr class="thin bg-grayLighter">

    <div class="grid">
        <div class="row">
            <div class="cell">
                <span><b>Transaction ID:</b></span>
            </div>
            <div class="cell colspan2">
                <span><?= $comp_log['key'] ?></span>
            </div>
            <div class="cell">
                <span><b>Name:</b></span>
            </div>
            <div class="cell colspan3">
                <span><?= $comp_log['name'] ?></span>
            </div>
        </div>
        <div class="row">
            <div class="cell">
                <span><b>Complaint:</b></span>
            </div>
            <div class="cell colspan2">
                <span><?= $comp_log['complain'] ?></span>
            </div>
        </div>
        <hr class="thin bg-grayLighter">
        </br>
        <div class="tabcontrol2" data-role="tabcontrol">
            <ul class="tabs">
                <li><a href="#Record">Record</a></li>
            </ul>
            <div class="frames">
              
                <div class="frame" id="Record">
                    <div class="grid fg-black">
                        <div class="row "> 
                            <div class="cell">
                                <span><b>Complaint:</b></span>
                            </div>
                            <div class="cell colspan3">
                                <span class="tag fg-black"><?= $comp_log['docComp'] ?></span>
                            </div>
                            <div class="cell">
                                <span><b>Disposition:</b></span>
                            </div>
                            <div class="cell colspan3">
                                <span class="tag fg-black"><?= $comp_log['disposition'] ?></span>
                            </div>

                        </div>
                        <div class="row">
                            <div class="cell">
                                <span><b>Treadment:</b></span>
                            </div>
                            <div class="cell colspan3">
                                <span class="tag fg-black"><?= $comp_log['treatment'] ?></span>
                            </div>
                            <div class="cell">
                                <span><b>Remarks:</b></span>
                            </div>
                            <div class="cell colspan3">
                                <span class="tag fg-black"><?= $comp_log['remarks'] ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="cell">
                                <span><b>Medication:</b></span>
                            </div>
                            <div class="cell colspan3">
                                <span class="tag fg-black"><?= $comp_log['medication'] ?></span>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  

<?php echo validation_errors(); ?>