<?php
return [
    'roles-set' => [
        \App\Helpers\IUserRole::ADMIN               => 'Admin',
        \App\Helpers\IUserRole::USER                => 'User',
    ],
    'permissions-set' => [
        \App\Contracts\IUserPermission::ADMIN_CREATE       => 'Admin Create',
        \App\Contracts\IUserPermission::ADMIN_EDIT         => 'Admin Edit',
        \App\Contracts\IUserPermission::ADMIN_DELETE       => 'Admin Delete',
        \App\Contracts\IUserPermission::ADMIN_LIST         => 'Admin List',
        \App\Contracts\IUserPermission::ADMIN_VIEW         => 'Admin View',

        \App\Contracts\IUserPermission::CUSTOMER_CREATE       => 'Customer Create',
        \App\Contracts\IUserPermission::CUSTOMER_EDIT         => 'Customer Edit',
        \App\Contracts\IUserPermission::CUSTOMER_DELETE       => 'Customer Delete',
        \App\Contracts\IUserPermission::CUSTOMER_LIST         => 'Customer List',
        \App\Contracts\IUserPermission::CUSTOMER_VIEW         => 'Customer View',

        \App\Contracts\IUserPermission::CLIENT_CREATE       => 'Client Create',
        \App\Contracts\IUserPermission::CLIENT_EDIT         => 'Client Edit',
        \App\Contracts\IUserPermission::CLIENT_DELETE       => 'Client Delete',
        \App\Contracts\IUserPermission::CLIENT_LIST         => 'Client List',
        \App\Contracts\IUserPermission::CLIENT_SHOW         => 'Client View',

    ],
    'module-permissions-set' => [
        \App\Helpers\IUserRole::ADMIN => [
            \App\Contracts\IPermissionModule::ADMINS => [
                \App\Contracts\IUserPermission::ADMIN_CREATE,
                \App\Contracts\IUserPermission::ADMIN_DELETE,
                \App\Contracts\IUserPermission::ADMIN_EDIT,
                \App\Contracts\IUserPermission::ADMIN_LIST,
                \App\Contracts\IUserPermission::ADMIN_VIEW,
            ],
            \App\Contracts\IPermissionModule::CUSTOMERS => [
                \App\Contracts\IUserPermission::CUSTOMER_CREATE,
                \App\Contracts\IUserPermission::CUSTOMER_EDIT,
                \App\Contracts\IUserPermission::CUSTOMER_DELETE,
                \App\Contracts\IUserPermission::CUSTOMER_LIST,
                \App\Contracts\IUserPermission::CUSTOMER_VIEW,
            ],
            \App\Contracts\IPermissionModule::CLIENTS => [
                \App\Contracts\IUserPermission::CLIENT_CREATE,
                \App\Contracts\IUserPermission::CLIENT_EDIT,
                \App\Contracts\IUserPermission::CLIENT_DELETE,
                \App\Contracts\IUserPermission::CLIENT_LIST,
                \App\Contracts\IUserPermission::CLIENT_SHOW,
            ],
        ],
            \App\Helpers\IUserRole::USER => [
            \App\Contracts\IPermissionModule::CLIENTS => [
                \App\Contracts\IUserPermission::CLIENT_CREATE,
                \App\Contracts\IUserPermission::CLIENT_EDIT,
                \App\Contracts\IUserPermission::CLIENT_DELETE,
                \App\Contracts\IUserPermission::CLIENT_LIST,
                \App\Contracts\IUserPermission::CLIENT_SHOW,
            ],
        ],
    ]


    ];
