@extends('layouts.app')

@section('title')
    Home
@endsection

@section('headerScript')
window.__INITIAL_STATE__ = "{!! addslashes(json_encode($atoms)) !!}";
window.$user = "{!! addslashes(json_encode($user)) !!}";
@endsection

@section('content')
    @if(Auth::check() && !Auth::user()->hasVerifiedEmail())
        <div class="alert alert-info">
          Please verify your account! We sent you the verification link to <strong>{{ Auth::user()->email }}</strong>.
        </div>
    @endif
    <iframe-grid-component :rows="rows" :records_per_row="per_row" :atoms="state.data"></iframe-grid-component>
	<footer-nav-component :state="nav_state"></footer-nav-component>
@endsection
