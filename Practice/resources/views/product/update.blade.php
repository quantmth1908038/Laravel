<?php
?>
@extends('layouts.app')

@section('content')
    <h1> Practive</h1>
    @include('errors.503')
    <div class="panel-body">
        <form action="update/{{$id}}" method="get" class="form-horizontal">
            {{csrf_field()}}
            <div class="form_group">
                <label class="col-sm-3 control-label">Update Product</label>
                <div class="col-sm-6">
                    <div class="col-lg-1">Title</div>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="col-sm-6">
                    <div class="col-lg-1">Price</div>
                    <input type="number" name="price" class="form-control">
                </div>
                <div class="col-sm-6">
                    <div class="col-lg-1">Images</div>
                    <input type="text" name="images" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i>Update Product
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection