</head>
<body class="bg-darkTeal">
    <div class="login-form padding20 block-shadow">
        <form data-role="validator" method="POST" action="<?= base_url(); ?>Login/verify_login" autocomplete="off">
            <h1 class="text-light">Login to s<span class="fg-cyan"><i>service</i></span></h1>
            <hr class="thin"/>

            <br /> 
            <div class="input-control modern text iconic" data-role="input">
                <input type="text" name="user_login" id="user_login" style="padding-right: 5px;">
                            <span class="label">You login</span>
                            <span class="informer">Please enter you login or email</span>
                            <span class="placeholder" style="display: none;">Input Username</span>
                            <span class="icon mif-user mif-ani-shake fg-cyan"></span>
                        </div>
            <div class="input-control modern password iconic" data-role="input">
                <input type="password" name="user_password" id="user_password">
                <span class="label">You password</span>
                <span class="informer">Please enter you password</span>
                <span class="placeholder">Input password</span>
                <span class="icon mif-lock mif-ani-shake fg-cyan"></span>
                <button class="button helper-button reveal"><span class="mif-looks"></span></button>
            </div>
           <center>
            <h6 class="minor-header">
             <?=  validation_errors();?>
                </h6>
        </center>
            <div class="form-actions">
                <br>
                <button type="submit" class="button primary"><span class="mif-heart mif-ani-heartbeat mif-ani-fast fg-cyan"></span> Login to...</button>

            </div>
            <br />
        </form>        
    </div>
    
   
</body>
</html>