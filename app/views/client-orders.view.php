<?php require('partials/head.php'); ?>
<div class="col-lg-9 col-sm-9">

    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                <div class="hidden-xs">Nove</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                <div class="hidden-xs">Prihvacene</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-default" href="#tab3" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="hidden-xs">Izvrsene</div>
            </button>
        </div>
    </div>

    <div class="well">
        <div class="tab-content">
            <div class="tab-pane fade in active" id="tab1">
                <div class="span7">
                    <div class="widget stacked widget-table action-table">

                        <div class="widget-header">
                            <i class="icon-th-list"></i>
                            <h3>Table</h3>
                        </div> <!-- /widget-header -->

                        <div class="widget-content">

                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Porucilac</th>
                                    <th>Broj Telefona</th>
                                    <th>Adresa</th>
                                    <th>Proizvodi</th>
                                    <th>Vreme isporuke</th>
                                    <th>Ukupna cena</th>
                                    <th class="td-actions">Prihvati</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($new_order as $order){ ?>
                                    <tr>
                                        <td><?php echo $order->id ?></td>
                                        <td><?php echo $order->user()->name." ".$order->user()->last_name ?></td>
                                        <td><?php echo $order->phone; ?></td>
                                        <td><?php echo $order->address; ?></td>
                                        <td><a href="javascript;">Proizvodi</a></td>
                                        <td><?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($order->last_time_to_arrive))->diffForHumans() ?>
                                        </td>
                                        <td><?php echo $order->total_price; ?></td>
                                        <td class="td-actions">
                                        </td>
                                    </tr>
                                <?php } ?>

                                </tbody>
                            </table>

                        </div> <!-- /widget-content -->

                    </div> <!-- /widget -->
                </div>
            </div>
            <div class="tab-pane fade in" id="tab2">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Porucilac</th>
                        <th>Broj Telefona</th>
                        <th>Adresa</th>
                        <th>Proizvodi</th>
                        <th>Vreme isporuke</th>
                        <th>Ukupna cena</th>
                        <th class="td-actions">Zavrseno?</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($accepted as $aorder){ ?>
                        <tr>
                            <td><?php echo $aorder->id ?></td>
                            <td><?php echo $aorder->user()->name." ".$aorder->user()->last_name ?></td>
                            <td><?php echo $aorder->phone; ?></td>
                            <td><?php echo $aorder->address; ?></td>
                            <td><a href="#" data-toggle="modal" data-target="#myModal" class="product-link" data-product='<?php echo $aorder->cart_info; ?>'>Proizvodi</a></td>
                            <td><?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($aorder->last_time_to_arrive))->diffForHumans() ?>
                            </td>
                            <td><?php echo $aorder->total_price; ?></td>
                            <td class="td-actions">
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade in" id="tab3">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Porucilac</th>
                        <th>Broj Telefona</th>
                        <th>Adresa</th>
                        <th>Proizvodi</th>
                        <th>Vreme isporuke</th>
                        <th>Ukupna cena</th>
                        <th class="td-actions"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($finished as $aorder){ ?>
                        <tr>
                            <td><?php echo $aorder->id ?></td>
                            <td><?php echo $aorder->user()->name." ".$aorder->user()->last_name ?></td>
                            <td><?php echo $aorder->phone; ?></td>
                            <td><?php echo $aorder->address; ?></td>
                            <td><a href="javascript;">Proizvodi</a></td>
                            <td><?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($aorder->last_time_to_arrive))->diffForHumans() ?>
                            </td>
                            <td><?php echo $aorder->total_price; ?></td>
                            <td class="td-actions">
                                <a href="add-comment?order=<?php echo $aorder->id; ?>" class="btn btn-primary">Oceni uslugu</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>            </div>
        </div>
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