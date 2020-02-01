@extends('layouts.app')

@section('content')
    

<div class="col">
    <form   id="search">
        <label for="blood_group"
        class="col-md-2 col-form-label text-md-right float-left">{{ __('Blood Group') }}</label>
    <div class="col-md-4 float-left">
        <select class="browser-default custom-select" id="search" name="blood_group">
            <option disabled selected>Select blood group</option>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>

        </select>
        @error('blood_group')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <label for="division" class="col-1 col-form-label text-md-right float-left">{{ __('Division') }}</label>
    <div class="col-md-4 float-left">
        <select class="browser-default custom-select" id="division" name="division">
            <option disabled selected>Select division</option>
            <option value="Dhaka">Dhaka</option>
            <option value="Chittagong">Chittagong</option>
            <option value="Khulna">Khulna</option>
            <option value="Rajshahi">Rajshahi</option>
            <option value="Barisal">Barisal</option>
            <option value="Sylhet">Sylhet</option>
        </select>
        @error('division')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
     
    </form>


</div>
@endsection
@section('js')
    <script type="text/javascript">
    $('#search').on('keyup',function()
    {
        
        $div = $(this).val();
        $blood = $(this).val();
        console.log($div);
        console.log($blood);
    });
    {

    }


    
    </script>
    
    
@endsection