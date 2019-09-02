<?php require('partials/head.php'); ?>
<div class="container">
    <div class="row">
        <section>
            <div class="wizard">
                <div class="wizard-inner">
                    <!-- <div class="connecting-line"></div> -->
                    <ul class="nav  breadcrumb_checkout" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                                <h3>Dostava</h3>
                            </a>
                        </li>
                        <li role="presentation" class="">
                            <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                                <h3>Placanje</h3>
                            </a>
                        </li>
                        <li role="presentation" class="disabled">
                            <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                                <h3>Potvrda</h3>
                            </a>
                        </li>
                    </ul>
                </div>
                <form role="form"  method="post" action="store_checkout">
                    <div class="tab-content">
                        <div class="tab-pane active" role="tabpanel" id="step1">
                            <div class="step1">
                                <!--  exiting customer end -->
                                <div class="row" style="">
                                    <div class="checkout_details">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <dl class="dl-horizontal">
                                                <dt>Ime:<span></span></dt>
                                                <dd><?php echo auth()->user()->name; ?></dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt>Prezime:<span></span></dt>
                                                <dd><?php echo auth()->user()->last_name; ?></dd>
                                            </dl>
                                            <dl class="dl-horizontal changable">
                                                <dt>Broj telefona:<span></span></dt>
                                                &nbsp;
                                                <input type="text" class="input-disabled" name="phone" readonly="readonly"
                                                       value="<?php echo auth()->user()->phone; ?>" id="">
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt>Email:<span></span></dt>
                                                <dd><?php echo auth()->user()->email; ?></dd>
                                            </dl>
                                            <dl class="dl-horizontal changable">
                                                <dt>Adresa: <span></span></dt>
                                                &nbsp;
                                                <input type="text" class="input-disabled" name="address" readonly="readonly"
                                                       value="<?php echo auth()->user()->address; ?>" id="">
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt>Izaberi datum isporuke:<span></span></dt>
                                                <div class="input-group date" data-date-format="dd.mm.yyyy">
                                                    <input  type="text" class="form-control" name="last_time_to_arrive" id="datepicker" placeholder="dd.mm.yyyy">
                                                    <div class="input-group-addon" >
                                                        <span class="glyphicon glyphicon-th"></span>
                                                    </div>
                                                </div>
                                            </dl>
                                            <div class="dl-horizontal">
                                                <div class="form-group">
                                                    <label for="comment">Napomena:</label>
                                                    <textarea name="info" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div>
                                                <a class="btn btn-primary next-step btn-theme" id="edit" data-toggle="modal"
                                                   data-target="#myModal">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- exiting customer end-->
                                <!-- new customer start -->

                            </div><!-- step 1 end div tag -->

                        </div>
                        <div class="tab-pane" role="tabpanel" id="step2"> <!-- step 2 start -->
                            <div class="step2">
                                <div class="col-sm-4">
                                    <label class="radio-inline"><input type="radio" name="payment-value" value="Credit Card">Credit card</label>
                                </div>
                                <div class="col-sm-4">
                                    <label class="radio-inline"><input type="radio" name="payment-value" value="Debit Cart">Debit card</label>

                                </div>
                                <div class="col-sm-4">
                                    <label class="radio-inline"><input type="radio" name="payment-value" value="Net Banking">Net Banking</label>
                                    <div class="net_banking">

                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div><!-- step 2 end -->
                        <div class="tab-pane" role="tabpanel" id="step3">
                            <div class="col-sm-4">
                                <h5><strong>Podatci slanja</strong></h5>
                                <p>Name: <?php echo auth()->user()->name ." ".auth()->user()->last_name; ?>t</p>
                                <p>Address: #33, <span id="address"><?php echo auth()->user()->address ?></span>, </p>
                                <p>Phone: <span id="phone"><?php echo auth()->user()->phone ?></span> </p>
                            </div>
                            <div class="col-sm-3">
                                <h5><strong>Payment method </strong></h5>
                                <p>Net Banking: Allahabad Bank </p>
                            </div>
                            <div class="col-sm-5">
                                <h5><strong>Place your order and pay</strong></h5>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($user_cart as $cart){
                                        $products=new \App\Models\Product();
                                        $product=$products->find($cart->product_id);
                                        ?>
                                    <tr>
                                        <td><?php echo $product->name ?></td>
                                        <input  type="hidden" name="products[]" value="<?php echo $cart->id;?>">
                                        <td>RSD <?php echo $product->price * $cart->qty; ?> za <?php echo $cart->qty ?> KG</td>
                                    </tr>
                                    <?php } ?>
                                    <tr>
                                        <td>
                                            Total: <i class="fa fa-usd" aria-hidden="true"> <?php echo $sum; ?>
                                            </i></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="clearfix"></div>
                            <ul class="list-inline pull-right">
                                <li>
                                    <button type="submit"  class="btn btn-primary btn-info-full next-step btn-theme">
                                        Naruci
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-pane" role="tabpanel" id="complete">
                            <div class="step44">
                                <h5>Completed</h5>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>

<script src="/public/javascript/checkout.js"></script>
<script type="text/javascript">
    $( function() {
        $( "#datepicker" ).datepicker({
            dateFormat:'dd.mm.yy',
            minDate: '+2D',
                maxDate: '+15D',
        });
    } );
    $('#edit').click(function () {
       $('.changable input').prop("readOnly", false);
        $('.changable input').removeClass('input-disabled');

    });

</script>