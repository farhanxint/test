$('#imgs').on('click', '.deleteImageStore', function() {
    var values = $("input[name='media[]']")
        .map(function(){return $(this).val();}).get();
    if(this.id == 'cross0'){
        values[0] = '';
    }
    $( this.closest("div") ).remove();
});

$('#event_imgs').on('click', '.deleteImageStore', function() {
    var values = $("input[name='receipt_media[]']")
        .map(function(){return $(this).val();}).get();
    if(this.id == 'cross_receipt0'){
        values[0] = '';
    }
    $( this.closest("div") ).remove();
});

$( document ).ready(function (){

    $('#user_data').hide();

    let $assocSelector  = $('#association_div');
    $assocSelector.hide();

    $('#event_nature').on('change', function (e){
        if($(this).val() == "0")    // Public
        {
            $assocSelector.hide();
        }
        else if($(this).val() == "1") // Private
        {
            $assocSelector.show();
        }
    });

    $("#event_creator").select2();
});


function calendarCell(a, e, f) {
    console.log(a, e, f);
}
