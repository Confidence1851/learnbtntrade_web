@extends('agent.layout.app',[ 'pageTitle' =>  'Agent | Chats' , 'activeGroup'  => 'chats', 'activePage' => 'chats'])
@section('content')
<div class="container-fluid">
            <div class="row clearfix">
                <div class="col-xs-12">
                    <div class="card">
                        <div class="body">
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#chat_index" aria-controls="chat_index" role="tab" data-toggle="tab">Chats</a></li>
                                    <li role="presentation" class=""><a href="#chat_body" aria-controls="chat_body" role="tab" data-toggle="tab">Active Chat</a></li>
                                </ul>

                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="chat_index">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-md-6 h4 bold">Chat with clients</div>
                                                    <div class="col-md-6"><input type="text"class="form-control" name="search" id="search_chat"></div>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                <div class="">
                                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda, deserunt et minima totam quas magnam reiciendis sit, dolorem pariatur laboriosam amet ipsum ipsa culpa rerum neque eveniet labore quam? Numquam?
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div role="tabpanel" class="tab-pane fade in " id="chat_body">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <h3>holla</h3>
                                            </div>
                                            <div class="panel-body">

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
@stop
