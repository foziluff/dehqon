<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
        @if ($records->onFirstPage())
            <li class="page-item disabled">
                <span class="page-link">&laquo;</span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $records->previousPageUrl() }}" rel="prev">&laquo;</a>
            </li>
        @endif

        @for ($i = max(1, $records->currentPage() - 2); $i <= min($records->lastPage(), $records->currentPage() + 2); $i++)
            <li class="page-item {{ $i == $records->currentPage() ? 'active' : '' }}">
                <a class="page-link" href="{{ $records->url($i) }}">{{ $i }}</a>
            </li>
        @endfor

        @if ($records->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $records->nextPageUrl() }}" rel="next">&raquo;</a>
            </li>
        @else
            <li class="page-item disabled">
                <span class="page-link">&raquo;</span>
            </li>
        @endif
    </ul>
</nav>
