@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Nauja grupė</div>
                    <div class="card-body">
                        <form action="{{route('groups.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Grupės pavadinimas</label>
                                <input type="text" name="name" id="name"
                                       class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" required>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="course_id">Kursas</label>
                                <select type="text" name="course_id" id="course_id"
                                        class="form-control custom-select @error('course_id') is-invalid @enderror" required>
                                    <option value="0">Pasirinkite kursą</option>
                                    @foreach($courses as $course)
                                        <option value="{{$course->id}}">{{$course->name}}</option>
                                    @endforeach
                                </select>
                                @error('course_id')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="teacher_id">Dėstytojas</label>
                                <select type="text" name="teacher_id" id="teacher_id"
                                        class="form-control custom-select @error('teacher_id') is-invalid @enderror" required>
                                    <option value="0">Pasirinkite dėstytoją</option>
                                    @foreach($teachers as $teacher)
                                        <option value="{{$teacher->id}}" class="{{old('teacher_id')==$teacher->id ? 'selected': ''}}">
                                            {{$teacher->name}} {{$teacher->surname}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('teacher_id')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="begin_date">Pradžios data</label>
                                <input type="date" name="begin_date" id="begin_date"
                                       class="form-control @error('begin_date') is-invalid @enderror" value="{{old('begin_date')}}" required>
                                @error('begin_date')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="end_date">Pabaigos data</label>
                                <input type="date" name="end_date" id="end_date"
                                       class="form-control @error('end_date') is-invalid @enderror" value="{{old('end_date')}}" required>
                                @error('end_date')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success">Pridėti</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


