<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Annonce;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AnnonceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create a demo user if no users exist
        $user = User::first();
        
        if (!$user) {
            $user = User::create([
                'name' => 'Demo User',
                'email' => 'demo@example.com',
                'username' => 'demouser',
                'password' => Hash::make('password'),
            ]);
        }

        // Create sample announcements
        $annonces = [
            [
                'body' => 'Beautiful 2-bedroom apartment in city center, fully furnished with modern amenities',
                'annonce_type' => 'offer',
                'img_url' => 'https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?w=800',
                'user_id' => $user->id,
            ],
            [
                'body' => 'Spacious family house with garden, 4 bedrooms, 3 bathrooms, perfect location',
                'annonce_type' => 'offer',
                'img_url' => 'https://images.unsplash.com/photo-1568605114967-8130f3a36994?w=800',
                'user_id' => $user->id,
            ],
            [
                'body' => 'Cozy studio apartment near university, ideal for students, affordable price',
                'annonce_type' => 'offer',
                'img_url' => 'https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?w=800',
                'user_id' => $user->id,
            ],
            [
                'body' => 'Luxury penthouse with panoramic city views, 3 bedrooms, rooftop terrace',
                'annonce_type' => 'request',
                'img_url' => 'https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?w=800',
                'user_id' => $user->id,
            ],
            [
                'body' => 'Commercial office space in business district, 200sqm, parking included',
                'annonce_type' => 'request',
                'img_url' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=800',
                'user_id' => $user->id,
            ],
            [
                'body' => 'Charming villa with swimming pool, 5 bedrooms, large garden, quiet neighborhood',
                'annonce_type' => 'offer',
                'img_url' => 'https://images.unsplash.com/photo-1613490493576-7fde63acd811?w=800',
                'user_id' => $user->id,
            ],
            [
                'body' => 'Modern loft in artistic neighborhood, open space, high ceilings, lots of natural light',
                'annonce_type' => 'request',
                'img_url' => 'https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?w=800',
                'user_id' => $user->id,
            ],
            [
                'body' => 'Investment opportunity: apartment building with 8 units, fully rented, great returns',
                'annonce_type' => 'offer',
                'img_url' => 'https://images.unsplash.com/photo-1560518883-ce09059eeffa?w=800',
                'user_id' => $user->id,
            ],
        ];

        foreach ($annonces as $annonce) {
            Annonce::create($annonce);
        }
    }
}
