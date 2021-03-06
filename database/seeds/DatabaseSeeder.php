<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(RolePermissionSeeder::class);
         $this->call(AdminSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(PortfolioSeeder::class);
        $this->call(BlogSeeder::class);
        $this->call(PageSeeder::class);
        $this->call(SettingsSeeder::class);
    }
}
