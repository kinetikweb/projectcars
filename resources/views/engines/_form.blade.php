<div class="form-group">
    <label class="control-label col-sm-2" for="engine">Engine:</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="engine" id="engine" value="
        @isset($engine->engine)
            {{ $engine->engine }}
        @endisset
        " placeholder="Enter engine name..." required>
    </div>
</div>
