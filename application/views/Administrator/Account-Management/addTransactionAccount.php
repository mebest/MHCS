<div class="cell auto-size padding20 bg-white" id="cell-content">
    <h1 class="text-light">Assessment<span class="mif-medkit place-right"></span></h1>
    <hr class="thin bg-grayLighter">

    <div class="flex-grid">
        <div class="row"></div>
        <div class="row">
            <div class="cell colspan3"></div>
            <div class="cell colspan6">
                <div class="panel success">
                    <div class="heading success">
                        <span class="icon mif-profile"></span>
                        <span class="title text-shadow">New Transaction</span>
                    </div>
                    <div class="content">
                        <center><br><br>
                            <form data-role="validator" action="<?php echo base_url(); ?>schoolERP/addTransact" method="post">
                                <fieldset>
                                    <label>Student No.: </label>
                                    <input class="form-control input-sm" name="studentno" type="text" data-validate-func="required, maxlength"
                                           data-validate-arg=",9"
                                           data-validate-hint="Student No. field can not be Empty."
                                           >
                                </fieldset>
                                <fieldset>
                                    <label>Full Name: </label>
                                    <input class="form-control input-sm" name="fname" type="text" data-validate-func="required, maxlength"
                                           data-validate-arg=",30"
                                           data-validate-hint="Firstname field can not be empty and Max length 30"
                                           >
                                </fieldset>
                                
                                <fieldset>
                                    <label>Amount: </label>
                                    <input name="amount" type="number" step='0.01' value='0.00' placeholder='0.00' data-validate-func="required, "
                                           data-validate-hint="Amount field can not be empty"
                                           >
                                </fieldset>
                                <fieldset>
                                    <label>Due Date: </label>
                                    <input name="duedate" type="date" data-date-format="DD MMMM YYYY" data-validate-func="required, "
                                           data-validate-hint="Due Date field can not be empty"
                                           >
                                </fieldset>
                                <fieldset>
                                    <label>Type of Transaction: </label>
                                    <select name="type">
                                    <?php foreach($list as $value){ ?>
                    <option value="<?php echo $value['type']; ?>">
    <?php echo $value['type']; ?>
</option> 
    <?php } ?>
                                    </select>
                                </fieldset>
                                <fieldset>
                                    <?php echo validation_errors(); ?>
                                </fieldset>
                                <fieldset>
                                    <button class="button primary" name="subject" type="submit"><span class="mif-file-upload"></span></button>
                                </fieldset>
                                
                            </form>
                            <br></center>
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