@extends('layout.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css')}}">
@endsection

@section('content')
<aside class="sidebar">
    <h2>商品一覧</h2>
    <form class="search-form" action="/products/search" method="get">
        @csrf
        <input type="text" name="keyword" placeholder="商品名で検索" value="{{request('keyword')}}">
        <button type="submit">検索</button>

        <label for="price-sort">価格順で表示</label>
        <select id="price-sort" name="sort">
            <option value="">価格で並べ替え</option>
            <option value="asc" @selected(request('sort')==='asc' )>安い順</option>
            <option value="desc" @selected(request('sort')==='desc' )>高い順</option>
        </select>
    </form>

    @if(request('sort') === 'asc' || request('sort') === 'desc')
    <div class="filter-tags">
        <span class="tag">
            {{ request('sort') === 'asc' ? '安い順' : '高い順' }}
            <a href="{{ route('search', array_merge(request()->except('sort'))) }}" class="remove-tag">×</a>
        </span>
    </div>
    @endif </form>
</aside>
<section class="product-list">
    <a href="/products/register">
        <button class="add-btn">＋商品を追加</button>
    </a>

    <div class="grid">
        @foreach($products as $product)
        <div class="card">
            <a href="{{ route('show' , ['productId' => $product->id]) }}">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{$product->name}}">
                <div class="info">
                    <p>{{$product->name}}</p>
                    <span>¥{{$product->price}}</span>
                    <input type="hidden" name="id" value="{{$product->id}}">
                </div>
            </a>
        </div>
        @endforeach
    </div>
    <div class="pagination">
        {{ $products->links('vendor.pagination.default') }}
    </div>
</section>
@endsection