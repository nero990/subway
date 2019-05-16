<div class="form-group">
    <label>Name</label>
    {!! Form::text("name", null, ["class"=>"form-control", "placeholder"=>"Name"]) !!}
</div>

<div class="form-group">
    <label>Email address</label>
    {!! Form::email("email", null, ["class"=>"form-control", "placeholder"=>"Email Address"]) !!}
</div>

<div class="form-group">
    <label>Role</label>
    {!! Form::select("is_admin", ["1" => "Administrator", "0" => "Staff" ], null, ["class"=>"form-control", "placeholder"=>"--Select--"]) !!}
</div>

<button type="submit" class="btn btn-default">Save</button>
