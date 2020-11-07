<?php

use Illuminate\Database\Seeder;
use App\Chord;
use App\ChordChange;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        // Clear out the users table
        User::truncate();

        // Prevent event listeners sending emails and so on
        User::flushEventListeners();

        // Create 1000 users
        $usersQuantity = 1000;
        factory(User::class, $usersQuantity)->create();

        // Here we insert all of the chords
        $chords = ['A', 'D', 'E', 'Am', 'Em', 'Dm', 'G', 'C'];

        foreach($chords as $chord) {
            factory(Chord::class, 1)->create(['name' => $chord]);
        }


        // Now we need to construct the Chord Changes data
        
        // d to a
        factory(ChordChange::class, 1)->create([
            'from_id' => Chord::all()->where('name', '=', 'D')->first()->id,
            'to_id' => Chord::all()->where('name', '=', 'A')->first()->id,
            'position' => 0
        ]);



        // e to a
        factory(ChordChange::class, 1)->create([
            'from_id' => Chord::all()->where('name', '=', 'E')->first()->id,
            'to_id' => Chord::all()->where('name', '=', 'A')->first()->id,
            'position' => 1
        ]);

        // e to d
        factory(ChordChange::class, 1)->create([
            'from_id' => Chord::all()->where('name', '=', 'E')->first()->id,
            'to_id' => Chord::all()->where('name', '=', 'D')->first()->id,
            'position' => 2
        ]);

        // am to a
        factory(ChordChange::class, 1)->create([
            'from_id' => Chord::all()->where('name', '=', 'Am')->first()->id,
            'to_id' => Chord::all()->where('name', '=', 'A')->first()->id,
            'position' => 3
        ]);

        // am to d
        factory(ChordChange::class, 1)->create([
            'from_id' => Chord::all()->where('name', '=', 'Am')->first()->id,
            'to_id' => Chord::all()->where('name', '=', 'D')->first()->id,
            'position' => 4
        ]);
        // am to e
        factory(ChordChange::class, 1)->create([
            'from_id' => Chord::all()->where('name', '=', 'Am')->first()->id,
            'to_id' => Chord::all()->where('name', '=', 'E')->first()->id,
            'position' => 5
        ]);

        // em to a
        factory(ChordChange::class, 1)->create([
            'from_id' => Chord::all()->where('name', '=', 'Em')->first()->id,
            'to_id' => Chord::all()->where('name', '=', 'A')->first()->id,
            'position' => 6
        ]);
        // em to d
        factory(ChordChange::class, 1)->create([
            'from_id' => Chord::all()->where('name', '=', 'Em')->first()->id,
            'to_id' => Chord::all()->where('name', '=', 'D')->first()->id,
            'position' => 7
        ]);

        // em to e
        factory(ChordChange::class, 1)->create([
            'from_id' => Chord::all()->where('name', '=', 'Em')->first()->id,
            'to_id' => Chord::all()->where('name', '=', 'E')->first()->id,
            'position' => 8
        ]);

        // em to am
        factory(ChordChange::class, 1)->create([
            'from_id' => Chord::all()->where('name', '=', 'Em')->first()->id,
            'to_id' => Chord::all()->where('name', '=', 'Am')->first()->id,
            'position' => 9
        ]);

        // dm to a
        factory(ChordChange::class, 1)->create([
            'from_id' => Chord::all()->where('name', '=', 'Dm')->first()->id,
            'to_id' => Chord::all()->where('name', '=', 'A')->first()->id,
            'position' => 10
        ]);

        // dm to d
        factory(ChordChange::class, 1)->create([
            'from_id' => Chord::all()->where('name', '=', 'Dm')->first()->id,
            'to_id' => Chord::all()->where('name', '=', 'D')->first()->id,
            'position' => 11
        ]);

        // dm to e
        factory(ChordChange::class, 1)->create([
            'from_id' => Chord::all()->where('name', '=', 'Dm')->first()->id,
            'to_id' => Chord::all()->where('name', '=', 'E')->first()->id,
            'position' => 12
        ]);


        // dm to am
        factory(ChordChange::class, 1)->create([
            'from_id' => Chord::all()->where('name', '=', 'Dm')->first()->id,
            'to_id' => Chord::all()->where('name', '=', 'Am')->first()->id,
            'position' => 13
        ]);

        // dm to em
        factory(ChordChange::class, 1)->create([
            'from_id' => Chord::all()->where('name', '=', 'Dm')->first()->id,
            'to_id' => Chord::all()->where('name', '=', 'Em')->first()->id,
            'position' => 14
        ]);

        // g to a
        factory(ChordChange::class, 1)->create([
            'from_id' => Chord::all()->where('name', '=', 'G')->first()->id,
            'to_id' => Chord::all()->where('name', '=', 'A')->first()->id,
            'position' => 15
        ]);
        // g to d
        factory(ChordChange::class, 1)->create([
            'from_id' => Chord::all()->where('name', '=', 'G')->first()->id,
            'to_id' => Chord::all()->where('name', '=', 'D')->first()->id,
            'position' => 16
        ]);

        // g to e
        factory(ChordChange::class, 1)->create([
            'from_id' => Chord::all()->where('name', '=', 'G')->first()->id,
            'to_id' => Chord::all()->where('name', '=', 'E')->first()->id,
            'position' => 17
        ]);
        
        // g to am
        factory(ChordChange::class, 1)->create([
            'from_id' => Chord::all()->where('name', '=', 'G')->first()->id,
            'to_id' => Chord::all()->where('name', '=', 'Am')->first()->id,
            'position' => 18
        ]);

        // g to em
        factory(ChordChange::class, 1)->create([
            'from_id' => Chord::all()->where('name', '=', 'G')->first()->id,
            'to_id' => Chord::all()->where('name', '=', 'Em')->first()->id,
            'position' => 19
        ]);

        // g to dm
        factory(ChordChange::class, 1)->create([
            'from_id' => Chord::all()->where('name', '=', 'G')->first()->id,
            'to_id' => Chord::all()->where('name', '=', 'Dm')->first()->id,
            'position' => 20
        ]);
        // c to a
        factory(ChordChange::class, 1)->create([
            'from_id' => Chord::all()->where('name', '=', 'C')->first()->id,
            'to_id' => Chord::all()->where('name', '=', 'A')->first()->id,
            'position' => 21
        ]);

        // c to d
        factory(ChordChange::class, 1)->create([
            'from_id' => Chord::all()->where('name', '=', 'C')->first()->id,
            'to_id' => Chord::all()->where('name', '=', 'D')->first()->id,
            'position' => 22
        ]);
        
        // c to e
        factory(ChordChange::class, 1)->create([
            'from_id' => Chord::all()->where('name', '=', 'C')->first()->id,
            'to_id' => Chord::all()->where('name', '=', 'E')->first()->id,
            'position' => 23
        ]);
        // c to am
        factory(ChordChange::class, 1)->create([
            'from_id' => Chord::all()->where('name', '=', 'C')->first()->id,
            'to_id' => Chord::all()->where('name', '=', 'Am')->first()->id,
            'position' => 24
        ]);
        // c to em
        factory(ChordChange::class, 1)->create([
            'from_id' => Chord::all()->where('name', '=', 'C')->first()->id,
            'to_id' => Chord::all()->where('name', '=', 'Em')->first()->id,
            'position' => 25
        ]);

        // c to dm
        factory(ChordChange::class, 1)->create([
            'from_id' => Chord::all()->where('name', '=', 'C')->first()->id,
            'to_id' => Chord::all()->where('name', '=', 'Dm')->first()->id,
            'position' => 26
        ]);
        // c to g
        factory(ChordChange::class, 1)->create([
            'from_id' => Chord::all()->where('name', '=', 'C')->first()->id,
            'to_id' => Chord::all()->where('name', '=', 'G')->first()->id,
            'position' => 27
        ]);
        





    }
}
