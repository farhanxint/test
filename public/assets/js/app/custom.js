
$(() => {
    $(".i-Eye, .i-Eye1").attr('title', 'View');
    $(".i-Pen-2").attr('title', 'Edit');
    $(".i-Close-Window").attr('title', 'Remove');

    $('#companies_div').hide();
    $('#user_data').hide();
    $('#associations_div').hide();
    $('#account_number_div').hide();

    let $body = $('body');
    // Approval Confirmation
    $body.on('click', '.approval', async function (e) {
        e.preventDefault(); let href = $(this).attr('href');
        await confirm('You want to approve?').then(async res => {
            preLoader('show');
            await ajaxRequest(href, 'post', null)
                .then(res => {
                    console.log(res.url);
                    if (res.url !== undefined)
                    {
                        if(res.url !== null)
                            setTimeout(() => { window.location.href = res.url }, 1000);

                        return;
                    }

                    setTimeout(() => { window.location.reload() }, 1000);
                });

        });

        return false;
    });

    // Buy offer
    $body.on('click', '.buy-offer', async function (e) {
        e.preventDefault(); let href = $(this).attr('href');
        await confirm('Do you want to buy?').then(async res => {
            preLoader('show');
            await ajaxRequest(href, 'get', null)
                .then(res => {
                    if (res.url !== undefined)
                    {
                        if(res.url !== null)
                            setTimeout(() => { window.location.href = res.url }, 1000);

                        return;
                    }

                    setTimeout(() => { window.location.reload() }, 1000);
                });

        });

        return false;
    });

    // Rejection Confirmation
    let $rejections = [];
    $body.on('click', '.rejection', async function (e) {
        e.preventDefault();
        let title = $(this).text().replace('Reject ', ''),
            href = $(this).attr('href'),
            $modal = $('.generic-modal'),
            $form = $modal.find('form');

        await ajaxRequest(`/${window.Laravel.role}/${$(this).attr('module-type')}/fetch/reasons`, 'POST', null).then(res => {

            $form.attr('action', href);
            $modal.find('.modal-title').text('Reason of Rejection (' + title + ')');

            let $modalBody = `<div class="col-md-12 form-group mb-3">`;
            if (res.data.length > 0) {
                $rejections = res.data;
                $modalBody += "<label for='reasons'>Select Rejection Reason</label> <span class='required-field'>*</span>";
                $modalBody += "<select id='select-reasons' name='title' class='form-control'><option value=''>Select Reason</option>";

                res.data.forEach((v, i) => {
                    $modalBody += `<option value='${i}'>${v.title}</option>`;
                });

                $modalBody += "<option value='custom'>Custom Reason</option>"
                $modalBody += "</select></div>";

            }

            $modalBody += `<div class="col-md-12 form-group mb-3 reason-description">`;
            $modalBody += "<label for='reasons'>Rejection Description</label> <span class='required-field'>*</span>";
            $modalBody += "<textarea cols='50' rows='10' style='resize: none' name='comment' class='form-control'></textarea>";
            $modalBody += "</div>";
            $modal.find('.modal-body > .row').html($modalBody);

            $body.find('.reason-description').hide();

            if (res.data.length < 1 || res.data.length === undefined)
                $body.find('.reason-description').show();

            $modal.modal('show');
        }).catch(err => {
            // Do Something
        });
    });

    $body.on('change', '#select-reasons', function () {
        let descArea = $body.find('.reason-description');
        if ($(this).val() !== '') {
            let textarea = $body.find('textarea[name=comment]'), desc = $rejections[$(this).val()] ?? '';
            textarea.val(desc.description);
            descArea.show();
            return;
        }

        descArea.hide();
    })

    // in-active  Confirmation
    let $removals = [];
    $body.on('click', '.in-active-tender, .in-active-advertisement, .in-active, .remove-item', async function (e) {
        e.preventDefault();
        let title = $(this).text().replace('Remove ', ''),
            href = $(this).attr('href'),
            $modal = $('.generic-modal-removal'),
            $form = $modal.find('form');

        await ajaxRequest(`/${window.Laravel.role}/${$(this).attr('module-type')}/fetch/removal/reasons`, 'POST', null).then(res => {

            $form.attr('action', href);
            $modal.find('.modal-title').text('Reason of Removal');
            let $modalBody = `<div class="col-md-12 form-group mb-3">`;
            if (res.data.length > 0) {
                $removals = res.data;
                $modalBody += "<label for='reasons'>Select Removal Reason</label> <span class='required-field'>*</span>";
                $modalBody += "<select id='select-removal-reasons' name='title' class='form-control'><option value=''>Select Reason</option>";

                res.data.forEach((v, i) => {
                    $modalBody += `<option value='${i}'>${v.title}</option>`;
                });

                $modalBody += "<option value='custom'>Custom Reason</option>"
                $modalBody += "</select></div>";
            }

            $modalBody += `<div class="col-md-12 form-group mb-3 removal-reason-description">`;
            $modalBody += "<label for='reasons'>Removal Description</label> <span class='required-field'>*</span>";
            $modalBody += "<textarea cols='50' rows='10' style='resize: none' name='comment' class='form-control'></textarea>";
            $modalBody += "</div>";
            $modal.find('.modal-body > .row').html($modalBody);

            $body.find('.removal-reason-description').hide();

            if (res.data.length < 1 || res.data.length === undefined)
                $body.find('.removal-reason-description').show();

            $modal.modal('show');
        }).catch(err => {
            // Do Something
        });
    });

    $body.on('change', '#select-removal-reasons', function () {
        let descArea = $body.find('.removal-reason-description');
        if ($(this).val() !== '') {
            let textarea = $body.find('textarea[name=comment]'), desc = $removals[$(this).val()] ?? '';
            textarea.val(desc.description);
            descArea.show();
            return;
        }

        descArea.hide();
    })

    // Rejection Confirmation
    $body.on('click', '.republish', async function (e) {
        e.preventDefault();
        let title = $(this).text().replace('Republish ', ''),
            href = $(this).attr('href'),
            $modal = $('.generic-modal-republish'),
            $form = $modal.find('form');
            $form.attr('action', href);

            $modal.modal('show');
    });

    // Contact Seller
    $body.on('click', '.contact-seller', async function (e) {
        e.preventDefault();
        let title = $(this).text().replace('Contact Seller ', ''),
            href = $(this).attr('href'),
            $modal = $('.generic-modal-contact-seller'),
            $form = $modal.find('form');
            $modal.find('.modal-title').text('Contact Seller'),
        $form.attr('action', href);

        $modal.modal('show');
    });

    // Upload invoice Receipt
    $body.on('click', '.invoice-upload-receipt', async function (e) {
        e.preventDefault();
        let title = $(this).text().replace('Upload Receipt ', ''),
            href = $(this).attr('href'),
            $modal = $('.generic-modal-invoice-upload-receipt'),
            $form = $modal.find('form');
        $modal.find('.modal-title').text(title),
            $form.attr('action', href);
            $form.find('input[name=amount_paid]').val($(this).data("id"));

        $modal.modal('show');
    });

    // Reason Modal
    $body.on('click', '.reason_modal', function (e) {
        e.preventDefault();
        let $modal = $body.find('.reason-modal');
        $modal.find('form').attr('action', $(this).attr('href'));
        $modal.find('.modal-title').text($body.find('.card-title:first').text().replace('Setting', 'Rejection Reasons'));
        $modal.modal('show');
    })

    // Removal Reason Modal
    $body.on('click', '.removal_reason_modal', function (e) {
        e.preventDefault();
        let $modal = $body.find('.removal-reason-modal');
        $modal.find('form').attr('action', $(this).attr('href'));
        $modal.find('.modal-title').text($body.find('.card-title:first').text().replace('Setting', 'Removal Reasons'));
        $modal.modal('show');
    })

    // Extension Days
    $body.on('click', '.extension', async function (e) {

        e.preventDefault();
        let perDayCredits = $(this).attr('data-credit');
        let inputField = '<div class="credit_detail"><label for="credits_required">Per Day Credits Required</label><span type="text" id="credits_required" class="form-control">'+perDayCredits+'</span></div>';
            let href = $(this).attr('href'),
            $modal = $('.extension-modal'),
            $form = $modal.find('form');
        $form.attr('action', href);
        $modal.find('.modal-title').text('Extension Days');
        $modal.find('.credit_detail').remove()
        if(perDayCredits !== undefined)
            $modal.find('.form-div').append(inputField);
        $modal.modal('show');
    });

    // Remove Any media
    $('.remove-img').click(function(){
        let id = $(this).attr("data-value");
        if(id === '2')
        {
            $('input[name="old_media2"]').remove();
            $('#img2').remove();
        }else if(id === '3'){
            $('input[name="old_media3"]').remove();
            $('#img3').remove();
        }
    });

    $('#posting_effective_date').change(function (){
    let date = new Date($(this).val()),
        days = parseInt($("#validity").val(), 10);
        date.setDate(date.getDate() + days);
        $("#posting_expiry_date").val(date.toInputFormat());

    });

    Date.prototype.toInputFormat = function() {
        let yyyy = this.getFullYear().toString();
        let mm = (this.getMonth()+1).toString(); // getMonth() is zero-based
        let dd  = this.getDate().toString();
        return (mm[1]?mm:"0"+mm[0]) + "/" + (dd[1]?dd:"0"+dd[0]) + "/" + yyyy;
    };

    // Handling creating for, for all the modules
        $('#creating_for').on('change',async function (e){

            $('#account_number_div').hide();
            $('#associations_div').hide();
            $('#companies_div').hide();
            $('#user_data').hide();
            $('#registration_no').val('');


            if($(this).val() === '') // None
            {
                $('#account_number_div').hide();
                $('#associations_div').hide();
                $('#companies_div').hide();
            }
            else if($(this).val() == 0) // Association
            {
                $('#account_number_div').show();
                $('#associations_div').show();
            }else if($(this).val() == 1) // Company
            {
                $('#account_number_div').show();
                $('#companies_div').show();
            }else if($(this).val() == 2) // Other
            {
                $('#user_data').show();
            }else{
                $('#account_number_div').show();
                await ajaxRequest(
                    'getSelectedUser/'+$(this).val(),
                    'get',
                ).then(
                    res => {
                        if(res !== '-')
                            $('#registration_no').val(res);
                    }
                )
            }
        });

        $('#company_id').on('change',async function (e){
            await ajaxRequest(
                'getSelectedUser/'+$(this).val(),
                'get',
            ).then(
                res => {
                    if(res !== '-'){
                        $('#registration_no').val(res);
                    }
                }
            )
        });

        $('#association_id').on('change',async function (e){
            await ajaxRequest(
                'getSelectedAssoReg/'+$(this).val(),
                'get',
            ).then(
                res => {
                    if(res !== '-'){
                        $('#registration_no').val(res);
                    }
                }
            )
        });

        $(function () {
            $('.datetimepicker').datetimepicker();
        });
});
