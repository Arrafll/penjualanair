<div class="col-12">
    <ul class="pagination pagination-rounded justify-content-end mb-3">
        @if ($paginator->lastPage() > 1)
        <li class="page-item">
            <a class="page-link {{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}" href="javascript: void(0);" aria-label="Previous">
                <span aria-hidden="true">«</span>
                <span class="visually-hidden">Previous</span>
            </a>
        </li>
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
        <li class="page-item {{ ($paginator->currentPage() == $i) ? ' active' : '' }}"><a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a></li>   
        @endfor
        <a class="page-link {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}" href="javascript: void(0);" aria-label="Next">
                <span aria-hidden="true">»</span>
                <span class="visually-hidden">Next</span>
            </a>
        </li>
        @else
        <li class="page-item active"><a class="page-link" href="javascript: void(0);">1</a></li>
        @endif
    </ul>
</div> <!-- end col-->