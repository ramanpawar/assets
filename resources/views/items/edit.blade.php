@extends('layouts.app')

@section('content')
<form action="/items/{{$item->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="container card px-3 py-3 mb-3">
        <h4>Update master</h4>
        
        
            <div class="row">
            <div class="form-group col-md-6 col-sm-6">
                    <label for="make">Make</label>
                    <input type="text" name="make" class="form-control" placeholder="Brand name" value="{{$item->make}}">   
                </div> 
            <div class="form-group col-md-6 col-sm-6">
                    <label for="category">Category</label>
                    <select name="category" class="form-control" id="category">
                        <option disabled selected>Select</option>
                        @foreach ($category as $cat)
                            <option value="{{$cat->id}}" @if ($item->category == $cat->id)
                                selected='selected'
                            @endif>{{$cat->name}}</option>
                        @endforeach    
                    </select>   
                </div> 
            </div>

            <div class="row">
                <div class="form-group col-md-12">
                    <label for="description">Description</label>
                    <input type="text" name="description" class="form-control" placeholder="Enter model details" value="{{$item->description}}">
                </div>
            </div>

            
        
    </div>

    
        @if ($item->category == '2')
        <div id="specification" class="container card mb-3">
            <div class="row mx-3 my-3">
                    <div class="form-group col-md-4">
                        <label for="processor">Processor</label>
                        <input type="text" name="processor" class="form-control" placeholder="Enter model details" value="{{$item->spec->processor}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="ram">RAM</label>
                        <input type="text" name="ram" class="form-control" placeholder="Enter model details" value="{{$item->spec->ram}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="hdd">HDD</label>
                        <input type="text" name="hdd" class="form-control" placeholder="Enter model details" value="{{$item->spec->hdd}}">
                    </div>
            </div>
        </div>
        @endif
    
    <input type="submit" value="Save" class="btn btn-primary offset-1">

</form>
    
@endsection

@section('script')
        
@endsection