
<script src="<?= URL ?>public/app-assets/js/scripts/extensions/sweet-alerts.js" type="text/javascript"></script>
<script>
    var tap = 1;
    $("#productname").on('change', function () {
        $("#nameSize").val($(this).val());
        var prodOid = $('#ProductOid').val();
        $('#default').modal('hide');
        $.ajax('api/getFormula/' + prodOid).done(function (res) {
            if (res) {
                var json = $.parseJSON(res);
                if (json.succes) {
                    $("#Revision").find('option').remove();
                    $.each(json.data, function (k, value) {
                        var datet = (value.LastUpdated); //.toDate("dd/mm/yyyy hh:ii:ss");
                        if (value.ActiveRevOID == '0') {
                            extendsToInput(value);
                            $("#Revision").append('<option selected value=' + value.PFOID + '> REV. ' + value.RevCount + ' - ' + datet + '</option>');
                            getListProductForFormula(value.PFOID);
                        } else {
                            $("#Revision").append('<option value=' + value.PFOID + '> REV. ' + value.RevCount + ' ' + datet + '</option>');
                        }


                    });
                } else {
                    swal("ไม่พบข้อมูลสูตรการผลิตสำหรับสินค้ารายการนี้", {
                        buttons: {
                            cancel: "ปิด",
                            catch : {
                                text: "สร้างรายการใหม่",
                                value: "new",
                            }
                        },
                    })
                            .then((value) => {
                                if (value == 'new') {
                                    newRevision(prodOid, 'firstFormulas');
//                                    $.post('api/newFormula', {prodOid: prodOid, option: 'firstFormulas'}, function (data, status) {
//                                        if (status == 'success') {
//                                            console.log(data);
//                                            $("#productname").change();
//                                        } else {
//
//                                            swal('ยังไม่ได้สร้างรายการใหม่โปรดตรวจสอบการเชื่อมค่อ');
//                                        }
//                                    });
                                }
                            });
                }
            } else {

            }
        });


    });
    $("#newsExitItem").on('click', function () {
        let prodOid = $('#ProductOid').val();
        if (prodOid != "") {
            newRevision(prodOid, 'newRevisionWithItem');
        } else {
            swal('เลือกสินค้าก่อน');
        }
    });

    $("#newsEmptyItem").on('click', function () {
        let prodOid = $('#ProductOid').val();

        if (prodOid != "") {
            newRevision(prodOid, 'newRevisionNoItem');
        } else {
            swal('เลือกสินค้าก่อน');
        }
    });


    $('#Revision').on('change', function () {
        var id = $(this).val();
        getRevision(id);
        getListProductForFormula(id);
    });

    $("#appendProductTable tbody").on('change', ".Weight", calcWieght);
    $("#appendProductTable tbody").on('change', ".MixedWeight", calcWieghtMix);


    $("#appendProductTable tbody").on('click', '.RemoveProduct', function () {
        let id = $(this).attr('data-id');

        if (id) {
            deleteFormulaItem(this, id);
        } else {
            $(this).parent().parent().remove();
        }

        //$(this).parent().parent().remove();
        calcWieght();
        calcWieghtMix();
    });

    $('#savePruductFormula').on('submit', function (e) {
        e.preventDefault();
        if ($("#Revision").val()) {
            $.post($(this).attr('action'), $(this).serialize()).done(function (data) {
                if (data) {
                    let res = $.parseJSON(data);
                    if (res.succes) {
                        swal("บันทึกข้อมูลเรียบร้อย", "บันทึกข้อมูล Revision เรียบร้อยแล้ว", "success");
                    }
                }
            });
        } else {
            swal("ไม่พบข้อมูลที่ต้องการบันทึก");
        }
    });
    $("#ClickaddAndSearch").on('click', function () {
        if ($("#Revision").val()) {
            $("#addAndSearch").modal('show');
        } else {
            swal("เลือก Revision ที่ต้องการก่อน");
        }
    });
    $("#appendProductTable tbody").on('focus', 'input', function () {
        $(this).select();
        var _self = this;
        setTimeout(function () {
            if ('selectionStart' in _self)
            {
                console.log(_self.selectionStart, _self.selectionEnd);
            }
            //IE
            else if (document.selection)
            {
                console.log(document.selection);
            }
        }, 1000);
    });

    $(window).on('keydown', function (e) {
        if (e.which == 13) {
            e.preventDefault();
        }
        keybaordControl(e);
    });

    function newRevision(product_id, option) {
        $.post('api/newFormula', {prodOid: product_id, option: option}, function (data, status) {
            if (status == 'success') {
                let res = $.parseJSON(data);
                if (res.succes) {
                    $("#productname").change();
                    swal('สร้าง Revision ใหม่เรียบร้อย');
                }
            } else {
                swal('ยังไม่ได้สร้างรายการใหม่โปรดตรวจสอบการเชื่อมค่อ');
            }
        });

    }
    function deleteFormulaItem(obj, id) {
        swal({
            title: "ยินยันการลบข้อมูล",
            text: "ยืนยันการลบสินค้ารายการนี้",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax('api/deleteFormulaItem/' + id).done(function (data) {
                            if (data) {
                                let res = $.parseJSON(data);
                                if (res.succes) {
                                    $(obj).parent().parent().remove();
                                }
                            }
                        });
                        //  
                        swal("Poof! Your imaginary file has been deleted!", {
                            icon: "success",
                        });
                    } else {
                        swal("Your imaginary file is safe!");
                    }
                });
    }
    function keybaordControl(e) {
        let focused = $(':focus');
        if ($(focused).attr('data-tap')) {
            var intx = parseInt($(focused).attr('data-tap'));

            if (e.which == 38) {
                intx -= 2;
            } else if (e.which == 40) {
                intx += 2;
            } else if (e.which == 37) {
                intx -= 1;
            } else if (e.which == 39) {
                intx += 1;
            }
            if (e.which == 37 || e.which == 38 || e.which == 39 || e.which == 40) {
                $("input[data-tap=" + intx + "]").focus();

            }
        }
        return true;
    }

    function getRevision(revID) {
        $.ajax('api/getProductFormula/' + revID).done(function (data) {
            if (data) {
                let res = $.parseJSON(data);
                if (res.succes) {

                    // $.each(res.data, function (key, value) {
                    extendsToInput(res.data);

                    //  })
                }
            }
        });
    }
    function getListProductForFormula(formulaId) {
        clearappendProductTable();
        $.ajax('api/getListProductForFormula/' + formulaId).done(function (data) {
            if (data) {
                let res = $.parseJSON(data);
                if (res.succes) {
                    $.each(res.data, function (key, value) {
                        appedToTable(value);
                    })
                }
            }
        });
    }




    function extendsToInput(value) {
        $("#QtyPerSet").val(value.QtyPerSet);
        $("#PreTotalWeight").val(value.PreTotalWeight);
        $("#PreMixedTotalWeight").val(value.PreMixedTotalWeight);

        $("#PostTotalWeight").val(value.PostTotalWeight);
        $("#PostMixedTotslWeight").val(value.PostMixedTotalWeight);
        $("#Remark").val(value.Remark);
    }

    function appedToTable(obj) {

        var name = obj.ProdName1;
        var code = obj.ProdCode;
        var id = obj.ProdOID;
        var Weight = obj.Weight ? obj.Weight : '';
        var MixedWeight = obj.MixedWeight ? obj.MixedWeight : "";

        if ($('.ProdOID[value=' + id + ']').length == 0) {
            var count = $("#appendProductTable tbody tr").length;

            var tr = " <tr>" +
                    "<td> " + (count + 1) + " </td>" +
                    "<td>" + code + "<input type='hidden' name='PFDOID[" + id + "]' class='PFDOID' value='" + obj.PFDOID + "'/><input type='hidden' name='ProdOID[]' class='ProdOID' value='" + id + "'/></td>" +
                    "<td>" + name + "</td>" +
                    "<td><input type='text' data-tap='" + (tap += 1) + "'  name='Weight[" + id + "]' class='Weight' value='" + Weight + "'/></td>" +
                    "<td><input type='text' data-tap='" + (tap += 1) + "'  name='MixedWeight[" + id + "]' class='MixedWeight' value='" + MixedWeight + "'/></td>" +
                    "<td> <a class='btn btn-sm btn-danger text-white RemoveProduct' data-id='" + obj.PFDOID + "'> remove </a></td>" +
                    "</tr>";
            $("#appendProductTable tbody").append(tr);
        } else {

        }
    }


    function appendme(obj) {

        var name = $(obj).attr("data-name");
        var code = $(obj).attr("data-code");
        var id = $(obj).attr("data-id");
        if ($('.ProdOID[value=' + id + ']').length == 0) {
            var count = $("#appendProductTable tbody tr").length;
            var tr = " <tr>" +
                    "<td> " + (count + 1) + " </td>" +
                    "<td>" + code + "<input type='hidden' name='ProdOID[]' class='ProdOID' value='" + id + "'/></td>" +
                    "<td>" + name + "</td>" +
                    "<td><input type='text' data-tap='" + (tap += 1) + "' onfocus='$(this).select();' name='Weight[" + id + "]' class='Weight'/></td>" +
                    "<td><input type='text' data-tap='" + (tap += 1) + "' onfocus='$(this).select();'  name='MixedWeight[" + id + "]' class='MixedWeight' /></td>" +
                    "<td> <a class='btn btn-sm btn-danger text-white RemoveProduct'> remove </a></td>" +
                    "</tr>";
            $("#appendProductTable tbody").append(tr);
        } else {

        }
    }


    function calcWieght() {

        let sum = 0;
        $(".Weight").each(function () {
            sum += parseInt($(this).val()) ? parseInt($(this).val()) : 0;
        });

        $("#PreTotalWeight").val(sum);
    }
    function calcWieghtMix() {
        let sum = 0;
        $(".MixedWeight").each(function () {
            sum += parseInt($(this).val()) ? parseInt($(this).val()) : 0;
        });
        $("#PreMixedTotalWeight").val(sum);
    }
    function clearappendProductTable() {
        $("#appendProductTable tbody").find('tr').remove();
        tap = 1;
    }
</script>


