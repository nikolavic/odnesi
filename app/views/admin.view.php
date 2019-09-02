<?php require('partials/admin-layout.php'); ?>
<div class="col-md-9">
    <div class="profile-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 col-sm-4">
                    <div class="wrimagecard wrimagecard-topimage">
                        <a href="products">
                            <div class="wrimagecard-topimage_header" style="background-color:rgba(187, 120, 36, 0.1) ">
                                <div class="centering-dash-icons"><i class="fa fa-shopping-basket" style="color:#BB7824"></i></div>
                            </div>
                            <div class="wrimagecard-topimage_title">
                                <h4>Proizvoda
                                    <div class="pull-right badge"><?php echo $num_products; ?></div></h4>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="wrimagecard wrimagecard-topimage">
                        <a href="category">
                            <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                                <div class="centering-dash-icons"><i class ="fa fa-book" style="color:#16A085"></i></div>
                            </div>

                            <div class="wrimagecard-topimage_title">
                                <h4>Kategorija
                                    <div class="pull-right badge"><?php echo $num_cat; ?></div></h4>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="wrimagecard wrimagecard-topimage">
                        <a href="#">
                            <div class="wrimagecard-topimage_header" style="background-color:  rgba(213, 15, 37, 0.1)">
                                <div class="centering-dash-icons"><i class="fa fa-users" style="color:#d50f25"> </i></div>
                            </div>
                            <div class="wrimagecard-topimage_title">
                                <h4>Korisnika
                                    <div class="pull-right badge"><?php echo $num_user; ?></div></h4>
                            </div>

                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="wrimagecard wrimagecard-topimage">
                        <a href="orders">
                            <div class="wrimagecard-topimage_header" style="background-color:  rgba(51, 105, 232, 0.1)">
                                <div class="centering-dash-icons"><i class="fa fa-first-order" style="color:#3369e8"> </i></div>
                            </div>
                            <div class="wrimagecard-topimage_title">
                                <h4>Porudzbina
                                    <div class="pull-right badge"><?php echo $num_orders;?></div></h4>
                            </div>

                        </a>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
</div>
</div>

<br>
<br>