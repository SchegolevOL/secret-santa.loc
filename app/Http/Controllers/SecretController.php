<?php

namespace App\Http\Controllers;

use App\Mail\SecretSantMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class SecretController extends Controller
{
    public function secretSantaSelect()
    {
        $users = User::query()->select('name', 'email', 'id')->get();
        $users = $users->toArray();
        $usersSelected = $users;

        $secretes = [];


        foreach ($users as $user) {

            if (count($usersSelected) >= 2) {
                $randUsers = array_rand($usersSelected, 2);
                if ($user['id'] == $usersSelected[$randUsers[0]]) {
                    $secretes[$user['id']] = $usersSelected[$randUsers[0]];
                    unset($usersSelected[$randUsers[0]]);
                } else {
                    $secretes[$user['id']] = $usersSelected[$randUsers[1]];
                    unset($usersSelected[$randUsers[1]]);
                }
            } else {
                $secretes[$user['id']] = $usersSelected[0];
            }


        }


       foreach ($users as $user) {
           Mail::to($user['email'])->send(new SecretSantMail($user, current($secretes)));
           next($secretes);
       }
        dump($secretes);

        return view('welcome');;
    }


}
