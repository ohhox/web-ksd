String.prototype.toDate = function (format)
{
    var normalized = this.replace(/[^a-zA-Z0-9]/g, '-');
    var normalizedFormat = format.toLowerCase().replace(/[^a-zA-Z0-9]/g, '-');
    var formatItems = normalizedFormat.split('-');
    var dateItems = normalized.split('-');

    var monthIndex = formatItems.indexOf("mm");
    var dayIndex = formatItems.indexOf("dd");
    var yearIndex = formatItems.indexOf("yyyy");
    var hourIndex = formatItems.indexOf("hh");
    var minutesIndex = formatItems.indexOf("ii");
    var secondsIndex = formatItems.indexOf("ss");

    var today = new Date();

    var year = yearIndex > -1 ? dateItems[yearIndex] : today.getFullYear();
    var month = monthIndex > -1 ? dateItems[monthIndex] - 1 : today.getMonth() - 1;
    var day = dayIndex > -1 ? dateItems[dayIndex] : today.getDate();

    var hour = hourIndex > -1 ? dateItems[hourIndex] : today.getHours();
    var minute = minutesIndex > -1 ? dateItems[minutesIndex] : today.getMinutes();
    var second = secondsIndex > -1 ? dateItems[secondsIndex] : today.getSeconds();

    return new Date(year, month, day, hour, minute, second);
};

$('#searchProduct').on('submit', function (e) {
    e.preventDefault();
    $form = $(this).serialize();
    $.ajax({
        method: "POST",
        url: __URL + "api/productsearch",
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
    $("#productname").change();

    $('#default').modal('hide');
}
// jQuery.extend(jQuery.expr[':'], {
//     focusable: function (el, index, selector) {
//         return $(el).is('a, button, :input, [tabindex]');
//     }
// });



$('#addAndSearchAPI').on('submit', function (e) {
    e.preventDefault();
    $form = $(this).serialize();
    $.ajax({
        method: "POST",
        url: __URL + "api/productsearch",
        data: $form,
        beforeSend: function (xhr) {
            $("#addAndSearchAPIAppend tbody").html('');
            $("#addAndSearchAPIAppend tbody").append("<tr><td colspan='3' class='text-center'> Loadding.. </td> </tr>")
        }
    }).done((data) => {
        if (data) {
            var res = $.parseJSON(data);
            if (res.length > 0) {
                $("#addAndSearchAPIAppend tbody").html('');
                $.each(res, function (key, data) {
                    var btn = "<button class='btn btn-success btn-sm' onclick='appendme(this)' data-id='" + data.ProdOID + "' data-code='" + data.ProdCode + "' data-name='" + data.ProdName1 + "'> \n\
                            <i class='ft-check-square'></i> Select\n\
                          </button>";
                    var tr = "<tr> <td>" + data.ProdCode + "</td><td>" + data.ProdName1 + "</td><td>" + btn + "</td></tr>";
                    $("#addAndSearchAPIAppend tbody").append(tr)
                });
            } else {
                $("#addAndSearchAPIAppend tbody").html('');
                $("#addAndSearchAPIAppend tbody").append("<tr><td colspan='3' class='text-center'> Notfound Product.. </td> </tr>")
            }
        } else {
            $("#addAndSearchAPIAppend tbody").html('');
            $("#addAndSearchAPIAppend tbody").append("<tr><td colspan='3' class='text-center'> Notfound Product.. </td> </tr>")
        }


    });
});

//
//$(function () {
//    $("#appendProductTable tbody").on('change', '.Weight', function () {
//        let sum = 0;
//        $(".Weight").each(function () {
//            if ($(this).val() != '') {
//                sum += parseFloat($(this).val());
//            }
//        });
//
//        $("#PreTotalWeight").val(sum);
//    });
//
//    $("#appendProductTable tbody").on('change', '.MixedWeight', function () {
//        let sum = 0;
//        $(".MixedWeight").each(function () {
//            if ($(this).val() != '') {
//                sum += parseFloat($(this).val());
//            }
//        });
//
//        $("#PreMixedTotalWeight").val(sum);
//    });
//});

function postData(url, data) {
    // Default options are marked with *
    return fetch(url, {
        body: JSON.stringify(data), // must match 'Content-Type' header
        cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
        credentials: 'same-origin', // include, same-origin, *omit
        headers: {
            'user-agent': 'Mozilla/4.0 MDN Example',
            'content-type': 'application/json'
        },
        method: 'POST', // *GET, POST, PUT, DELETE, etc.
        mode: 'cors', // no-cors, cors, *same-origin
        redirect: 'follow', // manual, *follow, error
        referrer: 'no-referrer', // *client, no-referrer
    })
            .then(response => response.json()) // parses response to JSON
}