
</head>
<body class="bg-darkTeal">
    <div class="student-form padding20 block-shadow">                
        <form data-role="validator" method="POST" action="<?php echo base_url() ?>infirmaryStudentForm/submitdata">
            <h1 class="text-light">Infirmary Clinic Form</h1>
            <hr class="thin"/>
            <br />

            <div class="input-control text full-size" data-role="input">
                <label for="Std_Name">Student Name or Student(#):</label>
                <input type="text" name="Std_Name" id="Std_Name" style="padding-right: 36px;" 
                        data-validate-func="required,minlength"
                        data-validate-arg=",8"
                       data-validate-hint="Input correct Reason with 8 min symbols.">
                <span class="input-state-error mif-warning"></span>
                <span class="input-state-success mif-checkmark"></span>
                <button class="button helper-button clear" tabindex="-1" type="button"><span class="mif-cross"></span></button>
            </div>
            <br />
            <br />
            <div class="input-control text full-size" data-role="input">
                <label for="Std_Loc">Location prior to the clinic:</label>
                <input type="text" name="Std_Loc" id="Std_Loc" value="Classroom" style="padding-right: 36px;" data-validate-func="required"
                 data-validate-hint="This field can not be empty!">
                <span class="input-state-error mif-warning"></span>
                <span class="input-state-success mif-checkmark"></span>
                <button class="button helper-button clear" tabindex="-1" type="button"><span class="mif-cross"></span></button>
            </div>
            <br />
            <br />
            <div class="input-control textarea" data-role="input">
                <label for="student_reason">Reason for visit:</label>
                <textarea name="student_reason" id="student_reason" 
                          style="height: 80px; width: 284px; resize: none;"
                          data-validate-func="required,minlength"
                          data-validate-arg=",4"
                          data-validate-hint="Input correct Reason with 4 min symbols."></textarea>
                <span class="input-state-error mif-warning"></span>
                <span class="input-state-success mif-checkmark"></span>
            </div>

            <div class="form-actions">
                <button type="submit" name="submit" value="submit" class="button primary">Request</button>
         <!--  <button type="submit" name="submit" value="search" class="button primary">Search</button> -->
            </div>    
        </form>
    </div>

    <?php echo validation_errors(); ?>
</body>
</html>
