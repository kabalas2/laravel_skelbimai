@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
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
                                <select name="manufacturer_id" class="form-control">
                                    <option>Manufacturer</option>
                                    <option value="1">AUdi</option>
                                    <option value="2">Bmw</option>
                                    <option value="3">Citroen</option>
                                    <option value="4">Dacia</option>
                                </select>
                                <select name="model_id" class="form-control">
                                    <option>Model</option>
                                    <option value="1">A4</option>
                                    <option value="1">A6</option>
                                    <option value="2">320</option>
                                    <option value="2">530</option>
                                    <option value="3">C4</option>
                                    <option value="3">C3</option>
                                    <option value="4">Seran</option>
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
