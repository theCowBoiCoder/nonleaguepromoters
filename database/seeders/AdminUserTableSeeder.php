<?php

namespace Database\Seeders;

use App\Models\Admin\AdminUserModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminUserModel::query()->create([
            'name' => 'Hayden Sweet',
            'email' => 'hayden@togadevelopment.co.uk',
            'username' => 'admin_hayden',
            'password' => Hash::make('password'),
        ]);
    }
}
