<script src="<?= URL ?>public/app-assets/js/scripts/extensions/sweet-alerts.js" type="text/javascript"></script>
<script>
    $(function () {

        $('#formSubmit').submit(function (e) {
            e.preventDefault();
            var data = $(this).serialize();
            var url = $(this).attr('action');
            console.log(url);
            $.ajax({
                url: url,
                data: data,
                type: 'post',
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    swal("Status: " + textStatus + "/n Error: " + errorThrown, {
                        icon: "error",
                    }); 
                }

            }).done(function (data) {
                var json = $.parseJSON(data);
                if (json.success) {
                    swal("บันทึกข้อมูลเรียบร้อย", {
                        icon: "success",
                    }).then(function(){
                        window.location.reload();
                    });
                    
                } else {
                    swal("ไม่สามารถบันทึกข้อมูลได้", {
                        icon: "error",
                    });
                }

            });
        });

        $(".RemoveItems").click(function (e) {
            e.preventDefault();
            var url = $(this).attr('href');
            var obj = $(this);
            swal({
                title: "ยืนยันการลบข้อมูล",
                text: "ยืนยันการลบรายการนี้",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                    .then((willDelete) => {
                        if (willDelete) {

                            $.ajax(url).done(function (data) {
                                $(obj).parent().parent().remove();
                            });
                            //  
                            swal("ลบข้อมูลเรียบร้อย", {
                                icon: "success",
                            });

                        } else {

                        }
                    });
        });

    });
</script>