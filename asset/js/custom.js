$(document).ready(function () {
   // jQuery.noConflict();
    $("#all-check").change(function () {
        if ($(this).is(":checked")) {
            $(".item-check").prop("checked", true);
        } else {
            $(".item-check").prop("checked", false);
        }
    });
    //multi-texbox
    var show = false;
    $(".show-select").click(function () {
        if (show === true) {
            $(".side-nav").hide('slide', {direction: 'up'}, 500);
            show = false;
        } else {
            $(".side-nav").show('slide', {direction: 'up'}, 500);
            show = true;
        }
        return false;
    });

    // drag and drop

    $("#drag_drop").sortable({
        connectWith: '.item-child',
        placeholder: 'ui-placeholder'
    });
    
    //date picker
    

});

$(function (){
    $("input[type=date]").datepicker();
});


