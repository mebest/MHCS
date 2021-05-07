<div class="cell auto-size padding10 bg-white" id="cell-content">
    <h1 class="text-light">Manage<span class="mif-medkit place-right"></span></h1>
    <hr class="thin bg-grayLighter">

    <div class="flex-grid">
        <div class="row"></div>
        <div class="row">
            <div class="cell colspan1"></div>
            <div class="cell colspan2">
                <form data-role="validator" action="<?php echo base_url(); ?>InfirmarySystem/addStudentlist" method="post">
                    <h4>Add Student</h4>
                    <fieldset>
                        <select style="width: 100%;" autofocus="" name="grade">
                            <?php
                            foreach ($grade['list'] as $row) {
                                echo '<option>' . $row->grade_Name . '</option>';
                            }
                            ?>
                        </select>
                    </fieldset>
                    <fieldset>
                        <input placeholder="Student #" name="std_num" type="text" data-validate-func="required"
                               data-validate-hint="Student # field can not be empty!">
                    </fieldset>

                    <fieldset>
                        <input placeholder="Student Name" name="std_name" type="text" data-validate-func="required"
                               data-validate-hint="Student Name field can not be empty!">
                    </fieldset>
                    <fieldset>
                        <input placeholder="Class #" name="class_num" type="text" data-validate-func="required"
                               data-validate-hint="Class # field can not be empty!">
                    </fieldset>
                    <fieldset>
                        <select style="width: 100%;" autofocus="" name="cluster">
                            <?php
                            foreach ($cluster['class'] as $row) {
                                echo '<option>' . $row->cluster_Name . '</option>';
                            }
                            ?>
                        </select> 
                    </fieldset>
                    <fieldset>
                        <select style="width: 100%;" autofocus="" name="section">
                            <?php
                            foreach ($section['list'] as $row) {
                                echo '<option>' . $row->section_name . '</option>';
                            }
                            ?>
                        </select> 
                    </fieldset>
                    <fieldset>
                        <button class="button primary" name="subject" type="submit" value="add"><span class="mif-plus"></span></button>
                    </fieldset>
                </form>

                <form class="well" action="<?php echo base_url(); ?>InfirmarySystem/csvimport" method="post" name="upload_excel" enctype="multipart/form-data">
                    <fieldset>  
                        <h4>Import CSV/Excel file</h4>
                        <div class="control-group">
                            <div class="control-label">
                                <label>CSV/Excel File:</label>
                            </div>
                            <div class="controls form-group input-control file" data-role="input">
                                <input type="file" name="file" id="file" class="input-large form-control"><button class="button"><span class="mif-folder"></span></button>
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="controls">
                                <button class="button primary" name="subject" type="submit" value="add"><span class="mif-plus"></span></button>
                            </div>
                        </div>
                    </fieldset>
                </form>


            </div>  
            <div class="cell colspan1"></div>
            <div class="cell colspan2">

                <h4>Cluster</h4>
                <fieldset>
                    <select multiple="multiple" style="width: 100%;"  tabindex="5" autofocus="" id="clusterlist" onchange="this.form.submit()">
                        <?php
                        foreach ($cluster['class'] as $row) {
                            echo '<option>' . $row->cluster_Name . '</option>';
                        }
                        ?>
                    </select> 
                </fieldset>
                <form data-role="validator" action="<?php echo base_url(); ?>InfirmarySystem/clusterManage" method="post">
                    <fieldset>
                        <input placeholder="Cluster Name" name="clustername" type="text" tabindex="2" data-validate-func="required"
                               data-validate-hint="Class Name field can not be empty!">                 
                    </fieldset>
                    <fieldset>
                        <button class="button primary" name="subject" type="submit" value="add"><span class="mif-plus"></span></button>
                        <button class="button danger" name="subject" type="submit" value="delete"><span class="mif-minus"></span></button>
                    </fieldset>
                </form>   
            </div>


            <div class="cell colspan1"></div>
            <div class="cell colspan2">

                <h4>Section</h4>
                <fieldset>
                    <select multiple="multiple" style="width: 100%;"  tabindex="6" autofocus="" name="section" onchange="this.form.submit()">
                        <?php
                        foreach ($section['list'] as $row) {
                            echo '<option>' . $row->section_name . '</option>';
                        }
                        ?>
                    </select> 
                </fieldset>
                <form data-role="validator" action="<?php echo base_url(); ?>InfirmarySystem/sectionManage" method="post">
                    <fieldset>
                        <input placeholder="Section Name" name="sectionname" type="text" tabindex="2" data-validate-func="required"
                               data-validate-hint="Section Name field can not be empty!">                 
                    </fieldset>
                    <fieldset>
                        <button class="button primary" name="subject" type="submit" value="add"><span class="mif-plus"></span></button>
                        <button class="button danger" name="subject" type="submit" value="delete"><span class="mif-minus"></span></button>
                    </fieldset>
                </form>   
            </div>
        </div>

    </div>
</div>
</div>             
</div>              
</div>
</div>  
