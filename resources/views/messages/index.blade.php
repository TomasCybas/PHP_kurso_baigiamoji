@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Gautos žinutės</div>

                    <div class="card-body">
                        <ul class="list-group-flush ">
                            @foreach($userGroups as $group)
                                <li class="list-group-item clearfix">
                                    <h2>{{$group->name}}</h2>
                                    <ul class="list-group-flush">
                                        @foreach($group->messages as $message)
                                            <li class="list-group-item">
                                                <h3>{{$message->title}}</h3>
                                                <br>
                                                <small><strong>Siuntėjas: </strong>{{$message->sender->name}} {{$message->sender->surname}}</small>
                                                <br>
                                                <small><strong>Data: </strong>{{$message->created_at}}</small>
                                                <p>
                                                    <strong>Žinutė:</strong> <br>
                                                    {!! $message->message !!}
                                                </p>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
