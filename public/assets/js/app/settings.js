let BBOX = 100, INITIATOR = 1;
$( document ).ready(function (){

    // Append Reason of Rejection
    $('.add').on('click', function () {
        INITIATOR = parseInt($(this).parents('div.reason-of-rejection').find('div.rejections').length);
        let selector = $(this).parents('div.reason-of-rejection').find('div.rejections:last');
        let name = selector.find('.col-md-4 > div > input').attr('name');
        name = name.match(/\d+/g); ++ name;

        if (INITIATOR >= BBOX) {
            alert('You approach max fields.');
            return;
        }

        ++ INITIATOR;
        let clone = selector.clone();
        selector.after(clone);
        let newEntry = $(this).parents('div.reason-of-rejection').find('div.rejections:last');

        newEntry.find('label:first').attr('for', `rejection_reason[${name}][title]`);
        newEntry.find('input:first').attr({'value': null, 'title': `rejection_reason[${name}][title]`, 'id': `rejection_reason[${name}][title]`});

        newEntry.find('label:eq(1)').attr('for', `rejection_reason[${name}][description]`);
        newEntry.find('input:eq(1)').attr({'value': null, 'name': `rejection_reason[${name}][description]`, 'id': `rejection_reason[${name}][description]`}).val();
    });

    // Remove Row
    $('body').on('click', '.remove', async function () {
        if(await confirm('You want to remove it?')) {

            if (INITIATOR <= 1)
                INITIATOR = 1;
            else
                -- INITIATOR;

            $(this).parents('div.rejections').remove();
        }
    });
});
