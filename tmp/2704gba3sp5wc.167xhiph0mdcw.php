<!DOCTYPE html>
<html>
<head>
    <link href="<?= ($BASE) ?>/ui/css/owl_carousel.css" type="text/css" rel="stylesheet" />


</head>
<body>

<!--
<body style="background: #2d2352">
 <section class="wrapper"  >



    <div class="container">

        <div id="scene" class="scene" data-hover-only="false">


            <div class="circle" data-depth="1.2"></div>

            <div class="one" data-depth="0.9">
                <div class="content">
                    <span class="piece"></span>
                    <span class="piece"></span>
                    <span class="piece"></span>
                </div>
            </div>

            <div class="two" data-depth="0.60">
                <div class="content">
                    <span class="piece"></span>
                    <span class="piece"></span>
                    <span class="piece"></span>
                </div>
            </div>

              <p class="p404" data-depth="0.50" ><?= ($error_message_main) ?></p>

        </div>

        <div class="text">
            <article>
                <!-- <p>المحتوى غير موجود </p> -->
            <!--    <a href="<?= ($link) ?>"><?= ($error_message_link) ?></a>
            </article>
        </div>
     </div>
</section> -->




<h1></h1>
<p><?= ($error_message_main) ?> </p>
<a class="button" href="<?= ($link) ?>"><i class="icon-home"></i><?= ($error_message_link) ?></a>











<?php echo $this->render('/layouts/footer.html',NULL,get_defined_vars(),0); ?>

