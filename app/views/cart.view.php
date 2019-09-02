<?php require('partials/head.php'); ?>
<div class="container">
    <div class="row">
        <div class="col-xs-8">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">
                        <div class="row">
                            <div class="col-xs-6">
                                <h5><span class="glyphicon glyphicon-shopping-cart"></span> Korpa</h5>
                            </div>
                            <div class="col-xs-6">
                                <a href="shop" class="btn btn-primary btn-sm btn-block">
                                    <span class="glyphicon glyphicon-share-alt"></span> Nastavi sa kupovinom
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <?php foreach ($user_cart as $cart){
                        $products=new \App\Models\Product();
                        $product=$products->find($cart->product_id);
                        ?>
                    <div class="row">
                        <div class="col-xs-2"><img class="img-responsive" src="<?php echo $product->images()[0]->link ?>">
                        </div>
                        <div class="col-xs-4">
                            <h4 class="product-name"><strong><?php echo $product->name; ?></strong></h4><h4><small><?php echo $product->declaration; ?></small></h4>
                        </div>
                        <div class="col-xs-6">
                            <div class="col-xs-6 text-right">
                                <h6><strong><?php echo $cart->qty ?> &nbsp; KG <span class="text-muted"></span></strong></h6>
                            </div>
                            <div class="col-xs-4">
                                <h6><strong>Cena: <?php echo $cart->price; ?></strong></h6>
                            </div>
                            <div class="col-xs-2">
                                <button type="button" class="btn btn-link btn-xs">
                                    <span class="glyphicon glyphicon-trash"> </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <hr>
                </div>
                <div class="panel-footer">
                    <div class="row text-center">
                        <div class="col-xs-9">
                            <h4 class="text-right">Ukupno: <strong><?php echo $sum; ?> RSD</strong></h4>
                        </div>
                        <div class="col-xs-3">
                            <a href="checkout" class="btn btn-success btn-block">
                                Checkout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>