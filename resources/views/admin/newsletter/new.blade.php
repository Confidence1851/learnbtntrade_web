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
                  <a href="{{route('news_subscribers')}}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
              </div>
          </div>
      <div class="row ">
        <div class="col-md-12">
        <form action="{{ route('send_letters') }}" id="newsletter_form" method="post" enctype="multipart/form-data"> @csrf @method('post')
        <div class="card">
                        <div class="body">
                            <div>

                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active show" id="home">
                                        <div class="panel panel-default panel-post container">
                                            <!--<div class="panel-heading">-->
                                            <!--    <h3>User Information</h3>-->
                                            <!--</div>-->
                                            <div class="panel-body mt-5">
                                                <input type="hidden" name="recipients" id="recipients" required>
                                               <div class="form-group mb-4">
                                                <label for="">Title</label>
                                                <input type="text" class="form-control" name="title" required autofocus value="{{old('title')}}">
                                                @if ($errors->has('title'))
                                                  <span id="title-error" class="error text-danger" for="input-name">{{ $errors->first('title') }}</span>
                                                @endif
                                              </div>
                                              <div class="form-group mb-2">
                                                <label for="">Subject</label>
                                                <input type="text" class="form-control" name="subject" required autofocus value="{{old('subject')}}" placeholder="Use &#123;&#123;name&#125;&#125; to represent the person`s name">
                                                @if ($errors->has('title'))
                                                  <span id="title-error" class="error text-danger" for="input-name">{{ $errors->first('subject') }}</span>
                                                @endif
                                              </div>
                                              <div class="form-group">
                                                <p><label for="">Message</label></p>
                                                <textarea type="text" class="form-control summernote"  name="message" required autofocus  placeholder="Use  &#123;&#123;name&#125;&#125; to represent the person`s name">{{old('message')}}</textarea>
                                                @if ($errors->has('message'))
                                                  <span id="message-error" class="error text-danger" for="input-message">{{ $errors->first('message') }}</span>
                                                @endif
                                              </div>
                                              <button type="button" class="btn btn-success" id="nextNewsLetterStepBtn">Next</button>

                                            </div>
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

