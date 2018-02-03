<?php
date_default_timezone_set("Asia/Bangkok");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Classic - Responsive Bootstrap 4.0 Template</title>
    <!--
    Classic Template
    http://www.templatemo.com/tm-488-classic
    -->
    <!-- load stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">  <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="/assets/488_classic/css/bootstrap.min.css">                                      <!-- Bootstrap style -->
    <link rel="stylesheet" href="/assets/488_classic/css/templatemo-style.css?v=3">                                   <!-- Templatemo style -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- load JS files -->
    <script src="assets/488_classic/js/jquery-1.11.3.min.js"></script>             <!-- jQuery (https://jquery.com/download/) -->
    <script src="https://www.atlasestateagents.co.uk/javascript/tether.min.js"></script> <!-- Tether for Bootstrap, http://stackoverflow.com/questions/34567939/how-to-fix-the-error-error-bootstrap-tooltips-require-tether-http-github-h -->
    <script src="assets/488_classic/js/bootstrap.min.js"></script>                 <!-- Bootstrap (http://v4-alpha.getbootstrap.com/) -->

</head>

<body>

<div class="tm-header">
    <div class="container-fluid">
        <div class="tm-header-inner">
            <a href="#" class="navbar-brand tm-site-name">CSAG BLOG</a>

            <!-- navbar -->
            <nav class="navbar tm-main-nav">

                <button class="navbar-toggler hidden-md-up" type="button" data-toggle="collapse" data-target="#tmNavbar">
                    &#9776;
                </button>

                <div class="collapse navbar-toggleable-sm" id="tmNavbar">
                    <ul class="nav navbar-nav">
                        <li class="nav-item <?php echo (is_null($_GET['page']))? 'active' : '';?>">
                            <a href="/" class="nav-link">HOME</a>
                        </li>
                        <li class="nav-item <?php echo ($_GET['page'] == 'register')? 'active' : '';?>">
                            <a href="/?page=register" class="nav-link">REGISTER</a>
                        </li>
                        <li class="nav-item <?php echo ($_GET['page'] == 'login') ? 'active' : '';?>">
                            <a href="/?page=login" class="nav-link">LOGIN</a>
                        </li>
                        <li class="nav-item <?php echo ($_GET['page'] == 'forgotpass') ? 'active' : '';?>">
                            <a href="/?page=forgotpass" class="nav-link">FORGOT PASSWORD</a>
                        </li>
                    </ul>
                </div>

            </nav>

        </div>
    </div>
</div>
