<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>image</title>
</head>

<body>


    <div class="container">
        <div class="row">
            <h2>画像一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Index\ImagesController@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Image\ImagesController@index') }}" method="get">
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
                                <th width="50%">コメント</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $image)
                            <tr>
                                <th>{{ $image->id }}</th>
                                <td>{{ str_limit($image->store number, 100) }}</td>
                                <td>{{ str_limit($image->store name, 100) }}</td>
                                <td>{{ str_limit($image->comment, 250) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>