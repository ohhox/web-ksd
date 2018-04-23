
$('#searchProduct').on('submit', function (e) {
    e.preventDefault();
    $form = $(this).serialize();
    $.ajax({
        method: "POST",
        url: __URL + "order/productsearch",
        data: $form,
        beforeSend: function (xhr) {
            $("#SearchProductOrderForm tbody").html('');
            $("#SearchProductOrderForm tbody").append("<tr><td colspan='3' class='text-center'> Loadding.. </td> </tr>")
        }
    }).done((data) => {
        if (data) {
            var res = $.parseJSON(data);
            $("#SearchProductOrderForm tbody").html('');
            if (res.length > 0) {
                $.each(res, function (key, data) {
                    var btn = "<button class='btn btn-success btn-sm' onclick='selectMe(this)' data-id='" + data.ProdOID + "' data-code='" + data.ProdCode + "' data-name='" + data.ProdName1 + "'> \n\
                            <i class='ft-check-square'></i> Select\n\
                          </button>";
                    var tr = "<tr> <td>" + data.ProdCode + "</td><td>" + data.ProdName1 + "</td><td>" + btn + "</td></tr>";
                    $("#SearchProductOrderForm tbody").append(tr)
                });
            } else {
                $("#SearchProductOrderForm tbody").html('');
                $("#SearchProductOrderForm tbody").append("<tr><td colspan='3' class='text-center'> Product not found. </td> </tr>")
            }

        } else {
            $("#SearchProductOrderForm tbody").html('');
            $("#SearchProductOrderForm tbody").append("<tr><td colspan='3' class='text-center'> Notfound Product.. </td> </tr>")
        }
    });
});

function selectMe(obj) {
    $("#productname").val($(obj).attr("data-name"));
    $("#ProductCode").val($(obj).attr("data-code"));
    $("#ProductOid").val($(obj).attr("data-id"));
}