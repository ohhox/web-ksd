<?php
$page = $this->page + 1;
$url = $_GET;
unset($url['url']);
unset($url['p']);
unset($url['soft']);
unset($url['d']);
$url = http_build_query($url);
$order = isset($_GET['d']) ? (($_GET['d'] == 'ASC') ? 'DESC' : 'ASC') : 'ASC';
?>
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
                        <label> Product </label>
                        <fieldset class="form-group position-relative">
                            <input type="text" name="Product" class="form-control" placeholder="Filter Produce code & name" value="<?= isset($_GET['Product']) ? $_GET['Product'] : '' ?>"/>

                        </fieldset>
                    </div>


                </div> 
                <div class="text-right" style="padding-top: 20px;">
                    <a  href="?" class="btn btn-danger  text-white"><i class="ft-refresh-cw"></i> Reset</a> 
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
                            <th>
                                <a class="text-dark" href="?<?= $url ?>&soft=c.ShortName&d=<?= $order ?>">Customers 
                                    <?php
                                    echo isset($_GET['soft']) && $_GET['soft'] == 'c.ShortName' ? ($_GET['d'] == 'ASC') ? "<i class='ft-arrow-down'></i>" : "<i class='ft-arrow-up'></i>" : ""
                                    ?> 
                                </a>
                            </th>
                            <th>
                                <a class="text-dark" href="?<?= $url ?>&soft=orderProductTypeName&d=<?= $order ?>">Product Type 
                                    <?php
                                    echo isset($_GET['soft']) && $_GET['soft'] == 'orderProductTypeName' ? ($_GET['d'] == 'ASC') ? "<i class='ft-arrow-down'></i>" : "<i class='ft-arrow-up'></i>" : ""
                                    ?> 
                                </a>
                            </th>
                            <th>
                                <a class="text-dark" href="?<?= $url ?>&soft=ProductCode&d=<?= $order ?>">Product Code 
                                    <?php
                                    echo isset($_GET['soft']) && $_GET['soft'] == 'ProductCode' ? ($_GET['d'] == 'ASC') ? "<i class='ft-arrow-down'></i>" : "<i class='ft-arrow-up'></i>" : ""
                                    ?> 
                                </a> 
                            </th> 
                            <th>
                                <a class="text-dark" href="?<?= $url ?>&soft=p.ProdName1&d=<?= $order ?>">Product Name 
                                    <?php
                                    echo isset($_GET['soft']) && $_GET['soft'] == 'p.ProdName1' ? ($_GET['d'] == 'ASC') ? "<i class='ft-arrow-down'></i>" : "<i class='ft-arrow-up'></i>" : ""
                                    ?> 
                                </a> 
                            </th> 
                            <th> 
                                <a class="text-dark" href="?<?= $url ?>&soft=FactoryTypeName&d=<?= $order ?>">Factory Type 
                                    <?php
                                    echo isset($_GET['soft']) && $_GET['soft'] == 'FactoryTypeName' ? ($_GET['d'] == 'ASC') ? "<i class='ft-arrow-down'></i>" : "<i class='ft-arrow-up'></i>" : ""
                                    ?> 
                                </a> 
                            </th>
                            <th> 
                                <a class="text-dark" href="?<?= $url ?>&soft=Remark&d=<?= $order ?>">Remark
                                    <?php
                                    echo isset($_GET['soft']) && $_GET['soft'] == 'Remark' ? ($_GET['d'] == 'ASC') ? "<i class='ft-arrow-down'></i>" : "<i class='ft-arrow-up'></i>" : ""
                                    ?> 
                                </a> 
                            </th>
                            <th>
                                <a class="text-dark" href="?<?= $url ?>&soft=Revision&d=<?= $order ?>">Revision
                                    <?php
                                    echo isset($_GET['soft']) && $_GET['soft'] == 'Revision' ? ($_GET['d'] == 'ASC') ? "<i class='ft-arrow-down'></i>" : "<i class='ft-arrow-up'></i>" : ""
                                    ?> 
                                </a> 
                            </th>
                            <th>
                                <a class="text-dark" href="?<?= $url ?>&soft=SrickName&d=<?= $order ?>">Stick
                                    <?php
                                    echo isset($_GET['soft']) && $_GET['soft'] == 'SrickName' ? ($_GET['d'] == 'ASC') ? "<i class='ft-arrow-down'></i>" : "<i class='ft-arrow-up'></i>" : ""
                                    ?> 
                                </a> 
                            </th> 
                            <th>  
                                <a class="text-dark" href="?<?= $url ?>&soft=Holdername&d=<?= $order ?>">Holder
                                    <?php
                                    echo isset($_GET['soft']) && $_GET['soft'] == 'Holdername' ? ($_GET['d'] == 'ASC') ? "<i class='ft-arrow-down'></i>" : "<i class='ft-arrow-up'></i>" : ""
                                    ?> 
                                </a> 
                            </th>
                            <th>
                                <a class="text-dark" href="?<?= $url ?>&soft=TrayName&d=<?= $order ?>">Tray
                                    <?php
                                    echo isset($_GET['soft']) && $_GET['soft'] == 'TrayName' ? ($_GET['d'] == 'ASC') ? "<i class='ft-arrow-down'></i>" : "<i class='ft-arrow-up'></i>" : ""
                                    ?> 
                                </a>
                            </th>
                            <th> 
                                <a class="text-dark" href="?<?= $url ?>&soft=OrderQty&d=<?= $order ?>"> Order Qty.
                                    <?php
                                    echo isset($_GET['soft']) && $_GET['soft'] == 'OrderQty' ? ($_GET['d'] == 'ASC') ? "<i class='ft-arrow-down'></i>" : "<i class='ft-arrow-up'></i>" : ""
                                    ?> 
                                </a>
                            </th>
                            <th>
                                <a class="text-dark" href="?<?= $url ?>&soft=UnitNameFullEng&d=<?= $order ?>"> Unit
                                    <?php
                                    echo isset($_GET['soft']) && $_GET['soft'] == 'UnitNameFullEng' ? ($_GET['d'] == 'ASC') ? "<i class='ft-arrow-down'></i>" : "<i class='ft-arrow-up'></i>" : ""
                                    ?> 
                                </a>
                            </th>
                            <th >Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($this->data)) {
                            $i = 1;
                            foreach ($this->data['list'] as $key => $value) {
                                ?>
                                <tr key={key}>
                                    <td><?= ($this->page * $this->limit) + $i++ ?></td>
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



        <div >
            <?php
            ?>
            <nav aria-label="Page navigation">
                <div class="text-center">
                    <?php
                    $allPage = 0;
                    $allItem = 0;
                    $url = $_GET;
                    unset($url['url']);
                    unset($url['p']);
                    $url = http_build_query($url);

                    if (isset($this->data['count']) && !empty($this->data['count'])) {
                        $allPage = ceil($this->data['count'] / $this->limit);
                        $allItem = $this->data['count'];
                    }
                    echo 'all : ' . number_format($allItem) . " item  : Page $page of $allPage  ({$this->limit}/page)";
                    ?>
                </div>
                <ul class="pagination justify-content-center pagination-separate pagination-flat">

                    <?php
                    if ($page > 1) {
                        ?>
                        <li class="page-item">
                            <a class="page-link" href="?<?= $url ?>&p=<?= $page - 1 ?>" aria-label="Previous">
                                <span aria-hidden="true">« Prev</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <?php
                    }

                    for ($index = 1; $index <= $allPage; $index++) {
                        $minshow = $page - 5;
                        $maxshow = $page + 5;
                        $maxshow = ($maxshow > $allPage ? $allPage : $maxshow);
                        $minshow = ($minshow < 0 ? 0 : $minshow);
                        if ($index >= ($minshow) && $index <= $maxshow) {
                            $active = "";
                            if ($page == $index) {
                                $active = 'active';
                            }
                            ?>
                            <li class="page-item <?= $active ?>"><a class="page-link"  href="?<?= $url ?>&p=<?= $index ?>"><?= $index ?></a></li>
                            <?php
                        }
                    }
                    ?>

                    <?php
                    if ($page < $allPage) {
                        ?>
                        <li class="page-item">
                            <a class="page-link" href="?<?= $url ?>&p=<?= $page + 1 ?>" aria-label="Next">
                                <span aria-hidden="true">Next »</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </nav>   
        </div>

    </div>
</div>