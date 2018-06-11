<script src="<?= URL ?>public/app-assets/js/scripts/extensions/sweet-alerts.js" type="text/javascript"></script>
<script>
    function formalert(msg) {
        swal({
            title: "Remove Alert!",
            text: msg,
            icon: "warning",
            dangerMode: true,
        });
    }

    $(".RemoveItems").click(function (e) {
        e.preventDefault();
        let   obj = $(this);
        let url = $(this).attr('href');
        console.log(url);

        swal("Confirm To Remove This Order.", {
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
                            $.ajax(url);
                            obj.parent().parent().remove();
                            break;

                    }
                });


    });


</script>