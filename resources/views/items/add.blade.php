@extends('layouts.app')

@section('content')
<form action="{{route('items.store')}}" method="POST">
    @csrf
    <div class="container card px-3 py-3 mb-3">
        <h4>Add items master</h4>
        
        
            <div class="row">
            <div class="form-group col-md-6 col-sm-6">
                    <label for="make">Make</label>
                    <input type="text" name="make" class="form-control" placeholder="Brand name">   
                </div> 
            <div class="form-group col-md-6 col-sm-6">
                    <label for="category">Make</label>
                    <select name="category" class="form-control" id="category">
                        <option disabled selected>Select</option>
                        @foreach ($category as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach    
                    </select>   
                </div> 
            </div>

            <div class="row">
                <div class="form-group col-md-12">
                    <label for="description">Description</label>
                    <input type="text" name="description" class="form-control" placeholder="Enter model details">
                </div>
            </div>

            
        
    </div>

    <div id="specification" class="container card mb-3">
        
    </div>
    <input type="submit" value="Save" class="btn btn-primary offset-1">

</form>
    
@endsection

@section('script')
        $(document).ready(function(){
            $('#specification').css('display','none');
            
            $('#category').change(function (e) { 
                if($('#category').children('option:selected').html() == 'Computer'){
                    $('#specification').css('display','block');
                    var data = '<div class="row mx-3 my-3">' +
                                '<div class="form-group col-md-4">'+
                                    '<label for="processor">Processor</label>'+
                                    '<input type="text" name="processor" class="form-control" placeholder="Enter model details">'+
                                '</div>'+
                                '<div class="form-group col-md-4">'+
                                    '<label for="ram">RAM</label>'+
                                    '<input type="text" name="ram" class="form-control" placeholder="Enter model details">'+
                                '</div>'+
                                '<div class="form-group col-md-4">'+
                                    '<label for="hdd">HDD</label>'+
                                    '<input type="text" name="hdd" class="form-control" placeholder="Enter model details">'+
                                '</div>'+
                            '</div>';
                    $('#specification').append(data);
                }
                else{
                    $('#specification').empty();
                    $('#specification').css('display','none');
                    
                }
                
            });
        });    
@endsection