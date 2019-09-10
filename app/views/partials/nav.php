<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img class="img-logo" src="/public/images/logo.png" alt=""></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li ><a href="/">Pocetna</a></li>
                <li><a href="/shop">Prodavnica</a></li>
                <li><a href="#">Knjiga utisaka</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if(!auth()->check()){ ?>
                <li><a href="/signup"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <?php }else{ if(check_cart()){?>
                    <li><a href="/cart"><span class="glyphicon glyphicon-shopping-cart"></span> Korpa</a></li>
                    <?php } ?>
                    <li><a href=""><span class="glyphicon glyphicon-user"></span> <?php echo auth()->user()->name; ?></a></li>
                    <li><a href="/client-order"><span class="glyphicon glyphicon-shopping-cart"></span> Porudzbine</a></li>

                    <li><a href="logout"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
<?php
if(\App\Classes\Session::has('errors')){
    $errors=\App\Classes\Session::flash('errors');
}

if(\App\Classes\Session::has('success')){ ?>
<div class="alert alert-success"><?php \App\Classes\Session::flash('success'); ?></div>
<?php } ?>
