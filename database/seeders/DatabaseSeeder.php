<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\News;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Sequence;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    { {
            // News::factory(30)->create();
            Category::factory(6)->state(new Sequence(
                ['title' => 'Politics',],
                ['title' => 'Nature',],
                ['title' => 'Sport',],
                ['title' => 'Food',],
                ['title' => 'Entertainment',],
                ['title' => 'Science',],
            ))->has(News::factory(5))->create();
        }
    }
}
