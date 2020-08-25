@extends('web.layouts.app' , ['title' => $course->title   , 'activePage' => 'course' , 'meta_keywords' => $course->meta_keywords , 'meta_description' => $course->meta_description , 'hide_footer' => true ])
@section('content')
  <main class="page-content">
    <div class="container">
        <h1 class="mt-3">Take Course Tests and get Certified!</h1>
            <div class="row mt-4">
                @php
                    $i = 0;
                @endphp
                @foreach ($tests as $test)
                @php
                    $i++;
                @endphp
                    <div class="card col-md-12 mb-3" style="padding: 10px">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Test {{$i}}</h4>
                                <p>
                                    {!! $test->title !!}
                                </p>
                            </div>
                            <div class="col-md-6 mb-2">
                                <p><b>No. of Questions:</b> {{$test->questions->count() }}</p>
                                <p><b>Estimated Duration:</b> {{$test->duration }} min(s)</p>
                                <p><b>Updated At:</b> {{ date('M d, Y', strtotime($test->updated_at)) }}</p>
                                <a href="{{ route('my_courses.start_test' , $test->id)}}" class="btn btn-sm btn-primary">Take Test</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
    </div>
</main>
@endsection
