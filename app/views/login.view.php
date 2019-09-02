<?php require('partials/head.php'); ?>
<form class="well form-horizontal" action="login" method="post"  id="contact_form">
    <div class="form-group">
        <label class="col-md-4 control-label">E-Mail</label>
        <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                <input name="email" placeholder="E-Mail Address" class="form-control"  type="text">
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label" >Sifra</label>
        <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input name="password" placeholder="Password" class="form-control"  type="password">
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label"></label>
        <div class="col-md-4"><br>
            <button type="submit" class="btn btn-warning" >SUBMIT <span class="glyphicon glyphicon-send"></span></button>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-4 control-label" ></label>
        <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
            <p class="">Nemate nalog? Napravite ga <a href="signup">Ovde</a></p>
            </div>
        </div>
    </div>
</form>

