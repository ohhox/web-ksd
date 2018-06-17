<script src="<?= URL ?>public/app-assets/js/scripts/extensions/sweet-alerts.js" type="text/javascript"></script>
<script>
    function formalert(msg) {
        swal({
            title: "Order Forms Alert!",
            text: msg,
            icon: "warning",
            dangerMode: true,
        });
    }
    $(window).ready(function () {
        $("#p2yForm").on('submit', function (e) {
            if ($('#CustomerOid').val() == "0") {
                e.preventDefault();
                formalert(" Please Choose Customer.");
            } else if ($('#ProductOid').val() == "") {
                e.preventDefault();
                formalert(" Please Select Product.");
            } else if ($('#FactoryTypeOid').val() == "0") {
                e.preventDefault();
                formalert(" Please Select Factory.");
            } else if ($('#UnitOid').val() == "0") {
                e.preventDefault();
                formalert(" Please Select Unit.");
            } else if ($('#UnitOid').val() == "0") {
                e.preventDefault();
                formalert(" Please Select Unit.");
            } else if ($('#OrderQty').val() == "") {
                e.preventDefault();
                formalert(" Please Select Order Qty.");
            }
        });


        $("#cencle").click(function (e) {
            e.preventDefault();
            let url = $(this).attr('href');
            console.log(url);
            swal("Do you really want to cancel?", {
                buttons: {
                    cancel: "No",
                    catch : {
                        text: "Yes",
                        value: "Yes",
                    },
                    defeat: false,
                },
            })
                    .then((value) => {
                        switch (value) {

                            case "Yes":
                                window.location = url;
                                break;
                        }
                    });
        });

    });
</script>