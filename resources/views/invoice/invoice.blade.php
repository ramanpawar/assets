@extends('layouts.app')

@section('content')
    <div class="container card px-3 py-3">
        <form id="form">
        @csrf
        <div class="row">
            <div class="form-group col-md-9">
                <label for="invoice_no">Invoice No</label>
                <input type="hidden" class="form-control mb-3 col-md-3" value="{{$invoice_id}}" name="invoice_no" readonly="readonly">
                <input type="text" class="form-control mb-3 col-md-3" value="{{$invoice_no}}" disabled>
                <button type="button" class="btn btn-secondary" onclick="additem()" >Add Item</button>
                <button type="button" class="btn btn-secondary" onclick="addconsumable()">Add Consumable</button>
                
            </div>
        </div>

        <div class="container" id="items">

        </div>

        <button type="button" id="submit" class="btn btn-secondary col-md-1 ">Save</button>        
        </form>
    </div>

   
@endsection

@section('script')
function validateForm() {
  var isValid = true;
  $('.form-control').each(function() {
    if ( $(this).val() == '' )
        isValid = false;
  });
  return isValid;
}


var counter = 0;
    function additem(){
        counter++;
        var data = '<div class="row my-2" id="item'+counter+'"'+'>'+
                '<strong class="my-2 mx-2 col-md-1">Category</strong>'+'<select class="form-control col-md-2 sel" required name="hardwarecat[]" id="con'+counter+'" counter="'+counter+'"></select>'+
                '<strong class="my-2 mx-2 ">Item</strong>'+'<select class="form-control col-md-2" name="hardwareitem[]" required id="sel'+counter+'"></select>'+
                '<strong class="my-2 mx-2">Quantity</strong><input type="number" name="qtyitem[]" id="" class="form-control col-md-1" required placeholder="Qty">'+
                '<strong class="my-2 mx-2">Rate</strong><input type="number" name="rateitem[]" id="" class="form-control col-md-1" required placeholder="Rate">'+
                '<button type="button" class="btn btn-info btn_remove mx-2" id="'+counter+'">X</button>'+
            '</div>';
        $('#items').append(data);
        $.ajax({
            url: "/ahard?type=hard",
            method:"GET",
            success:function(data){
                $("#con"+counter+"").empty();
                $("#con"+counter+"").append(data);
            },
        })
    }
    function addconsumable(){
        counter++;
        var data = '<div class="row my-2" id="item'+counter+'"'+'>'+
                '<strong class="my-2 mx-2 col-md-1">Category</strong>'+'<select class="form-control col-md-2 sel" required name="consumablecat[]" id="con'+counter+'" counter="'+counter+'"></select>'+
                '<strong class="my-2 mx-2 ">Con.</strong>'+'<select class="form-control col-md-2" name="consumableitem[]" required id="sel'+counter+'"></select>'+
                '<strong class="my-2 mx-2">Quantity</strong><input type="number" name="qtyconsumable[]" id="" required class="form-control col-md-1" placeholder="Qty ">'+
                '<strong class="my-2 mx-2">Rate</strong><input type="number" name="rateconsumable[]" id="" required class="form-control col-md-1" placeholder="Rate ">'+
                '<button type="button" class="btn btn-info btn_remove mx-2" id="'+counter+'">X</button>'+
            '</div>';
        $('#items').append(data);

        $.ajax({
            url: "/ahard?type=con",
            method:"GET",
            success:function(data){
                $("#con"+counter+"").append(data);
            },
        })
    }

    $(document).on('click','.btn_remove',function(){
        var button_id = $(this).attr('id');
        $('#item'+button_id+'').remove();
    });


    $(document).on('change','.sel',function(){
        var atr = $(this).attr('counter');
        $.ajax({
            url: '/acon?cat='+$(this).val(),
            type:"GET",
            success: function(data){

                $('#sel'+atr+'').empty();
                $('#sel'+atr+'').append(data);
                
                
            },

        });
    });


    $('#submit').click(function(){
        var validform = validateForm();
        if(!validform){
            alert("Something is not right with your details");
            return;
        }
        $.ajax({
            url: "/invoicedetails",
            type:'POST',
            data: $('#form').serializeArray(),
            success:function(data){
                alert(data);
                $(location).attr('href','/invoice');
            },
        });
    });

@endsection