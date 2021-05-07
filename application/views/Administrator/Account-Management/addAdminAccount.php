<div class="cell auto-size padding20 bg-white" id="cell-content">
    <h1 class="text-light">Profile<span class="mif-medkit place-right"></span></h1>
    <hr class="thin bg-grayLighter">

    <div class="flex-grid">
        <div class="row"></div>
        <div class="row">
            <div class="cell colspan3"></div>
            <div class="cell colspan6">
                <div class="panel success">
                    <div class="heading success">
                        <span class="icon mif-profile"></span>
                        <span class="title text-shadow">Add New Nurse</span>
                    </div>
                    <div class="content">
                        <center><br><br>
                            <form data-role="validator" action="<?php echo base_url(); ?>schoolERP/addAdmin" method="post">

                                <fieldset>
                                    <label>Full Name: </label>
                                    <input name="fname" type="text" data-validate-func="required, maxlength"
                                           data-validate-arg=",30"
                                           data-validate-hint="Firstname field can not be empty and Max length 30"
                                           >
                                </fieldset>
                                <fieldset>
                                    <label>Username: </label>
                                    <input name="username" type="text" data-validate-func="required, maxlength"
                                           data-validate-arg=",30"
                                           data-validate-hint="Username field can not be empty and Max length 30"
                                           >
                                </fieldset>
                                <fieldset>
                                    <label>Password: </label>
                                    <input value="Default: !123admu" name="class_num" disabled type="text">
                                </fieldset>
                                <fieldset>
                                    <label>Type of Transaction: </label>
                                    <select name="status">
                                        <option value="1">Administrator</option>     
                                        <option value="2">Management</option> 
                                    </select>
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