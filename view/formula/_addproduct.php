<div class="modal fade text-left " id="addAndSearch" tabindex="-1" role="dialog" aria-labelledby="Search Product" >
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content"> 
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1">Search Product</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form  row" id="addAndSearchAPI">
                    <div class="col-7">
                        <div class="form-group row">
                            <label class="col-3 text-right">
                                ProductType xx
                            </label>
                            <div class="col-9">
                                <select class="select form-control form-control-sm pugin" name="ItemTypes">
                                    <option value="all">Select ProductType</option>
                                    <?php
                                    if (!empty($this->data['option']['ItemTypes'])) {
                                        foreach ($this->data['option']['ItemTypes'] AS $key => $values) {
                                            $active = "";
                                            ?>
                                            <option key={key} value="<?= $values->ItemTOID ?>" <?= $active ?> ><?= $values->ItemTName ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 text-right">
                                Category Group
                            </label>
                            <div class="col-9">
                                <select class="select form-control form-control-sm pugin" name="CategoryGroup">
                                    <option value="all">Select   Category Group</option>
                                    <?php
                                    if (!empty($this->data['option']['CategoryGroup'])) {
                                        foreach ($this->data['option']['CategoryGroup'] AS $key => $values) {
                                            $active = "";
                                            ?>
                                            <option key={key} value="<?= $values->ProdTOID ?>" <?= $active ?> ><?= $values->ProdTName ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 text-right">
                                Category
                            </label>
                            <div class="col-9">
                                <select class="select form-control form-control-sm pugin" name="Category">
                                    <option value="all">Select   Category </option>
                                    <?php
                                    if (!empty($this->data['option']['Category'])) {
                                        foreach ($this->data['option']['Category'] AS $key => $values) {
                                            $active = "";
                                            ?>
                                            <option key={key} value="<?= $values->ProdCatOID ?>" <?= $active ?> ><?= $values->ProdCatName ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 text-right">
                                Sub Category
                            </label>
                            <div class="col-9">
                                <select class="select form-control form-control-sm pugin" name="SubCategory">
                                    <option value="all">Select  Sub  Category</option>
                                    <?php
                                    if (!empty($this->data['option']['SubCategory'])) {
                                        foreach ($this->data['option']['SubCategory'] AS $key => $values) {
                                            $active = "";
                                            ?>
                                            <option key={key} value="<?= $values->ProdCatSubOID ?>" <?= $active ?> ><?= $values->ProdCatSubName ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label>Code/Product name</label>
                            <input type="text" class="form-control form-control-sm" name="keyword">
                        </div>
                        <button class="btn btn-primary pull-right"><i class="ft-search"></i> Search </button>
                    </div>
                </form>

                <div>
                    <table class="table table-sm" id="addAndSearchAPIAppend">
                        <thead>
                            <tr>
                                <td >Produce Code</td>
                                <td>Produce Name</td>
                                <td>Select</td>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">                
                <button type="button" class="btn grey btn-dark" data-dismiss="modal">Close Popup</button> 
            </div>
        </div>
    </div>
</div>

<div class="modal fade text-left " id="NewRevesions" tabindex="-1" role="dialog" aria-labelledby="Search Product" >
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content"> 
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1">New Revision</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form  row" id="NewRevSelectDatetim"> 
                    <input type="hidden" name="newRevprodOid" id="newRevprodOid"/>
                    <input type="hidden" name="newRevOption" id="newRevOption" />
                    <div class="form-group" style="padding: 30px;width: 100%;">
                        <label>เลือกวันที่</label>
                        <input type="text" name="dateOfRevesion" id="dateOfRevesion" class="form-control" value="<?= date('Y-m-d') ?>">
                    </div>
                    <input type="submit" id="clicktoSubmitRevNew" style="display: none;">
                </form>

            </div>
            <div class="modal-footer">                
                <button type="button" class="btn grey btn-dark" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn grey btn-success" onclick="$('#clicktoSubmitRevNew').click();"   data-dismiss="modal">Create Revision</button>
            </div>
        </div>
    </div>
</div>

