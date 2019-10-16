@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Kursai</div>

                    <div class="card-body">
                        <a href="{{route('courses.create')}}" class="btn btn-success m-2">Sukurti naują kursą</a>

                        <ul class="list-group-flush">
                            @foreach($courses as $course)
                                <li class="list-group-item clearfix">
                                    <h4>{{$course->name}}</h4>
                                    <p>
                                        {!! $course->description !!}
                                    </p>
                                    <div class="float-right">
                                        <a href="{{route('courses.edit', $course)}}" class="btn btn-sm btn-success">Redaguoti</a>
                                        <a href="{{route('courses.delete', $course)}}" class="btn btn-sm btn-danger">Ištrinti</a>
                                    </div>
                                </li>
                            @endforeach

                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
