<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{

    public function run()
    {
        Author::create(['name' => 'John Doe',
            'image'=>'profile-photos/15g8MdZCGhp00DnxAY17FDghvdopYDXU3eUcHYRb.png']);
        Author::create(['name' => 'John Smith',
            'image'=>'profile-photos/15g8MdZCGhp00DnxAY17FDghvdopYDXU3eUcHYRb.png']);
        Author::create(['name' => 'Emily Johnson',
            'image'=>'profile-photos/15g8MdZCGhp00DnxAY17FDghvdopYDXU3eUcHYRb.png']);
        Author::create(['name' => 'Michael Brown',
            'image'=>'profile-photos/15g8MdZCGhp00DnxAY17FDghvdopYDXU3eUcHYRb.png']);
        Author::create(['name' => 'Sophia Davis',
            'image'=>'profile-photos/15g8MdZCGhp00DnxAY17FDghvdopYDXU3eUcHYRb.png']);
        Author::create(['name' => 'William Miller',
            'image'=>'profile-photos/15g8MdZCGhp00DnxAY17FDghvdopYDXU3eUcHYRb.png']);
        Author::create(['name' => 'Olivia Wilson',
            'image'=>'profile-photos/15g8MdZCGhp00DnxAY17FDghvdopYDXU3eUcHYRb.png']);
        Author::create(['name' => 'James Taylor',
            'image'=>'profile-photos/15g8MdZCGhp00DnxAY17FDghvdopYDXU3eUcHYRb.png']);
        Author::create(['name' => 'Isabella Anderson',
            'image'=>'profile-photos/15g8MdZCGhp00DnxAY17FDghvdopYDXU3eUcHYRb.png']);
        Author::create(['name' => 'Benjamin Thomas',
            'image'=>'profile-photos/15g8MdZCGhp00DnxAY17FDghvdopYDXU3eUcHYRb.png']);
    }
}
