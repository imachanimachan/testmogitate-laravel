@extends('layout.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="container">
    <h1>商品登録</h1>
    <form method="POST" action="/products" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>商品名 <span class="required">必須</span></label>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="商品名を入力">
            @error('name')<span class="error">{{ $message }}</span>@enderror
        </div>
        <div class="form-group">
            <label>値段 <span class="required">必須</span></label>
            <input type="text" name="price" value="{{ old('price') }}" placeholder="値段を入力">
            @error('price')<span class="error">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>商品画像 <span class="required">必須</span></label>
            <input type="file" name="image" value="{{ old('image') }}">
            @error('image')<span class="error">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>季節 <span class="required">必須</span> <small class="note">複数選択可</small></label>
            <div class="seasons">
                @foreach($seasons as $season)
                <label><input type="checkbox" name="seasons[]" value="{{ $season->id }}"
                        {{ in_array($season->id, old('seasons', [])) ? 'checked' : '' }}>
                        {{$season->name}}
                </label>
                @endforeach
            </div>
                @error('seasons')<span class="error">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>商品説明 <span class="required">必須</span></label>
            <textarea name="description" placeholder="商品の説明を入力">{{ old('description') }}</textarea>
            @error('description')<span class="error">{{ $message }}</span>@enderror
        </div>
        <div class="form-buttons">
            <a href="/products" class="btn back">戻る</a>
            <button type="submit" class="btn register">登録</button>
        </div>
    </form>
</div>
@endsection