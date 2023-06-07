<?php

namespace App\Policies;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProfilePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Profile $profile): bool
    {
        return true;

    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Profile $profile): bool
    {
        if($user->role->role_value<=2){
            return true;
        }else{
            if($user->profile->id==$profile->id){
                return true;
            }
        }

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Profile $profile): bool
    {
        if($user->role->role_value<=2){
            return true;
        }else{
            if($user->id==$profile->user->id){
                return true;
            }
        }
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Profile $profile): bool
    {
        if($user->role->role_value<=2){
            return true;
        }else{
            if($user->id==$profile->user->id){
                return true;
            }
        }
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Profile $profile): bool
    {
        if($user->role->role_value<=2){
            return true;
        }else{
            return false;
        }
    }
    public function editResume(User $user,Profile $profile): bool{
        if($user->role->role_value<=2){
            return true;
        }else{
            if($user->profile->id==$profile->id){
                return true;
            }
        }

    }
    public function createResume(User $user,Profile $profile): bool{

        if($user->role->role_value<=2){
            return true;
        }else{
            if($user->profile->id==$profile->id){
                return true;
            }
        }
    }
}
