<?php

namespace App\Repositories;

use App\Models\User;
use SocialiteProviders\Manager\OAuth2\User as UserOAuth2;
use  Laravel\Socialite\Two\User as TwoUser;

class UserRepository
{
    public function getUserBySocId(TwoUser $user,string $socName) {
        $userInSystem = User::query()
            ->where('id_in_soc', $user->id)
            ->where('type_auth', $socName)
            ->first();

        if (is_null($userInSystem)) {
            $userInSystem = new User();


            $userInSystem->fill([
                'name' => !empty($user->nickname)? $user->nickname : '',
                'email' => !empty($user->email)? $user->email :'',
                'password' => '',
                'id_in_soc' => !empty($user->id)? $user->id:'',
                'type_auth' => $socName,
                'email_verified_at' => now(),
            ]);
            $userInSystem->save();
        }

        return $userInSystem;
    }
}