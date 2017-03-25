<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" type="text/css" href="<?php echo SERVER; ?>style/style.css" />
        <title><?php echo $title; ?></title>
    </head>
    <body>
        <header>
            <img src="<?php echo SERVER; ?>images/header.jpg" class="hdr-bg"/>
            <img src="<?php echo SERVER; ?>images/logo.png" class="homer"/>
            <?php echo $menu; //MENUHA ?>
        </header>
        <div class="content">
            <?php echo $content_for_layout; ?>
        </div>
        <div style="clear: both;"></div>
        <footer>
            <div class="foo">
                1
            </div>
            <div class="foo">
                2
            </div>
            <div class="foo">
                3
            </div>
        </footer>
    </body>
</html>

