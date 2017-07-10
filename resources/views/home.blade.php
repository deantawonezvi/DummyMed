@extends('layouts.app')

@section('content')
    <div class="container">
        <center>
            <img src="{{asset('img/medical/svg/cardiogram.svg')}}" alt="cardiogram" width="9%">
        </center>
        <div class="row">
            <div class="col-lg-4 col-sm-12 ">
                <div class="card card-default card-large card-body card-hover shadow-1">
                    <h3 class="card-title red-text">
                        <img src="{{asset('img/medical/svg/heart.svg')}}" alt="crane" width="30%">
                        <a href="{{url('/patients')}}" class="red-text clickable">PATIENTS</a>
                    </h3>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="card card-default card-large card-body card-hover shadow-1">
                    <h3 class="card-title red-text">
                        <img src="{{asset('img/medical/svg/tablets.svg')}}" alt="tablets" width="30%">
                        <a href="{{url('/inventory')}}" class="red-text clickable">INVENTORY</a>
                    </h3>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="card card-default card-large card-body card-hover shadow-1">
                    <h3 class="card-title red-text">
                        <img src="{{asset('img/medical/svg/money.svg')}}" alt="crane" width="30%">
                        <a href="{{url('/payments')}}" class="red-text clickable">PAYMENTS</a>
                    </h3>
                </div>
            </div>

        </div>

        <div class="row" style="margin-top: 45px">
            <div class="col-lg-4 col-sm-12 ">
                <div class="card card-default card-large card-body card-hover shadow-1">
                    <h3 class="card-title red-text">
                        <img id="#anim-img1" src="{{asset('img/medical/svg/nurse.svg')}}" alt="staff" width="30%">
                        <a href="{{url('/staff')}}" class="red-text clickable">STAFF</a>
                    </h3>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12 ">
                <div class="card card-default card-large card-body card-hover shadow-1">
                    <h3 class="card-title red-text">
                        <img id="#anim-img1" src="{{asset('img/medical/svg/report.svg')}}" alt="crane" width="30%">
                        <a href="{{url('/reports')}}" class="red-text clickable">REPORTS</a>
                    </h3>

                </div>
            </div>
            <div class="col-lg-4 col-sm-12 ">
                <div class="card card-default card-large card-body card-hover shadow-1">
                    <h3 class="card-title red-text">
                        <img id="#anim-img1" src="{{asset('img/medical/svg/settings.svg')}}" alt="crane" width="30%">
                        <a href="{{url('/settings')}}" class="red-text clickable">SETTINGS</a>
                    </h3>

                </div>
            </div>
        </div>

    </div>
    <br><br><br><br>

@endsection
