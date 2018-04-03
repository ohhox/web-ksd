
<div class="fright">
    <?= getLink('order/form', '<i class="fas fa-plus"></i> Create Order','','button button-glow button-border button-small button-primary') ?> 
</div>
<div className="form-rule">
    <div className="form-group">
        <label>Year</label>
        <input type="text" name=""/>
        <i className="far fa-calendar-alt"></i>

    </div>
    <div className="form-group">
        <label>Order Status</label>
        <select>
            <option>Actual</option>
        </select>

    </div>

</div>


<?php
//pshow($this->data);
?>
<table>
    <thead>
        <tr>
            <th>Customers</th>
            <th>Product Type</th>
            <th>Product</th>
            <th>Product Code</th>
            <th>Factory Type</th>
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
            foreach ($this->data as $key => $value) {
                ?>
                <tr key={key}>
                    <td><?= $value->CustomerName ?></td>
                    <td><?= $value->ProductTypeName ?></td>
                    <td><?= $value->ProductName ?></td>
                    <td><?= $value->ProductCode ?></td>
                    <td><?= $value->FactoryTypeName ?></td>
                    <td><?= $value->Revision ?></td>
                    <td><?= $value->SrickName ?></td>
                    <td><?= $value->Holdername ?></td>
                    <td><?= $value->TrayName ?></td>
                    <td><?= $value->OrderQty ?></td>
                    <td><?= $value->UnitName ?></td>
                    <td> 
                        <?= getLink('order/form/' . $value->oid, "edit") ?> 
                          <?= getLink('order/delete/' . $value->oid, "remvoe") ?> 
                    </td>
                </tr>
            <?php
            }
        }
        ?>

    </tbody>
</table>
