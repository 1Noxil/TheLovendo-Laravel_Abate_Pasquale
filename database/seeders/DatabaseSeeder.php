<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public $categories = [
        'elettronica',
        'abbigliamento',
        'salute e bellezza',
        'giocattoli',
        'sport',
        'animali domestici',
        'libri e riviste',
        'accessori',
        'motori',
        'salute e bellezza'
    ];
    public function run(): void
    {
        foreach($this->categories as $category)
        {
            Category::create([
                'name' => $category
            ]);
        }

       /*  User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]); */
    }
}
