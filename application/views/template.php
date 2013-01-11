<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $title ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <base href="<?php echo URL::base('http'); ?>">

        <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
        <style>
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
        </style>
        <link rel="stylesheet" href="/assets/css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="/assets/css/main.css">

        <script src="/assets/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        <div class="container">
            <div class="row">
                <div class="span2">
                    <ul class="nav nav-list well">
                        <?php
                        $menu = Kohana::$config->load('menu');
                        foreach ($menu as $controller => $controllerData) {
                            foreach ($menu[$controller]['actions'] as $actions => $action) {
                                if ($menu[$controller]['actions'][$actions]['title'] != NULL &&
                                        count(array_intersect($userRoles, $menu[$controller]['actions'][$actions]['roles'])) > 0) {
                                    echo '<li class="nav-header">' . $menu[$controller]['title'] . '</li>';
                                    foreach ($menu[$controller]['actions'] as $actions => $action) {
                                        if ($menu[$controller]['actions'][$actions]['title'] != NULL &&
                                                count(array_intersect($userRoles, $menu[$controller]['actions'][$actions]['roles'])) > 0) {
                                            echo '<li><a href="' . strtolower($controller) . '/' . strtolower($actions) . '">' . $menu[$controller]['actions'][$actions]['title'] . '</a></li>';
                                        }
                                    }
                                    break;
                                }
                            }
                        }
                        ?>
                        <?php if (Auth::instance()->logged_in()): ?>
                        <li><a href="/auth/logout">Logout</a></li>
                        <?php endif; ?>                        
                    </ul>
                </div>
                <div class="span6">
                        <?php include $content ?>
                </div>
            </div>
            <hr>

            <footer>
                <p>&copy; BIP TEAM FOR THE WIN 2013</p>
            </footer>

        </div> <!-- /container -->

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="/assets/js/vendor/jquery-1.8.3.min.js"><\/script>')</script>

        <script src="/assets/js/vendor/bootstrap.min.js"></script>

        <script src="/assets/js/main.js"></script>
        <script src="/assets/js/galleryUploadImages.js"></script>
    </body>
</html>