<div class="cell auto-size padding10 bg-white" id="cell-content">
    <h1 class="text-light">Medicine<span class="mif-medkit place-right"></span></h1>
    <hr class="thin bg-grayLighter">
    <div class="button primary" onclick="window.location = '<?php echo base_url(); ?>InfirmarySystem/Inventory_Management';">
        <span class="my-text mif-arrow-left"> Back</span>
    </div>


    <div class="grid">
        <br>
        <br>

        <div class="row cells3">
            <div class="cell colspan1"></div>
            <div class="cell colspan4">
                <div class="panel success">
                    <div class="heading success">
                        <span class="icon mif-lab"></span>
                        <span class="title text-shadow">Individual Add</span>
                    </div>
                    <div class="content">
                        <center><br>
                            <br>
                            <form data-role="validator" action="<?php echo base_url(); ?>InfirmarySystem/addMedicine" method="post">     

                                <fieldset>
                                    <input placeholder="Qty" name="qty" type="number" data-validate-func="required"
                                           data-validate-hint="Student # field can not be empty!">
                                </fieldset>

                                <fieldset>
                                    <input placeholder="Medicine Title" name="title" type="text" data-validate-func="required"
                                           data-validate-hint="Student Name field can not be empty!">
                                </fieldset>

                                <fieldset>
                                    <div class="control-label">
                                        <label>Stored Date</label>
                                    </div>
                                    <div class="input-control text" data-role="datepicker" data-preset="<?= date("Y-m-d H:i:s"); ?>">
                                        <input type="text" name="sdatetime">
                                        <button class="button"><span class="mif-calendar"></span></button>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <div class="control-label">
                                        <label>Exp. Date</label>
                                    </div>
                                    <div class="input-control text" data-role="datepicker" data-preset="<?= date("Y-m-d H:i:s"); ?>">
                                        <input type="text" name="edatetime">
                                        <button class="button"><span class="mif-calendar"></span></button>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <button class="button primary" name="subject" type="submit" value="add"><span class="mif-plus"></span></button>
                                </fieldset>
                            </form>
                            <br>
                            <?= validation_errors(); ?>
                            <br>

                        </center>
                    </div>
                </div>
            </div>
            <div class="cell colspan1"></div>
            <div class="cell colspan4">
                <div class="panel success">
                    <div class="heading success">
                        <span class="icon mif-lab"></span>
                        <span class="title text-shadow">Batch Medicine</span>
                    </div>
                    <div class="content">
                        <center><br>
                            <br>
                            <form class="well" action="<?php echo base_url(); ?>InfirmarySystem/csvimportmedi" method="post" name="upload_excel" enctype="multipart/form-data">
                                <fieldset>

                                    <h4>Import CSV/Excel file</h4>

                                    <div class="control-label">
                                        <label>CSV/Excel File:</label>
                                    </div>
                                    <div class="controls form-group input-control file" data-role="input">
                                        <input type="file" name="file" id="file" class="input-large form-control"><button class="button"><span class="mif-folder"></span></button>
                                    </div>

                                </fieldset>

                                <fieldset>
                                    <div class="control-label">
                                        <label>Exp. Date</label>
                                    </div>
                                    <div class="input-control text" id="datepicker">
                                        <input type="text">
                                        <button class="button"><span class="mif-calendar"></span></button>
                                    </div>
                                </fieldset>
                                <fieldset>

                                    <button class="button primary" name="subject" type="submit" value="add"><span class="mif-plus"></span></button>

                                </fieldset>
                            </form>
                            <br>
                            <?= validation_errors(); ?>
                            <br>

                        </center>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
