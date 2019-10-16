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
                        <a href="{{route('lectures.create')}}" class="btn btn-success mb-2">Pridėti paskaitą</a>
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
                                            <li class="m-2">
                                                <a href="{{route('files.setShow', $file)}}" class="btn btn-sm btn-success">{{$file->show == 1 ? 'Nerodyti' : 'Rodyti'}}</a>
                                                <a href="">{{$file->name}}</a>
                                            </li>
                                        @endforeach
                                </ul>
                                @endif
                                <div class="float-right">
                                    <a href="{{route('lectures.edit', $lecture)}}" class="btn btn-sm btn-success">Redaguoti paskaitą</a>
                                    <a href="{{route('lectures.delete', $lecture)}}" class="btn btn-sm btn-danger">Ištrinti paskaitą</a>
                                </div>
                            </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>

{{--TODO: show files in a table for better readability, move show buttton to the right, figure out file download!!!!!--}}

   {{-- <div class="float-left">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#fileModal">
            Pridėti failą
        </button>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="fileModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Failų įkėlimas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="custom-file">
                            <label class="btn btn-success btn-sm" for="customFile">Pasirinkite failą</label>
                            <input type="file" class="d-none" id="customFile" multiple>

                            <p id="file_names">

                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-sm btn-success">Įkelti</button>
                            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Atšaukti</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>--}}
@endsection

@section('scripts')
{{--TODO: show selected file names, fix back button--}}
@endsection
