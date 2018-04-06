
<div id="LinkToMant"> 
    <ul >
        <?php
        $i = 1;
        foreach ($this->fn->REF as $key => $value) {
            $active = "";
            if (isset($this->dataid) && $this->dataid == $key) {
                $active = "active";
            }
            ?>
            <li>
                <a class="<?= $active ?>" href="<?= URL ?>masterdata/l/<?= $key ?>" > 
                    <div class="area51">
                        <div class="area51Icon">


                            <?= $value['table_Description'] ?>                     


                        </div>

                    </div>
                </a>

            </li>   
            <?php
        }
        ?>
    </ul> 
</div>
<div class="clear"></div>
<div >
    <?php
    if (!empty($this->dataid)) {
        ?>

        <div id="masterData">
            <div style="padding: 20px;">
                <h1 class="pageheader">
                    <button type="button" class="btn btn-primary pull-right" id="openForm">
                        <i class="fa fa-plus"></i> Create New <?= $this->dataid ?> </button>                  
                    <div class="clear"></div>
                </h1>
                <table class="form" style="margin: 0;padding: 0;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <?php
                            $table = $this->fn->REF[$this->dataid];
                            foreach ($table['field'] as $key => $value) {
                                echo "<th>{$value['field_Description']}</th>";
                            }
                            ?>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($this->data as $key => $value) {
                            //   $value = ThaiTextToutf($value);
                            ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <?php
                                $field_name = $v['field_name'];
                                foreach ($table['field'] as $k => $v) {
                                    echo "<td>{$value->$field_name}</td>";
                                }
                                ?>
                                <td>                                            
                                    <a class="btn btn-xs btn-warning editFormOpen" data-id="<?= $value->$table['pk']; ?>" href="<?= URL ?>masterdata/q/<?= $this->dataid ?>/<?= $value->$table['pk']; ?>">แก้ไข</a>
                                    <a class="btn  btn-xs btn-danger text-white RemoveItems" href="<?= URL ?>masterdata/d/<?= $this->dataid ?>/<?= $value->$table['pk']; ?>">ลบ</a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

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
                                    <label><?= $value['field_Description'] ?> <?php if (!empty($value['comment'])) { ?><div> <code>(<?= $value['comment'] ?>)</code></div> <?php } ?></label>
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
    </div>


<?php } ?>