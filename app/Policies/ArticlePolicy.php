<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ArticlePolicy
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
    public function view(User $user, Article $article): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if($user->role->role_value<=3){
            return true;

        }else{return false;}
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Article $article): bool
    {
        // dd('test0');

        if($user->role->role_value<=2){
            // dd('test1');
            return true;
        }else{
            // dd('test2');

            if($article->writer->id==$user->id && $user->role->role_value==3){
                return true;
            }else{
            return false;}
        }
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Article $article): bool
    {
        if($user->role->role_value<=2){
            return true;
        }else{
            if($article->writer->id==$user->id && $user->role->role_value==3){
                return true;
            }else{
            return false;}
        }
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Article $article): bool
    {
        if($user->role->role_value<=2){
            return true;
        }else{
            if($article->writer->id==$user->id && $user->role->role_value==3){
                return true;
            }else{
            return false;}
        }
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Article $article): bool
    {
        if($user->role->role_value<=2){
            return true;
        }else{
            if($article->writer->id==$user->id && $user->role->role_value==3){
                return true;
            }else{
            return false;}
        }
    }
}
