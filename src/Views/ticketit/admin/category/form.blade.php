<div class="form-group">
    {!! Form::label('name', 'Name:', ['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-10">
        {!! Form::text('name', isset($category->name) ? $category->name : null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('color', 'Color:', ['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-10">
        {!! Form::custom('color', 'color', isset($category->color) ? $category->color : "#000000", ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    <div class="col-lg-10 col-lg-offset-2">
        {!! link_to_route(config('ticketit.admin_route').'.category.index', 'Back', null, ['class' => 'btn btn-default']) !!}
        @if(isset($category))
            {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
        @else
            {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
        @endif
    </div>
</div>