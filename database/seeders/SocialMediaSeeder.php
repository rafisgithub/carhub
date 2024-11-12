<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $socialMedias = [
                [
                    'name' => 'Facebook',
                    'url' => 'https://www.facebook.com',
                    'icon' => 'fab fa-facebook',
                    'status' => true,
                ],
                [
                    'name' => 'Twitter',
                    'url' => 'https://www.twitter.com',
                    'icon' => 'fab fa-twitter',
                    'status' => true,
                ],
                [
                    'name' => 'Instagram',
                    'url' => 'https://www.instagram.com',
                    'icon' => 'fab fa-instagram',
                    'status' => true,

                ],
                [
                    'name' => 'Linkedin',
                    'url' => 'https://www.linkedin.com',
                    'icon' => 'fab fa-linkedin',
                    'status' => true,
                ],
                [
                    'name' => 'Youtube',
                    'url' => 'https://www.youtube.com',
                    'icon' => 'fab fa-youtube',
                    'status' => true,
                ],
            ];

        foreach ($socialMedias as $socialMedia) {
            \App\Models\socialMedia::create($socialMedia);
        }
}
}
