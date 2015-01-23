@extends('layouts/main')

@section('promo')

	<section id="promo-alt">
		<div id="promo1">
			<h1>The brand new MacBook Pro</h1>
			<p>With a special price, <span class="bold">today only!</span></p>
			<a href="#" class="secondary-btn">READ MORE</a>
			<img src="/img/macbook.png" alt="MacBook Pro">
		</div><!-- end promo1 -->
		<div id="promo2">
			<h2>The iPhone 5 is now<br>available in our store!</h2>
			<a href="">Read more <img src="/img/right-arrow.gif" alt="Read more"></a>
			<img src="/img/iphone.png" alt="iPhone">
		</div><!-- end promo2 -->
		<div id="promo3">
			<img src="/img/thunderbolt.png" alt="Thunderbolt">
			<h2>The 27"<br>Thunderbolt Display.<br>Simply Stunning.</h2>
			<a href="#">Read more <img src="/img/right-arrow.gif" alt="Read more" /></a>
		</div><!-- end promo3 -->
	</section><!-- promo-alt -->

@endsection

@section('content')

	<h2>{{{ $category->name }}}</h2>
	<hr>

	<aside id="categories-menu">
		<h3>CATEGORIES</h3>
		<ul>

			@foreach ($catnav as $cat)

			    <li><a href="/store/category/{{{ $cat->id }}}">{{{ $cat->name }}}</a></li>

			@endforeach

		</ul>
	</aside><!-- end categories-menu -->

	<div id="listings">

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

	</div><!-- end #listings -->

@endsection

@section('pagination')
	<section id="pagination">
		{{ $products->links() }}
	</section><!-- end #pagination -->
@endsection