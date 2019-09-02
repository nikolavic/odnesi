<?php require('partials/head.php'); ?>

<div class="flexslider">
    <ul class="slides">
        <li>
            <img src="https://media.luftika.rs/2017/12/trpeza-ketering-praseca-bajadera-e1514090691925.jpg" />
        </li>
        <li>
            <img src="http://gastroplanet.rs/wp-content/uploads/2016/05/slajd3-1.jpg" />
        </li>
        <li>
            <img src="https://www.krosti-dostava.rs/wp-content/uploads/2016/12/Krosti-Ketering.jpg" />
        </li>
    </ul>
</div>

<div class="row">
    <div class="circle">
        <i class="fa fa-cutlery"></i>
    </div>
    <h3 class="favor">Nasa ponuda </h3>

</div>
<div class="product-category">
    <?php
    foreach ($category as $cat){ ?>
<div class="category-item">
    <div><img src="<?php echo $cat->image;?>" alt=""></div>
    <div class="category-name"><?php echo $cat->name;?></div>
</div>
    <?php } ?>
</div>

<div class="about-us">
    <div class="about-us-content">
  <div class="about-img"><img src="/public/images/about-loc.png" alt=""></div>
    <div class="about-text">
        <h2>O nama</h2>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid culpa cum, laboriosam laudantium vel velit veniam? Aliquam consequatur eaque eius eum fuga illo laborum maiores minima molestiae nam natus, nesciunt nulla perferendis provident quae quas, quis rerum sapiente sequi ullam. Architecto autem, consequatur, consequuntur cum dignissimos dolorem doloribus eos error hic, ipsa nobis numquam odit voluptatibus? Ab aliquam animi architecto eum explicabo maiores molestiae nihil velit. Accusamus ad adipisci assumenda beatae, debitis delectus dolores dolorum ducimus enim et eum eveniet exercitationem hic impedit incidunt inventore, itaque maiores minima, nulla perspiciatis quaerat quam qui quisquam recusandae repellat sequi temporibus velit vitae.</div>
    </div>
    </div>

<div class="row">
    <div class="circle">
        <i class="fa fa-cutlery"></i>
    </div>
    <h3 class="favor">Nasa ponuda </h3>

</div>
<div class="product-category">
    <?php foreach ($products as $product){ ?>
        <div class="category-item">
            <div><img src="http://localhost:8888/public/images/about-loc.png" alt=""></div>
            <div class="category-name"><?php echo $product->name;?></div>
        </div>
    <?php } ?>
</div>

<!-- Place in the <head>, after the three links -->
<script type="text/javascript" charset="utf-8">
    $(window).load(function() {
        $('.flexslider').flexslider();
    });
</script>
<?php require('partials/footer.php'); ?>
