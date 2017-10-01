<div class="form-group">
    <label class="control-label col-sm-2" for="color">Color:</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="color" id="color" value="
        @isset($color->color)
            {{ $color->color }}
        @endisset
        " placeholder="Enter color name.." required>
    </div>
</div>
