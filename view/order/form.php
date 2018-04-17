
<form class="form row p2yForm" method="post">

    <div class="form-group col-md-3">
        <label>
            Customer
        </label> 

        <select name="CustomerOid" component="select" class="form-control pugin">
            <?php
            if (!empty($this->data['option']['customer'])) {
                foreach ($this->data['option']['customer'] AS $key => $values) {
                    $active = "";
                    if (isset($this->data['Myorder']) && $this->data['Myorder']->CustomerOid == $values->oid) {
                        $active = "selected";
                    }
                    ?> 
                    <option key={key} value="<?= $values->oid ?>" <?= $active ?>><?= $values->CustomerName ?></option>
                    <?php
                }
            }
            ?>



        </select>
    </div>
    <div class="form-group col-md-4">
        <label>
            Product Type
        </label>
        <select name="ProductTypeOid" component="select" class="form-control pugin">
            <?php
            if (!empty($this->data['option']['Producttype'])) {
                foreach ($this->data['option']['Producttype'] AS $key => $values) {
                    $active = "";
                    if (isset($this->data['Myorder']) && $this->data['Myorder']->ProductTypeOid == $values->oid) {
                        $active = "selected";
                    }
                    ?>
                    <option key={key} value="<?= $values->oid ?>" <?= $active ?> ><?= $values->ProductTypeName ?></option>
                    <?php
                }
            }
            ?>



        </select>

    </div>
    <div class="form-group col-md-4">
        <label>
            Product
        </label>
        <div class="form-inline-input">
            <div class="fiii ftb">
                Select some product...
            </div>
            <i class="ft-search fiii"></i>
        </div>
<!--        <select name="ProductOid" component="select" class="form-control pugin">
            <?php
            if (!empty($this->data['option']['Product'])) {
                foreach ($this->data['option']['Product'] AS $key => $values) {
                    ?>
                    <option key={key} value="<?= $values->oid ?>"><?= $values->ProductName ?></option>
                    <?php
                }
            }
            ?> 
        </select>-->

    </div>
    <div class="form-group col-md-3">
        <label>
            Factory Type
        </label>
        <select name="FactoryTypeOid" component="select" class="form-control pugin">
            <?php
            if (!empty($this->data['option']['Factorytype'])) {
                foreach ($this->data['option']['Factorytype'] AS $key => $values) {
                    ?>
                    <option key={key} value="<?= $values->oid ?>"><?= $values->FactoryTypeName ?></option>
                    <?php
                }
            }
            ?> 
        </select>

    </div>
    <div class="form-group col-md-4">
        <label>
            Holder
        </label>
        <select name="HolderOid" component="select" class="form-control pugin">
            <?php
            if (!empty($this->data['option']['Holder'])) {
                foreach ($this->data['option']['Holder'] AS $key => $values) {
                    ?>
                    <option key={key} value="<?= $values->oid ?>"><?= $values->HolderName ?></option>
                    <?php
                }
            }
            ?> 
        </select>

    </div>
    <div class="form-group col-md-4">
        <label>
            Srick
        </label>
        <select name="SrickOid" component="select" class="form-control pugin">
            <?php
            if (!empty($this->data['option']['Srick'])) {
                foreach ($this->data['option']['Srick'] AS $key => $values) {
                    ?>
                    <option key={key} value="<?= $values->oid ?>"><?= $values->SrickName ?></option>
                    <?php
                }
            }
            ?> 
        </select>


    </div>
    <div class="form-group col-md-3">
        <label>
            Tray
        </label>
        <select name="TrayOid" component="select" class="form-control pugin">
            <?php
            if (!empty($this->data['option']['Tray'])) {
                foreach ($this->data['option']['Tray'] AS $key => $values) {
                    ?>
                    <option key={key} value="<?= $values->oid ?>"><?= $values->TrayName ?></option>
                    <?php
                }
            }
            ?> 
        </select>

    </div>
    <div class="form-group col-md-4">
        <label>
            Unit
        </label>
        <select name="UnitOid" component="select" class="form-control pugin">
            <?php
            if (!empty($this->data['option']['Unit'])) {
                foreach ($this->data['option']['Unit'] AS $key => $values) {
                    $active = "";
                    if (isset($this->data['Myorder']) && $this->data['Myorder']->UnitOid == $key) {
                        $active = "selecd";
                    }
                    ?>
                    <option key={key} value="<?= $values->oid ?>" <?= $active ?>><?= $values->UnitName ?></option>
                    <?php
                }
            }
            ?> 
        </select> 
    </div> 

    <div class="form-group col-md-6">
        <label class="mdc-floating-label" for="my-text-field">  Product Code</label>
        <input type="text"  name="ProductCode" class="form-control" value="<?= isset($this->data['Myorder']) ? $this->data['Myorder']->ProductCode : '' ?>" required>

        <div class="mdc-line-ripple"></div>
    </div>
    <div class=" form-group col-md-6">
        <label>
            Remark
        </label>
        <input type="text" name="Remark"  class="form-control" value="<?= isset($this->data['Myorder']) ? $this->data['Myorder']->Remark : '' ?>" required/>
    </div>
    <div class="form-group col-md-6">
        <label>
            Revision
        </label>
        <input type="text" name="Revision" component="input"  class="form-control" value="<?= isset($this->data['Myorder']) ? $this->data['Myorder']->Revision : '' ?>" required/>
    </div>
    <div class="form-group col-md-6">
        <label>
            OrderQty
        </label>
        <input type="number" name="OrderQty" component="input" class="form-control" value="<?= isset($this->data['Myorder']) ? $this->data['Myorder']->OrderQty : '' ?>" required/>
    </div>
    <div class="clear"></div>
    <div  class="form-group col-md-12 Buttonx" >
        <?php if (!isset($this->id)) { ?>
            <button  class="pbtn pbtn-2x"> <i class="fas fa-plus"></i>  Create  </button>
        <?php } else {
            ?>
            <button  class="pbtn pbtn-2x"> Save <i class="far fa-save"></i></button>
        <?php }
        ?>
    </div>
</form>




