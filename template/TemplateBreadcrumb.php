<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Dashboard</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="index.html">Home</a></li>
                    <li><span>Dashboard</span></li>
                </ul>
            </div>
        </div>

        <div class="col-sm-6 clearfix">
            <div class="user-profile pull-right">
                <img class="avatar user-thumb" src="<?php if ($_COOKIE["FOTO"] == "") {
                                                        print "imagesUser/3Emexico.png";
                                                    } else {
                                                        print  $_COOKIE["FOTO"];
                                                    }
                                                    ?>" alt="avatar">
                <h4 class="user-name dropdown-toggle" data-toggle="dropdown"> <?php print $_COOKIE["USER"]; ?> <i class="fa fa-angle-down"></i></h4>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Message</a>
                    <a class="dropdown-item" href="#">Settings</a>

                    <a class="dropdown-item" href="#">Log Out</a>

                    <form action="Auth.php" method="POST">
                        <input type="hidden" name="action" id="action" value="logout">
                        <input type="hidden" name="salir" id="salir" value="salir">
                        <button type="submit" class="dropdown-item"> salir </button>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</div>
<!-- page title area end -->

<div class="main-content-inner">