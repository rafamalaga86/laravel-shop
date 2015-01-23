@extends('layouts/main')

@section('search-keyword')

	<hr>
	<section id="search-keyword">
		<h1>Search Results for <span>{{{ $keyword }}}</span></h1>
	</section><!-- end #search-keyword -->

@stop

@section('content')
	
	<div id="search-results">

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

	</div> <!-- end #search-results -->

@stop