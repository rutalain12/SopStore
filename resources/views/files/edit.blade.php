@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Upload Files</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('upload-files.edit') }}"> Back</a>
            </div>
        </div>
    </div>
    {!! Form::open(array('route' => ['upload-files.update', $product->id],'method'=>'POST','files'=>true)) !!}
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Name:</strong>
                {!! Form::text('name', '$product->name', array('placeholder' => 'Name','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Upload File:</strong>
                {!! Form::file('product_file', array('class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>SopName:</strong>
                {!! Form::textarea('sopName', '$product->sopName', array('placeholder' => 'SopName','class' => 'form-control','style'=>'height:100px')) !!}
            </div>
        </div>
        {{ Form::hidden('_method','PUT') }}
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection