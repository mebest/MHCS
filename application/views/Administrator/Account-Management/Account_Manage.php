

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
                                        <span class="title text-shadow">Modify</span>
                                    </div>
                                    <div class="content">
                                        <center><br><br>
                                            <form data-role="validator" action="<?php echo base_url(); ?>SchoolERP/updateAccount?user_id=<?= $user_id ?>" method="post">
                                                <fieldset>
                                                    <label>Student No: </label>
                                                    <input name="studentnum" type="text" data-validate-func="required" placeholder="<?= $user_account['stdno'] ?>"s
                                                           data-validate-hint="Class # field can not be empty!">
                                                </fieldset>
                                                <fieldset>
                                                    <label>Costumer ID: </label>
                                                    <input placeholder="<?= $user_account['cid'] ?>" name="costomerid" type="text" data-validate-func="required"
                                                           data-validate-hint="Firstname field can not be empty!">
                                                </fieldset>
                                                <fieldset>
                                                    <label>Full Name: </label>
                                                    <input placeholder="<?= $user_account['fname'] ?>" name="fullname" type="text" data-validate-func="required"
                                                           data-validate-hint="Firstname field can not be empty!">
                                                </fieldset>
                                                <fieldset>
                                                    <label>Username: </label>
                                                    <input placeholder="<?= $user_account['user'] ?>" name="username" type="text" data-validate-func="required"
                                                           data-validate-hint="Class # field can not be empty!">
                                                </fieldset>

                                                <fieldset>
                                                    <button class="button primary" name="subject" type="submit" placeholder="add"><span class="mif-file-upload"></span></button>
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
</body>