@extends('templates.app')

@section('content')
    <div class="panel panel-default panel--parse_form">
        <div class="panel-heading">
            <h1>Enter the URL and see the magic</h1>
        </div>
        <div class="panel-body">
            <form action="{{ route('parse') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" name="url" placeholder="http://..." class="form-control"/>
                </div>
                <div class="form-group text-center">
                    <input type="submit" name="submit" value="Fetch Info" class="btn btn-success"/>
                </div>

            </form>

            <br/>

            @include('errors.validation')

            @if(isset($data))
                @if(count($data))
                    <div class="video-data text-center">
                        <p><strong>Source: </strong>{{ $data["provider_name"] }}</p>
                        <p><strong>Title: </strong>{{ $data["title"] }}</p>
                        <p><strong>Author: </strong>{{ $data["author_name"] }}</p>
                        {!! $data['html'] !!}
                    </div>

                @else
                    <div class="alert alert-danger" role="alert">No data for the URL has been found.</div>
                @endif
            @endif

        </div>
    </div>
@stop

