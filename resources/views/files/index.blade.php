@extends('layouts.app')
@section('content')
 <div class="row">
   <div class="col-lg-12 margin-tb">
      <div class="pull-left">
         <center><h2>List of Files</h2></center>
            </div>
                <div class="pull-left"><br>
                   <a class="btn btn-success" href="{{ route('upload-files.create') }}"> Upload New File</a>
                       </div><br>
                          <form action="{{ route('upload-files.index') }}" method="   get">
                             {{ csrf_field() }}
                                <div class="input-group">
                                   <input type="text" class="form-control" name="q"   placeholder="Search"><span class="            input-group-btn">
                                           <button type="submit" class="btn btn-success">Search</button>
                                       </span>
                                     </div>
                                   </form>
                                </div>
                             </div>
                           <br>
     <table class="table table-bordered">
        <tr>
          <th>No</th>
          <th>Name</th>
          <th>SopName</th>
          <th>FileName</th>
            {{--  <th>Action</th> --}}
        </tr>

    @foreach ($products as $product)
      <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->sopName }}</td>
        <td>
        <a href='{{ asset("files/$product->product_file") }}'>{{ $product->product_file }}</a>
        </td>
     {{-- <td><a href="/files/{{ $product->id }}/edit" class="btn btn-info">Edit</a>
        <a href="/files/{{ $product->$i }}/delete" class="btn btn-danger">Delete </a>
     </td> --}}
           </tr>
         @endforeach
    </table>
{!! $products->render() !!}
@endsection