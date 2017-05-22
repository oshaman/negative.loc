<div id="primary" class="layout-sidebar-no home-section">
    <div class="inner group">
<!-- START CONTENT -->
<div id="content" class="group">
@if (count($errors) > 0)
    <div class="contact-form">
            <p class="error">
            @foreach ($errors->toArray() as $key=>$error)
                {!! str_replace($key, '<strong>' . trans('admin.' . $key) . '</strong>', $error[0]) !!}</br>
            @endforeach
            </p>
    </div>
@endif
{!! Form::open([
        'url'=>route('admin_permissions'),
        'class'=>'form-horizontal',
        'method'=>'POST'
    ])
!!}
    <div class="page type-page status-publish hentry group">
        <table class="short-table red">
            <thead>
					<th>{{ trans('ua.permissions') }} \ {{ trans('admin.roles') }}</th>
					@if(!$roles->isEmpty())
						@foreach($roles as $item)
							<th>{{ $item->name}}</th>
						@endforeach
					@endif
				</thead>
            <tbody>
                @if(!$priv->isEmpty())
                    @foreach($priv as $val)
                    <tr>
                        <td>{{ $val->name }}</td>
                        @foreach($roles as $role)
                            <td>
                            @if($role->hasPermission($val->name))
                                <input checked name="{{ $role->id }}[]"  type="checkbox" value="{{ $val->id }}">
                            @else
                                <input name=" {{ $role->id }}[]"  type="checkbox" value="{{ $val->id }}">
                            @endif	
                            </td>
                        @endforeach
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
<!-- Submit -->
    {!! Form::button(trans('admin.save'), ['class' => 'btn btn-the-salmon-dance-3','type'=>'submit']) !!}	

{!! Form::close() !!}
</div>
<!-- END CONTENT -->