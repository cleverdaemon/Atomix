@extends('layouts.app')

@section('title')
    {{ $user->getFirstNameOrUsername() }}'s Profile
@endsection

@section('content')
	<div class="row">
		<div class="col-lg-4 col-lg-offset-3">
			<div class="card">
				<div class="card-block">
					<h4 class="card-title">{{ $user->name }}'s Profile.</h4>
				</div>
			</div>
		</div>
	</div>
@endsection