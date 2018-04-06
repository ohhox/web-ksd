
</div>
</div>
<div  id="foot"><b> KSD</b> : Enterprise resource planning</div>
</div>

<script src="<?= URL ?>public/js/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="<?= URL ?>public/js/selectize.js/js/standalone/selectize.min.js"></script>  
<script type="text/javascript">


    $(function () {
        $("select.pugin").selectize();
        $(".RemoveItems").on('click', function (e) {
            if (!confirm('Confirm To Remove This Item.')) {
                e.preventDefault();
            }
        });
    });
    $('.datepicker').datepicker();
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
