<?php

namespace App\Http\Controllers\Article;

use App\Article;
use App\Categories;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ArticleController extends Controller
{
    public function __construct(){
        $categories = Categories::all();
        View::share('categories', $categories);
    }

    static function get_category_name($categroy_id)
    {
        $data = Categories::find($categroy_id);
        $name = $data->name;
        return $name;
    }

    public function index()
    {
        $user = Auth::user();

        if($user->hasRole('manager'))
        {
            $articles = User::join('articles', 'users.id', 'articles.user_id')
                ->select('users.email', 'articles.id', 'articles.category_id', 'articles.user_id', 'articles.title')
                ->where('users.manager_id', $user->id)
                ->orderBy('articles.id', 'DESC')
                ->paginate(10);

        }elseif ($user->hasRole('employee')){
            $articles = Article::where('user_id', $user->id)->orderBy('id', 'DESC')->paginate(10);
        }       

        return view('article.all', [
            'articles' => $articles,
            'user' => $user
        ]);
    }   

    public function category($ID)
    {
        $user = Auth::user();
        $category = Categories::find($ID);

        if($user->hasRole('manager'))
        {
            $articles = User::join('articles', 'users.id', 'articles.user_id')
                ->select('users.email', 'articles.id', 'articles.category_id', 'articles.user_id', 'articles.title')
                ->where('users.manager_id', $user->id)
                ->where('articles.category_id', $ID)
                ->orderBy('articles.id', 'DESC')
                ->paginate(10);

        }elseif ($user->hasRole('employee')){
            $articles = Article::where('user_id', $user->id)->where('category_id', $ID)->orderBy('id', 'DESC')->paginate(10);
        }       

        return view('article.category', [
            'category' => $category,
            'articles' => $articles,
            'user' => $user
        ]);
    }

    public function employee($ID)
    {
        $user = Auth::user();
        $employee = User::find($ID);

        if($user->hasRole('manager'))
        {
            $articles = User::join('articles', 'users.id', 'articles.user_id')
                ->select('users.email', 'articles.id', 'articles.category_id', 'articles.user_id', 'articles.title')
                ->where('users.manager_id', $user->id)
                ->where('articles.user_id', $ID)
                ->orderBy('articles.id', 'DESC')
                ->paginate(10);

        }elseif ($user->hasRole('employee')){
            $articles = Article::where('user_id', $user->id)->where('user_id', $ID)->orderBy('id', 'DESC')->paginate(10);
        }       

        return view('article.employee', [
            'employee' => $employee,
            'articles' => $articles,
            'user' => $user
        ]);
    }

    public function article($ID)
    {
        $article = Article::find($ID);
        return view('article.full', [
            'article' => $article
        ]);
    }
}
