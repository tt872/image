<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Image;

class ImagesController extends Controller
{
    //
    public function add()
    {
        return view('index.create');
    }
    public function create(Request $request)
    {
        $this->validate($request, Image::$rules);

        $image = new Image;
        $form = $request->all();


        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $image->image_path = basename($path);
        } else {
            $image->image_path = null;
        }

        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        unset($form['image']);

        // データベースに保存する
        $image->fill($form);
        $image->save();
        return redirect('admin/image/create');
    }
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            // 検索されたら検索結果を取得する
            $posts = Image::where('title', $cond_title)->get();
        } else {
            // それ以外はすべてのニュースを取得する
            $posts = Image::all();
        }
        return view('admin.image.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
}
