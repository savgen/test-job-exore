<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manager = Role::create(['name' => 'manager']);
        $employee = Role::create(['name' => 'employee']);

        $all_employees = Permission::create(['name' => 'all employees']);
        $create_employee = Permission::create(['name' => 'create employee']);
        
        $all_articles = Permission::create(['name' => 'all articles']);
        $create_article = Permission::create(['name' => 'create article']);
        $edit_article = Permission::create(['name' => 'edit article']);
        $delete_article = Permission::create(['name' => 'delete article']);

        $manager_permissions = [$all_employees, $create_employee, $all_articles, $delete_article];
        $employee_permissions = [$all_articles, $create_article, $edit_article, $delete_article];

        $manager->syncPermissions($manager_permissions);    
        $employee->syncPermissions($employee_permissions);
    }
}
