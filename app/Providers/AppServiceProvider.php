<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Mail\UserCreated;
use App\Mail\UserMailChanged;
use App\User;
use App\UserChange;
use App\ChordChange;
use Illuminate\Support\Facades\Mail;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        User::created(function($user) {
            retry(5, function() use ($user) {
                Mail::to($user)->send(new UserCreated($user));
            }, 100);

            // Write code to add data to user changes table here.

            /*
                protected $fillable = [
                'user_id',
                'count',
                'change_id'
    ];

            $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $data['verified'] = User::UNVERIFIED_USER;
        $data['verification_token'] = User::generateVerificationCode();
        $data['admin'] = User::REGULAR_USER;

        $user = User::create($data);


        We then need to get hold of all possible changes so we can iterate over them and then insert data
        into the user_changes table.

        1.  First make sure you have imported the UserChange model.                 DONE
        2.  Make sure you have the ChordChanges model imported as well.             DONE
        3.  Get hold of all of the changes in the database from chord_changes.



            */
            
            $allPossibleChordChanges = ChordChange::all();

            foreach($allPossibleChordChanges as $chordChange) {
                $userChange = UserChange::create([
                    'count' => 0,
                    'user_id' => $user->id,
                    'change_id' => $chordChange->id
                ]);

                $userChange->save();
            }


        });

        User::updated(function($user) {
            if ($user->isDirty('email')) {
                retry(5, function() use ($user) {
                    Mail::to($user)->send(new UserMailChanged($user));
                }, 100);
                
            }
        });


    }
}
