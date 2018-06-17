<?php
$page = $this->page + 1;
?>
<div class="card" >
    <div class="card-header">
        <h4 class="card-title"> SELECT TAB</h4>
        <div class="heading-elements">
            <ul class="list-inline mb-0"> 
                <li><a data-action="expand"><i class="ft-maximize"></i></a></li> 
            </ul>
        </div>
    </div>
    <div class="card-content">
        <div class="card-body">
            <ul class="nav nav-tabs nav-linetriangle nav-justified">
                <?php
                $i = 1;

                foreach ($this->fn->REF as $key => $value) {
                    $active = "";
                    if (isset($this->dataid) && $this->dataid == $key) {
                        $active = "active";
                    }
                    ?>

                    <li class="nav-item">
                        <a href="<?= URL ?>masterdata/l/<?= $key ?>" class="nav-link <?= $active ?>"  > <?= $value['table_Description'] ?></a>
                    </li> 
                    <?php
                }
                ?>

            </ul>
        </div>
    </div>
    <?php
    if (!empty($this->dataid)) {
        ?>
    </div>

    <div class="card" >

        <div class="card-content">
            <div class="card-header">
                <h4 class="card-title"> <i class="ft-search"></i> Filter Options for  <?= isset($this->dataid) ? ' : ' . $this->dataid : '' ?></h4>
                <div class="heading-elements">
                    <ul class="list-inline mb-0"> 
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li> 
                    </ul>
                </div>
            </div>
            <div class="card-body">

                <form class="form" >
                    <div class=" row  justify-content-md-center">

                        <div class="col-md-12">
                            <label> Search </label>
                            <input type="text" class="form-control form-control-sm" value="<?= isset($_GET['search']['text']) ? $_GET['search']['text'] : '' ?>" name="search[text]" placeholder="Search">
                        </div>

                        <div class="clear"></div>
                    </div>
                    <div class="text-right" style="padding-top: 20px;">
                        <a  href="?" class="btn btn-danger  text-white"><i class="ft-refresh-cw"></i> Reset</a> 
                        <button type="submit" class="btn btn-primary"><i class="ft-search"></i> Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<div style="text-align: right;padding-bottom: 10px;">
   <?php
                            if ($this->master['manage']) {
                                ?>
                                <button type="button" class="btn btn-info " id="openForm">
                                    Create New <?= $this->dataid ?>  <i class="ft-plus"></i> 
                                </button>         
                            <?php } ?>
    </div>
    <div class="card" >

        <div class="card-content">
            <div class="card-header">
                <h4 class="card-title"> Master Data  <?= isset($this->dataid) ? ' : ' . $this->dataid : '' ?></h4>
                <div class="heading-elements">
                    <ul class="list-inline mb-0"> 
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li> 
                    </ul>
                </div>
            </div>
            <div class="card-body">


                <div id="masterData">
                    <div style="padding: 20px;"> 
                        <div>


                            <table class=" table table-sm "  >
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <?php
                                        $table = $this->fn->REF[$this->dataid];
                                        foreach ($table['field'] as $key => $value) {
                                            echo "<th>{$value['field_Description']}</th>";
                                        }
                                        ?>
                                        <th style="width: 240px;" class="text-center">Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $pk = $table['pk'];
                                    $i = 1;
                                    foreach ($this->data as $key => $value) {
                                        ?>
                                        <tr>
                                            <td><?= ($this->page * $this->limit) + $i++ ?></td>
                                            <?php
                                            foreach ($table['field'] as $k => $v) {
                                                $field_name = $v['field_name'];
                                                echo "<td>{$value->$field_name}</td>";
                                            }
                                            ?>
                                            <td  class="text-center">   
                                                <!--href="<?= URL ?>masterdata/q/<?= $this->dataid ?>/<?= $value->$pk; ?>"-->
                                                <a class="btn btn-xs btn-success btn-sm View text-white" data-id="<?= $value->$pk; ?>" >รายละเอียด</a>
                                                <?php
                                                if ($this->master['manage']) {
                                                    ?>
                                                    <a class="btn btn-xs btn-success btn-sm editFormOpen " data-id="<?= $value->$pk; ?>" href="<?= URL ?>masterdata/q/<?= $this->dataid ?>/<?= $value->$pk; ?>">แก้ไข</a>
                                                    <a class="btn  btn-xs btn-danger btn-sm text-white RemoveItems" href="<?= URL ?>masterdata/d/<?= $this->dataid ?>/<?= $value->oid; ?>">ลบ</a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="clear"></div>

                    <nav aria-label="Page navigation">
                        <div class="text-center">
                            <?php
                            $allPage = 0;
                            $allItem = 0;

                            if (isset($this->count) && !empty($this->count)) {
                                $allPage = ceil($this->count[0]->count / $this->limit);
                                $allItem = $this->count[0]->count;
                            }
                            echo 'all : ' . number_format($allItem) . " item  : Page $page of $allPage  ({$this->limit}/page)";
                            ?>
                        </div>
                        <ul class="pagination justify-content-center pagination-separate pagination-flat">

                            <?php
                            $url = $_GET;

                            unset($url['url']);
//                              pshow($url);
//                            exit();
                            unset($url['p']);
                            $url = http_build_query($url);
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

                <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"> <?= $table['table_Description'] ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form  method="post" id="formSubmit"> 

                                    <?php
                                    foreach ($table['field'] as $key => $value) {
                                        ?>
                                        <div class="form-group">
                                            <label>
                                                <?= $value['field_Description'] ?> 
                                                <?php if (!empty($value['comment'])) { ?><div> <code>(<?= $value['comment'] ?>)</code></div> <?php } ?>
                                            </label>
                                            <?php
                                            if ($value['field_type'] == 'input') {
                                                ?>
                                                <input type="text"  id="<?= $value['field_name'] ?>" name="<?= $value['field_name'] ?>" <?= $value['required'] ?>  placeholder="<?= $value['field_Description'] ?>"  class="form-control">
                                            <?php } else {
                                                ?>
                                                <textarea rows="5" id="<?= $value['field_name'] ?>" name="<?= $value['field_name'] ?>" <?= $value['required'] ?>  placeholder="<?= $value['field_Description'] ?>" class="form-control"></textarea>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <?php
                                    }
                                    ?>

                                    <button type="submit" id="Submit1" style="display: none;"></button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary" onclick="$('#Submit1').click();"> Save </button>
                            </div>
                        </div>
                    </div>
                </div> 


            <?php } else {
                ?>

                <h3 style="padding: 100px;text-align: center;color:#FF9149">
                    <i class="ft-arrow-up"></i> <br/>
                    Please select some tap.</h3>
            <?php }
            ?>
        </div>
    </div>
</div>

