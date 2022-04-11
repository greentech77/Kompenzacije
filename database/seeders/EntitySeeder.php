<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EntitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('entities')->insert([
            'company_name' => 'STEKLARNA ROGAŠKA D.O.O.',
            'name' => 'Mira',
            'lastname' => 'Kralj',
            'address' => 'Ulica talcev 1',
            'post_num' => 3250,
            'post_town' => 'Rogaska Slatina',
            'vat_num' => 46716343,
            'registration_num' => 5045657000,
            'post_town' => 'ROGAŠKA',
            'bank_account' => '',
            'bank_bic' => '',
            'bank_name' => '',
            'email' => 'mira.kralj@stek-rogaska.si',
            'fax' => '/',
            'phone' => '03/8180177',
            'mobile' => '/',
            'show_email' => true,
            'show_fax' => true
        ]);

    }
}
