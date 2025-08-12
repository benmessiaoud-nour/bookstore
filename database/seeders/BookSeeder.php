<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $book1=Book::create([
           'category_id'=>Category::where('name','Science')->first()->id,
           'publisher_id'=>Publisher::where('name','HarperCollins')->first()->id,
           'title'=>'Book 1',
           'description'=>'Book 1 description',
           'price'=>'60',
           'ibsn'=>'10001',
           'nbr_of_pages'=>'100',
           'nbr_of_copies'=>'100',
           'publish_year'=>'2004',
           'cover_image'=>'images/book1.jpg',
       ]);
       $book1->author()->attach(Author::where('name','John Smith')->first());

        $book2=Book::create([
            'category_id'=>Category::where('name','coding')->first()->id,
            'publisher_id'=>Publisher::where('name','Macmillan Publishers')->first()->id,
            'title'=>'Book 2',
            'description'=>'Book 2 description',
            'price'=>'60',
            'ibsn'=>'10002',
            'nbr_of_pages'=>'300',
            'nbr_of_copies'=>'150',
            'publish_year'=>'2004',
            'cover_image'=>'images/book2.jpg',
        ]);
        $book2->author()->attach(Author::where('name','John Smith')->first());

        $book3=Book::create([
            'category_id'=>Category::where('name','Horror')->first()->id,
            'publisher_id'=>Publisher::where('name','Hachette Book Group')->first()->id,
            'title'=>'Book 3',
            'description'=>'Book 3 description',
            'price'=>'60',
            'ibsn'=>'10003',
            'nbr_of_pages'=>'500',
            'nbr_of_copies'=>'600',
            'publish_year'=>'2004',
            'cover_image'=>'images/book3.jpg',
        ]);
        $book3->author()->attach(Author::where('name','Olivia Wilson')->first());

        $book4=Book::create([
            'category_id'=>Category::where('name','coding')->first()->id,
            'publisher_id'=>Publisher::where('name','Simon & Schuster')->first()->id,
            'title'=>'Book 4',
            'description'=>'Book 4 description',
            'price'=>'60',
            'ibsn'=>'10005',
            'nbr_of_pages'=>'600',
            'nbr_of_copies'=>'500',
            'publish_year'=>'2004',
            'cover_image'=>'images/book4.jpg',
        ]);
        $book4->author()->attach(Author::where('name','William Miller')->first());

        $book5=Book::create([
            'category_id'=>Category::where('name','Romance')->first()->id,
            'publisher_id'=>Publisher::where('name','Penguin Random House')->first()->id,
            'title'=>'Book 5',
            'description'=>'Book 5 description',
            'price'=>'60',
            'ibsn'=>'10005',
            'nbr_of_pages'=>'400',
            'nbr_of_copies'=>'40',
            'publish_year'=>'2004',
            'cover_image'=>'images/book5.jpg',
        ]);
        $book5->author()->attach(Author::where('name','John Smith')->first());

        $book6=Book::create([
            'category_id'=>Category::where('name','coding')->first()->id,
            'publisher_id'=>Publisher::where('name','HarperCollins')->first()->id,
            'title'=>'Book 6',
            'description'=>'Book 6 description',
            'price'=>'60',
            'ibsn'=>'10006',
            'nbr_of_pages'=>'100',
            'nbr_of_copies'=>'100',
            'publish_year'=>'2004',
            'cover_image'=>'images/book1.jpg',
        ]);
        $book6->author()->attach(Author::where('name','John Doe')->first());

        $book7=Book::create([
            'category_id'=>Category::where('name','Romance')->first()->id,
            'publisher_id'=>Publisher::where('name','Macmillan Publishers')->first()->id,
            'title'=>'Book 7',
            'description'=>'Book 7 description',
            'price'=>'60',
            'ibsn'=>'10007',
            'nbr_of_pages'=>'220',
            'nbr_of_copies'=>'200',
            'publish_year'=>'2004',
            'cover_image'=>'images/book7.jpg',
        ]);
        $book7->author()->attach(Author::where('name','James Taylor')->first());

        $book8=Book::create([
            'category_id'=>Category::where('name','Fantasy')->first()->id,
            'publisher_id'=>Publisher::where('name','Hachette Book Group')->first()->id,
            'title'=>'Book 8',
            'description'=>'Book 8 description',
            'price'=>'60',
            'ibsn'=>'10008',
            'nbr_of_pages'=>'800',
            'nbr_of_copies'=>'100',
            'publish_year'=>'2004',
            'cover_image'=>'images/book8.jpg',
        ]);
        $book8->author()->attach(Author::where('name','Benjamin Thomas')->first());

        $book9=Book::create([
            'category_id'=>Category::where('name','Romance')->first()->id,
            'publisher_id'=>Publisher::where('name','HarperCollins')->first()->id,
            'title'=>'Book 9',
            'description'=>'Book 9 description',
            'price'=>'60',
            'ibsn'=>'10009',
            'nbr_of_pages'=>'100',
            'nbr_of_copies'=>'100',
            'publish_year'=>'2004',
            'cover_image'=>'images/book9.jpg',
        ]);
        $book9->author()->attach(Author::where('name','Emily Johnson')->first());

        $book10=Book::create([
            'category_id'=>Category::where('name','Self-Help')->first()->id,
            'publisher_id'=>Publisher::where('name','Simon & Schuster')->first()->id,
            'title'=>'Book 10',
            'description'=>'Book 10 description',
            'price'=>'60',
            'ibsn'=>'10010',
            'nbr_of_pages'=>'700',
            'nbr_of_copies'=>'100',
            'publish_year'=>'2004',
            'cover_image'=>'images/book1.jpg',
        ]);
        $book10->author()->attach(Author::where('name','Benjamin Thomas')->first());
    }
}
