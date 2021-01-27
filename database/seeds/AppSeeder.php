<?php

use Illuminate\Database\Seeder;

class AppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = factory(App\Company::class, 10)->create();

        $companies->each(function($company) {
            factory(App\Employee::class, 10)->create(['company_id' => $company->id]);
        });
    }
}
