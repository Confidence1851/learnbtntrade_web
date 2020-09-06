@extends('admin.layout.app',[ 'pageTitle' =>  'New Blog Post' , 'activeGroup'  => 'blog', 'activePage' => 'post'])
@section('content')
     <div class="container-fluid">

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                CREATE BLOG POST
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="{{ route('blog.posts.index') }}" class="btn btn-sm btn-outline-primary"> Back to list</a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <form action="{{ route('blog.posts.store')}}" method="post" enctype="multipart/form-data">@csrf
                                <div class="row">


                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="">Title</label>
                                            <input type="text" name="title" required class="form-control" required value="{{ old('title') }}">
                                            </div>
                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="">Subject</label>
                                            <input type="text" name="subject" required class="form-control" required placeholder="Use &#123;&#123;name&#125;&#125; to represent the person`s name">
                                            </div>
                                            @error('subject')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="">Body</label>
                                            <textarea id="ckeditor" type="text" name="body" class="form-control" placeholder="Use &#123;&#123;name&#125;&#125; to represent the person`s name" required>{!! old('body') !!}</textarea>
                                            </div>
                                            @error('body')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center ">
                                    <button type="submit" class="btn btn-success btn-lg "> Save </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
@stop
@section('scripts')
<script>
$(document).ready( function () {
    $('#receiversTable').DataTable();
} );

     $('#nextNewsLetterStepBtn').click(function(e){
        e.preventDefault();
         $('#home').removeClass('active');
         $('#home').removeClass('show');

         $('#receivers').addClass('active');
         $('#receivers').addClass('show');
    });
    $('#prevNewsLetterStepBtn').click(function(e){
        e.preventDefault();
         $('#home').addClass('active');
         $('#home').addClass('show');

         $('#receivers').removeClass('active');
         $('#receivers').removeClass('show');
    });

    $('#check_all_receivers').click(function(e){
        e.preventDefault();
        var btn = $(this);

        $('.thisReceiver').each(function(){
            $(this).prop( "checked", true );
        });

    });
    $('#uncheck_all_receivers').click(function(e){
        e.preventDefault();
        var btn = $(this);

        $('.thisReceiver').each(function(){
            $(this).prop( "checked", false );
        });
    });

    $('#send_newsletter').click(function(e){
        checked = [];

        $('.thisReceiver').each(function(){
            if($(this).prop("checked") == true){
                checked.push($(this).attr('id'));
            }
        });
        console.log(checked);
        $('#recipients').val(checked);
    });
</script>

@endsection

