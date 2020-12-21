<?php

namespace Database\Seeders;

use App\Models\Move;
use App\Models\Opening;
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
        Opening::create(['opening' => 'scotch', 'name' => 'Ecossaise']);

        Move::create(['from' => null, 'to' => null, 'opening_id' => 1, 'parent_move_id' => null]);
        Move::create(['from' => 'e2', 'to' => 'e4', 'opening_id' => 1, 'parent_move_id' => 1]);
        Move::create(['from' => 'e7', 'to' => 'e5', 'opening_id' => 1, 'parent_move_id' => 2]);

        Move::create(['from' => 'g1', 'to' => 'f3', 'opening_id' => 1, 'parent_move_id' => 3]);
        Move::create(['from' => 'b8', 'to' => 'c6', 'opening_id' => 1, 'parent_move_id' => 4]);

        Move::create(['from' => 'd2', 'to' => 'd4', 'opening_id' => 1, 'parent_move_id' => 5]);
        Move::create(['from' => 'd7', 'to' => 'd6', 'opening_id' => 1, 'parent_move_id' => 6]);

        Move::create(['from' => 'd4', 'to' => 'e5', 'opening_id' => 1, 'parent_move_id' => 7]);
        Move::create(['from' => 'd6', 'to' => 'e5', 'opening_id' => 1, 'parent_move_id' => 8]);

        Move::create(['from' => 'd1', 'to' => 'd8', 'opening_id' => 1, 'parent_move_id' => 9]);
        Move::create(['from' => 'e8', 'to' => 'd8', 'opening_id' => 1, 'parent_move_id' => 10]);
        Move::create(['from' => 'c3', 'to' => 'd8', 'opening_id' => 1, 'parent_move_id' => 10]);
    }
}
