<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Collect;
use Carbon\Carbon;
use App\History;

class ImagesController extends Controller
{
    //
    public function add()
    {
        return view('image.create');
    }

    public function create(Request $request)
    {
        $this->validate($request, Collect::$rules);
        $collect = new Collect();
        $form = $request->all();


        if (isset($form['imageone'])) {
            $pathone = $request->file('imageone')->store('public/image');
            $collect->imageone_path = basename($pathone);;
        } else {
            $collect->imageone_path = null;
        }

        if (isset($form['imagetwo'])) {
            $pathtwo = $request->file('imagetwo')->store('public/image');
            $collect->imagetwo_path = basename($pathtwo);;
        } else {
            $collect->imagetwo_path = null;
        }

        if (isset($form['imagethree'])) {
            $paththree = $request->file('imagethree')->store('public/image');
            $collect->imagethree_path = basename($paththree);;
        } else {
            $collect->imagethree_path = null;
        }

        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        unset($form['imageone']);
        unset($form['imagetwo']);
        unset($form['imagethree']);

        // データベースに保存する
        $collect->fill($form);
        $collect->save();
        return redirect('admin/image/create');
    }
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            // 検索されたら検索結果を取得する
            $posts = Collect::where('store_name', $cond_title)->get();
        } else {
            // それ以外はすべてのニュースを取得する
            $posts = Collect::all();
        }
        return view('image.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }

    public function show(Request $request)
    {
        $image = Collect::find($request->id);

        return view('image.showone', ['image' => $image, 'image_index' => $request->image_index]);
    }

    public function delete(Request $request)
    {

        $image = Collect::find($request->id);
        // 削除する
        $image->delete();
        return redirect('admin/image/index');
    }
}
