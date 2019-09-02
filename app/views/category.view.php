<?php require('partials/admin-layout.php'); ?>
<div class="row edit-products">
    <p data-toggle="modal" data-target="#myModal" class="btn btn-primary">Dodaj kategoriju</p>
    <div class="categories col-md-12">
        <h1>Vase kategorije</h1>
    <?php foreach ($categories as $category){ ?>
    <div class="form-inline">
        <div class="col-md-8">
            <input data-cat="<?php echo $category->id ?>" class="form-control-custom input-none" id="ex3" value="<?php echo $category->name; ?>" readonly="readonly" type="text">
        </div>
        <button class="btn btn-primary edit"><i class="fa fa-edit btn-pri"></i></button>
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
                <form action="store_category" method="post">
                    <div class="form-group">
                        <label for="name">Ime kategorije</label>
                        <input class="form-control" type="text" name="name" id="name">
                    </div>
                    <button type="submit" class="btn btn-default" >Dodaj</button>

                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>

    </div>
</div>
<script>
    $('.edit').click(function () {
       var input = $(this).prev().find('.form-control-custom');
       if(input.hasClass('input-none')) {
           input.removeClass('input-none');
           input.removeAttr('readonly');

           input.change(function () {
              $.get('update_category',{cat:input.data('cat'),val:input.val()},function (d) {
              })
           });

       }else {
           input.addClass('input-none');
           input.attr('readonly','readonly');
       }
    });
</script>