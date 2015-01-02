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
    $("#btn-upload").change(function () {
        var form = document.querySelector('#data-form');
        var formData = new FormData(form);
        $.ajax({
            type: 'POST',
            data: formData,
            url: $(this).attr("url"),
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function (data) {
                var text =
                        '<li class="item-image">' +
                        '<a class="th" href="">' +
                        '<img src="' + data.src + '"/>' +
                        '</a>' +
                        '<a href="#" class="del-image fi-x large"></a>' +
                        '<div class="product-image"><input name="product-image[]" type="hidden" value="' + data.src + '"/></div>' +
                        '</li>';

                $(".list-image").append(text);

                
                $(".del-image").click(function (e) {
                    e.preventDefault();
                    var parent = $(this).closest(".item-image");
                    var itemurl = parent.find(".product-image");
                    var path = data.path;
                    $.ajax({
                        type: 'POST',
                        data: {imglink: path},
                        url: $(".del-image").attr("href"),
                        success: function (res) {
                            if (res === '1') {
                                parent.fadeOut(300);
                                itemurl.html("");
                            } else {
                                alert('Có lỗi xảy ra!');
                            }
                        }
                    });
                });
            }
        });
    });

    //delete in update page not response ajax
    $(".del-image").click(function (e) {
        e.preventDefault();
        var parent = $(this).closest(".item-image");
        var itemurl = parent.find(".product-image");
        var path = parent.find("img").attr("src");
        var pathspl = path.split("/");
        path = './asset/images/upload/'+pathspl[pathspl.length - 1];
        var pid = $(this).attr("pid");
        if(pid == 'undefined'){
            pid = 0;
        }
        var relaid = $(this).attr("relaid");
        if(relaid == 'undefined'){
            relaid = 0;
        }
        $.ajax({
            type: 'POST',
            data: {imglink: path, pid: pid, relaid: relaid},
            url: $(".del-image").attr("href"),
            success: function (res) {
                if (res === '1') {
                    parent.fadeOut(300);
                    itemurl.html("");
                } else {
                    alert('Có lỗi xảy ra!');
                }
            }
        });
    });

});
