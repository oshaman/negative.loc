<div id="primary" class="layout-sidebar-no home-section">
    <div class="inner group">
<!-- START CONTENT -->
<div id="content" class="group">
    <div class="page type-page status-publish hentry group">
    @if (count($errors) > 0)
        <div class="contact-form">
                <p class="error">
                @foreach ($errors->toArray() as $key=>$error)
                    {!! str_replace($key, '<strong>' . trans('ua.' . $key) . '</strong>', $error[0]) !!}</br>
                @endforeach
                </p>
        </div>
    @endif
        {!! Form::open(['url' => route('user_update', $user->id),'class'=>'contact-form','method'=>'POST','enctype'=>'multipart/form-data']) !!}
            <fieldset>
                <ul>
                    <li class="text-field">
                        <h4>{!! Form::label('name', trans('ua.name')); !!}</h4>
                        <div class="input-prepend"><span class="add-on"><i class="icon-th-list"></i></span>
                            {!! Form::text('name', old('name') ? : $user->name) !!}
                        </div>
                    </li>
                    <li class="text-field">
                        <h4>{!! Form::label('email', trans('ua.email')); !!}</h4>
                        <div class="input-prepend"><span class="add-on"><i class="icon-th-list"></i></span>
                            {!! Form::text('email', old('email') ? : $user->email) !!}
                        </div>
                    </li>
                    <li class="text-field">
                        <h4>{!! Form::label('pass', trans('ua.password')); !!}</h4>
                        <div class="input-prepend"><span class="add-on"><i class="icon-th-list"></i></span>
                            {!! Form::password('password') !!}
                        </div>
                    </li>
                    <li class="text-field">
                        <h4>{!! Form::label('cpass', trans('ua.cpassword')); !!}</h4>
                        <div class="input-prepend"><span class="add-on"><i class="icon-th-list"></i></span>
                            {!! Form::password('password_confirmation') !!}
                        </div>
                    </li>
                    
                    <li class="text-field">
                    <table>
                    @foreach($roles as $id=>$role)
                        @if($user->hasRole($role))
                            <td>
                                <input checked name="role_id[]"  type="checkbox" value="{{ $id }}">{{ $role }}
                            </td>
                        @else
                            <td>
                                <input name="role_id[]"  type="checkbox" value="{{ $id }}">{{ $role }}
                            </td>
                        @endif
                    @endforeach
                    </table>
                    </li>
                </ul>
            </fieldset>
                <!-- Submit -->
                {!! Form::button(trans('admin.save'), ['class' => 'btn btn-large btn-campfire-5','type'=>'submit']) !!}	
        {!! Form::close() !!}
    </div>
</div>
<!-- END CONTENT -->