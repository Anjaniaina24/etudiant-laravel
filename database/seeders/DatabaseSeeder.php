<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Créer l'utilisateur admin
        User::create([
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123')
        ]);

        // Créer des étudiants de test
        Student::create([
            'first_name' => 'Jean',
            'last_name' => 'Dupont',
            'email' => 'jean.dupont@example.com',
            'phone' => '0123456789',
            'birth_date' => '2000-05-15',
            'address' => '123 Rue de Paris, 75001 Paris'
        ]);

        Student::create([
            'first_name' => 'Marie',
            'last_name' => 'Martin',
            'email' => 'marie.martin@example.com',
            'phone' => '0987654321',
            'birth_date' => '1999-11-22',
            'address' => '456 Avenue des Champs, 69000 Lyon'
        ]);

        Student::create([
            'first_name' => 'Pierre',
            'last_name' => 'Durand',
            'email' => 'pierre.durand@example.com',
            'phone' => '0678912345',
            'birth_date' => '2001-03-08',
            'address' => '789 Boulevard de la Mer, 13000 Marseille'
        ]);
    }
}
?>
