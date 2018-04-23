</div>
</div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<footer class="footer footer-static footer-light navbar-border navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
        <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2018 
            <a class="text-bold-800 grey darken-2" href="<?= URL ?>" >KSD ERP </a>, All rights reserved. </span>
        <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Hand-crafted & Made with <i class="ft-heart pink"></i></span>

    </p>
</footer>
<!-- BEGIN VENDOR JS-->
<script>
    var __URL = "<?=URL?>";
</script>
<script src="<?= URL ?>public/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->

<!-- BEGIN PAGE VENDOR JS-->

<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src="<?= URL ?>public/app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="<?= URL ?>public/app-assets/js/core/app.js" type="text/javascript"></script>
<script src="<?= URL ?>public/app-assets/js/scripts/customizer.js" type="text/javascript"></script>
<script src="<?= URL ?>public/app-assets/js/scripts/modal/components-modal.js" type="text/javascript"></script>
<!-- END MODERN JS-->
<!-- BEGIN PAGE LEVEL JS-->


<script src="<?= URL ?>public/app-assets/vendors/js/tables/datatable/datatables.min.js"  type="text/javascript"></script>
<script src="<?= URL ?>public/js/selectize.js/js/standalone/selectize.min.js"></script>   
<script src="<?= URL ?>public/js/custom.js"></script>  
<!-- END PAGE LEVEL JS-->

<script>
    $('.datatable').DataTable({
    });
</script>



<script type="text/javascript">


    $(function () {
        $("select.pugin").selectize();
        $(".RemoveItems").on('click', function (e) {
            if (!confirm('Confirm To Remove This Item.')) {
                e.preventDefault();
            }
        });
    });

<?php
if (!empty($this->dataid)) {
    ?>

        $('#openForm').on('click', function () {
            $("#formSubmit").attr('action', '<?= URL ?>masterdata/c/<?= $this->dataid ?>');
                    $("#form").modal();
                    $("#formSubmit input").val(null);
                    $("#formSubmit textarea").val(null);
                });


                $(".editFormOpen").on('click', function (e) {

                    $("#formSubmit input").val(null);
                    $("#formSubmit textarea").val(null);
                    var id = $(this).attr('data-id');
                    e.preventDefault();
                    var url = $(this).attr('href');
                    console.log(url);

                    $.ajax(url).done(function (data) {
                        var res = $.parseJSON(data);

                        $.each(res, function (key, value) {
                            $("#" + key).val(value);
                        })

                        $("#formSubmit").attr('action', '<?= URL ?>masterdata/u/<?= $this->dataid ?>/' + id);
                    });
                    $("#form").modal();
                });

<?php } ?>
</script>
</body>
</html>