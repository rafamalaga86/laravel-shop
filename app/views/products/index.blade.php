@extends('layouts/main')

@section('content')

	<div id="admin">

		<h1>Products Admin Panel</h1>

		<hr>

		<p>Here you can view, delete, and create new products</p>

		<h2>Products</h2>

		<ul>
			@foreach($products as $product)

				<li>
				
				<img src="{{{ $product->image }}}" alt="{{{ $product->title }}}" width="50" >

				{{ $product->name }}

				{{ Form::open([ 'url' =>'admin/products/destroy', 'class' => 'form-inline']) }}

				{{ Form::hidden('id', $product->id) }}

				{{ Form::submit('delete') }}

				{{ Form::close() }}

				

				{{ Form::open([ 'url' => 'admin/products/toggle-availability', 'class' => 'form-inline']) }}

				{{ Form::hidden('id', $product->id) }}

				{{ Form::select('availability', ['1'=>'In Stock', '0'=>'Out of stock'], $product->availability) }}

				{{ Form::submit('Update') }}

				{{ Form::close() }}

				</li>

			@endforeach
		</ul>

		<h2>Create New Product</h2><hr>

		@if($errors->has())
		
			<div id="form-errors">
				<p>The following errors have ocurred:</p>

				<ul>
					@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
 
			</div> <!-- end form-errors -->

		@endif

		{{ Form::open([ 'url' => 'admin/products/create', 'files' => true ]) }}

		<p>
			{{ Form::label('category_id', 'Category') }}
			{{ Form::select('category_id', $categories) }}
		</p>

		<p>
			{{ Form::label('title') }}
			{{ Form::text('title', 'Lorem ipsum dolor sit amet.') }}
		</p>

		<p>
			{{ Form::label('description') }}
			{{ Form::textarea('description', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio iure delectus omnis minima voluptates, sed velit commodi officia molestiae sit suscipit atque quo amet voluptate, neque tenetur fugiat, dolor ad.') }}
		</p>

		<p>
			{{ Form::label('price') }}
			{{ Form::text('price', 300, ['class' => 'form-price']) }}
		</p>

		<p>
			{{ Form::label('image', 'Choose an image') }}
			{{ Form::file('image') }}
		</p>

		{{ Form::submit('Create Product', ['class' => 'secondary-cart-btn']) }}

		{{ Form::close() }}

	</div><!-- end admin -->

@stop