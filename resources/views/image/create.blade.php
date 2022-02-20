@extends('layouts.admin')
@section('title', '登録済み画像の一覧')

@section('content')



<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">

                <form action="{{ action('Admin\ImagesController@create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                    <ul>
                        @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="title">店番</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="store_number" value="{{ old('store number') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2" for="title">店舗名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="store_name" value="{{ old('store name ') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body">コメント</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="comment" rows="20{{ old('comment ') }}">
                            </textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="image">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>

</body>

@endsection