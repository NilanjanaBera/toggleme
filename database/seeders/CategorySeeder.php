<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // check if table users is empty
        if (DB::table('categories')->count() == 0) {

            DB::table('categories')->insert([

                [
                    'category' => 'Web Developer',
                    'status' => 'Active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),

                ],

                [
                    'category' => 'Web Designer',
                    'status' => 'Active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),

                ],
                [
                    'category' => 'Graphic Designer',
                    'status' => 'Active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),

                ],
                [
                    'category' => 'Marketing',
                    'status' => 'Active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),

                ],
                [
                    'category' => 'Mechanical Engineering',
                    'status' => 'Active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),

                ],
                [
                    'category' => 'Computer Science & Engineering',
                    'status' => 'Active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),

                ],
                [
                    'category' => 'Electronics & Communication Engineering (ECE',
                    'status' => 'Active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),

                ],


            ]);
        } else {
            echo "\e[Table is not empty, therefore NOT ";
        }
    }
}
