<div class="form-group">
    <label>Bread</label>
    {!! Form::select("bread_id", $breads, null, ["class"=>"form-control", "placeholder"=>"--Select--"]) !!}
</div>

<div class="form-group">
    <label>Bread Size</label>
        {!! Form::select("bread_size", ["15" => "15 cm", "30" => "30 cm"], null, ["class"=>"form-control", "placeholder"=>"--Select--"]) !!}
</div>

<div class="form-group">
    <label for="radio" style="display: block">Baked</label>
    <div class="col-sm-4">

        <div class="radio-inline"><label>{!! Form::radio("baked", "YES") !!} Yes</label></div>
        <div class="radio-inline"><label>{!! Form::radio("baked", "NO") !!} No</label></div>
    </div>
</div>
<br>
<div class="clearfix"></div>

<div class="form-group">
    <label>Sandwich Taste</label>
    {!! Form::select("sandwich_id", $sandwiches, null, ["class"=>"form-control", "placeholder"=>"--Select--"]) !!}
</div>

<div class="form-group">
    <label>Vegetable</label>
    {!! Form::select("vegetables[]", $vegetables, null, ["class"=>"form-control", "multiple" => "multiple"]) !!}
</div>

<div class="form-group">
    <label>Sauce</label>
    {!! Form::select("sauce_id", $sauces, null, ["class"=>"form-control", "placeholder"=>"--Select--"]) !!}
</div>


<div class="form-group">
    <label>Extra</label>
    {!! Form::textarea("extra", null, ["class"=>"form-control"]) !!}
</div>

<button type="submit" class="btn btn-default">@if(isset($meal_registration))  {{ "Update Order" }} @else {{"Make Order"}} @endif </button>
