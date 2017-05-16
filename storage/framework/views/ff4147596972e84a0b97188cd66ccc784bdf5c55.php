<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>ANIMOSHI</title>

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

    <!-- bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

    <!-- CSS -->
    <link href="<?php echo e(asset('public/css/app.css')); ?>" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>;
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-fixed-top" style="margin-bottom:60px;">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                        <strong>ANIMOSHI.COM</strong>
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                        <?php if(Auth::guest()): ?>

                        <?php else: ?>
                        <li class="navbutton"><a href="/">NEWEST</a></li>
                        <li class="navbutton"><a href="/top">TOP</a></li>
                        <li class="navbutton"><a href="/worst">WORST</a></li>
                        <?php endif; ?>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        <?php if(Auth::guest()): ?>
                            <li class="navbutton"><a href="<?php echo e(route('login')); ?>">Login</a></li>
                            <li class="navbutton"><a href="<?php echo e(route('register')); ?>">Register</a></li>
                        <?php else: ?>
                                <li class="navbutton"><a href="/profile">My Profile</a></li>
                                <li class="navbutton"><a href="/messages">Messages</a></li>
                                <li class="navbutton"><a href="<?php echo e(route('logout')); ?>"
                                   onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                                    Logout
                                </a></li>
                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                    <?php echo e(csrf_field()); ?>

                                </form>


                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/jquery.infinitescroll.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <script src="<?php echo e(asset('js/profile.js')); ?>"></script>
    <script type="text/javascript">
        //Calculate the height of <header>
        //Use outerHeight() instead of height() if have padding
        var aboveHeight = $('header').outerHeight();

        //when scroll
        $(window).scroll(function(){

            //if scrolled down more than the header’s height
            if ($(window).scrollTop() > aboveHeight){

                // if yes, add “fixed” class to the <nav>
                // add padding top to the #content
               // (value is same as the height of the nav)
                $('nav').addClass('fixed').css('top','0').next()
                    .css('padding-top','60px');

            } else {

                // when scroll up or less than aboveHeight,
                //remove the “fixed” class, and the padding-top
                $('nav').removeClass('fixed').next()
                    .css('padding-top','0');
            }
        });
        });
    </script>
</body>
</html>
