@extends('layouts.default') 

@section('content')
    <div id="jobList">
        <div class="job">
            <div class="jSection_1">
                <div class="listCont_1">
                    <div class="listPic" style="background-image: url('assets/img/zara.png');"></div>
                </div>
                <div class="listCont_2">
                    <h2>
                        {{$job->title}}
                    </h2>
                    <ul>
                        @if($job->location != null)
                            <li><b>Location: </b> {{$job->location}}</li>
                        @endif

                        @if($job->deadline != null)
                            <li><b>Deadline: </b> {{$job->deadline}}</li>
                        @endif

                        @if($job->duration != null)
                            <li><b>Type: </b> {{$job->type}}</li>
                        @endif

                    </ul>
                </div>
            </div>
            <div class="jSection_2">
                <span>Added 9 Days ago</span>
                <span>147 views</span>
                <a href="/jobs/job/{{$job->guid}}">More</a>
            </div>
        </div>
    </div>
@stop
