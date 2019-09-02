<div class="container">
    <div class="row profile">
        <div class="col-md-3">
            <div class="profile-sidebar">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    <img src="https://slika.nezavisne.rs/2012/05/750x450/20120503100208_139496.jpg" class="img-responsive" alt="">
                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                        <?php echo auth()->user()->name; ?>
                    </div>
                    <div class="profile-usertitle-job">
                        <a href="admin">Admin</a>
                    </div>
                </div>
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li class="active">
                            <a href="#">
                                <i class="glyphicon glyphicon-home"></i>
                                Dashboard </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="glyphicon glyphicon-user"></i>
                                Pregled i uredjivanje komentara </a>
                        </li>
                        <li>
                            <a href="#" target="_blank">
                                <i class="glyphicon glyphicon-ok"></i>
                                Proizvodi </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="glyphicon glyphicon-flag"></i>
                                Kategorije proizvoda </a>
                        </li>
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
        </div>

<?php
if(\App\Classes\Session::has('errors')){

    $errors=\App\Classes\Session::flash('errors');
}
?>
