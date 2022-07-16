{{-- extends app.blade.php --}}
@extends('layouts.app')
@section('content')
<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <h2>Anda telah login, {{ Auth::user()->name }}</h2>

    </div>

</div>

@endsection
