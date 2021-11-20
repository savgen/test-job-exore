<?php

namespace App\Http\Controllers\Article;

use App\Article;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeleteController extends Controller
{
    public function index(Request $request, $ID)
    {
        $user = Auth::user();
        $article = Article::find($ID);

        if($user->hasRole('manager'))
        {            
            $author = User::find($article->user_id);

            if($author->manager_id == $user->id)
            {
                $article->delete();
            }
        }elseif($user->hasRole('employee')){
            if($article->user_id == $user->id)
            {
                $article->delete();
            }
        }       

        return redirect()->back();
    }
}
