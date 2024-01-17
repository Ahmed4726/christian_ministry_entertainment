<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user=new User(['name'=>'Muhammad Uzair','email'=>'uzair@gmail.com','password'=>Hash::make('12345'),'address'=>'mohallah nawab pura'
    ,'city'=>'gujrat','state'=>'PB','zip'=>'57000','phone'=>'03026296441','website'=>'royalbladez.com',
'role_id'=>'1']);
        $user->save();
    }
}
