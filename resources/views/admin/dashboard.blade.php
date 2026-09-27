@extends('layout.app')

@section('content')
<div class="container mt-5">
    <h1>Welcome to the Admin Dashboard</h1>
    <p>welcome {{ Auth::user()->name }}</p>
</div>
@endsection
