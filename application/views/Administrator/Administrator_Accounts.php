

                <div class="cell auto-size padding10 bg-white" id="cell-content">
                    <h1 class="text-light">Profile<span class="mif-medkit place-right"></span></h1>
                    <hr class="thin bg-grayLighter">
                    <a href="<?= base_url(); ?>schoolERP/Student_Account" class="button primary  mif-user-plus fg-white"> Add Student</a>
                    <a href="<?= base_url(); ?>schoolERP/Admin_Account" class="button primary  mif-user-plus fg-white"> Add Admin</a>
                    <div class="tabcontrol2" data-role="tabcontrol">
                        <ul class="tabs">
                            <li><a href="#Nurse">Student Profile</a></li>
                            <li><a href="#Doctor">Administrator Profile</a></li>
                        </ul>
                        <div class="frames">
                            <div class="frame" id="Nurse">
                                <table id="studentAccountTable" class="dataTables_wrapper no-footer hovered border bordered dataTable"  
                                       data-searching="true" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Student No.</th>
                                            <th>Costumer ID.</th>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>

                            </div>

                            <div class="frame" id="Doctor">
                                <table id="adminAccountTable" class="dataTables_wrapper no-footer hovered border bordered dataTable"  
                                       data-searching="true" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>  
</body>