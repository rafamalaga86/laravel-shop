@extends('layouts/main')

@section('promo')

	<section id="promo">
		<div id="promo-details">
			<h1>Today's Deals</h1>
			<p>Checkout this section of<br />
			 products at a discounted price.</p>
			<a href="#" class="default-btn">Shop Now</a>
		</div><!-- end promo-details -->
		<img src="img/promo.png" alt="Promotional Ad">
	</section><!-- promo -->

@stop

@section('content')

	<h2>New products</h2>
	<hr>
	<div id="products">

		@foreach($products as $product)

			<div class="product">
				<a href="/store/view/{{{ $product->id }}}">
					<img src="{{{ $product->image }}}" alt="{{{ $product->title }}}" class="feature" width="240" height="127">
				</a>

				<h3><a href="/store/view/{{{ $product->id }}}">{{{ $product->title }}}</a></h3>

				<p>{{{ $product->description }}}</p>

				<h5>Availability: 
					<span class="{{{ Availability::displayClass($product->availability) }}}">
						{{{ Availability::display($product->availability) }}}
					</span>
				</h5>

				<p>

					{{ Form::open(['url' => '/store/addtocart']) }}

					{{ Form::hidden('quantity', 1) }}
					{{ Form::hidden('id', $product->id) }}

					<button type="submit" class="cart-btn">
						<span class="price">{{{ $product->price }}}</span>
						<img src="/img/white-cart.gif" alt="Add to Cart">
					</button>
					{{ Form::close() }}

				</p>
			</div>

		@endforeach

	</div>

@stop