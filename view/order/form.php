<div class="container">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title" id="repeat-form">Order Forms 
                <?php
                if (isset($this->data['Myorder'])) {
                    echo "<small>( Edit )</small>";
                } else {
                    echo "<small>( Create )</small>";
                }
                ?> </h4>
            <?php
            if (isset($this->data['Myorder'])) {
                ?>
                <p> Create  : <?= isset($this->data['Myorder']) ? date('Y-m-d H:i', strtotime($this->data['Myorder']->created_at)) : '' ?>   | 
                    Last update : <?= isset($this->data['Myorder']) ? date('Y-m-d H:i', strtotime($this->data['Myorder']->updated_at)) : '' ?>
                <?php } ?>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
            <div class="heading-elements">
                <ul class="list-inline mb-0">

                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>

                </ul>
            </div>
        </div>
        <div class="card-body">

            <form class="form row p2yForm" method="post" id="p2yForm">

                <div class="form-group col-md-4">
                    <label>
                        Customer <i class="icon-info text-danger" title="required"></i>
                    </label> 

                    <select name="CustomerOid" component="select" class="form-control pugin" id="CustomerOid" >
                        <option value="0">Choose Customer </option>
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
                        <option value="0">  Product Type  </option>
                        <?php
                        if (!empty($this->data['option']['Producttype'])) {
                            foreach ($this->data['option']['Producttype'] AS $key => $values) {
                                $active = "";
                                if (isset($this->data['Myorder']) && $this->data['Myorder']->OrderProductTypeOid == $values->oid) {
                                    $active = "selected";
                                }
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
                        Product <i class="icon-info text-danger" title="required"></i>
                    </label>
                    <div class="form-inline-input">
                        <input class="fiii ftb noselect" placeholder="Select some product." readonly id="productname" 
                               value="<?= isset($this->data['myproduct']) ? $this->data['myproduct']->ProdName1 : '' ?>" required/> 
                               <?php
                               if (!isset($this->data['Myorder'])) {
                                   ?>
                            <i class="ft-search fiii"  data-toggle="modal" data-target="#default"></i>
                        <?php } ?>

                        <input name="ProductOid" type="hidden" id="ProductOid"  value="<?= isset($this->data['Myorder']) ? $this->data['Myorder']->ProductOid : '' ?>"/>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label>
                        Factory Type <i class="icon-info text-danger" title="required"></i>
                    </label> 
                    <select name="FactoryTypeOid" component="select" class="form-control pugin" id="FactoryTypeOid">
                        <option value="0"> Choose  Factory Type  </option>
                        <?php
                        if (!empty($this->data['option']['Factorytype'])) {
                            foreach ($this->data['option']['Factorytype'] AS $key => $values) {
                                $active = "";
                                if (isset($this->data['Myorder']) && $this->data['Myorder']->FactoryTypeOid == $values->oid) {
                                    $active = "selected";
                                }
                                ?>
                                <option <?= $active ?> key={key} value="<?= $values->oid ?>"><?= $values->FactoryTypeName ?></option>
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
                        <option value="0"> Choose Holder  </option>
                        <?php
                        if (!empty($this->data['option']['Holder'])) {
                            foreach ($this->data['option']['Holder'] AS $key => $values) {
                                $active = "";
                                if (isset($this->data['Myorder']) && $this->data['Myorder']->HolderOid == $values->oid) {
                                    $active = "selected";
                                }
                                ?>
                                <option <?= $active ?> key={key} value="<?= $values->oid ?>"><?= $values->HolderName ?></option>
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
                        <option value="0"> Choose Srick  </option>
                        <?php
                        if (!empty($this->data['option']['Srick'])) {
                            foreach ($this->data['option']['Srick'] AS $key => $values) {
                                $active = "";
                                if (isset($this->data['Myorder']) && $this->data['Myorder']->SrickOid == $values->oid) {
                                    $active = "selected";
                                }
                                ?> 
                                <option <?= $active ?> key={key} value="<?= $values->oid ?>"><?= $values->SrickName ?></option>
                                <?php
                            }
                        }
                        ?> 
                    </select>


                </div>
                <div class="form-group col-md-4">
                    <label>
                        Tray
                    </label>
                    <select name="TrayOid" component="select" class="form-control pugin">
                        <option value="0"> Choose Tray  </option>
                        <?php
                        if (!empty($this->data['option']['Tray'])) {
                            foreach ($this->data['option']['Tray'] AS $key => $values) {
                                $active = "";
                                if (isset($this->data['Myorder']) && $this->data['Myorder']->TrayOid == $values->oid) {
                                    $active = "selected";
                                }
                                ?>
                                <option <?= $active ?> key={key} value="<?= $values->oid ?>"><?= $values->TrayName ?></option>
                                <?php
                            }
                        }
                        ?> 
                    </select>

                </div>
                <div class="form-group col-md-4">
                    <label>
                        Unit <i class="icon-info text-danger" title="required"></i>
                    </label>

                    <select name="UnitOid" component="select" class="form-control pugin" id="UnitOid">
                        <option value="0"> Choose Unit  </option>
                        <?php
                        if (!empty($this->data['option']['Unit'])) {
                            foreach ($this->data['option']['Unit'] AS $key => $values) {
                                $active = "";
                                if (isset($this->data['Myorder']) && $this->data['Myorder']->UnitOid == trim($values->UnitOID)) {
                                    $active = "selected";
                                }
                                ?>
                                <option key={key} value="<?= trim($values->UnitOID) ?>" <?= $active ?>>
                                    <?= $values->UnitNameFullEng ?>  <?= $values->UnitNameShortEng ? "({$values->UnitNameShortEng})" : "" ?> 
                                </option>
                                <?php
                            }
                        }
                        ?> 
                    </select> 
                </div> 
                <div class="form-group col-md-4"></div>
                <div class="form-group col-md-4">
                    <label class="mdc-floating-label" for="my-text-field">  Product Code</label>
                    <input type="text"  name="ProductCode" class="form-control" id="ProductCode" value="<?= isset($this->data['Myorder']) ? $this->data['Myorder']->ProductCode : '' ?>" readonly>

                    <div class="mdc-line-ripple"></div>
                </div>

                <div class="form-group col-md-4">
                    <label>
                        Revision
                    </label>
                    <input type="text" name="Revision" component="input"  class="form-control" value="<?= isset($this->data['Myorder']) ? $this->data['Myorder']->Revision : '0' ?>" readonly/>
                </div>
                <div class="form-group col-md-4">
                    <label>
                        OrderQty <i class="icon-info text-danger" title="required"></i>
                    </label>
                    <input type="number" min="0" name="OrderQty" component="input" class="form-control" value="<?= isset($this->data['Myorder']) ? $this->data['Myorder']->OrderQty : '0' ?>" required/>
                </div>
                <div class=" form-group col-md-12">
                    <label>
                        Remark
                    </label>
                    <textarea rows="5" name="Remark" class="form-control"><?= isset($this->data['Myorder']) ? $this->data['Myorder']->Remark : '' ?></textarea>

                </div>
                <div class="clear"></div>
                <div  class="form-group col-md-12 Buttonx" >
                    <a id="cencle" class="btn btn-danger text-white" href="<?= URL ?>order"> <i class="ft-x"></i> Cancel</a>
                    <?php if (!isset($this->id)) { ?>
                        <button  class="btn btn-success  pull-right"> <i class="icon-plus"></i>  Create  </button>
                    <?php } else {
                        ?>
                        <button  class="btn btn-success pull-right"> <i class="ft-save"></i> Save </button>

                    <?php }
                    ?>


                </div>
            </form>
        </div>    
    </div>
</div>