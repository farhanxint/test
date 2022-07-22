"use strict"

$(() => {
    let $body = $('body');
    $body.on('click', '.add-cart', async function (e) {
        e.preventDefault();

        let href = $(this).parent().attr('href');
        await confirm("Your existing cart with some other association products will be removed.").then(async res => {
            window.location.href = href;
        });
    });

    $body.on('click', '.remove-cart', async function (e) {
        e.preventDefault();

        let href = $(this).parent().attr('href');
        await confirm("You want to remove this item from cart?").then(res => {
            window.location.href = href;
        });
    });

    let eQty = 0;

    $body.on('click', '.qty-handler', async function () {

        let $selector = null;
        if ($(this).hasClass('increase')) {
            $selector = $(this).prev();
            eQty = parseInt($selector.val());
            eQty += 1;
        } else {
            $selector = $(this).next();
            eQty = parseInt($selector.val());
            eQty -= 1; if (eQty < 1) eQty = 1;
        }

        $selector.val(eQty);

        let $data = {
            "qty": eQty,
            "companyId": $(this).attr('data-cId'),
            "productId": $(this).attr('data-pId')
        }

        if (eQty > 1) {
            await ajaxRequest(`/manage-item-quantity`, 'POST', $data, false).then(res => {
                // Do Something
            });
        }
    });

});
