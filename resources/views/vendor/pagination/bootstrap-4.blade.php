    @if ($paginator->hasPages())
        <nav>
            <ul class="pagination">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <a class="p_prev">
                        <svg xmlns="http://www.w3.org/2000/svg" width="9.414" height="16.828"
                            viewBox="0 0 9.414 16.828">
                            <path id="Icon_feather-chevron-left" data-name="Icon feather-chevron-left"
                                d="M20.5,23l-7-7,7-7" transform="translate(-12.5 -7.586)" fill="none" stroke="#1a2224"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            </path>
                        </svg>
                    </a>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" class="p_prev">
                        <svg xmlns="http://www.w3.org/2000/svg" width="9.414" height="16.828"
                            viewBox="0 0 9.414 16.828">
                            <path id="Icon_feather-chevron-left" data-name="Icon feather-chevron-left"
                                d="M20.5,23l-7-7,7-7" transform="translate(-12.5 -7.586)" fill="none" stroke="#1a2224"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            </path>
                        </svg>
                    </a>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <a class="cdp_i active">{{ $element }}</a>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <a class="cdp_i active">{{ $page }}</a>
                            @else
                                <a href="{{ $url }}" class="cdp_i">{{ $page }}</a>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" class="p_next">
                        <svg width="10" height="16" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.5 1L8.5 8L1.5 15" stroke="#35343E" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>
                    </a>
                @else
                    <a class="p_next">
                        <svg width="10" height="16" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.5 1L8.5 8L1.5 15" stroke="#35343E" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>
                    </a>
                @endif
            </ul>
        </nav>
    @endif
