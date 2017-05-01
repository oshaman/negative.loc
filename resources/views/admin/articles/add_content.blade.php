<div id="page_meta" class="home-section">
    <div class="inner group">
        <div class="meta-left">
            <h2 class="page-title">Articles</h2><span class="special-font" style="font-size:18px;">special font!</span>
        </div>
        <div class="meta-right">
            <span class="twitter_label twitter_label-red">your text</span>
        </div>
    </div>
</div>
<div id="primary" class="layout-sidebar-no home-section">
    <div class="inner group">

<!-- START CONTENT -->
<div id="content" class="group">
    <div class="page type-page status-publish hentry group">
        {!! Form::open([
            'url' => route('create_article'),
            'class' => 'contact-form',
            'method' => 'POST',
            'enctype' => 'multipart/form-data',
            'novalidate'=>''
        ]) !!}
            <fieldset>
                <ul>
                    <li class="text-field">
                        <h4>{!! Form::label('a_title', trans('admin.add_title')); !!}</h4>
                        <div class="input-prepend"><span class="add-on"><i class="icon-th-list"></i></span>
                            {!! Form::text('title', old('title') ? : '', ['placeholder'=>trans('admin.add_title_placeholder'), 'id'=>'a_title', 'required' => '']) !!}
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
                            {!! Form::text('meta', old('meta') ? : '', ['placeholder'=>trans('admin.add_meta_placeholder'), 'id'=>'a_meta']) !!}
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
                    
                    <li class="text-field">
                        <h4>{!! Form::label('img', trans('admin.add_img')); !!}</h4>
                        <div class="input-prepend"><span class="add-on"><i class="icon-picture"></i></span>
                            {!! Form::file('image', ['accept'=>'image/*', 'data-placeholder'=>trans('admin.add_img')]) !!}
                        </div>
                    </li>
                    <li class="text-field">
                        <h4>{!! Form::label('cats', trans('admin.add_cat')); !!}</h4>
                        <div class="input-prepend">
                            {!! Form::select('cats', $categories, old('keywords') ? : null, ['placeholder' => 'Pick a size...']) !!}
                        </div>
                        <div class="msg-error"></div>
                    </li>
                    
                    
                    
                    
                    
                    
                    <li class="submit-button">
                        {!! Form::button(trans('admin.save'), ['class' => 'btn btn-campfire-5','type'=>'submit']) !!}			
                    </li>
                </ul>
            </fieldset>
        {!! Form::close() !!}
    <script>
        CKEDITOR.replace( 'editor' );
        CKEDITOR.replace( 'editor2' );
    </script>
    </div>
</div>
<!-- END CONTENT -->