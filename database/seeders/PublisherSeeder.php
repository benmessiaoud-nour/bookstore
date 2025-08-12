<?php

namespace Database\Seeders;

use App\Models\Publisher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Publisher::create(['name' => 'HarperCollins',
            'address'=>'742 Evergreen Terrace, Springfield, IL 62704, USA']);
        Publisher::create(['name' => 'Penguin Random House',
            'address'=>'742 Evergreen Terrace, Springfield, IL 62704, USA']);
        Publisher::create(['name' => 'Simon & Schuster',
            'address'=>'742 Evergreen Terrace, Springfield, IL 62704, USA']);
        Publisher::create(['name' => 'Hachette Book Group',
            'address'=>'742 Evergreen Terrace, Springfield, IL 62704, USA']);
        Publisher::create(['name' => 'Macmillan Publishers',
            'address'=>'742 Evergreen Terrace, Springfield, IL 62704, USA']);
    }
}
