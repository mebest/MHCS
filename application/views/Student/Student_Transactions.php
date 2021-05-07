<div class="cell auto-size padding10 bg-white" id="cell-content">
    <h1 class="text-light">Student Assessment Process<span class="mif-medkit place-right"></span></h1>
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
        </div>
    </div>
    <div data-role="dialog" id="dialog" class="padding10" data-close-button="true" data-overlay="true" data-overlay-color="op-dark" data-overlay-click-close="true">
        <img src="../images/valid.png" style="height: 10%; width: 10%;">
    </div>
</div>  

<?php echo validation_errors(); ?>