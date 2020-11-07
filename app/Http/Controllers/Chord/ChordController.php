<?php

namespace App\Http\Controllers\Chord;

use Illuminate\Http\Request;
use App\Chord;
use App\ChordChange;
use App\UserChange;
use App\Http\Controllers\ApiController;

class ChordController extends ApiController
{
    public function __construct() {
        // $this->middleware('client.credentials')->only(['store', 'resend', 'index']);
        // $this->middleware('auth:api')->only(['me']);
    }

    // Get all of the chord changes, and in the correct order
    // Once the screen is drawing based on that you can decide when and from where to get the user data for each
    // Meaning with this request or with a further one
    public function getChordChanges() {
        // $changes = ChordChange::with('userChanges')->limit(1)->get();
        
        $changes = ChordChange::with('userChanges')->orderBy('position')->get();
        // }])->get();
        // $userChanges = ChordChange::find(1)->userChanges;
        // dd($userChanges);
        
        
        
        
        
        return $this->showAll($changes);
    }

    public function storeUserChordChange(Request $request) {
        $data = $request->all();



        $change = UserChange::create($data);
        return $this->showOne($change);

        /*
                    $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $data['verified'] = User::UNVERIFIED_USER;
        $data['verification_token'] = User::generateVerificationCode();
        $data['admin'] = User::REGULAR_USER;

        $user = User::create($data);
        return $this->showOne($user, 201);

        */

    }
}