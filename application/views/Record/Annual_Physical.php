<div class="cell auto-size padding10 bg-white" id="cell-content">
    <h1 class="text-light">Annual Physical Exam Record<span class="mif-medkit place-right"></span></h1>
    <hr class="thin bg-grayLighter">

    <div class="grid">
        <div class="row">
            <div class="cell colspan2">
                <span><b>Name:&emsp;</b></span><span><?= $comp_log['name'] ?></span>
            </div>
            <div class="cell colspan2">
                <span><b>Student #:&emsp;</b></span> <span><?= $comp_log['std_num'] ?></span>
            </div>
        </div>
         
            <div data-role="dialog" id="dialog" class="padding30" data-close-button="true" data-overlay="true" data-overlay-color="op-dark" data-overlay-click-close="true">
                <form action="<?= $comp_log['newAnnual']; ?>" method="POST">
                <div class="input-control select">
                    <select name="Times">
                        <option value="First">First</option>
                        <option value="Second">Second</option>
                        <option value="Third">Third</option>
                    </select>
                </div>
                <button class="button success" ><span class="mif-plus mif-ani-heartbeat mif-ani-fast fg-white"></span></br> Add New</button>
                </form>
            </div>
        <button class="button primary" onclick="metroDialog.toggle('#dialog')">New</button>
        <hr class="thin bg-grayLighter">
        </br>
        <table id="viewAnnualRecordTable" class="dataTables_wrapper no-footer hovered border bordered"  
               data-searching="true">
            <thead>
                <tr>
                    <th>Trans. ID</th>
                    <th>Date</th>
                    <th>Findings</th>
                    <th>Vital Sign</th>
                    <th>Physical Exam.</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>  




<?php echo validation_errors(); ?>