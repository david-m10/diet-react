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
        $now = now();
        $table = (new User())->getTable();

        foreach ($this->getUsers() as $user) {
            DB::table($table)->insert([
                'id' => $user['id'],
                'name' => $user['name'],
                'surname' => $user['surname'],
                'nickname' => $user['nickname'],
                'email' => $user['email'],
                'password' => $user['password'],
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
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
