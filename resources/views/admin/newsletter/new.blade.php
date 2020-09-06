@extends('admin.layout.app',[ 'pageTitle' =>  'Course Section Information' , 'activeGroup'  => 'course', 'activePage' => 'course_all'])
@section('content')
     <div class="container-fluid">

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               NEW LETTER
                            </h2>

                        </div>
                        <div class="body">
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#home" aria-controls="information" role="tab" data-toggle="tab">Body</a></li>
                                    <li role="presentation" class=""><a href="#receivers" aria-controls="media" role="tab" data-toggle="tab">Receivers</a></li>
                                </ul>

                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="home">
                                        <div class="panel panel-default panel-post">

                                            <div class="panel-body">
                                                <div class="body">
                                                    <form action="{{ route('newsletters.send')}}" id="NewsForm" method="post" enctype="multipart/form-data">@csrf
                                                        <div class="row">

                                                            <input type="hidden" name="recipients" required id="recipientsValue" value="">
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
                                                                        <label for="">Message</label>
                                                                    <textarea id="ckeditor" type="text" name="message" class="form-control" placeholder="Use &#123;&#123;name&#125;&#125; to represent the person`s name" required>{!! old('message') !!}</textarea>
                                                                    </div>
                                                                    @error('message')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div role="tabpanel" class="tab-pane fade in" id="receivers">
                                        <div class="panel panel-default panel-post">

                                            <div class="panel-body">
                                                <div class="panel-heading">
                                                    <div class="header">
                                                        <h3>
                                                           Send to
                                                        </h3>
                                                        <ul class="header-dropdown m-r--5">
                                                            <li class="dropdown">
                                                               <button class="btn btn-success btn-sm" id="checkAllItems">Check All</button>
                                                               <button class="btn btn-danger btn-sm" id="uncheckAllItems">Uncheck All</button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="body">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="receiversTable">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Name</th>
                                                                        <th>Email</th>
                                                                        <th>Check</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($emails as $email)
                                                                    <tr>
                                                                        <td>
                                                                            {{ $email->name }}
                                                                            </td>
                                                                            <td>
                                                                            {{ $email->email }}
                                                                            </td>
                                                                            <td class="text-center">
                                                                                <div >
                                                                                    <span class="btn btn-sm checkItem" aria-checked="false" id="{{$email->id}}"> <i class="material-icons" style="color:red">cancel</i> </span>
                                                                                </div>
                                                                            </td>
                                                                    </tr>

                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>

                                                    {{-- <button type="button" class="btn btn-success" id="prevNewsLetterStepBtn">Previous</button> --}}
                                                        <button type="submit" class="btn btn-primary btn-lg" id="send_newsletter">Send</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
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


    $('#send_newsletter').click(function(e){
        var checked  = [];
        $('.checkItem').each(function(){
            var item = $(this);
            if(item.attr("aria-checked") == 'true'){
                checked.push(item.attr('id'));
            }
        });
        $('#recipientsValue').val(checked);
        $('#NewsForm').submit();
    });
</script>

@endsection

