@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$course->name}}</div>
                    <div class="card-body">
                        <form action="{{route('courses.update', $course)}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Kurso pavadinimas</label>
                                <input type="text" name="name" id="name"
                                       class="form-control @error('name') is-invalid @enderror" value="{{old('name') == '' ? $course->name : old('name')}}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Aprašymas</label>
                                <script>tinymce.init({selector:'#description'});</script>
                                <textarea id="description" rows="15" name="description"
                                          class="form-control @error('description') is-invalid @enderror">
                                    {{old('description') == '' ? $course->description : old('description')}}
                                </textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success">Išsaugoti</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

