@extends('dash.dashlayout')
    @extends('layout')




@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">{{ __('Dashboard') }}</div>



                <div class="card-body">

                    @if (Auth::user())

                        <div class="alert alert-users" role="alert">

                            <h3> Welcome! {{Auth::user()->name}} </h3>


                        </div>

                    @endif



                    You are Logged In

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
