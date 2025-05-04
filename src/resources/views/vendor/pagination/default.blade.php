@if ($paginator->hasPages())
<div class="pagination" style="text-align: center; margin-top: 20px;">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
    <span>＜</span>
    @else
    <a href="{{ $paginator->previousPageUrl() }}">＜</a>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
    {{-- "Three Dots" Separator --}}
    @if (is_string($element))
    <span>{{ $element }}</span>
    @endif

    {{-- Array Of Links --}}
    @if (is_array($element))
    @foreach ($element as $page => $url)
    @if ($page == $paginator->currentPage())
    <span style="margin: 0 4px; font-weight: bold;">{{ $page }}</span>
    @else
    <a href="{{ $url }}" style="margin: 0 4px;">{{ $page }}</a>
    @endif
    @endforeach
    @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
    <a href="{{ $paginator->nextPageUrl() }}">＞</a>
    @else
    <span>＞</span>
    @endif
</div>
@endif