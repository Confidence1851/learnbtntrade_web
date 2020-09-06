@extends('web.layouts.app' , ['title' => $section->title   , 'activePage' => 'course' , 'meta_keywords' => $section->meta_keywords , 'meta_description' => $section->meta_description , 'hide_footer' => true ])
@section('content')
{{-- @php
    $hash = session()->get('video_hash');
    session()->forget('video_hash');
@endphp --}}
  <main class="page-content">
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-md-9">
                <div class="section_header">{!! $section->title !!}</div>
                <video src="" controls id="video_player"></video>
            </div>
            <div class="col-md-3">
                <div class="h4">Sections List</div>
                <div class="sections_list">
                    @foreach ($sections as $this_section)
                        <div class="section_item mb-3">
                            <div class="row">
                                <div class="col-10">
                                    <a href="#" onclick="return loadVideo('{{$this_section->title}}' ,'{{ route('my_courses.section_video', encrypt($this_section->id)) }}')" title="Play {{$this_section->title}}"> {{$this_section->title}}</a>
                                </div>
                                <div class="col-2">
                                    <span onclick="return handleShowResources(section_resource_{{$this_section->id}});">
                                        <i class="fa fa-caret-down btn" title="Resources for {{$this_section->title}}" style="float: right"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="section_resources d-none" id="section_resource_{{$this_section->id}}">
                            @foreach ($this_section->activeResources as $resource)
                                <div class="section_resource_item">
                                <a href="{{ route('my_courses.download_resource' , encrypt($resource->id))}}" title="Download {{$resource->filename}}"  onclick=" return confirm('You are about to download a file. Proceed?');">
                                        <i class="fa fa-file"></i>{{$resource->filename}}
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
                {{-- @if($course->activeTests->count() > 0)
                    <div class="section_footer text-center">
                        <a href="{{ route('my_courses.take_test' ,  ['id' => $section->course->id , 'slug' => $section->course->slug])}}" >
                            Take Test
                        </a>
                    </div>
                @endif --}}
            </div>
        </div>
    </div>
  </main>
@endsection
@section('scripts')
<script>
    function handleShowResources(target){
        $('.section_resources').addClass('d-none');

        try{
            $(target).toggleClass('d-none');
        }
        catch(e){
            console.log('Target not found');
        }
    }

    $(document).ready(function(){
        loadVideo('{{$this_section->title}}' ,'{{ route('my_courses.section_video', encrypt($this_section->id)) }}');
    });

    function getVideoData(title , url){
        
    }


    function loadVideo(title , url){
        $('.section_header').text(title);
        $('#video_player').attr('src' , url);

    }
</script>
@endsection
