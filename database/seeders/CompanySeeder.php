<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\Post;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $details = [
            [
                'title' => 'Php laravel developer',
                'education' => 'bachelors',
            ], [
                'title' => 'Marketing Expert',
                'education' => 'bachelors',
            ], [
                'title' => 'Professional designer',
                'education' => 'bachelors',
            ], [
                'title' => 'Dotnet programmer',
                'education' => 'high school',
            ], [
                'title' => 'Sales Executive',
                'education' => 'bachelors',
            ], [
                'title' => 'Maths Teacher',
                'education' => 'master',
            ],
        ];
        //user id is 2 that has author role
        $company = Company::factory()->create([
            'company_category_id' => 1,
            'title' => 'Gabrato company',
            'logo' => 'images/logo/7.png',
        ]);
        foreach ($details as $index => $detail) {
            $post = Post::factory()->create([
                'company_id' => $company->id,
                'job_title' => $detail['title'],
                'employment_type' => $detail['employment'],
            ]);
        }
    }
}
