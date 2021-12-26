@if ($paginator->hasPages())    
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">
        <div>
            <div>
                <p class="text-sm text-gray-700 leading-5">
                    {!! __('Showing') !!}
                    <span class="font-medium">{{ $paginator->firstItem() }}</span>
                    {!! __('to') !!}
                    <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    {!! __('of') !!}
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>

            <div style="margin-top: 10px;">
                <span style=" font-family: 
                        Mulish;font-weight: 200;
                        color: #000;
                        display: flex;
                        justify-content: space-evenly;
                        align-items: center;
                        width: 260px;">
                    {{-- Previous Page Link --}}
                    @if (!($paginator->onFirstPage()))
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" style="display: flex;" aria-label="{{ __('pagination.previous') }}">
                            <svg class="icon-ar icon-chevron-with-circle-left">
                                <use xlink:href="#icon-chevron-with-circle-left"></use>
                                <symbol id="icon-chevron-with-circle-left" viewBox="0 0 20 20">
                                    <path d="M11.302 6.776c-0.196-0.197-0.515-0.197-0.71 0l-2.807 2.865c-0.196 0.199-0.196 0.52 0 0.717l2.807 2.864c0.195 0.199 0.514 0.198 0.71 0 0.196-0.197 0.196-0.518 0-0.717l-2.302-2.505 2.302-2.506c0.196-0.198 0.196-0.518 0-0.718zM10 0.4c-5.302 0-9.6 4.298-9.6 9.6 0 5.303 4.298 9.6 9.6 9.6s9.6-4.297 9.6-9.6c0-5.302-4.298-9.6-9.6-9.6zM10 18.354c-4.615 0-8.354-3.74-8.354-8.354s3.739-8.354 8.354-8.354c4.613 0 8.354 3.74 8.354 8.354s-3.741 8.354-8.354 8.354z"></path>
                                </symbol>
                            </svg>
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span>{{ $element }}</span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page">
                                        <span style="font-weight: 600;">{{ $page }}</span>
                                    </span>
                                @else
                                    <a href="{{ $url }}" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" style="display: flex;" aria-label="{{ __('pagination.next') }}">
                            <svg class="icon-ar icon-chevron-with-circle-right">
                                <use xlink:href="#icon-chevron-with-circle-right"></use>
                                <symbol id="icon-chevron-with-circle-right" viewBox="0 0 20 20">
                                    <path d="M11 10l-2.302-2.506c-0.196-0.198-0.196-0.519 0-0.718 0.196-0.197 0.515-0.197 0.71 0l2.807 2.864c0.196 0.199 0.196 0.52 0 0.717l-2.807 2.864c-0.195 0.199-0.514 0.198-0.71 0-0.196-0.197-0.196-0.518 0-0.717l2.302-2.504zM10 0.4c5.302 0 9.6 4.298 9.6 9.6 0 5.303-4.298 9.6-9.6 9.6s-9.6-4.297-9.6-9.6c0-5.302 4.298-9.6 9.6-9.6zM10 18.354c4.613 0 8.354-3.74 8.354-8.354s-3.741-8.354-8.354-8.354c-4.615 0-8.354 3.74-8.354 8.354s3.739 8.354 8.354 8.354z"></path>
                                </symbol>
                            </svg>
                        </a>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif
