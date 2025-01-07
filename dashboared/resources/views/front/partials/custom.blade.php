@if ($paginator->hasPages())
    <div class="flex-c-m flex-w w-full p-t-38">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a class="flex-c-m how-pagination1 trans-04 m-all-7 disabled" aria-disabled="true">
                &laquo;
            </a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="flex-c-m how-pagination1 trans-04 m-all-7">
                &laquo;
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <a class="flex-c-m how-pagination1 trans-04 m-all-7 disabled">{{ $element }}</a>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a class="flex-c-m how-pagination1 trans-04 m-all-7 active-pagination1">{{ $page }}</a>
                    @else
                        <a href="{{ $url }}" class="flex-c-m how-pagination1 trans-04 m-all-7">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="flex-c-m how-pagination1 trans-04 m-all-7">
                &raquo;
            </a>
        @else
            <a class="flex-c-m how-pagination1 trans-04 m-all-7 disabled" aria-disabled="true">
                &raquo;
            </a>
        @endif
    </div>
@endif
