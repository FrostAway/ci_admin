$(document).ready(function () {
    $("#select-form-type").change(function () {
        $.post($(this).attr("url"), {form_type: $(this).val()}, function (data) {
            if (data !== 'none') {
                $("#form-type-append").html(data);
            } else {
                $("#form-type-append").html("");
            }
        });
    });

    //add new btn
    $("#btn-addnew").click(function () {
//        var name = $("#name").val();
//        var type = $("#type").val();
//        if (name !== '' && type !== '') {
//            var nrow =
//                    '<tr>' + '<td></td>' +
//                    '<td>' + name + '</td>' +
//                    '<td>' + type + '</td>' +
//                    '<td><a href="#" class="fi-page-edit"></a> <a class="fi-page-delete"></a> </td>' +
//                    '</tr>';
//            $("#data-table").append(nrow);
//            $("#name").val('');
//            $("#type").val('');
//        }
//        return false;
    });

    //edit item
    //edit item attribute
    $(".item-edit").click(function (e) {
        e.preventDefault();
        var attrid = $(this).attr("itemid");
        $.ajax({
            type: 'POST',
            url: $(this).attr("href"),
            data: {
                attrid: attrid
            },
            dataType: 'json',
            success: function (data) {
                $(".data-form").prepend('<input type="hidden" name="attr[id]" value="' + data.id + '" />');
                $("#name").val(data.name);
                $("#type").val(data.type);
                $("#default").val(data.default);
                $("#btn-addnew").val("Lưu lại");
            }
        });
    });

// delete item
    $(".item-delete").click(function (e) {
        e.preventDefault();
        var parent = $(this).closest("tr");
        var cf = confirm('Bạn chắc chắn?');
        if (cf) {
            $.post($(this).attr('href'), {itemid: $(this).attr('itemid')}, function (data) {
                //alert(data);
                parent.fadeOut(300);
            });
        }
    });

    //upload and delete image
//    $("#btn-upload").change(function () {
//        var form = document.querySelector('#data-form');
//        var formData = new FormData(form);
//        $.ajax({
//            type: 'POST',
//            data: formData,
//            url: $(this).attr("url"),
//            processData: false,
//            contentType: false,
//            dataType: 'json',
//            success: function (data) {
//                var text =
//                        '<li class="item-image">' +
//                        '<a class="th" href="">' +
//                        '<img src="' + data.src + '"/>' +
//                        '</a>' +
//                        '<a href="#" class="del-image fi-x large"></a>' +
//                        '<div class="product-image"><input name="product-image[]" type="hidden" value="' + data.src + '"/></div>' +
//                        '</li>';
//
//                $(".list-image").append(text);
//
//
//
//            }
//        });
//    });

    //delete in update page not response ajax
    $(".del-image").click(function (e) {
        e.preventDefault();

        var parent = $(this).closest(".item-image");
        var itemurl = parent.find(".product-image");
        var path = parent.find("img").attr("src");

        parent.hide(200);
        itemurl.html("");
    });

    // kcfiner select image

    $("#btn-upload").click(function () {
        window.KCFinder = {
            callBack: function (url) {
                window.KCFinder = null;
                var text =
                        '<li class="item-image">' +
                        '<a class="th" href="">' +
                        '<img src="' + url + '"/>' +
                        '</a>' +
                        '<a href="#" class="del-image fi-x large"></a>' +
                        '<div class="product-image"><input name="product-image[]" type="hidden" value="' + url + '"/></div>' +
                        '</li>';

                $(".list-image").append(text);
                $(".del-image").click(function (e) {
                    e.preventDefault();
                    var parent = $(this).closest(".item-image");
                    var itemurl = parent.find(".product-image");
                    parent.hide(200);
                    itemurl.html("");
                });
            }
        };
        window.open('http://localhost/ci_admin/asset/plugin/kcfinder/browse.php?type=images&dir=images/public',
                'kcfinder_image', 'status=0, toolbar=0, location=0, menubar=0, ' +
                'directories=0, resizable=1, scrollbars=0, width=800, height=600'
                );
        return false;
    });

    // chon kieu xem san pham
    $("#form-view").submit(function () {
        var type_id = $("#view-type-id").val();
        
        if (type_id === '0') {
           return false;
        }else{
            return true;
        }
    });

});
