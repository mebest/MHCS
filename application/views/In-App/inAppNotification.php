

<div class="cell auto-size padding10 bg-white" id="cell-content">
    <h1 class="text-light">Notification<span class="mif-medkit place-right"></span></h1>
    <hr class="thin bg-grayLighter">

    <div class="tabcontrol2" data-role="tabcontrol">
        <ul class="tabs">
            <li><a href="#Push">App-Push Notification</a></li>
            <li><a href="#Sms">Sms Notification</a></li>
        </ul>
        <div class="frames">
            <div class="frame" id="Push">
                  <div class="flex-grid">
        <div class="row"></div>
        <div class="row">
            <div class="cell colspan1"></div>
            <div class="cell colspan2">
            </div>  
            <div class="cell colspan1"></div>
            <div class="cell colspan2" style="font-size: 0.875rem;">

                <h4>Disposition</h4>

                <form data-role="validator" action="<?php echo base_url(); ?>InfirmarySystem/dispoManage" method="post">
                    <fieldset>
                        <input placeholder="Disposition Title" name="dispositiontitle" id="dispositiontitle" type="text" data-validate-func="required"
                               data-validate-hint="Disposition Title field can not be empty!">                 
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

            <div class="frame" id="Sms">
         <div class="flex-grid">
        <div class="row"></div>
        <div class="row">
            <div class="cell colspan1"></div>
            <div class="cell colspan2">
            </div>  
            <div class="cell colspan1"></div>
            <div class="cell colspan2" style="font-size: 0.875rem;">

                <h4>Single Send</h4>

                <form data-role="validator" action="<?php echo base_url(); ?>InfirmarySystem/sendSMS" method="post">
                    <fieldset>
                        <input placeholder="Mobile Number" name="number" id="dispositiontitle" type="text" data-validate-func="required"
                               data-validate-hint="Disposition Title field can not be empty!">                 
                    </fieldset>
                    <fieldset>
                        <textarea placeholder="Message" name="Message" id="dispositiontitle" type="text" data-validate-func="required"
                                  data-validate-hint="Disposition Title field can not be empty!"></textarea>
                    </fieldset>
                    <fieldset>
                        <button class="button primary" name="subject" type="submit" value="add"><span class="mif-plus"></span></button>
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
</div>
</div>
</div>  
</body>