@extends('admin.layout.app',[ 'pageTitle' =>  'Course Categories' , 'activeGroup'  => 'course', 'activePage' => 'course_category'])
@section('content')
     <div class="container-fluid">

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                COURSE CATEGORY
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="{{ route('course.categories.create') }}" class="btn btn-sm btn-outline-primary"> New Category</a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">  <!-- js-basic-example -->
                                    <thead>
                                        <tr>
                                            <th></th>
                                            {{-- <th>Image</th> --}}
                                            <th>Title</th>
                                            <th>Courses</th>
                                            <th>Status</th>
                                            <th>Creation Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 0;
                                        @endphp
                                        @foreach($categories as $category)
                                        @php
                                            $i++;
                                        @endphp
                                        <tr>
                                            <td>{{$i}}</td>
                                            {{-- <td><img src="{{$category->title}}" alt="image"></td> --}}
                                            <td>{{$category->title}}</td>
                                            <td><a href="{{ route('course.categories.show',$category) }}">{{$category->courses->count()}}</a></td>
                                            <td>{{$category->getStatus()}}</td>
                                            <td>{{$category->created_at->format('M D d, Y')}}</td>
                                            <td>
                                                <form  action="{{ route('course.categories.destroy',$category) }}" method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <a href="{{ route('course.categories.show',$category) }}" class="btn btn-info sm">
                                                        <i class="material-icons">remove_red_eye</i>
                                                    </a>
                                                    <a href="{{ route('course.categories.edit',$category) }}" class="btn btn-success sm">
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                                    <button type="submit" class="btn btn-danger xs"  onclick=" return confirm('Are you sure you want to delete this item?');">
                                                        <i class="material-icons">delete</i>
                                                    </button>

                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
@stop
