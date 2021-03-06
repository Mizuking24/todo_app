@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">thank you!!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>You are logged in!</h3>
                    <p><a href={{ route('post') }}>こちら</a>をクリックして先に進んでください。</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
