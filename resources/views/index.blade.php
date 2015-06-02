@extends('app')

@section('content')
<div class="container large-margin-top">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <form class="form" role="form" method="get" action="/search">
                    <div class="input-group">
                        <input class="form-control" id="postcode" name="postcode" type="text" placeholder="Enter a postcode"/>
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
