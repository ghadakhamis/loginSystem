@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   <div class="card-body">
                        @foreach($images as $image)
                            <div class="col-4">
                                {{$image->name}}
                            </div>    
                        @endforeach
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
