<?php

namespace Database\Seeders;

use App\Helpers\IUserStatus;
use App\Models\User;
use App\Helpers\IUserRole;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * @package
     * @author Shaarif <shaarifsabah5299@gmail.com>
     */

    /**
     * @var Faker
     */
    private $generator;

    public function __construct(Faker $generator)
    {
        $this->generator    =   $generator;
    }

    public function run()
    {
        DB::table('users')->delete();
        $adminUser1 = $this->_adminUser1();
        $admin1             = User::create( $adminUser1 );

        $admin1->assignRole( IUserRole::ADMIN );


        $adminUser2 = $this->_customerUser2();
        $admin2             = User::create( $adminUser2 );

        $admin2->assignRole( IUserRole::USER );
    }

    /**
     * Production Users
     *
     * @return array[]
     */
    private function _adminUser1(): array
    {
        return
            [
                'first_name'          => 'super',
                'email'               => 'admin@admin.com',
                'last_name'           => 'admin',
                'user_status'         => IUserStatus::ADMIN,
                'password'            => bcrypt('rootadmin'),
                'created_at'          => now(),
                'phone_no'            => $this->generator->phoneNumber(),
                'language'            => $this->generator->languageCode(),
                'city'                => $this->generator->city(),
                'country'             => $this->generator->country(),
                'time_zone'           => $this->generator->timezone(),
                'updated_at'          => now(),
                'currency'            => $this->generator->currencyCode(),
                'email_verified_at'   => now()
            ];
    }

    /**
     * @return array
     * @author Shaarif <shaarifsabah5299@gmail.com>
     */
    private function _customerUser2(): array
    {
        return [
            'first_name'          => 'customer',
            'email'               => 'user@customer.com',
            'last_name'           => 'user',
            'user_status'         => IUserStatus::USER,
            'password'            => bcrypt('password'), //password
            'created_at'          => now(),
            'phone_no'            => $this->generator->phoneNumber(),
            'language'            => $this->generator->languageCode(),
            'city'                => $this->generator->city(),
            'country'             => $this->generator->country(),
            'time_zone'           => $this->generator->timezone(),
            'currency'            => $this->generator->currencyCode(),
            'updated_at'          => now(),
            'email_verified_at'   => now()
        ];
    }
}
