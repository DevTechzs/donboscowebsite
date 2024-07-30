<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>

    <!-- Font Awesome Icons -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="A multi-step form is a long-form broken down into multiple pieces/steps to make an otherwise long form less intimidating for visitors to complete." name="description">
    <meta content="Sam Norton" name="author">
    <title>Taxi Service App</title>
    <!-- FAVICONS -->
    <link href="favicons/apple-icon-57x57.png" rel="apple-touch-icon" sizes="57x57">
    <link href="favicons/apple-icon-60x60.png" rel="apple-touch-icon" sizes="60x60">
    <link href="favicons/apple-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
    <link href="favicons/apple-icon-76x76.png" rel="apple-touch-icon" sizes="76x76">
    <link href="favicons/apple-icon-114x114.png" rel="apple-touch-icon" sizes="114x114">
    <link href="favicons/apple-icon-120x120.png" rel="apple-touch-icon" sizes="120x120">
    <link href="favicons/apple-icon-144x144.png" rel="apple-touch-icon" sizes="144x144">
    <link href="favicons/apple-icon-152x152.png" rel="apple-touch-icon" sizes="152x152">
    <link href="favicons/apple-icon-180x180.png" rel="apple-touch-icon" sizes="180x180">
    <link href="favicons/android-icon-192x192.png" rel="icon" sizes="192x192" type="image/png">
    <link href="favicons/favicon-32x32.png" rel="icon" sizes="32x32" type="image/png">
    <link href="favicons/favicon-96x96.png" rel="icon" sizes="96x96" type="image/png">
    <link href="favicons/favicon-16x16.png" rel="icon" sizes="16x16" type="image/png">
    <link href="https://designmodo.static.domains/manifest.json" rel="manifest">
    <meta content="#ffffff" name="msapplication-TileColor">
    <meta content="favicons/ms-icon-144x144.png" name="msapplication-TileImage">
    <meta content="#ffffff" name="theme-color">
    <!-- CSS -->
    <link href="assets/css2/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css2/style.css" rel="stylesheet">
    <!-- FONT -->
    <link href="https://fonts.gstatic.com/" rel="preconnect">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600&amp;display=swap" rel="stylesheet">

</head>

<body>
    <nav class="navbar  navbar-top navbar-expand-lg navbar-dark bg-default  navbar-fixed-top">
        <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-default">
                <div class="navbar-collapse-header">
                    <div class="row">
                       
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav ml-lg-auto">


                    <?php if (isset($_SESSION['SessionKey']) && isset($_SESSION['UserID'])) {
                        echo    '<li class="nav-item dropdown">
                                    <a class="nav-link nav-link-icon dropdown-toggle" href="javascript:;" id="navbar-default_dropdown_2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ni ni-circle-08"></i>
                                        <span class="nav-link-inner--text d-lg-none">Profile</span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-default_dropdown_2">
                                        <div class="dropdown-divider"></div>
                                        <a href="logout" class="dropdown-item">
                                            <i class="ni ni-user-run"></i>
                                            <span>Logout</span>
                                        </a>
                                    </div>
                                </li>';
                    } else {

                        echo    '<li class="nav-item">
                                    <a class="nav-link nav-link-icon" href="login">
                                        <span class="nav-link-inner--text">Login</span>
                                        <i class="ni ni-button-power"></i>
                                    </a>
                                </li>';
                    }
                    ?>

                </ul>
            </div>
        </div>
    </nav>

    <div style="min-height: 400px;">

        <div class="container">

            <?php
            if (isset($_SESSION["messagetype"]) && $_SESSION["messagetype"]) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
                    <span class="alert-inner--text"><strong>Success!</strong> ' . $_SESSION["message"] . '</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>';
            } else if (isset($_SESSION["messagetype"]) && !$_SESSION["messagetype"]) {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <span class="alert-inner--icon"><i class="fa fa-times"></i></span>
                    <span class="alert-inner--text"><strong>Error!</strong> ' . $_SESSION["message"] . '</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>';
            }

            unset($_SESSION['messagetype']);
            unset($_SESSION['message']);
            ?>
        </div>