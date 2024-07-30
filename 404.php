 <?php
        header('Access-Control-Allow-Origin: https://techz.in:443');
        header("X-Frame-Options: SAMEORIGIN");
        header("X-Frame-Options: DENY"); 
        header("strict-transport-security: max-age=63072000 "); 
        header("Accept: text/html; charset=UTF-8");
        header("Content-type: text/html; charset=UTF-8"); 
        header("X-XSS-Protection: 1; mode=block"); 
        header("X-Frame-Options: SAMEORIGIN");
        header("X-Frame-Options: DENY"); 
        header('X-Content-Type-Options: nosniff');
 ?>

<?php require_once('basic/header.php'); ?>

    <header class="home-area overlay" id="home_page">
        <div class="container" style="min-height:300px">
            <div class="row justify-content-center">
                <div class="col-10 text-center" style="margin-top:50px; margin-bottom:50px;">
                    <h2 style="color:azure;"> Unable to navigate to the requested data </h2>
                    <a href="home" class="btn btn-info p-3">Home Page</a>
                </div>
            </div>
        </div>
    </header>

<?php require_once('basic/footer.php'); ?>