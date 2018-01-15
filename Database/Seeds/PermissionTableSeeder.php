<?php namespace Zix\Core\Database\Seeds;

use Illuminate\Database\Seeder;
use Zix\Core\Events\Seeder\GetAppPermissions;
use Zix\Core\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = collect();
        $actions = collect(['view', 'create', 'update', 'delete']);
        
        event(new GetAppPermissions($permissions));

        $this->createPermissions($permissions, $actions);
    }

    /**
     * @param $permissions
     * @param $actions
     */
    private function createPermissions($permissions, $actions): void
    {
        $permissions->map(function ($permission) use ($actions) {
            $actions->map(function ($action) use ($permission) {
                Permission::create([
                    'name' => $action . '_' . $permission,
                    'guard_name' => 'admin'
                ]);
                Permission::create([
                    'name' => $action . '_' . $permission,
                    'guard_name' => 'web'
                ]);
            });
        });
    }
}
