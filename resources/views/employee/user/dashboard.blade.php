@extends('layouts.user_dashboard')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Welcome, {{ Auth::user()->name }}</h1>
            <p>Here is your dashboard where you can manage your tasks and view company updates.</p>
        </div>
    </div>

    <!-- Notification Icon in Navbar -->

    <!-- Notifications List (optional section for a dedicated notifications page) -->

</div>

@endsection



