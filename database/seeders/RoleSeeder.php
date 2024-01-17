<?php

namespace Database\Seeders;
use App\Models\Role;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $role = new Role(['title' => 'admin']);
        $role->save();
        $role = new Role(['title' => 'vendor']);
        $role->save();
        $role = new Role(['title' => 'member']);
        $role->save();
        // $role = new Role(['title' => 'viewer']);
        // $role->save();
    }
}
