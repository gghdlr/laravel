<?php

namespace App\Policies;

use App\Models\User;
use App\Models\article;
use Illuminate\Auth\Access\Response;

class ArticleControllerPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, article $article): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        return ($user->role == 'moderator')  ?
        Response::allow() :
        Response::deny('you arent moderator');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Article $article)
    {
        return ($user->role == 'moderator')  ?
        Response::allow() :
        Response::deny('you arent moderator');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Article $article)
    {
       return ($user->role == 'moderator') ?
       Response::allow() :
       Response::deny('you arent moderator');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Article $article): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Article $article): bool
    {
        //
    }
}
