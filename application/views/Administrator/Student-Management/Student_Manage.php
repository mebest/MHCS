
                
                <div class="cell auto-size padding10 bg-white" id="cell-content">
                    <h1 class="text-light">Manage<span class="mif-medkit place-right"></span></h1>
                    <hr class="thin bg-grayLighter">
                    <div class="button primary" onclick="window.location='<?php echo base_url(); ?>InfirmarySystem/StudentManagement';">
            <span class="fa fa-cart-plus fa-lg" style=" vertical-align: middle;"></span>
            <span class="my-text">Student</span>
	    </div>
                    <hr class="thin bg-grayLighter">
                    <table id="manageStudentRecordTable" 
                           class="dataTables_wrapper no-footer hovered border bordered dataTable"  
                           data-searching="true" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Grade</th>
                                <th>Student #</th>
                                <th>Student Name</th>
                                <th>Cluster</th>
                                <th>Class #</th>
                                <th>Section</th>
                                <th>Link</th>
                            </tr>
                        </thead>
                    </table>
                </div>             
            </div>              
        </div>
    </div>  
</body>