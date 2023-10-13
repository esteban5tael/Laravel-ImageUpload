<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('Name') }}
            {{ Form::text('name', $image->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
        </div>
        <div class="form-group">
            {{ Form::label('Image') }}
            <input type="file" name="image" accept="image/*" class="form-control">
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
        <a class="btn btn-primary" href="{{ url()->previous() }}">{{ __('Back') }}</a>

    </div>
</div>
