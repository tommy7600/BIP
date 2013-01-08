<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Login</title>
        <link href="/css/bootstrap.css" rel="stylesheet">
        <link href="/css/bootstrap-responsive.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <?php if (Auth::instance()->logged_in()): ?>
                <a href="user_auth/logout">Logout</a>
            <?php endif ?>

            <div id ="content">
                <?php if ($content): ?>
                    <?php include $content ?>
                <?php endif ?>
            </div>
        </div>
        <script src="/js/jquery-1.8.2.js"></script>
        <script src="/js/bootstrap.js"></script>
    </body>
</html>