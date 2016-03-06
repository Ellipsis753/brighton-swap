<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function destroy(\App\User $user, \App\Post $post) {
        $allowed = false;
        //With a mysql database Laravel returns user_id as a string.
        //This seems to be a known Laravel thing.
        //When I properly understand what happens, "Attribute Casting" might solve it.
        if ((string)$user->id === (string)$post->user_id) {
            $allowed = true;
        }
        if ($user->role == 1) {
            //Allow admin to do anything
            $allowed = true;
        }
        return $allowed;
    }

    public function update(\App\User $user, \App\Post $post) {
        $allowed = false;
        //With a mysql database Laravel returns user_id as a string.
        //This seems to be a known Laravel thing.
        //When I properly understand what happens, "Attribute Casting" might solve it.
        if ((string)$user->id === (string)$post->user_id) {
            $allowed = true;
        }
        if ($user->role == 1) {
            //Allow admin to do anything
            $allowed = true;
        }
        return $allowed;
    }
}
