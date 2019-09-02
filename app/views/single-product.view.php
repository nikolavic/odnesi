<?php require('partials/head.php'); ?>
<div class="container">
    <div class="well">
        <div class="row">
            <div class="col-md-12">
                 <div class="product-images">
                <div class="col-md-12 col-xs-12 thumb-contenido"><img src="<?php echo $product->images()[0]->link; ?>" class="img-responsive"></div>
                <div>
                    <?php for($i=0;$i<count($product->images());$i++){ ?>
                        <img class="single-product-images col-md-3" src="<?php echo $product->images()[$i]->link; ?>" alt="">
                    <?php } ?>
                </div>
                 </div>
                <div class="">
                    <h1 class="hidden-xs hidden-sm"><?php echo $product->name; ?></h1>
                    <hr>
                    <p id="price" data-price="<?php echo $product->price; ?> " class="single-product-price"><?php echo $product->price; ?> RSD/po KG</p><br>
                    <p class="single-product-price">Kategorija: <?php echo $category->name; ?></p><br>
                    <hr>
                    <p><?php echo $product->declaration; ?></p>
                </div>
                <hr>
                <div class="but-product">
                    <p class="single-product-price">Odaberi priloge</p>
                    <form action="add_to_cart?product_id=<?php echo $product->id; ?>" method="post">
                        <?php foreach ($product->addition() as $add){ ?>
                            <div class="form-group">
                                <label for=""><?php echo $add[0]->name; ?></label>
                                <input type="checkbox" name="addition[]" value="<?php echo $add[0]->name; ?>" class="form-controll" id="">
                            </div>
                        <?php } ?>
                        <hr>
                        <p class="single-product-price">Odaberi kolicinu:</p>
                        <div class="handle-counter" id="handleCounter">
                            <p onclick="changePrice('-')" class="counter-minus btn btn-primary">-</p>
                            <input type="text" name="qty" id="quantitity" value="0">
                            <p onclick="changePrice()" class="counter-plus btn btn-primary">+</p>
                            <span class="single-product-price">&nbsp; /KG</span>
                        </div>
                        <input type="submit" value="Dodaj u korpu" class="pull-right btn btn-primary">
                    </form>
                    <hr>
                    <p  class="single-product-price pull-right">Ukupna cena: <span id="total_price" >Molim vas odaberite kolicinu</span>/RSD</p>

                </div>
            </div>

        </div>
    </div>
</div>

<script>
    $('#handleCounter').handleCounter({
        minimum: 1,
        maximize: null,
    })

    function changePrice(){
        var product_price=$('#price').data('price');
        var quantity=$('#quantitity').val();
        if(quantity != 0) {
            $('#total_price').text(product_price * quantity);
        }
    };
</script>