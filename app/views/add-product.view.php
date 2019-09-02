<?php require('partials/admin-layout.php'); ?>
<div class="row edit-products">
    <div class="col-md-8 col-sm-4">
        <h1>Dodajte proizvod</h1>
<form method="post" action="store_products" class="add-product-form" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Ime proizvoda</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" placeholder="Ime Proizvoda">
        </div>
    </div>
<div style="margin-top: 20px">
    <div class="form-group">
        <label for="decleration" class="col-sm-2 control-label">Opis i standardni prilozi</label>
        <div class="col-sm-10">
            <textarea name="decleration" id="decleration" class="form-control" rows="3"></textarea>
        </div>
    </div>
</div>
    <div class="form-group">
        <label for="category" class="col-sm-2 control-label">Kategorija</label>
        <select name="category_id" id="category" class="form-control col-sm-10">
        <?php foreach ($categories as $category){ ?>
        <option value="<?php echo $category->id ?>"><?php echo $category->name; ?></option>
        <?php } ?>
    </select>
    </div>

    <div class="form-group price">
        <label class="sr-only" for="exampleInputAmount">Amount (in dinnars)</label>
        <div class="input-group">
            <div class="input-group-addon">RSD</div>
            <input type="text" class="form-control" name="price" id="exampleInputAmount" placeholder="Cena po kilogramu">
            <div class="input-group-addon">.00</div>
        </div>
    </div>

    <div class="form-group">
        <label for="taste" class="col-sm-2 control-label">Tip</label>
        <select name="taste" id="taste" class="form-control col-sm-10">
            <option value="slatko">Slatko</option>
            <option value="slano">Slano</option>
        </select>
    </div>
    <div class="input-group">
        <div class="custom-file">
            <label class="custom-file-label" for="inputGroupFile01">Izaberi sliku</label>
            <input name="images[]"  type="file" class="custom-file-input" id="gallery-photo-add"
                   aria-describedby="inputGroupFileAddon01" multiple>
        </div>
    </div>
    <div class="gallery"></div>


    <div class="form-group mb-select addition-select">
        <?php foreach ($additions as $addition){ ?>
    <div class="checkbox">
        <label><input type="checkbox" name="additions[]" value="<?php echo $addition->id ?>"><?php echo $addition->name; ?></label>
    </div>
        <?php } ?>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Dodaj proizvod</button>
    </div>
</form>
</div>
</div>

<script>
    $(function() {
        // Multiple images preview in browser
        var imagesPreview = function(input, placeToInsertImagePreview) {

            if (input.files) {
                var filesAmount = input.files.length;

                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();

                    reader.onload = function(event) {
                        $($.parseHTML('<img style="width: 100px">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                    }

                    reader.readAsDataURL(input.files[i]);
                }
            }

        };

        $('#gallery-photo-add').on('change', function() {
            imagesPreview(this, 'div.gallery');
        });
    });
</script>