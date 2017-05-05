<?php

namespace Oshaman\Publication\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use Oshaman\Publication\User;
use Oshaman\Publication\Article;

class ArticlePolicy
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
    
    public function create(User $user)
    {
		return $user->canDo('ADD_ARTICLES');
	}
    
    public function update(User $user, Article $article)
    {
		return ($user->canDo('UPDATE_ARTICLES') && $user->id == $article->user_id) || $user->canDo('CONFIRMATION_DATA');
	}
    
    public function destroy(User $user, Article $article)
    {
		return ($user->canDo('DELETE_ARTICLES')  && $user->id == $article->user_id);
	}
}
