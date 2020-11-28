
@if ($paginator->hasPages())
    
    <div class="pull-right pagination">
        <ul class="pagination btn-group">
            {{-- Previous Page Link --}}
            
            @if ($paginator->onFirstPage())
                <li class="disabled btn btn-outline-secondary" style="width:50px;height:30px;color:black;">
                    <span><i class="fa fa-angle-double-left"></i></span>
                </li>
            @else
                <a class="btn btn-outline-secondary" style="width:50px;height:30px;" href="{{ $paginator->previousPageUrl() }}">
                    <li >
                        <span><i class="fa fa-angle-double-left"></i></span>
                    </li>
                </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active btn btn-secondary" style="width:50px;height:30px;"><span>{{ $page }}</span></li>
                        @elseif (($page == $paginator->currentPage() + 1 || $page == $paginator->currentPage() + 2) || $page == $paginator->lastPage())
                            <a href="{{ $url }}" class="btn btn-outline-secondary" style="width:50px;height:30px;"><li  >{{ $page }}</li></a>
                        @elseif ($page == $paginator->lastPage() - 1)
                            <li class="disabled btn btn-outline-secondary" style="width:50px;height:30px;color:black;"><span><i class="fa fa-ellipsis-h"></i></span></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class=" btn btn-outline-secondary" style="width:50px;height:30px;">
                    <li >
                        <span><i class="fa fa-angle-double-right"></i></span>
                    </li>
                </a>
            @else
                <li class="disabled  btn btn-outline-secondary" style="width:50px;height:30px;color:black;">
                    <span><i class="fa fa-angle-double-right"></i></span>
                </li>
            @endif
        
        </ul>
        
    </div>
    
@endif