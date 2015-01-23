@extends('layouts/main')

@section('content')

	<div id="product-image">
	    <img src="{{{ $product->image }}}" alt="{{{ $product->title }}}">
	</div><!-- end product-image -->
	<div id="product-details">
	    <h1>{{{ $product->title }}}</h1>
	    <p>{{{ $product->description }}}</p>

	    <hr />

	    {{ Form::open(['url' => '/store/addtocart']) }}

		    {{ Form::label('quantity', 'Qty') }}
		    {{ Form::text('quantity', 1, ['maxlength' => 2]) }}
		    {{ Form::hidden('id', $product->id) }}

	        <button type="submit" class="secondary-cart-btn">
	            <img src="/img/white-cart.gif" alt="Add to Cart" />
	             ADD TO CART
	        </button>

	    {{ Form::close() }}

	</div><!-- end product-details -->
	<div id="product-info">
	<p class="price">${{{ $product->price }}}</p>
	<p>Availability: 
		<span class="{{{ Availability::displayClass($product->availability) }}}">
			{{{ Availability::display($product->availability) }}}
		</span>
	</p>
	<p>Product Code: <span>{{{ $product->id }}}</span></p>
	</div><!-- end product-info -->

@stop