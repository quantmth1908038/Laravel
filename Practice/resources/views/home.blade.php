<?php
?>
@extends('layouts.app')

@section('content')
    <h1> Practive</h1>
    @include('errors.503')
    <div class="panel-body">
        <form action="{{url('search')}}" method="post" class="form-horizontal">
            {{csrf_field()}}

            <div class="form-group">
                <label for="search" class="col-sm-3 custom-control-label">Search</label>
                <div class="col-sm-6">
                    <input type="search" name="search" class="form-control">
                    <button type="submit" class="btn">
                        <i class=""></i>Search
                    </button>
                </div>
            </div>
        </form>
        @if(count($products)>0)
            @foreach($products as $product)
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th colspan="3">Title</th>
                    <th colspan="3">Price</th>
                    <th colspan="3">Image</th>
                </tr>
                <tr>
                    <th>{{$product->id}}</th>
                    <th colspan="3">{{$product->title}}</th>
                    <th colspan="3">{{$product->price}}</th>
                    <th colspan="3"><img src="{{$product->image}}"></th>
                    <th>
                        <form action="delete/{{$product->id}}" method="get">
                            {{csrf_field()}}

                            <button class="btn">Delete</button>
                            <input type="hidden" name="_method" value="Deleted">
                        </form>
                    </th>
                    <th>
                        <form action="up/{{$product->id}}" method="get">
                            {{csrf_field()}}
                            <button type="submit" class="btn">Update</button>
                        </form>
                    </th>
                </tr>
            </table>
            @endforeach
        @endif
        <form action="{{url('add')}}" method="get" class="form-horizontal">
            {{csrf_field()}}

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i>Add Product
                    </button>
                </div>
            </div>
        </form>

    </div>

@endsection
