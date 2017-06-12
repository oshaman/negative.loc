<div id="primary" class="layout-sidebar-right home-section">
    <div class="inner group">
<!-- START CONTENT -->
<div id="content" class="group">
    <!-- Small Preview-->
    <div class="blog-small">
        <div class="thumbnail">
            <img src="{{ asset(config('settings.theme')) }}/images/articles/{{ $article->img->mini ?? '../no-picture.png'}}" class="attachment-blog_small wp-post-image" alt="{{ $article->alias }}" title="{{ $article->title }}" />                        
        </div>
        <h2>{{ $article->title }}</h2>
        <div>
            <div class="meta-bottom">
                {!! str_limit($article->description, 288, '&#8230;') !!}
            </div>
            <div class="the-content">
                <p><a href="{{ route('articles', $article->alias) }}" class="btn btn-retro-package-3 btn-more-link">{{ trans('ua.read_more') }}</a></p>
                <p class="date-cat">
                    <i class="icon-calendar"></i>{{ date("d-m-Y H:i", strtotime($article->created_at)) }}
                    <i class="icon-tags"></i>
                    <span>{{ trans('ua.cat') }}: <a href="{{ route('cat_alias', $article->category->title) }}">{{ trans('categories.' .$article->category->title) }}</a></span>
                    <i class="icon-external-link"></i>
                    <span>{{ trans('ua.source') }}: <a href="http://{{ $article->source }}" class="link">{{ $article->source }}</a></span>
                </p>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <!-- Big Preview-->
    
    <div class="post hentry-post blog-big">
        <div class="meta group">
            <p class="date">
                <i class="icon-calendar"></i>{{ date('d-m-Y H:i', strtotime($article->created_at)) }}
            </p>
            <p class="author">
                <i class="icon-external-link"></i> <span>{{ trans('ua.source') }}:
                <a href="{{ $article->source ?: route('home') }}"  class="link">{{ $article->source }}</a></span>
            </p>
            <p class="categories">
                <i class="icon-tags"></i> <span>{{ trans('ua.cat') }}: <a href="{{ route('cat_alias', $article->category->alias) }}" class="cats">{{ trans('categories.' . $article->category->title) }}</a></span>
            </p>
            <p class="comments">
                <i class="icon-comment"></i> <span><a href="#" title="Comment on Another great article of the blog">2 comments</a></span>
            </p>
            <p class="edit-link"><i class="icon-pencil"></i><a class="post-edit-link" href="#" title="Edit Post">Edit</a></p>
        </div>
        <div class="thumbnail">
            <h1 class="post-title">{{ $article->title }}</h1>
            <div class="image-wrap">
                <img src="{{ asset(config('settings.theme')) }}/images/articles/{{ $article->img->max ?? '../no-picture.png'}}" class="attachment-blog_big wp-post-image" alt="{{ $article->title }}" title="{{ $article->title }}" />                          
            </div>
        </div>
        <div class="clearer"></div>
        <div class="the-content-single">
            {!! $article->text !!}
        </div>
    </div>
    <div class="clear"></div>
<!-- Edit -->
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
            'url' => route('edit_article', $article->id),
            'class' => 'contact-form',
            'method' => 'POST',
            'enctype' => 'multipart/form-data',
            'novalidate'=>'',
            'files' => true
        ]) !!}
            <fieldset>
                <ul>
                    <li class="text-field">
                        <h4>{!! Form::label('a_title', trans('admin.add_title')); !!}</h4>
                        <div class="input-prepend"><span class="add-on"><i class="icon-th-list"></i></span>
                            {!! Form::text('title', old('title') ? : $article->title, ['placeholder'=>trans('admin.add_title_placeholder'), 'id'=>'a_title',
                            'required' => '']) !!}
                        </div>
                    </li>
                    <li class="text-field">
                        <h4>{!! Form::label('a_alias', trans('admin.add_alias')); !!}</h4>
                        <div class="input-prepend"><span class="add-on"><i class="icon-th-list"></i></span>
                            {!! Form::text('alias', old('alias') ? : $article->alias, ['placeholder'=>trans('admin.add_alias_placeholder'), 'id'=>'a_alias']) !!}
                        </div>
                    </li>
                    <li class="text-field">
                        <h4>{!! Form::label('a_keywords', trans('admin.add_keywords')); !!}</h4>
                        <div class="input-prepend"><span class="add-on"><i class="icon-pushpin"></i></span>
                            {!! Form::text('keywords', old('keywords') ? : $article->keywords, ['placeholder'=>trans('admin.add_keywords_placeholder'), 'id'=>'a_keywords', 'required' => '']) !!}
                        </div>
                    </li>
                    <li class="text-field">
                        <h4>{!! Form::label('a_meta', trans('admin.add_meta')); !!}</h4>
                        <div class="input-prepend"><span class="add-on"><i class="icon-pencil"></i></span>
                            {!! Form::text('meta_desc', old('meta_desc') ? : $article->meta_desc, ['placeholder'=>trans('admin.add_meta_placeholder'), 'id'=>'a_meta']) !!}
                        </div>
                    </li>
                    <li class="text-field">
                        <h4>{!! Form::label('a_source', trans('admin.add_source')); !!}</h4>
                        <div class="input-prepend"><span class="add-on"><i class="icon-pencil"></i></span>
                            {!! Form::text('source', old('source') ? : $article->source, ['placeholder'=>trans('admin.add_source_placeholder'), 'id'=>'a_source']) !!}
                        </div>
                    </li>
                    <li class="text-field">
                        <h4>{!! Form::label('cat', trans('admin.add_cat')); !!}</h4>
                        <div class="input-prepend">
                            {!! Form::select('category_id', $categories, old('category_id') ? : $article->category_id, ['placeholder' => trans('admin.add_cat_placeholder')]) !!}
                        </div>
                        <div class="msg-error"></div>
                    </li>
                <!-- TextArea -->
                    <li class="textarea-field">
                        <h4>{!! Form::label('editor', trans('admin.add_text')); !!}</h4>
                        <div class="input-prepend"><span class="add-on"><i class="icon-pencil"></i></span>
                            {!! Form::textarea('text', old('text') ? : $article->text, ['id'=>'editor','required'=>'', 'rows'=>8, 'cols'=>30]) !!}
                        </div>
                        <div class="msg-error"></div>
                    </li>
                    <li class="textarea-field">
                        <h4>{!! Form::label('editor2', trans('admin.add_desc')); !!}</h4>
                        <div class="input-prepend"><span class="add-on"><i class="icon-pencil"></i></span>
                            {!! Form::textarea('description', old('description') ? : $article->description, ['id'=>'editor2','required'=>'', 'rows'=>8, 'cols'=>30]) !!}
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
                        <h4>{!! Form::label('outputtime', trans('admin.add_outputtime')); !!}</h4>
                        <div class="input-prepend"><span class="add-on"><i class="icon-time"></i></span>
                            <input type="text" name="outputtime" id="outputtime" value="{{ old('outputtime') ? : $article->created_at }}">
                        </div>
                    </li>
                </ul>
            </fieldset>
                <!-- Approved -->
                @if(Auth::user()->canDo('CONFIRMATION_DATA'))
                        <h5><input name="approved" type="checkbox" value="1" {{ $article->approved == 1 ? "checked" : ""}}>{{ trans('admin.approved') }}</h5>
                @endif
                <!-- Submit -->
                {!! Form::button(trans('admin.save'), ['class' => 'btn btn-large btn-campfire-5','type'=>'submit']) !!}			

        {!! Form::close() !!}
    <script>
        CKEDITOR.replace( 'editor' );
        CKEDITOR.replace( 'editor2' );
    </script>
    </div>
</div>
<!-- END CONTENT -->