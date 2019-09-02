<?php require('partials/head.php'); ?>

<div class="col-lg-9 col-sm-9">
    <form action="post_comment?order=<?php echo $_GET['order'] ?>" method="post">
        <textarea name="text" id="" cols="30" rows="10"></textarea>
        <select name="rating" id="">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <input type="submit" value="Submit">
    </form>

</div>