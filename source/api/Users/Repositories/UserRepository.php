<?php

namespace Api\Users\Repositories;

use Api\Users\Models\User;
use Infrastructure\Database\Eloquent\Repository;
//EXTERNAL CLASS
use DB;
use Hash;
use Schema;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Redis;

class UserRepository extends Repository
{
    public function getModel()
    {
        return new User();
    }

    public function create(array $data)
    {
        $user = $this->getModel();
        DB::beginTransaction();
        try {
            $data['password'] = Hash::make($data['password']);
            $user->fill($data);
            $user->save();
        } catch(\Exception $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();
        return $user;
    }

    public function login(array $data)
    {
        //GET VALUES
        $email = $data['email'];
        $password = $data['password'];
        //GET USER
        $user = User::whereNull(User::TABLE_NAME . '.deleted_at')
                    ->where(User::TABLE_NAME . '.email', $email)
                    // ->where(User::TABLE_NAME . '.password', $password)
                    ->where(User::TABLE_NAME . '.flag_active', User::STATE_ACTIVE)
                    ->first();
        //VALIDATE PASSWORD
        if (!is_null($user)) {
            $condition = Hash::check($password, $user->password);
            //REDIS LOGIC AND TOKEN
            if ($condition) {
                $token = $this->makeJwtFromUser($user);
                $user->token = $token;
            } else {
                $user = null;
            }
        }
        //RETURN VALUES
        return $user;
    }

    public function update(User $user, array $data)
    {
        DB::beginTransaction();
        try {
            $user->fill($data);
            $user->save();
        } catch(\Exception $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();
        return $user;
    }

    //handlers
    private function makeJwtFromUser(User $user)
    {
        $token = JWTAuth::fromUser($user);
        return $token;
    }

    public function getSideBar( $appId, $rolId)
    {
        $key = 'apps_id_' . $appId . '_roles_id_' . $rolId;
        $response = Redis::get($key);
        $sideBar = [];
        if (!is_null($response)) {
            $sideBar = json_decode($response);
        }
        return $sideBar;
    }
}
