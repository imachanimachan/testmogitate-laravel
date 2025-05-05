 @extends('layout.app')

 @section('css')
 <link rel="stylesheet" href="{{ asset('css/show.css')}}">
 @endsection

 @section('content')

 <div class="container">
     <div class="breadcrumb">
         <a href="/products">商品一覧</a> > {{ $product->name}}
     </div>

     <form method="POST" action="{{ route('updata' , ['productId' => $product->id]) }}" enctype="multipart/form-data">
         @method('PATCH')
         @csrf
         <div class="product-edit">
             <div class="image-area">
                 <img src="{{ asset('storage/' . $product->image) }}" alt="{{$product->name}}"> <input type="file" name="image">
                 @error('image')<span class="error">{{ $message }}</span>@enderror
             </div>

             <div class="form-area">
                 <label>商品名</label>
                 <input type="text" name="name" value="{{ old('name', $product->name) }}">
                 <input type="hidden" name="id" value="{{$product->id}}">
                 @error('name')<span class="error">{{ $message }}</span>@enderror

                 <label>値段</label>
                 <input type="text" name="price" value="{{ old('price', $product->price) }}">
                 @error('price')<span class="error">{{ $message }}</span>@enderror

                 <label>季節</label>
                 <div class="seasons">
                     @foreach($allseasons as $season)
                     <label>
                         <input type="checkbox" name="seasons[]" value="{{ $season->id }}"
                             {{ $product->seasons->contains($season->id) ? 'checked' : '' }}>
                         {{ $season->name }}
                     </label>
                     @endforeach
                 </div>
                 @error('seasons')<span class="error">{{ $message }}</span>@enderror


                 <label>商品説明</label>
                 <textarea name="description">{{ old('description', $product->description) }}</textarea>
                 @error('description')<span class="error">{{ $message }}</span>@enderror
             </div>
         </div>

         <div class="buttons">
             <button type="submit" class="btn save">変更を保存</button>
             <input type="submit" name="back" class="btn back" value="戻る"></input>
         </div>
     </form>
     <form action="{{ route('delete' , ['productId' => $product->id]) }}" method="POST">
         @method('DELETE')
         @csrf
         <div class="buttons">
             <input type="hidden" name="id" value="{{$product->id}}">
             <button type="submit" class="btn delete">🗑</button>
         </div>
     </form>
 </div>


 @endsection