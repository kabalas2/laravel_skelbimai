@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <form class="form" method="post" action="{{ route('ad.store') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="title" class="form-control" placeholder="Pavadinimas">
                                <textarea name="content" class="form-control">

                                </textarea>
                                <input name="image" type="text" class="form-control" placeholder="image.jpg">
                                <input name="years" type="text" class="form-control" placeholder="1990">
                                <input name="vin" type="text" class="form-control" placeholder="vin">
                                <input name="price" type="number" class="form-control" placeholder="price">
                                <select name="color_id" class="form-control">
                                    <option>Color</option>
                                    @foreach($colors as $color)
                                        <option value="{{$color->id}}">{{$color->name}}</option>
                                    @endforeach
                                </select>
                                <select name="type_id" class="form-control">
                                    <option>Type</option>
                                    @foreach($types as $type)
                                        <option value="{{$type->id}}">{{$type->name}}</option>
                                    @endforeach
                                </select>
                                <input type="submit" value="Sukurti" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
