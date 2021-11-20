<?php

namespace App\Http\Controllers\Article;

use App\Article;
use App\Categories;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class EditController extends Controller
{
    public function index(Request $request, $ID)
    {
        $categories = Categories::orderBy('name', 'ASC')->get();
        $article = Article::find($ID);

        if(isset($_POST['update']))
        {
            $category = $request->input('category');
            $title = $request->input('title');
            $image = $request->file('image');

            $path = public_path().'/upload/';
            $filename = '';

            if(!empty($image))
            {
                $filename = Str::random(20) . 'jpg' ?: 'jpg';
                $default_image = Image::make($image)->resize(640, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $default_image->save($path . $filename);
            }

            Article::find($ID)->update([
                'category_id' => $category,
                'title' => $title,
                'image' => $filename
            ]);

            return redirect('/');
        }
        
        return view('article.update', [
            'categories' => $categories,
            'article' => $article
        ]);
    }
}
