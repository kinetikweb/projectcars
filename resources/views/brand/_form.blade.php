<div class="form-group">
    <label class="control-label col-sm-2" for="brand">Brand:</label>
    <div class="col-sm-10">
    	<input type="text" class="form-control" name="brand" id="brand" value="
        @isset($brand->brand)
            {{ $brand->brand }}
        @endisset
        " placeholder="Enter brand" required>
    </div>
</div>
