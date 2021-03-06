<div id="primary" class="layout-sidebar-no home-section">
    <div class="inner group">
<!-- START CONTENT -->
<div id="content" class="group">
    <div class="page type-page status-publish hentry group">
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
            'url' => route('create_event'),
            'class' => 'contact-form',
            'method' => 'POST',
            'enctype' => 'multipart/form-data',
            'novalidate'=>'',
            'files' => true
        ]) !!}
            <fieldset>
                <ul>
                    <li class="text-field">
                        <h4>{!! Form::label('e_title', trans('admin.add_title')); !!}</h4>
                        <div class="input-prepend"><span class="add-on"><i class="icon-th-list"></i></span>
                            {!! Form::text('title', old('title') ? : '', ['placeholder'=>trans('admin.add_title_placeholder'), 'id'=>'a_title',
                            'required' => '']) !!}
                        </div>
                    </li>
                    <li class="text-field">
                        <h4>{!! Form::label('a_alias', trans('admin.add_alias')); !!}</h4>
                        <div class="input-prepend"><span class="add-on"><i class="icon-th-list"></i></span>
                            {!! Form::text('alias', old('alias') ? : '', ['placeholder'=>trans('admin.add_alias_placeholder'), 'id'=>'a_alias']) !!}
                        </div>
                    </li>
                    <li class="text-field">
                        <h4>{!! Form::label('a_keywords', trans('admin.add_keywords')); !!}</h4>
                        <div class="input-prepend"><span class="add-on"><i class="icon-pushpin"></i></span>
                            {!! Form::text('keywords', old('keywords') ? : '', ['placeholder'=>trans('admin.add_keywords_placeholder'), 'id'=>'a_keywords', 'required' => '']) !!}
                        </div>
                    </li>
                    <li class="text-field">
                        <h4>{!! Form::label('a_meta', trans('admin.add_meta')); !!}</h4>
                        <div class="input-prepend"><span class="add-on"><i class="icon-pencil"></i></span>
                            {!! Form::text('meta_desc', old('meta_desc') ? : '', ['placeholder'=>trans('admin.add_meta_placeholder'), 'id'=>'a_meta']) !!}
                        </div>
                    </li>
                <!-- TextArea -->
                    <li class="textarea-field">
                        <h4>{!! Form::label('editor', trans('admin.add_text')); !!}</h4>
                        <div class="input-prepend"><span class="add-on"><i class="icon-pencil"></i></span>
                            {!! Form::textarea('text', old('text') ? : '', ['id'=>'editor','required'=>'', 'rows'=>8, 'cols'=>30]) !!}
                        </div>
                        <div class="msg-error"></div>
                    </li>
                    <li class="textarea-field">
                        <h4>{!! Form::label('editor2', trans('admin.add_desc')); !!}</h4>
                        <div class="input-prepend"><span class="add-on"><i class="icon-pencil"></i></span>
                            {!! Form::textarea('description', old('description') ? : '', ['id'=>'editor2','required'=>'', 'rows'=>8, 'cols'=>30]) !!}
                        </div>
                    </li>
                <!-- Image -->
                    <li class="text-field">
                        <h4>{!! Form::label('a_img', trans('admin.add_img')); !!}</h4>
                        <div class="input-prepend"><span class="add-on"><i class="icon-picture"></i></span>
                            {!! Form::file('img', ['accept'=>'image/*', 'id'=>'a_img']) !!}
                        </div>
                    </li>
                    <li class="text-field">
                        <h4>{!! Form::label('day', trans('admin.pick_a_day')); !!}</h4>
                        {!! Form::selectRange('day', 1, 31, null, ['placeholder' => trans('admin.day')]); !!}
                        {!! Form::select('month',
                                        [
                                            1=>trans('dates.1'),
                                            2=>trans('dates.2'),
                                            3=>trans('dates.3'),
                                            4=>trans('dates.4'),
                                            5=>trans('dates.5'),
                                            6=>trans('dates.6'),
                                            7=>trans('dates.7'),
                                            8=>trans('dates.8'),
                                            9=>trans('dates.9'),
                                            10=>trans('dates.10'),
                                            11=>trans('dates.11'),
                                            12=>trans('dates.12'),
                                        ], null, ['placeholder' => trans('admin.month')])
                        !!}
                    </li>
                </ul>
                <!-- Submit -->
                {!! Form::button(trans('admin.save'), ['class' => 'btn btn-large btn-campfire-5','type'=>'submit']) !!}	
            </fieldset>
        {!! Form::close() !!}
    <script>
        CKEDITOR.replace( 'editor' );
        CKEDITOR.replace( 'editor2' );
    </script>
    </div>
</div>
<!-- END CONTENT -->