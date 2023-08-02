@extends('layouts.layout-2')

@section('content')

    <h3>{{ $_SESSION['account_id'] }} | {{ $_SESSION['account_role'] }}</h3>

@endsection
