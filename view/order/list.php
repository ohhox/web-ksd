<div class="card">
    <div class="card-header">
        <h4 class="card-title">Order Filter Options.</h4>
        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="card-content">
        <div class="card-body">
            <form >
                <div class="row">

                    <div class="col-3"> 
                        <label>  Customer</label>
                        <fieldset class="form-group position-relative">
                            <select class="form-control  form-control-xs  " name="Customer">
                                <option value='all'>Choose Customer</option>
                                <?php
                                foreach ($this->customer as $key => $value) {
                                    if (isset($_GET['Customer']) && $_GET['Customer'] == $value->oid) {
                                        echo "<option value='{$value->oid}' selected> {$value->CustomerCode} - {$value->CustomerName} </option>";
                                    } else {
                                        echo "<option value='{$value->oid}'> {$value->CustomerCode} - {$value->CustomerName} </option>";
                                    }
                                }
                                ?>
                            </select>

                        </fieldset>
                    </div>
                    <div class="col-3"> 
                        <label> Produce Code </label>
                        <fieldset class="form-group position-relative">
                            <input type="text" name="productCode" class="form-control" placeholder="Produce Code" value="<?= isset($_GET['productCode']) ? $_GET['productCode'] : '' ?>"/>

                        </fieldset>
                    </div>
                    <div class="col-3"> 
                        <label> Produce name </label>
                        <fieldset class="form-group position-relative">
                            <input type="text" name="productName" class="form-control" placeholder="Produce name" value="<?= isset($_GET['productName']) ? $_GET['productName'] : '' ?>"/>

                        </fieldset>
                    </div>

                </div> 
                <div class="text-right" style="padding-top: 20px;">
                    <button class="btn btn-primary  "><i class="ft-search"></i> Search</button>
                </div>
            </form>
        </div>

    </div>



</div>


<?php
//pshow($this->data);
?>
<div class="row">
    <div class="col-12">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Order List</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= URL ?>">Home</a>
                            </li>
                            <li class="breadcrumb-item active"> Order List 
                            </li> 
                        </ol>
                    </div>
                </div>
            </div>
            <div class="content-header-right col-md-6 col-12">
                <div class="dropdown float-md-right">
                    <a href="<?= URL ?>order/form" class="btn btn-success width-200 buttonAnimation text-white">New Order <i class="ft-plus"></i></a>

                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Order List</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">


                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>

                    </ul>
                </div>
            </div>
            <div class="card-body card-dashboard">


                <table class="table table-sm table-responsive">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Customers</th>
                            <th>Product Type</th>
                            <th>Product Code</th> 
                            <th>Product Name</th> 
                            <th>Factory Type</th>
                            <th>Remark</th>
                            <th>Revision</th>
                            <th>Stick</th>
                            <th>Holder</th>
                            <th>Tray</th>
                            <th>Order Qty.</th>
                            <th>Unit</th>
                            <th >Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($this->data)) {
                            $i = 1;
                            foreach ($this->data as $key => $value) {
                                ?>
                                <tr key={key}>
                                    <td><?= $i++ ?></td>
                                    <td><?= $value->CustomerName ?></td>
                                    <td><?= $value->orderProductTypeName ?></td>
                                    <td><?= $value->ProductCode ?></td> 
                                    <td><?= $value->ProductName ?></td> 
                                    <td><?= $value->FactoryTypeName ?></td>
                                    <td><?= $value->Remark ?></td>
                                    <td><?= $value->Revision ?></td>
                                    <td><?= $value->SrickName ?></td>
                                    <td><?= $value->Holdername ?></td>
                                    <td><?= $value->TrayName ?></td>
                                    <td><?= $value->OrderQty ?></td>
                                    <td><?= $value->UnitNameFullEng ?></td>
                                    <td style="width: 100px;padding: 0px;"> 
                                        <?= getLink('order/form/' . $value->oid, "<i class='ft-edit-2'></i>", '', 'btn btn-sm btn-success') ?> 
                                        <?= getLink('order/delete/' . $value->oid, "<i class='ft-trash-2'></i> ", '', 'btn btn-sm btn-danger RemoveItems') ?> 
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>



        <div id="TableFooter">
            <label> All : <?= count($this->data) ?> </label>
            <label> Page : 1 / 1 </label>      
        </div>

    </div>
</div>