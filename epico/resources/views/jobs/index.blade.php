@extends('layouts.default')
@section('content')



<div id="container">
    <div id="cTop">
        <div id="cPicContainer">
            <div id="cJobPic" style="background-image: url('/img/zara.png');"></div>
        </div>
        <div id="jobTitle">
            <h2>
                {{$job->title}}
            </h2>
        </div>
    </div>

    <div class="middle_flex">

        <a href="/" class="back_button">
            <img src="/img/arrow.svg" />
        </a>
    </div>
    <div id="contentJob">
        <div id="jobDesc">
            <h3>
                 {{$job->title}}
            </h3>
            <span>
                    Start dato: {{$job->start_date}}. Varighed:   
                     @if (isset($job->end_date))
                        {{$job->end_date}}
                        @else
                        Ukendt
                        @endif
            </span>
            <p>
                {{$job->description}}
            </p>
            <p>
                <b>For mere infomation kontakt:</b>
            </p>
            <span>
                    {{$contact->street}}
                <br> {{$contact->contact_type}}
                <br> T: {{$contact->phone_number}}
                    <br> E: {{$contact->email}}
                    <br>
                </span>
        </div>
    </div>
</div>

@stop
