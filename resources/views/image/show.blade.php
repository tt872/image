@extends('layouts.admin')
@section('title', '画像の編集')

@section('content')
<div class="container">
    <h5>画像詳細</h5>
    <div class="row">

        @if ($image->image_path)
        <div><img src="{{ asset('storage/image/' . $image->image_path) }}" class="showimage"></div>
        @endif
    </div>
</div>
@endsection