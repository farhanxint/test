let BBOX = 3, INITIATOR = 1;
$( document ).ready(function (){

// Append Contact Details
    $('.add').on('click', function () {
        INITIATOR = parseInt($(this).parents('div.contact-person-details').find('div.contact-details').length);
        let selector = $(this).parents('div.contact-person-details').find('div.contact-details:last');
        let name = selector.find('.col-md-4 > div > input').attr('name');
        name = name.match(/\d+/g); ++ name;

        if (INITIATOR >= BBOX) {
            alert('You approach max fields.');
            return;
        }

        ++ INITIATOR;
        let clone = selector.clone();
        selector.after(clone);
        let newEntry = $(this).parents('div.contact-person-details').find('div.contact-details:last');

        newEntry.find('label:first').attr('for', `contact_person[${name}][name]`);
        newEntry.find('input:first').attr({'value': null, 'name': `contact_person[${name}][name]`, 'id': `contact_person[${name}][name]`}).val('');

        newEntry.find('label:eq(1)').attr('for', `contact_person[${name}][email]`);
        newEntry.find('input:eq(1)').attr({'value': null, 'name': `contact_person[${name}][email]`, 'id': `contact_person[${name}][email]`}).val('');

        newEntry.find('label:last').attr('for', `contact_person[${name}][contact]`);
        newEntry.find('input:last').attr({'value': null, 'name': `contact_person[${name}][contact]`, 'id': `contact_person[${name}][contact]`}).val('');
    });

// Remove Resource Price Row
    $('body').on('click', '.remove', async function () {
        if(await confirm('You want to remove it?')) {

            if (INITIATOR <= 1)
                INITIATOR = 1;
            else
                -- INITIATOR;

            $(this).parents('div.contact-details').remove();
        }
    });

    $('.deleteImage').click(async function(){
        let id = $(this).attr("id");
        await ajaxRequest(`/admin/tenders/destroyImage/${id}`, 'get', null, false).then($( this.closest("div") ).remove());
    });

    $('#imgs').on('click', '.deleteImageStore', function() {
        let values = $("input[name='media[]']").map(function(){
            return $(this).val();
        }).get();

        if(this.id === 'cross0')
            values[0] = '';

        $( this.closest("div") ).remove();
    });

});
