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
            'url' => route('selection'),
            'class' => 'contact-form',
            'method' => 'POST',
            'enctype' => 'multipart/form-data',
            'novalidate'=>''
        ]) !!}
    <fieldset>
        <ul>
            <li class="text-field">
                <h4>{!! Form::label('selection', trans('admin.selection')); !!}</h4>
                {{ Form::select('selection', ['unapproved'=>trans('admin.unapproved'), 'id'=>trans('admin.id'), 'author'=>trans('admin.author'), 'alias'=>trans('admin.alias')]) }}
                <h4>{!! Form::label('param', trans('admin.param')); !!}</h4>
                <div class="input-prepend"><span class="add-on"><i class="icon-th-list"></i></span>
                    {!! Form::text('param') !!}
                </div>
            </li>
        </ul>
    </fieldset>
<!-- Submit -->
{!! Form::button(trans('admin.find'), ['class' => 'btn btn-the-salmon-dance-3','type'=>'submit']) !!}
{!! Form::close() !!}
@if(!empty($articles))
    <div class="page type-page status-publish hentry group">
        <h3>{{ trans('admin.articles') }}</h3>
        <table class="short-table blue" style="width: 100%" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th>{{ trans('admin.id') }}</th>
                    <th>{{ trans('admin.title') }}</th>
                    <th>{{ trans('admin.text') }}</th>
                    <th>{{ trans('admin.image') }}</th>
                    <th>{{ trans('admin.cat') }}</th>
                    <th>{{ trans('admin.alias') }}</th>
                    <th>{{ trans('admin.delete') }}</th>
                </tr>
            </thead>
            <tbody>
            @foreach($articles as $article)
                <tr>
                    <th class="features">{{ $article->id }}</th>
                    <td>{!! Html::link(route('edit_article',['articles'=>$article->id]),$article->title) !!}</td>
                    <td>{{ str_limit($article->description,200) }}</td>
                    <td>
                        @if(isset($article->img->micro))
                            {!! Html::image(asset(config('settings.theme')).'/images/articles/'.$article->img->micro) !!}
                        @else
                            {!! Html::image(asset(config('settings.theme')).'/images/articles/no-picture.png', $article->title, array('width' => 90 , 'height' => 90)) !!}
                        @endif
                    </td>
                    <td>{{ $article->category->title }}</td>
                    <td>{{ $article->alias }}</td>
                    <td>{!! Form::open(
                            ['url' => route('delete_article',
                                    ['articles'=>$article->id]),
                                    'class'=>'form-horizontal',
                                    'method'=>'GET'])
                        !!}
                        {!! Form::button(trans('admin.delete'), ['class' => 'btn btn-french-5','type'=>'submit']) !!}
                        {!! Form::close() !!}
                    </td>
            @endforeach
            </tbody>
        </table>
        
    </div>
    <!--PAGINATION-->
    
    <div class="general-pagination group">
    
    @if($articles->lastPage() > 1) 
            
        @if($articles->currentPage() !== 1)
            <a href="{{ $articles->url(($articles->currentPage() - 1)) }}">{{ Lang::get('pagination.previous') }}</a>
        @endif
        
        @for($i = 1; $i <= $articles->lastPage(); $i++)
            @if($articles->currentPage() == $i)
                <a class="selected disabled">{{ $i }}</a>
            @else
                <a href="{{ $articles->url($i) }}">{{ $i }}</a>
            @endif		
        @endfor
        
        @if($articles->currentPage() !== $articles->lastPage())
            <a href="{{ $articles->url(($articles->currentPage() + 1)) }}">{{ Lang::get('pagination.next') }}</a>
        @endif
        
        
        @endif

    </div>
    @endif
</div>
<!-- END articles -->