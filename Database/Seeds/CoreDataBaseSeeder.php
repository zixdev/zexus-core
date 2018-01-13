<?php namespace Zix\Core\Database\Seeds;

use Illuminate\Database\Seeder;

class CoreDataBaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionTableSeeder::class);
    }
}
