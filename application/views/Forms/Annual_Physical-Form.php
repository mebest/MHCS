<div class="cell auto-size padding10 bg-white" id="cell-content">
    <h1 class="text-light">Annual Physical Exam Record<span class="mif-medkit place-right"></span></h1>
    <hr class="thin bg-grayLighter">

    <div class="grid">
        <div class="row">
            <div class="cell colspan2">
                <span><b>Name:&emsp;</b></span><span><?= $comp_log['name'] ?></span>
            </div>
            <div class="cell colspan2">
                <span><b>Student #:&emsp;</b></span> <span><?= $comp_log['std_num'] ?></span>
            </div>
            <div class="cell colspan2">
                <span><b>Grade/Sec:&emsp;</b></span> <span><?= $comp_log['grade'].'-'.$comp_log['section'] ?></span>
            </div>
        </div>
        <hr class="thin bg-grayLighter">
        </br>
        <div class="tabcontrol2" data-role="tabcontrol">
            <ul class="tabs">
                <li><a href="#Findings">FINDINGS</a></li>
                <li><a href="#Vital">VITAL SIGNS</a></li>
                <li><a href="#Physical">PHYSICAL EXAMINATION</a></li>
                <li><a href="#Record">RECORD</a></li>
            </ul>
            <div class="frames">
                <div class="frame" id="Findings">
                    <div class="row">
                        <div class="cell colspan12">
                            <form data-role="validator" id="findings" method="POST" action="Medical_Info?Token=<?= $accToken['token']; ?>">
                                <textarea name="findings" id="findings" class="textarea"
                                          rows="10"
                                          style="height: 100%; width: 100%; 
                                          font-size: 30px;
                                          font-family: serif;
                                          resize: none;" 
                                          data-validate-func="required" 
                                          data-validate-hint="This field can not be empty!"><?=$status['valFin'];?></textarea></form>
                        </div>

                    </div>
                    <div class="row">
                        <div class="cell colspan12">
                            <button type="submit" form="findings" class="button primary" style="width: 100%;" ><span class="mif-plus mif-ani-heartbeat mif-ani-fast fg-white"></span> Findings</button>
                        </div>
                    </div>
                </div>
                <div class="frame" id="Vital">
                    //
                </div>
                <div class="frame" id="Physical">
                    //
                </div>
                <div class="frame" id="Record">
                    record
                </div>
            </div>
        </div>
    </div>
</div>  




<?php echo validation_errors(); ?>