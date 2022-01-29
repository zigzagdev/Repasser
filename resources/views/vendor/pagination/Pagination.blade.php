{{--pagination_area--}}


@if ($paginator->hasPages())
  <ul style="font-size: 21px" role="navigation">
    <li class="page-item {{ $paginator->onFirstPage() ? ' disabled' : '' }}">
      <a class="page-link" href="{{ $paginator->url(1) }}"><<</a>
    </li>
    @foreach ($elements as $element)
      @if (is_string($element))
        <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
      @endif
      @if (is_array($element))
        @foreach ($element as $page => $url)
          @if ($page == $paginator->currentPage())
            <li class="active" aria-current="page"><span>&nbsp;{{ $page }}</span></li>
            &nbsp;/&nbsp;
            <li class="active" aria-current="page"><span>{{ $paginator->lastPage() }}&nbsp;</span></li>
          @endif
        @endforeach
      @endif
    @endforeach
    <li class="page-item {{ $paginator->currentPage() == $paginator->lastPage() ? ' disabled' : '' }}">
      <a class="page-link" href="{{ $paginator->nextPageUrl() }}">></a>
    </li>
  </ul>
@endif
