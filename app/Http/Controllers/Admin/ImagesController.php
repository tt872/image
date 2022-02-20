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
        return view('image.create');
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
        return view('image.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    public function edit(Request $request)
    {
        // News Modelからデータを取得する
        $image = Image::find($request->id);
        if (empty($image)) {
            abort(404);
        }
        return view('image.edit', ['image_form' => $image]);
    }


    public function update(Request $request)
    {
        // Validationをかける
        $this->validate($request, Image::$rules);
        // News Modelからデータを取得する
        $image = Image::find($request->id);
        // 送信されてきたフォームデータを格納する
        $image_form = $request->all();
        if ($request->remove == 'true') {
            $image_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $image_form['image_path'] = basename($path);
        } else {
            $image_form['image_path'] = $image->image_path;
        }

        unset($image_form['image']);
        unset($image_form['remove']);
        unset($image_form['_token']);
        // 該当するデータを上書きして保存する
        $image->fill($image_form)->save();
        return redirect('image/edit');
    }
    public function delete(Request $request)
    {
        // 該当するNews Modelを取得
        $image = Image::find($request->id);
        // 削除する
        $image->delete();
        return redirect('image/edit');
    }
}
