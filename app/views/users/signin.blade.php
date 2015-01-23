@extends('layouts.main')

@section('content')
	
    <section id="signin-form">
        <h1>I have an account</h1>

		{{ Form::open(['url' => 'users/signin']) }}

            <p>
            	<img src="/img/email.gif" alt="Email Adress">
				{{ Form::text('email') }}
            </p>
            <p>
            	<img src="/img/password.gif" alt="Password">
				{{ Form::text('password') }}
            </p>

            {{ Form::submit('Sign in', ['class' => 'secondary-cart-btn']) }}

        {{ Form::close() }}

        </form>
    </section><!-- end signin-form -->
    <section id="signup">
        <h2>I'm a new customer</h2>
        <h3>You can create an account in just a few simple steps.<br>
            Click below to begin.</h3>

        <a href="/users/newaccount" class="default-btn">CREATE NEW ACCOUNT</a>
    </section><!--- end signup -->

@stop