<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Listing::factory(20)->create();
        /*Listing::create([
            'title' => 'Laravel Senior Development',
            'tags' => 'laravel',
            'company'  => 'Acme corp',
            'location' => 'Boston, Ma',
            'email' => 'email1@gmail.com',
            'website' => 'https://www.acme.com',
            'description' => 'Senior Laravel developer wanted',
        ]);
        Listing::create([
            'title' => 'PHP Senior Development',
            'tags' => 'PHP',
            'company'  => 'Stark İndustires',
            'location' => 'New York, NY',
            'email' => 'stark@gmail.com',
            'website' => 'https://www.starkindustries.com',
            'description' => 'Senior PHP developer wanted',
        ]);*/
    }
}
