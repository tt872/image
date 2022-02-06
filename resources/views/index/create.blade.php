<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Scripts -->
    {{-- Laravel標準で用意されているJavascriptを読み込みます --}}
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    {{-- Laravel標準で用意されているCSSを読み込みます --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- この章の後半で作成するCSSを読み込みます --}}
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

</head>


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
                            <input type="text" class="form-control" name="store number" value="{{ old('store number') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2" for="title">店舗名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="store name" value="{{ old('store name ') }}">
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

</html>