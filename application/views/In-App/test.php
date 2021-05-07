<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="description" content="Metro, a sleek, intuitive, and powerful framework for faster and easier web development for Windows Metro Style.">
        <meta name="keywords" content="HTML, CSS, JS, JavaScript, framework, metro, front-end, frontend, web development">
        <meta name="author" content="Sergey Pimenov and Metro UI CSS contributors">

        <link rel='shortcut icon' type='image/x-icon' href='../favicon.ico' />

        <title>Web title</title>
        <!-- Metro Loader-->
        <link href="<?php echo base_url(); ?>metro/css/metro.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>metro/css/metro-icons.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>metro/css/metro-responsive.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/metro/3.0.17/js/metro.js"></script>
        <script src="<?php echo base_url(); ?>metro/js/jquery-2.1.3.min.js"></script>
        <script src="<?php echo base_url(); ?>metro/js/metro.js"></script>
        <script src="<?php echo base_url(); ?>metro/js/ga.js"></script>
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

        <link href="<?php echo base_url(); ?>assets/css/profile-design.css" rel="stylesheet">



    </head>
    <body>
        <div class="container">
            <header class="margin20 no-margin-left no-margin-right">


                <div class="app-bar block-shadow-success bg-green " data-role="appbar">

                    <a class="app-bar-element branding"><b>Web Title</b></a>

                    <ul class="app-bar-menu bg-green">
                        <li class="bg-green"><a href="<?php echo base_url(); ?>home">Home</a></li>
                        <li data-flexorder="2"><a href="<?php echo base_url(); ?>gallery">Gallery</a></li>
                        <li data-flexorder="1"><a href="<?php echo base_url(); ?>serbisyo">Our Services</a></li>
                        <li data-flexorder="1"><a href="<?php echo base_url(); ?>about">About Us</a></li>
                        <li data-flexorder="1"><a href="<?php echo base_url(); ?>Bucket_list/bucket_list">Bucket List</a></li>
                        <li data-flexorder="1"><a href="<?php echo base_url(); ?>contact">Contact Us</a></li>



                    </ul>
                    <div class="app-bar-pullbutton automatic"></div>

                </div>
            </header>

            <div class="main-content clear-float">
                <div class="tile-area no-padding">
                    <div class="tile-group margin10 padding10" style="width: 100%">



                        <br>
                        <div class="grid">


                            <?php if (isset($message)) { ?>

                                <p>Successfully Updated Password</p>

                            <?php } ?>

                            <div class="row list-group-item block-shadow-info">

                                <center><h1 class="text-shadow ">Bucket Lists</h1></center>
                                <div class="content">
                                    <?php foreach ($userdatas as $data): ?>
                                        <div class="">
                                            <br>
                                            <br>
                                            <br>
                                                <div class="row list-group-item">
                                                    <div class="cell">
                                                        <img class="two text-shadow"  data-format="square"  
                                                             src="<?= base_url(); ?>uploads/cms/logo/<?= $data->bucket_image_1; ?>" height="30px" width="15%"></div>
                                                    <div class="cell">
                                                        <center><h4 class="text-shadow fg-green"><strong><?= $data->bucket_title_1; ?></strong></h4></center>
                                                        <center> <strong><small><p class="fg-red"><?= $data->bucket_description_1; ?></p></small></strong> </center>


                                                    </div>
                                                </div>
                                                <br>
                                            </div>

                                            <div class="col-xs-6 col-lg-6">
                                                <br>
                                                <br>
                                                <br>
                                                <div>
                                                    <div class="row list-group-item">

                                                        <img class="two text-shadow" data-role="fitImage" data-format="square"  
                                                             src="<?= base_url(); ?>uploads/cms/logo/<?= $data->bucket_image_2; ?>"> 


                                                    </div>
                                                    <center><h4 class="text-shadow fg-green"><strong><?= $data->bucket_title_2; ?></strong></h4></center>
                                                    <center> <strong><small><p class="fg-red"><?= $data->bucket_description_2; ?></p></small></strong> </center>

                                                    <br>







                              <!--      <center><a href="<?php echo base_url() ?>services/pick/<?= $bundle->bundle_id; ?>" class="button rounded warning">Reserve Bundle</a>
                                    </center> -->
                                                    <br>
                                                </div>

                                                <div class="col-xs-6 col-lg-6">
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <div>
                                                        <div class="row list-group-item">

                                                            <img class="two text-shadow" data-role="fitImage" data-format="square"  
                                                                 src="<?= base_url(); ?>uploads/cms/logo/<?= $data->bucket_image_3; ?>"> 


                                                        </div>
                                                        <center><h4 class="text-shadow fg-green"><strong><?= $data->bucket_title_3; ?></strong></h4></center>
                                                        <center> <strong><small><p class="fg-red"><?= $data->bucket_description_3; ?></p></small></strong> </center>

                                                        <br>







                              <!--      <center><a href="<?php echo base_url() ?>services/pick/<?= $bundle->bundle_id; ?>" class="button rounded warning">Reserve Bundle</a>
                                    </center> -->
                                                        <br>
                                                    </div>

                                                    <div class="col-xs-6 col-lg-6">
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <div\>
                                                            <div class="row list-group-item">

                                                                <img class="two text-shadow" data-role="fitImage" data-format="square"  
                                                                     src="<?= base_url(); ?>uploads/cms/logo/<?= $data->bucket_image_4; ?>"> 


                                                            </div>
                                                            <center><h4 class="text-shadow fg-green"><strong><?= $data->bucket_title_4; ?></strong></h4></center>
                                                            <center> <strong><small><p class="fg-red"><?= $data->bucket_description_4; ?></p></small></strong> </center>

                                                            <br>







                              <!--      <center><a href="<?php echo base_url() ?>services/pick/<?= $bundle->bundle_id; ?>" class="button rounded warning">Reserve Bundle</a>
                                    </center> -->
                                                            <br>
                                                        </div>
                                                    </div>

                                                <?php endforeach; ?>
                                            </div>


                                            <br>
                                            <br>
                                            <br>


                                        </div>







                                    </div>




                                </div>


                            </div>

                            <footer>
                                <div class="app-bar block-shadow-success bg-green" data-role="appbar">
                                    <ul class="app-bar-menu">
                                        <li><a>&copy; 2017 The Webtitle</a></li>
                                    </ul>
                                    <ul class="app-bar-menu place-right" >

                                        <li class="place-right"><a href="#">The Developers</a></li>

                                    </ul>
                                </div>
                            </footer>
                        </div>






                        <!--MODAL-->



                        <!--SCRIPT-->
                        <script>

                        </script>




                        </body>
                        </html>