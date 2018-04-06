
<div class="fright">
    <?= getLink('order/form', 'Create Order <i class="fa fa-plus"></i> ', '', 'pbtn'); //button button-glow button-border button-small button-primary?> 
</div>

<div class="form-rule">
    <div id="OrderYear">
        <label>Year</label>
        <input type="text" name="" class="datepicker"/>
        <i class="far fa-calendar-alt"></i>

    </div>
    <div  >
        <label >Order Status</label>
        <select >
            <option>Actual</option>
        </select>

    </div>
    <div  >
        <label > Manufaturing</label>
        <select >
            <option> BOI</option>
        </select>

    </div>

</div>


<?php
//pshow($this->data);
?>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Customers</th>
            <th>Product Type</th>
            <th>Product Name</th> 
            <th>Factory Type</th>
             <th>Remark</th>
            <th>Revision</th>
            <th>Stick</th>
            <th>Holder</th>
            <th>Tray</th>
            <th>Order Qty.</th>
            <th>Unit</th>
            <th style="width: 30px;">Manage</th>
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
                    <td><?= $value->ProductTypeName ?></td>
                    <td><?= $value->ProductName ?></td> 
                    <td><?= $value->FactoryTypeName ?></td>
                    <td><?= $value->Remark ?></td>
                    <td><?= $value->Revision ?></td>
                    <td><?= $value->SrickName ?></td>
                    <td><?= $value->Holdername ?></td>
                    <td><?= $value->TrayName ?></td>
                    <td><?= $value->OrderQty ?></td>
                    <td><?= $value->UnitName ?></td>
                    <td> 
                        <?= getLink('order/form/' . $value->oid, "edit") ?> 
                        <?= getLink('order/delete/' . $value->oid, "remvoe ",'','RemoveItems') ?> 
                    </td>
                </tr>
                <?php
            }
        }
        ?>

    </tbody>
</table>

<div id="TableFooter">
    <label> All : <?= count($this->data) ?> </label>
    <label> Page : 1 / 1 </label>      
</div>
