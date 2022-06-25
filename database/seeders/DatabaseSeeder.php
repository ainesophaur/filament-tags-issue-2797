<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $publishers = \App\Models\Publisher::factory(5)
            ->hasAttached(User::factory(5)->has(Book::factory(4)), [], 'authors')
        ->create();
//         $author = \App\Models\User::factory(1)->create();
//         $author2 = \App\Models\User::factory(1)->create();
//        $author[0]->books()->createMany([
//            ['name' => 'aa book 1'],
//            ['name' => 'aa book 2'],
//        ]);
//         $author2[0]->books()->createMany([
//             ['name' => 'xx book 1'],
//             ['name' => 'xx book 2'],
//         ]);
        \Spatie\Tags\Tag::findOrCreate(['foo', 'bar'], 'support');
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
