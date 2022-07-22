"use Strict";

$(() => {

    let $body = $('body');

    // Approve Membership
    $('.ar').on('click', async function (e) {
        e.preventDefault();
        let href = $(this).attr('href');
        await confirm("You want to approve this membership?").then(async res => {
            await ajaxRequest(href, 'POST').then(res => {
                setTimeout(() => { window.location.reload() }, 1000);
            });
        });
    });

    // Approve Unassign Primary Association Request
    $('.arr').on('click', async function (e) {
        e.preventDefault();
        let href = $(this).attr('href');
        await confirm("You want to verify unassign primary association request?").then(res => {
            preLoader('show');
            window.location.href = href;
        })
    });

    // Show Available Associations List
    $body.on('click', '.assoc-modal', async function (e) {
        e.preventDefault();
        await ajaxRequest(`/sme/my-memberships/fetch-associations`, 'POST').then(res => {
            let $selector = $('.join-membership-modal'), $form = $selector.find('form');
            $form.find('input[name=assoc_type]').val($(this).attr('data-id'));
            $('.membership-group').html(res.data);
            $selector.modal('show');
        });
    });

    // Unassign Primary Association Request
    $body.on('click', '.unassign', async function (e) {
        e.preventDefault();
        let text = $(this).attr('title'), href = $(this).attr('href');
        await confirm(`You want to ${text}?`).then(async res => {
            await ajaxRequest(href, 'POST').then(res => {
                setTimeout(() => { window.location.reload() }, 1000);
            })
        })
    })
});
