@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <strong>Grupė:</strong> {{$group->name}} <br>
                        <strong>Dėstytojas: </strong>{{$group->teacher->name}} {{$group->teacher->surname}} <br>
                        Paskaitos
                    </div>

                    <div class="card-body ">
                        <ul class="list-group-flush ">
                            @foreach($lectures as $lecture)
                                <li class="list-group-item clearfix">
                                    <h3>{{$lecture->name}}</h3>
                                    <small>{{$lecture->lecture_date}}</small>
                                    <p>
                                        {!! $lecture->description !!}
                                    </p>
                                    @if(count($lecture->files))
                                        <ul class="list-unstyled">

                                            <h4>Paskaitos failai</h4>
                                            @foreach($lecture->files as $file)
                                                @if($file->show != 0)
                                                    <li class="m-2">
                                                        <a href="{{asset('/storage/'.$file->name)}}">{{$file->name}}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--TODO: show files in a table for better readability(maybe)--}}

@endsection

@section('scripts')
    {{--TODO: fix back button--}}
@endsection
