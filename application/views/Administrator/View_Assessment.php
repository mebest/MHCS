<div class="cell auto-size padding10 bg-white" id="cell-content">
    <div class="flex-grid">       
        <div class="row">
            <div class="cell colspan2">
            </div>
            <div class="cell colspan3">
                &emsp;&emsp;<h5>Assessments</h5>
            </div>
        </div>
        <hr class="thin bg-grayLighter">
        </br>

        <div class="row bg-white">
                <div class="cell colspan8">
                    <div class="row">    
                        <div class="cell colspan3">
                            <div class="cell colspan6"></div>
                        </div>
                        <div class="cell padding10 colspan3">
                            Statement of Account
                        </div>
                        <div class="cell padding10 colspan6">
                            <?=$sy?>
                        </div>
                    </div>
                    <div class="row">    
                        <div class="cell colspan3">
                            <div class="cell colspan6"></div>
                        </div>
                        <div class="cell padding10 colspan3">
                            Stundet Number
                        </div>
                        <div class="cell padding10 colspan6">
                            <?=$cdata['stud_no']?>
                        </div>
                    </div>
                    <div class="row">    
                        <div class="cell colspan3">
                            <div class="cell colspan6"></div>
                        </div>
                        <div class="cell padding10 colspan3">
                            Full Name
                        </div>
                        <div class="cell padding10 colspan6">
                            <?=$cdata['name']?>
                        </div>
                    </div>
                    <div class="row">    
                        <div class="cell colspan3">
                        </div>
                        <div class="cell padding10 colspan3">
                            Grade
                        </div>
                        <div class="cell padding10 colspan6">
                            N/A
                        </div>
                    </div>
                    <div class="row">    
                        <div class="cell colspan3">
                            <div class="cell colspan6">&nbsp;</div>
                            <div class="cell colspan6">&nbsp;</div>
                        </div>
                    </div>
                    <div class="row">    
                        <div class="cell colspan3">
                            <div class="cell colspan6"></div>
                        </div>
                        <div class="cell padding10 colspan3">
                            Beginning Balance
                        </div>
                        <div class="cell padding10 colspan6">
                            <?=$infos['tf_balance']?>
                        </div>
                    </div>
                    <div class="row">    
                        <div class="cell colspan3">
                            <div class="cell colspan6"></div>
                        </div>
                        <div class="cell padding10 colspan3">
                            Total Assessments
                        </div>
                        <div class="cell padding10 colspan6">
                            <?=$infos['t_balance']?>
                        </div>
                    </div>
                    <div class="row">    
                        <div class="cell colspan3">
                            <div class="cell colspan6"></div>
                        </div>
                        <div class="cell padding10 colspan3">
                            Payments
                        </div>
                        <div class="cell padding10">
                        <?php foreach ($getPayments as $value) {
                            echo '<div class="cell">('.$value->or_value.')</div>';
                        }?>
                        </div>
                            
                           
                        <div class="cell padding10 colspan6">
                        <?php foreach ($getPayments as $value) {
                            echo '<div class="cell">'.$value->or_num.'</div>';
                        }?>    
                        </div>
                    </div>
                    <div class="row">    
                        <div class="cell colspan3">
                            <div class="cell colspan6"></div>
                        </div>
                        <div class="cell padding10 colspan3">
                            Remaining Balance
                        </div>
                        <div class="cell padding10 colspan6">
                            (<?=$infos['r_balance']?>)
                        </div>
                    </div>
                </div>
            <div style="border-left:1px solid #ccc;height:auto;"></div>
            <div class="cell colspan4" id="cell-content">
                    <div class="row">
                        <div class="cell padding20 colspan12" > 
                            <label><b>Payment Slip: </b></label></br>
                            <table class="table border bordered">
                                <thead>
                                    <tr>
                                        <th>Images</th>
                                        <th>View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                <?php
                                    foreach ($images as $value) {
                                        echo ''.$value->payment_slip.'';
                                    }
                                    ?>
                                </tbody>
                            </table>       
                        </div>
                    </div>

            </div>

        </div>
    </div>
    <br><br>
    <div class="flex-grid">
        <div class="row">
            <div class="cell colspan2">
            </div>
            <div class="cell colspan3">
                &emsp;&emsp;<h5>Attachment Verification</h5>
            </div>
        </div>
        <hr class="thin bg-grayLighter">

        <div class="row bg-white">
                <div class="cell colspan8">
                    <div class="row">    
                        <div class="cell colspan3">
                            <div class="cell colspan6"></div>
                        </div>
                        <div class="cell padding10 colspan6" style="text-align: left; font-size: 15px;">
                            &nbsp;
                        </div>
                    </div>
                    <div class="row">    
                        <div class="cell colspan3">
                            <div class="cell colspan6"></div>
                        </div>
                        <div class="cell padding10 colspan3">
                            Beginning Balance
                        </div>
                        <div class="cell padding10 colspan6">
                            <?=$infos['tf_balance']?>
                        </div>
                    </div>
                    <div class="row">    
                        <div class="cell colspan3">
                            <div class="cell colspan6"></div>
                        </div>
                        <div class="cell padding10 colspan3">
                            Total Assessments
                        </div>
                        <div class="cell padding10">
                            <?=$infos['t_balance']?>
                        </div>
                        <div class="cell padding10 colspan5">
                            <form action="<?php echo base_url(); ?>schoolERP/deductBalance?studentno=<?=$cdata['stud_no']?>&Access_Token=<?=$cdata['Access_Token']?>&SY=<?=$usy?>" method="post">
                            <label>Payment Amount: </label>
                                    <input name="deduct" type="number" step='0.01' placeholder='0.00' value='0.00'data-validate-func="required,">
                                    <button name="subject" type="submit">submit</button>
                                    <?php echo validation_errors(); ?>
                                       </form>
                                       
                        </div>
                    </div>
                    
                        
                </div>
            
        </div>
    </div>
</div>