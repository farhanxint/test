<?php

namespace App\Contracts;

interface IUserPermission
{
    // Admin Module Privileges
    const ADMIN_CREATE = 'create_admin';
    const ADMIN_EDIT   = 'edit_admin';
    const ADMIN_DELETE = 'delete_admin';
    const ADMIN_LIST   = 'list_admin';
    const ADMIN_VIEW   = 'show_admin';


    // Admin can Customer Privileges
    const CUSTOMER_CREATE     =   'customer_create';
    const CUSTOMER_EDIT       =   'customer_edit';
    const CUSTOMER_DELETE     =   'customer_delete';
    const CUSTOMER_LIST       =   'customer_list';
    const CUSTOMER_VIEW       =   'customer_show';

    // Customer can Client Privileges
    const CLIENT_CREATE    =   'client_create';
    const CLIENT_EDIT      =   'client_edit';
    const CLIENT_DELETE    =   'client_delete';
    const CLIENT_LIST      =   'client_list';
    const CLIENT_SHOW      =   'client_show';

}
