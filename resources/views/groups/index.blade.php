@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Grupės</div>

                    <div class="card-body">
                        <table class=" table table-responsive-md">
                            <thead>
                            <tr>
                                <th>Kursas</th>
                                <th>Grupė</th>
                                <th>Pradžia</th>
                                <th>Pabaiga</th>
                                <th>Dėstytojas</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($groups as $group)
                            <tr>
                                <td>{{$group->course->name}}</td>
                                <td>{{$group->name}}</td>
                                <td>{{$group->begin_date}}</td>
                                <td>{{$group->end_date}}</td>
                                <td>{{$group->teacher->name}} {{$group->teacher->surname}}</td>
                                <td>
                                    <a href="{{route('groups.show', $group)}}" class="btn btn-sm btn-success">Daugiau</a>
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
@endsection
