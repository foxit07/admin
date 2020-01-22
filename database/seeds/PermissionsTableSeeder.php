<?php


use Illuminate\Database\Seeder;
use Foxit07\Admin\Models\Permission;
use Foxit07\Admin\Models\Role;
use App\User;
use Illuminate\Support\Facades\Hash;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ask for db migration refresh, default is no
        if ($this->command->confirm('Do you wish to refresh migration before seeding, it will clear all old data ?', false)) {
            // Call the php artisan migrate:refresh
            $this->command->call('migrate:fresh');
            $this->command->warn("Data cleared, starting from blank database.");
        }

        // Seed the default permissions
        $permissions = Permission::defaultPermissions();

        foreach ($permissions as $perms) {
            Permission::firstOrCreate(['name' => $perms]);
        }

        $this->command->info('Default Permissions added.');

        // Confirm roles needed
        if ($this->command->confirm('Create Roles for user, default is admin? [y|N]', true)) {

            $role = 'admin';

            // add roles

                $role = Role::firstOrCreate(['name' => trim($role)]);
                    $role->syncPermissions(Permission::all());
                    $this->command->info('Admin granted all the permissions');
                    // create one user for each role
                $this->createUser($role);
            }
    }

    /**
     * Create a user with given role
     *
     * @param $role
     */
    private function createUser($role)
    {
        $user = User::firstOrCreate([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('123456'),
        ])->assignRole($role);

            $this->command->info('Here is your admin details to login:');
            $this->command->warn($user->email);
            $this->command->warn('Password is "123456"');

    }

}
