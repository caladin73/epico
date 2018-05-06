@extends('layouts.default') 

@section('content') 


@foreach($jobs as $job)
<div id="jobList">
	<div class="freelance">
		<div class="fSection_1">
			<div class="fCont_1">
				<h2>
					{{$job->title}}
				</h2>
				<ul>
					<li>
						<b>Start dato: </b>
                        @if (isset($job->start_date))
                        {{$job->start_date}}
                        @else
                        Ukendt
                        @endif
					<li>
						<b>Job type: </b>
                        @if (isset($job->type))
                        {{$job->type}}
                        @else
                        Ukendt
                        @endif
                       </li>
					<li>
						<b>Lokation : </b>
                        @if (isset($job->location))
                        {{$job->location}}
                        @else
                        Ukendt
                        @endif
                        </li>
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


@endforeach 

@stop