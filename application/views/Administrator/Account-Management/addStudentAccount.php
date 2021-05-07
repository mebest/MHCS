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
                        <span class="title text-shadow">Add New Student</span>
                    </div>
                    <div class="content">
                        <center><br><br>
                            <form data-role="validator" action="<?php echo base_url(); ?>schoolERP/addStudent" method="post">
                              <fieldset>
                                    <label>School Year: </label>
                                    <select name="sy">
                                    <?php foreach($schoolyear as $value){ ?>
                                        <option value="<?php echo $value['name']; ?>">
                                    <?php echo $value['name']; ?>
                                            </option> 
                                        <?php } ?>
                                    </select>
                                </fieldset>
                                <fieldset>
                                    <label>Student No.: </label>
                                    <input name="studentno" type="text" data-validate-func="required, maxlength"
                                           data-validate-arg=",9"
                                           data-validate-hint="Student No. field can not be Empty."
                                           >
                                </fieldset>
                                <fieldset>
                                    <label>Costumer ID: </label>
                                    <input name="costumer_id" type="text" data-validate-func="required, maxlength"
                                           data-validate-arg=",9"
                                           data-validate-hint="Student No. field can not be Empty."
                                           >
                                </fieldset>
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
                                    <label>Email: </label>
                                    <input name="email" type="text" data-validate-func="required, valid_email"
                                           data-validate-hint="Email field can not be empty"
                                           >
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