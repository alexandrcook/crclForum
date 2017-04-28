<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap Core CSS -->
    <link href="/app/views/template/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/app/views/template/css/shop-homepage.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="/app/views/template/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="/app/views/template/js/bootstrap.min.js"></script>
    <title>Crcl Forum</title>
</head>
<body>
<div class="container">
    <div class="row">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Tog navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!--                    <a class="navbar-brand page-scroll" href="/">GuestBook</a>-->
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav" style="width: 100%; margin-left: -15px">
                        <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                        <li class="hidden">
                            <a class="page-scroll" href="#page-top"></a>
                        </li>
                        <li><a href="/">Forum (Main)</a></li>
                        <?php
                        if (isset($_SESSION['user_name'])) {
                            echo('<li style="float: right">');
                            echo('<span style="display: inline-block; margin-top: 15px">
                                    <b>"' . $_SESSION['user_name'] . '"</b>
                                </span>');
                            if (isset($_SESSION['is_admin']) and $_SESSION['is_admin'] != null) {
                                echo(' (admin) ');
                                echo('<a style="display: inline-block; padding: 5px; color: black" class="btn btn-danger" href="/admin">Destroy pentagon!</a>');
                            } else {
                                echo(' (user) ');
                            }
                            echo('<a style="display: inline-block; padding: 5px; color: black" class="btn btn-success" href="/account">Account</a>');
                            echo('<a style="display: inline-block; padding: 5px; color: black" class="btn btn-info" href="/account/profile">Profile</a>');
                            echo('<a style="display: inline-block; padding: 5px; color: black" class="btn btn-primary" href="/logout">Logout</a>');
                            echo('</li>');
                        } else {
                            echo('<li style="float: right"><a class="page-scroll" href="/login">Login/Register</a></li>');
                        } ?>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
        <div class="col-xs-6 messages-pole">
            <hr style="border: 1px solid black">
            <div class="toload"></div>
            <?php
            echo('Flash info:<br>');
            echo('<h3 class="flash-msg">');
            if (isset($_SESSION['flash_msg'])) {
                echo($_SESSION['flash_msg']);
                unset($_SESSION['flash_msg']);
            }
            echo('</h3>');
            ?>
        </div>
        <div class="col-xs-6" style="text-align: right">
            <hr style="border: 1px solid black">
            <form method="post" action="/search">
                <label class="form-group">
                    SEARCH: <span class="glyphicon glyphicon-search"></span>
                    <input name="search" class="form-control" type="search" placeholder="Как увеличить...">
                    <input type="submit" class="form-control btn btn-success" value="Go search">
                </label>
            </form>
        </div>
    </div>
    <hr style="border: 1px solid black">

