@extends('layouts.admin')
@section('title', '登録済み画像の一覧')

@section('content')



<div class="container">
    <div class="row">
        <h2>画像一覧</h2>
    </div>
    <div class="row">
        <div class="col-md-4">
            <a href="{{ action('Admin\ImagesController@add') }}" role="button" class="btn btn-primary">新規作成</a>
        </div>
        <div class="col-md-8">
            <form action="{{ action('Admin\ImagesController@index') }}" method="get">
                <div class="form-group row">
                    <label class="col-md-2">タイトル</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                    </div>
                    <div class="col-md-2">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-primary" value="検索">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="list-news col-md-12 mx-auto">
            <div class="row">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th width="10%">ID</th>
                            <th width="20%">店番</th>
                            <th width="20%">店舗名</th>
                            <th width="20%">コメント</th>
                            <th width="20%">画像</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $image)
                        <tr>
                            <th>{{ $image->id }}</th>
                            <td>{{ str_limit($image->store_number, 100) }}</td>
                            <td>{{ str_limit($image->store_name, 100) }}</td>
                            <td>{{ str_limit($image->comment, 250) }}</td>
                            @if ($image->image_path)
                            <td><img src="{{ asset('storage/image/' . $image->image_path) }}" class="myimage"></td>
                            @endif
                            <td>
                                <div>
                                    <a href="{{ action('Admin\ImagesController@edit', ['id' => $image->id]) }}">編集</a>
                                </div>
                                <div>
                                    <a href="{{ action('Admin\ImagesController@delete', ['id' => $image->id]) }}">削除</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection