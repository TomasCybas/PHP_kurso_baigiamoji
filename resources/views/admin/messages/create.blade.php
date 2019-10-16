@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                 <form action="{{route('messages.store', Auth::user())}}" method="POST">
                     @csrf
                     <div class="form-group">
                         <label for="group_id">Grupė</label>
                         <select type="text" name="group_id" id="group_id" class="form-control @error('group_id') is-invalid @enderror" required>
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
                     <div class="form-group">
                         <label for="title">Antraštė</label>
                         <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                                value="{{old('title')}}" placeholder="Antraštė" required>
                         @error('title')
                         <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                         @enderror
                     </div>
                     <div class="form-group">
                         <label for="message">Žinutė</label>
                         <textarea type="text" name="message" rows="5" id="message"
                                   class="form-control @error('message') is-invalid @enderror">

                         </textarea>
                         @error('message')
                         <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                         @enderror
                     </div>
                     <button type="submit" class="btn btn-success">Siųsti</button>
                 </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        tinymce.init({selector:'#message'});
    </script>
@endsection
