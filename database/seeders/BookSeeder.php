<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = [
            [
               'Title'=>"Harry Potter and the Philosopher's Stone",
               'Author'=>'J. K. Rowling',
                'Category'=>'Fantasy',
               'Price'=> 99.5,
            ],
            [
                'Title'=>"Harry Potter and the Chamber of Secrets",
                'Author'=>'J. K. Rowling',
                 'Category'=>'Fantasy',
                'Price'=> 50,
            ],
            [
                'Title'=>"Harry Potter and the Deathly Hallows",
                'Author'=>'J. K. Rowling',
                 'Category'=>'Fantasy',
                'Price'=> 120,
            ],
            [
                'Title'=>"Learning PHP, MySQL & JavaScript",
                'Author'=>'Robin Nixon',
                 'Category'=>'Programming',
                'Price'=> 0.75,
            ],
            [
                'Title'=>"Python Crash Course",
                'Author'=>'Eric Matthes',
                 'Category'=>'Programming',
                'Price'=> 700,
            ],
        ];
  
        foreach ($books as $book) {
            DB::table('books')->insert($book);
        }
    }
}
