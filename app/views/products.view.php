<?php require('partials/admin-layout.php'); ?>
<div class="container ml-60">
    <?php
    if(\App\Classes\Session::has('errors')){ ?>
    <div class="alert alert-success"><?php \App\Classes\Session::flash('errors'); ?></div>
    <?php }?>
           <?php
    if(\App\Classes\Session::has('success')){ ?>
        <div class="alert alert-success"><?php \App\Classes\Session::flash('success'); ?></div>
    <?php } ?>
<div class="row mt-30">
    <div class="col-md-3 col-sm-4">
        <div class="wrimagecard wrimagecard-topimage">
            <a href="add_product">
                <div class="wrimagecard-topimage_header" style="background-color:rgba(187, 120, 36, 0.1) ">
                    <div class="centering-dash-icons"><i class="fa fa-cart-plus" style="color:#BB7824"></i></div>
                </div>
                <p class="card-title">Dodaj proizvod</p>
            </a>
        </div>
    </div>

    <div class="col-md-3 col-sm-4">
        <div class="wrimagecard wrimagecard-topimage">
            <a data-toggle="modal" data-target="#myModal" href="#">
                <div class="wrimagecard-topimage_header" style="background-color:rgba(22, 160, 133, 0.1) ">
                    <div class="centering-dash-icons"><i class="fa fa-cutlery" style="color:#16A085"></i></div>
                </div>
                <p class="card-title">Dodaj prilog</p>
            </a>
        </div>
    </div>
</div>

<div class="row admin-product">
    <?php foreach ($products as $product){ ?>
        <div class="col-sm-3">
            <h4><?php echo $product->name; ?></h4>
            <div class="card card-price">
                <div class="card-img">
                    <a href="edit-product?product_id=<?php echo $product->id; ?>">
                        <?php if(isset($product->images()[0])){ ?>
                            <img src="<?php echo $product->images()[0]->link; ?>" class="img-responsive">
                        <?php }else{?>
                            <img src="https://image.shutterstock.com/image-vector/prohibition-no-photo-sign-vector-260nw-449151856.jpg" alt="">
                        <?php } ?>
                        <div class="card-caption">
                            <span class="h2"><?php echo $product->name; ?>m</span>
                            <p><?php echo $product->declaration; ?></p>
                        </div>
                    </a>
                </div>
                <div class="card-body">
                    <div class="price"><?php echo $product->price; ?> <small>RSD/KG</small></div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
</div>

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <form action="store_additions" method="post">
                    <div class="form-group">
                        <label for="name">Ime priloga</label>
                    <input class="form-control" type="text" name="name" id="name">
                        <label for="taste">Ukus</label>
                    <select class="form-control" name="taste" id="taste">
                        <option value="slano">Slano</option>
                        <option value="slatko">Slatko</option>
                    </select>
                    </div>
                    <button type="submit" class="btn btn-default" >Dodaj</button>

                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>

    </div>
</div>