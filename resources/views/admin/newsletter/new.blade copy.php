@extends('admin.layout.app',[ 'pageTitle' =>  'Newsletter Subscribers' , 'activeGroup'  => 'referrals', 'activePage' => ''])

@section('content')
  <div class="content">
    <div class="container-fluid">
        @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
        <div class="row">
              <div class="col-md-12 text-right">
                  <a href="{{route('newsletters.index')}}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
              </div>
          </div>
        <div class="row ">
            <div class="col-md-12">
            <form action="{{ route('newsletters.send') }}" id="newsletter_form" method="post" enctype="multipart/form-data"> @csrf @method('post')
                <div class="card">
                    <div class="body">
                        <div>

                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active show" id="home">
                                    <div class="panel panel-default panel-post container">

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

                                <div role="tabpanel" class="tab-pane fade in " id="receivers">
                                    <div class="panel panel-default panel-post container">
                                        <div class="panel-heading">
                                            <h3>Send newsletter to
                                            <span class="btn btn-sm btn-success" id="check_all_receivers" style="float:right">Check All</span>
                                            <span class="btn btn-sm btn-warning" id="uncheck_all_receivers" style="float:right">Uncheck All</span>
                                            </h3>
                                        </div>
                                        <div class="panel-body">
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
                                                                {{ $email->firstname }} {{ $email->lastname }}
                                                                </td>
                                                                <td>
                                                                {{ $email->email }}
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" class="form-control thisReceiver" id="{{ $email->id }}">
                                                            </td>
                                                        </tr>

                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    <button type="button" class="btn btn-success" id="prevNewsLetterStepBtn">Previous</button>
                                    <button type="submit" class="btn btn-primary" id="send_newsletter">Send</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection
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

