<div class="card">
    <div class="card-header">
        <h4 class="card-title" id="repeat-form">Order Forms</h4>
        <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">

                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>

            </ul>
        </div>
    </div>
    <div class="card-body">

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
                <select name="OrderProductTypeOid" component="select" class="form-control pugin">
                    <?php
                    if (!empty($this->data['option']['Producttype'])) {
                        foreach ($this->data['option']['Producttype'] AS $key => $values) {
                            $active = "";
                            ?>
                            <option key={key} value="<?= $values->oid ?>" <?= $active ?> ><?= $values->OrderProductTypeName ?></option>
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
                    <input class="fiii ftb noselect" placeholder="Select some product." readonly id="productname" required/> 
                    <i class="ft-search fiii"  data-toggle="modal" data-target="#default"></i>

                    <input name="ProductOid" type="hidden" id="ProductOid"  value="<?= isset($this->data['Myorder']) ? $this->data['Myorder']->ProductOid : '' ?>"/>
                </div>
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
                            <option key={key} value="<?= $values->UnitOID ?>" <?= $active ?>> <?= $values->UnitNameFullEng ?>  <?= $values->UnitNameShortEng ? "({$values->UnitNameShortEng})" : "" ?> </option>
                            <?php
                        }
                    }
                    ?> 
                </select> 
            </div> 

            <div class="form-group col-md-6">
                <label class="mdc-floating-label" for="my-text-field">  Product Code</label>
                <input type="text"  name="ProductCode" class="form-control" id="ProductCode" value="<?= isset($this->data['Myorder']) ? $this->data['Myorder']->ProductCode : '' ?>" readonly>

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
                    <button  class="btn btn-success btn-lg"> <i class="fas fa-plus"></i>  Create  </button>
                <?php } else {
                    ?>
                    <button  class="btn btn-success"> Save <i class="far fa-save"></i></button>
                    <?php }
                    ?>
            </div>
        </form>
    </div>    
</div>