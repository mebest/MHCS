

<div class="cell auto-size padding10 bg-white" id="cell-content">
    <h1 class="text-light">Inventory<span class="mif-medkit place-right"></span></h1>
    <hr class="thin bg-grayLighter">
    <div class="tabcontrol2" data-role="tabcontrol">
        <ul class="tabs">
            <li><a href="#Medicine">Medicines</a></li>
            <li><a href="#Supplies">Supplies</a></li>
            <li><a href="#addMedicine">Add Medicines</a></li>
            <li><a href="#addSupplies">Add Supplies</a></li>
        </ul>
        <div class="frames">
            <div class="frame" id="Medicine">
                <table id="manageMedicineRecordTable" 
                       class="dataTables_wrapper no-footer hovered border bordered"  
                       data-searching="true" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Qty.</th>
                            <th>Medicine Name</th>
                            <th>Type</th>
                            <th>Stored Date</th>
                            <th>Expiration Date</th>
                            <th id="notif">Qty. Status</th>
                            <th>Item Code.</th>
                            <th>Actions</th>                  
                        </tr>
                    </thead>
                </table>
                <div data-role="dialog" id="dialog" class="padding20" data-close-button="true" 
                     data-overlay="true" data-overlay-color="op-dark" data-overlay-click-close="true">
                    <h1><span class="mif-info"></span> Removing Item</h1>

                    <p>Are You Sure To Delete The Item?</p>
                    <a href="removeItem?Code="><button type="submit" class="button success">Yes</button></a>
                    <a href="Inventory_Management"><button class="button alert">No</button></a>

                </div>
            </div>

            <div class="frame" id="Supplies">
                <table id="manageSuppliesRecordTable" 
                       class="dataTables_wrapper no-footer hovered border bordered"  
                       data-searching="true" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Qty.</th>
                            <th>Supply Name</th>
                            <th>Supply Details</th>
                            <th>Stored Date</th>
                        </tr>
                    </thead>
                </table>
            </div> 

            <div class="frame" id="addMedicine">
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
                                                <label>Type:</label>
                                            </div>
                                            <div class="input-control select">
                                                <select name="status">
                                                    <option val="Solid">Solid</option>
                                                    <option val="Liquid">Liquid</option> 
                                                    <option val="Gas">Gas</option>
                                                </select>
                                            </div>
                                        </fieldset>
                                
                                        
                                        <fieldset>
                                            
                                            <div class="input-control text" data-role="datepicker" data-preset="<?= date("Y-m-d H:i:s"); ?>">
                                                <input type="text" name="sdatetime">
                                                <button class="button"><span class="mif-calendar"></span></button>
                                            </div>
                                        </fieldset>
                                        
                                        <fieldset>
                                            <div class="control-label">
                                                <label>Exp. Date</label>
                                            </div>
                                            <div class="input-control text" data-role="datepicker">
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
                                            <div class="input-control text" data-role="datepicker">
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

            <div class="frame" id="addSupplies">
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
                                    <form data-role="validator" action="<?php echo base_url(); ?>InfirmarySystem/addSupplies" method="post">
                                        <fieldset>
                                            <input placeholder="Qty" name="qty" type="number" data-validate-func="required"
                                                   data-validate-hint="Quantity field can not be empty!">
                                        </fieldset>

                                        <fieldset>
                                            <input placeholder="Supply Title" name="title" type="text" data-validate-func="required"
                                                   data-validate-hint="Title field can not be empty!">
                                        </fieldset>
                                        <fieldset>
                                            <input placeholder="Supply Description" name="descr" type="text" data-validate-func="required"
                                                   data-validate-hint="Description field can not be empty!">
                                        </fieldset>
                                        <label>Stored Date:</label><br>
                                        <fieldset>
                                            <div class="input-control text" data-role="datepicker" data-preset="<?= date("m-d-Y H:i:s"); ?>">
                                                <input type="text" name="datetime">
                                                <button class="button"><span class="mif-calendar"></span></button>
                                            </div>
                                        </fieldset>

                                        <fieldset>
                                            <button class="button primary" name="subject" type="submit" value="add"><span class="mif-plus"></span></button>
                                        </fieldset>
                                    </form>
                                    <br>
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
                                <span class="title text-shadow">Butch Supply</span>
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
                                            <label>Stored Date:</label><br>
                                            <div class="input-control text" data-role="datepicker" data-preset="<?= date("Y-m-d H:i:s"); ?>">
                                                <input type="text" name="datetimecsv">
                                                <button class="button"><span class="mif-calendar"></span></button>
                                            </div>
                                        </fieldset>
                                        <fieldset>

                                            <button class="button primary" name="subject" type="submit" value="add"><span class="mif-plus"></span></button>

                                        </fieldset>
                                    </form>
                                    <br>
                                    <br>

                                </center>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>             
</div>              
</div>
</div>  
</body>