<?php

use App\Models\Users\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new ModelSeeder(User::class, $this->getUsers()))->run();
    }

    /**
     * Get users list.
     *
     * @return array
     */
    private function getUsers()
    {
        return [
            [
                'id' => 1,
                'name' => 'P',
                'surname' => 'M',
                'nickname' => 'Przemek',
                'email' => 'pmx10@wp.pl',
                'password' => bcrypt('example'),
            ],
        ];
    }
}
