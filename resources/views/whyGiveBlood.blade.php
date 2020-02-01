@extends('layouts.app')
@section('style')
    <style> 
     body{
         background-color:darkgray;
     }
    </style>
@endsection
@section('content')
<div class="container">
    <div class="banner">
    <a href="{{ route('register')}}"><img src="{{ asset('img/donate_blood.jpg') }} " alt=""></a>
    </div>

<div class="page-header">
    <h1 class="mt-3" itemprop="name" style="color:red;font-weight:bolder">
                                        Why Should I Donate Blood?					</h1>
</div>
    <div class="details" style="max-width:1000px;">
    <p> Blood is needed to save lives in times of emergencies and to sustain the lives of those with medical conditions, like leukemia, thalassaemia and bleeding disorders, as well as patients who are undergoing major surgeries.</p>

    <p>For many patients, blood donors are their lifeline. One unit of blood can save three lives!</p>

    <p>Every hour of the day, 15 units of blood are used in Singapore. We need about 120,000 units of blood are needed to meet the transfusion needs of patients every year, equivalent to more than 400 units of blood a day.</p>

    <p>With an ageing population, more advanced life-saving medical procedures, and new hospitals being established, more blood will be needed every year.</p>
     
    <h2 class="mt-3 mb-2" style="font-weight:bold"><p>What happens to the blood I donate?</p></h2>
    <p>Your donation goes a long way. After blood is collected, it goes through stringent testing at the laboratories of the Health Sciences Authority to check for various diseases and blood typing.</p>

     <p>It also gets separated into the three components — red blood cells, platelets, and plasma — for storage and distribution to hospitals.</p>   
</div>

</div>    
@endsection