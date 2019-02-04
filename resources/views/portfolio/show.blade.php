@extends('layouts.main')

@section('content')
    <div class="cont">
        <section class="portfolio-single type-3 top_90 row">
            <div class="col-md-8 offset-md-2 text-center">
                <div class="breadcrumbs top_15 bottom_15">
                    {{ Breadcrumbs::render('portfolio.show', $item) }}
                </div>
                <h1 class="title bottom_45 top_45">{{ $item->title }}</h1>
                <p class="bottom_30">{!! $item->description  !!}</p>
                <ul style="text-align: left; margin-bottom: 30px;" class="information">
                    <li><span>@lang('custom.date'):</span> {{ \Date::parse($item->published_at)->format('j F Y') }}</li>
                    @if( $item->link )
                        <li>
                            <span>@lang('custom.link'): </span>
                            <form target="_blank" style="display: inline;" action="{{ hide_redirect($item->link) }}"
                                  method="post">
                                @csrf
                                <button class="link-style" type="submit">открыть</button>
                            </form>
                    @endif
                    <li><span>@lang('custom.categories'):</span>
                        @foreach($item->categories as $category)
                            <a target="_blank"
                               href="{{ route('portfolio.category.show', $category->slug) }}">{{ $category->title }}</a>
                        @endforeach
                    </li>
                </ul>
                @if($htmlItems)
                    <ul style="text-align: left; display: block;" class="information">
                        <li>
                            <span>@lang('custom.html'): </span>
                            @foreach($htmlItems as $html)
                                <form target="_blank" style="display: inline;" action="{{ hide_redirect($html->url) }}"
                                      method="post">
                                    @csrf
                                    <button class="link-style" type="submit">{{ $html->title }}</button>
                                </form>
                            @endforeach
                        </li>
                    </ul>
                @endif
            </div>

            <div class="col-md-12 portfolio-images top_90">
                {!! $item->content !!}
            </div>

            <div class="col-md-12 portfolio-nav text-center top_90">
                <a class="port-next" href="{{ route('portfolio.show', $next->slug) }}">
                    <div class="nav-title">@lang('custom.next')</div>
                    <div class="next-title">{{ $next->title }}</div>
                </a>
            </div>

        </section>

    </div> <!-- cont end -->
@endsection
