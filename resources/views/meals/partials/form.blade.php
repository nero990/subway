<div class="form-group">
    <label>Name</label>
    {!! Form::text("name", null, ["class"=>"form-control", "placeholder"=>"Name"]) !!}
</div>

<div class="form-group">
    <label>Eaten On</label>
    @if(isset($meal))
        {!! Form::date("eaten_at", $meal->eaten_at, ["class"=>"form-control", "placeholder"=>"Eaten At"]) !!}
    @else
        {!! Form::date("eaten_at", null, ["class"=>"form-control", "placeholder"=>"Eaten At"]) !!}
    @endif

</div>

<div class="form-group">
    <label>Status</label>
    {!! Form::select("status", ["OPEN" => "Open", "CLOSED" => "Closed"], null, ["class"=>"form-control", "placeholder"=>"--Select--"]) !!}
</div>

<button type="submit" class="btn btn-default">Save</button>
