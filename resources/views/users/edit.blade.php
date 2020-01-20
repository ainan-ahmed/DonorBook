@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.update',$user->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control @error('name') is-invalid @enderror" name="first_name" value="{{ $details->first_name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control @error('name') is-invalid @enderror" name="last_name" value="{{ $details->last_name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="blood_group" class="col-md-4 col-form-label text-md-right">{{ __('Blood Group') }}</label>
                            <div class="col-md-6">
                                <select class="browser-default custom-select" name="blood_group">
                                     
                                    <option value="A+" {{ ($details->blood_group=='A+')?'selected':'' }}>A+</option>
                                    <option value="A-" {{ ($details->blood_group=='A-')?'selected':'' }}>A-</option>
                                    <option value="B+" {{ ($details->blood_group=='B+')?'selected':'' }}>B+</option>
                                    <option value="B-" {{ ($details->blood_group=='B-')?'selected':'' }}>B-</option>
                                    <option value="AB+" {{ ($details->blood_group=='AB+')?'selected':'' }}>AB+</option>
                                    <option value="AB-" {{ ($details->blood_group=='AB-')?'selected':'' }}>AB-</option>
                                    <option value="O+" {{ ($details->blood_group=='O+')?'selected':'' }}>O+</option>
                                    <option value="O-" {{ ($details->blood_group=='O-')?'selected':'' }}>O-</option>
                                     
                                  </select>
                                  @error('blood_group')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                         
                        <hr>
                        <hr>
                        <div class="form-group row">
                        <div class="strong  col-12 col-form-label pl-5">Contact Details</div>
                        <label for="division" class="col-md-4 col-form-label text-md-right">{{ __('Division') }}</label>
                            <div class="col-md-6">
                                <select class="browser-default custom-select" name="division">
                                    
                                    <option value="Dhaka"{{ ($details->blood_group=='Dhaka')?'selected':'' }}>Dhaka</option>
                                    <option value="Chittagong"{{ ($details->blood_group=='Chittagong')?'selected':'' }}>Chittagong</option>
                                    <option value="Khulna"{{ ($details->blood_group=='Khulna')?'selected':'' }}>Khulna</option>
                                    <option value="Rajshahi"{{ ($details->blood_group=='Rajshahi')?'selected':'' }}>Rajshahi</option>
                                    <option value="Barisal"{{ ($details->blood_group=='Barisal')?'selected':'' }}>Barisal</option>
                                    <option value="Sylhet"{{ ($details->blood_group=='Sylhet')?'selected':'' }}>Sylhet</option>
                                  </select>
                                  @error('division')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  
                            </div>
                            <label for="City" class="col-md-4 col-form-label text-md-right">{{ __('city') }}</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control @error('name') is-invalid @enderror" name="city" value="{{ $details->city }}" required autocomplete="city" autofocus>

                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>   
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Phone(+88)</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control"   name="phone" value="{{ $details->phone }}"   autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>   
                        </div>    
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
