<div class="card">
    <div class="card-header">
        <h4 class="card-title" id="repeat-form"> Product Formula</h4>
        <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">

                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>

            </ul>
        </div>
    </div>
    <div class="card-body">
        <form action="<?= URL ?>api/savePruductFormula" id="savePruductFormula" method="post">
            <div class="row">
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
                <div class="form-group col-md-4">
                    <label> Code</label>
                    <input type="text"  readonly  class="form-control" name="" id="ProductCode" >
                </div>
                <div class="form-group col-md-4">
                    <label>Name / Size</label>
                    <input type="text" readonly  class="form-control" name=""  id="nameSize">
                </div>
                <div class="form-group col-md-4">
                    <label>1 ชุดผลิตได้</label>
                    <input type="text"    class="form-control" name="QtyPerSet" id="QtyPerSet" >
                </div>
                <div class="form-group col-md-4">
                    <label>Revision ล่าสุด</label>
                    <select name="Revision" id="Revision" class="form-control"></select>
                </div>
                <div class="form-group col-md-4">
                    <label>&nbsp;</label>
                    <div> 
                        <div class="btn-group mr-1 mb-1">
                            <button type="button" class="btn btn-info">สร้างใหม่</button>
                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            </button>
                            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(54px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <a class="dropdown-item" id="newsExitItem">สร้างใหม่โดยจากข้อมูลล่าสุด</a>
                                <a class="dropdown-item" id="newsEmptyItem" href="#">สร้างใหม่</a> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-8">
                    <label>
                        Remark
                    </label>
                    <textarea class="form-control" name="Remark" id="Remark"></textarea>
                </div>
                <div class="col-12">
                    <div style="padding: 3px">
                        <a class="btn btn-primary text-white pull-right"  id="ClickaddAndSearch" > <i class="ft-plus"></i> Add Product</a> 
                        <div class="clear"></div>
                    </div>
                    <table class="table" id="appendProductTable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Code</th>
                                <th>Product/Size</th>
                                <th>น.น./ก่อนผสม</th>
                                <th>ผสมแล้ว หลอด / G(pcs.)</th>
                                <th style="width: 150px;">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot style="background: #f0f0f0;">
                            <tr>
                                <td colspan="3" class="text-right">น.น. รวม</td>
                                <td> <input type="text"  readonly name="PreTotalWeight" id="PreTotalWeight"/></td>
                                <td> <input type="text" readonly  name="PreMixedTotalWeight" id="PreMixedTotalWeight"/></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-right">น.น. หลังตัด</td>
                                <td> <input type="text" name="PostTotalWeight" id="PostTotalWeight"/></td>
                                <td> <input type="text" name="PostMixedTotslWeight" id="PostMixedTotslWeight"/></td>
                                <td></td>

                            </tr>
                        </tfoot>

                    </table>
                </div>
                <div class="col-md-12">
                    <button class="btn btn-primary pull-right"><i class="ft-save"></i> Save </button>
                </div>
            </div> 
        </form>



    </div>

</div>


