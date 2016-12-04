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
    <div class="parag">
        <h2 class="in-parag">Статьи</h2>
    </div>
    <?php echo $content_for_layout; ?>
</div>
<div style="clear: both;"></div>
<footer>
    <div class="foo">

    </div>
    <div class="foo">

    </div>
    <div class="foo">

    </div>
</footer>
</body>
</html>

