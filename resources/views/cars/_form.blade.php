<div class="form-group">
	<label class="control-label col-sm-2" for="brand">Brands:</label>
	<div class="col-sm-10">
		<select id="brand" name="brand" class="form-control">
			<option value="">-избери-</option>
			@isset($car->brand_id)
				<option value="{{ $car->brand_id }}" selected>{{ $car->brand->brand }}</option>
			@endisset
			@empty ($car->brand_id)
				@foreach($brand as $brand)
						<option value="{{ $brand->id }}" >{{ $brand->brand }}</option>
				@endforeach
			@endempty
		</select>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-sm-2" for="modelb">Models:</label>
	<div class="col-sm-10">
		<select id="modelb" name="modelb" class="form-control">
			<option value="">-избери-</option>
			@isset($car->modelb_id)
				<option value="{{ $car->modelb_id }}" selected="">{{ $car->modelb->modelb }}</option>
			@endisset
			@empty ($car->modelb_id)
				@foreach($modelb as $modelb)
						<option value="{{ $modelb->id }}" >{{ $modelb->modelb }}</option>
				@endforeach
			@endempty
		</select>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-sm-2" for="engine">Engine:</label>
	<div class="col-sm-10">
		<select id="engine" name="engine" class="form-control">
			<option value="">-избери-</option>
			@isset($car->engine_id)
				<option value="{{ $car->engine_id }}" selected="">{{ $car->engine->engine }}</option>
			@endisset
			@empty ($car->engine_id)
				@foreach($engine as $engine)
					<option value="{{ $engine->id}}">{{ $engine->engine }}</option>
				@endforeach
			@endempty
		</select>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-sm-2" for="color">Color:</label>
	<div class="col-sm-10">
		<select id="color" name="color" class="form-control">
			<option value="">-избери-</option>
			@isset($car->color_id)
				<option value="{{ $car->color_id }}" selected>{{ $car->color->color }}</option>
			@endisset
			@empty ($car->color_id)
				@foreach($color as $color)
					<option value="{{ $color->id}}">{{ $color->color }}</option>
				@endforeach
			@endempty
		</select>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-sm-2" for="price">Price:</label>
	<div class="col-sm-10">
		<input type="number" class="form-control" name="price" id="price" placeholder="Enter price.." min="1" value="1" required>
	</div>
</div>

 <div class="form-group">
	<label class="control-label col-sm-2" for="image">Browse:</label>
    <div class="col-md-6">
   	    <input id="image" type="file" name="image" accept="image/*">
    </div>
</div>
