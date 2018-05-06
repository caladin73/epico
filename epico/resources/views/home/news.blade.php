@extends('layouts.default')
@section('content')
    <div class="news-container">
        @foreach($newsList as $news)
            <div class="news-box">
                <?php
                    printf("<h1>%s</h1>\n", $news['headline']);
                    print($news->asXML());
                ?>
            </div>
        @endforeach
    </div>
    <script src="/js/news.js"></script>
@stop
