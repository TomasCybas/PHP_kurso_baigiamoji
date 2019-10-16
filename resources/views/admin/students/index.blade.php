@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Studentai</div>

                    <div class="card-body">
                        <a href="{{route('register')}}" class="btn btn-success mb-2">Registruoti naują</a>
                        <!-- Button trigger modal -->

                        <button type="button" class="btn btn-success mb-2" data-toggle="modal"
                                data-target="#addStudentModal">
                            Priskirti studentus grupei
                        </button>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Vardas</th>
                                <th>Pavardė</th>
                                <th>El. pašto adresas</th>
                                <th>Telefonas</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <td>{{$student->name}}</td>
                                    <td>{{$student->surname}}</td>
                                    <td>{{$student->email}}</td>
                                    <td>{{$student->phone_number}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Studentų priskyrimas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('groupUsers.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="group_id">Grupė</label>
                            <select type="text" name="group_id" id="group_id"
                                    class="form-control custom-select @error('group_id') is-invalid @enderror" required>
                                <option value="0">Pasirinkite grupę</option>
                                @foreach($groups as $group)
                                    <option value="{{$group->id}}">{{$group->name}}</option>
                                @endforeach
                            </select>
                            @error('group_id')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        @foreach($students as $student)
                            <div class="form-group">
                                <input type="checkbox" name="user_id[]" id="user_id"
                                        class="form-check-inline @error('group_id') is-invalid @enderror" value="{{$student->id}}">
                                <label for="user_id" class="form-check-label">{{$student->name . ' ' . $student->surname}}</label>
                            </div>

                        @endforeach
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Atšaukti</button>
                            <button type="submit" class="btn btn-success">Išsaugoti</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
