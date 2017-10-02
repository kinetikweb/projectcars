<div class="form-group">
    <label class="control-label col-sm-2" for="model">Model:</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="modelb" id="modelb" value="
        @isset($modelb->modelb)
            {{ $modelb->modelb }}
        @endisset
        " placeholder="Enter model name..." required>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-sm-2" for="brand">Brand:</label>
    <div class="col-sm-10">
        @isset($modelb->brand_id)
        <input type="text" class="form-control"
                           name="brand_id" id="brand_id"
                           value="{{$modelb->brand->id}}"
                           placeholder="{{$modelb->brand->brand}}"
                           readonly>
        @endisset
        @empty($modelb->brand_id)
        <select id="brand_id" name="brand_id" class="form-control">
            <option value=""></option>
            @foreach($brand as $brand)
            	<option value="{{ $brand->id }}" >{{ $brand->brand }}</option>
            @endforeach
        @endempty
        </select>
    </div>
</div>
