@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create Image</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                        <div class="card-body">
                            <form method="post" action="/images"  enctype="multipart/form-data">
                                <div class="form-group row">
                                    {{csrf_field()}}
                                    <label for="name">{{ __('Name') }}</label>
                                    <div class="col-md-6">
                                        <input id="name" type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"  value="{{ old('image') }}" required autofocus/>
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    {{csrf_field()}}
                                    <label for="image" >{{ __('Image') }}</label>

                                    <div class="col-md-6">
                                        <input id="image" type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" value="{{ old('image') }}" required autofocus>

                                        @if ($errors->has('image'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('image') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                
                               <input type="submit" value="Create" class="btn btn-success">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>    


@endsection