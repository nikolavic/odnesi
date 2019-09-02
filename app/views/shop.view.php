<?php require('partials/head.php'); ?>
<div class="row">
    <?php foreach ($products as $product){ ?>
    <div class="col-sm-3">
<h4><?php echo $product->name; ?></h4>
<div class="card card-price">
    <div class="card-img">
        <a href="single-product?product_id=<?php echo $product->id; ?>">
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
        <div class="lead">Prilozi po zelji:</div>
        <ul class="details">
            <?php foreach ($product->addition() as $add){ ?>
            <li><?php echo $add[0]->name; ?></li>
            <?php } ?>
        </ul>
        <a href="#" class="btn btn-primary btn-lg btn-block buy-now">
            Buy now <span class="glyphicon glyphicon-triangle-right"></span>
        </a>
    </div>
</div>
</div>
    <?php } ?>
</div>
