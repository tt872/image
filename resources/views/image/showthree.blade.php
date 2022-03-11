@extends('layouts.admin')
@section('title', '画像の編集')

@section('content')
<div class="container">
    <h5>画像詳細</h5>
    <div class="row">

        @if ($image->imagethree_path)
        <div><img src="{{ asset('storage/image/' . $image->imagethree_path) }}" class="showimage"></div>
        @endif

    </div>
</div>
@endsection