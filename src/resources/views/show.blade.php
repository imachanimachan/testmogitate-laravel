 @extends('layout.app')

 @section('css')
 <link rel="stylesheet" href="{{ asset('css/show.css')}}">
 @endsection

 @section('content')

 <div class="container">
     <div class="breadcrumb">
         <a href="/products">商品一覧</a> > {{ $product->name}}
     </div>

     <form method="POST" action="" enctype="multipart/form-data">
         @csrf
         @method('PUT')

         <div class="product-edit">
             <div class="image-area">
                 <img src="{{ asset('storage/' . $product->image) }}" alt="{{$product->name}}"> <input type="file" name="image">
             </div>

             <div class="form-area">
                 <label>商品名</label>
                 <input type="text" name="name" value="{{ old('name', $product->name) }}">

                 <label>値段</label>
                 <input type="text" name="price" value="{{ old('price', $product->price) }}">

                 <label>季節</label>
                 <div class="seasons">
                     @foreach(['春', '夏', '秋', '冬'] as $season)
                     <label>
                         <input type="checkbox" name="seasons[]" value="{{ $season }}"
                             {{ $product->seasons->pluck('name')->contains($season) ? 'checked' : '' }}>
                         {{ $season }}
                     </label>
                     @endforeach
                 </div>

                 <label>商品説明</label>
                 <textarea name="description">{{ old('description', $product->description) }}</textarea>
             </div>
         </div>

         <div class="buttons">
             <a href="/products" class="btn back">戻る</a>
             <form action="" method="POST">
                 @csrf
                 <button type="submit" class="btn save">変更を保存</button>
                 <form action="" method="POST">
                     @csrf
                     <button type="submit" class="btn delete">🗑</button>
                 </form>
                 </button>
         </div>
     </form>
 </div>
 @endsection