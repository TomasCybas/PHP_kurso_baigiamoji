@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Išsiųstos žinutės</div>

                    <div class="card-body">
                        <a href="{{route('messages.create', $user)}}" class="btn btn-success mb-2">Rašyti žinutę</a>
                        <ul class="list-group-flush ">
                            @foreach($messages as $message)
                                <li class="list-group-item clearfix">
                                    <h3>{{$message->title}}</h3>
                                    <small><strong>Grupė: </strong> {{$message->group->name}}</small>
                                    <br>
                                    <small><strong>Data: </strong>{{$message->created_at}}</small>
                                    <p>
                                        <strong>Žinutė:</strong> <br>
                                        {!! $message->message !!}
                                    </p>
                                    <div class="float-right">
                                        <a href="{{route('messages.delete', [$message, $user])}}" class="btn btn-sm btn-danger">Ištrinti</a>
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
