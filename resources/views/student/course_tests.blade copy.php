@extends('web.layouts.app' , ['title' => $course->title   , 'activePage' => 'course' , 'meta_keywords' => $course->meta_keywords , 'meta_description' => $course->meta_description , 'hide_footer' => true ])
@section('content')
  <main class="page-content">
    <div class="container">
        <h1 class="mt-3">Take Course Tests and get Certified!</h1>
        <form action="{{ route('my_courses.submit_tests') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="course_id" value="{{encrypt($course->id)}}">
            <div class="row mt-4">
                @foreach ($questions as $question)
                    <div class="card col-12 mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Question 1</h4>
                                <p>
                                    {!! $question->question !!}
                                </p>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="form-group">
                                    <textarea name="answer[text_{{$question->id}}]" id="" class="form-control mt-3" rows="4" placeholder=" Enter answer for this question here..."></textarea>
                                </div>
                                <div class="form-group">
                                    <input name="answer[file_{{$question->id}}]" type="file">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="form-footer">
                <button class="btn-success btn btn-block">Submit Tests</button>
            </div>
        </form>
    </div>
</main>
@endsection
