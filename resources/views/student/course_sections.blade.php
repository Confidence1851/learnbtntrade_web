@extends('web.layouts.app' , ['title' => $section->title   , 'activePage' => 'course' , 'meta_keywords' => $section->meta_keywords , 'meta_description' => $section->meta_description , 'hide_footer' => true ])
@section('style')
<link rel="stylesheet" href="https://cdn.plyr.io/3.6.3/plyr.css" />
@endsection
@section('content')
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
                        <div class="mb-3">
                            <div class="section_item mb-1">
                                <div class="row">
                                    <div class="col-10">
                                        <a href="{{ route('my_courses.take_course' , ['id' => $this_section->id , 'slug' => $this_section->slug ])}}" class=""  title="Play {{$this_section->title}}"> {{$this_section->title}}</a>
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
                                    <a href="{{ route('my_courses.download_resource' , $resource->id)}}" title="Download {{$resource->filename}}"  onclick=" return confirm('You are about to download a file. Proceed?');">
                                            <i class="fa fa-file"></i>{{$resource->filename}}
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                @if($course->activeTests->count() > 0)
                    <div class="section_footer text-center">
                        <a href="{{ route('my_courses.take_test' ,  ['id' => $section->course->id , 'slug' => $section->course->slug])}}" >
                            Take Test
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
  </main>
@endsection
@section('scripts')
<script src="https://cdn.plyr.io/3.6.3/plyr.js"></script>
<script>
    const player = new Plyr('#video_player' , {
        controls: [
            'play-large', // The large play button in the center
            'restart', // Restart playback
            'rewind', // Rewind by the seek time (default 10 seconds)
            'play', // Play/pause playback
            'fast-forward', // Fast forward by the seek time (default 10 seconds)
            'progress', // The progress bar and scrubber for playback and buffering
            'current-time', // The current time of playback
            'duration', // The full duration of the media
            'mute', // Toggle mute
            'volume', // Volume control
            'captions', // Toggle captions
            'settings', // Settings menu
            'pip', // Picture-in-picture (currently Safari only)
            'airplay', // Airplay (currently Safari only)
            'download', // Show a download button with a link to either the current source or a custom URL you specify in your options
            'fullscreen', // Toggle fullscreen
        ],
        urls: {
            download: '{{  route('my_courses.section_video',$section->id)  }}',
        },
    });
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
        loadVideo('{{$section->title}}' ,'{{ route('my_courses.section_video',$section->id) }}');
    });

    
function loadVideo(title, url) {
    $('.section_header').text(title);
    $('#video_player').attr('src', url);
    
}



</script>
@endsection
