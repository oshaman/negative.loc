<div id="primary" class="layout-sidebar-no home-section">
    <div class="inner group">

<!-- START CONTENT -->
<div id="content" class="group">
@if($articles)
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
                        @if(isset($article->img->mini))
                            {!! Html::image(asset(config('settings.theme')).'/images/articles/'.$article->img->mini) !!}
                        @else
                            {!! Html::image(asset(config('settings.theme')).'/images/articles/'.$article->img) !!}
                        @endif
                    </td>
                    <td>{{ $article->category->title }}</td>
                    <td>{{ $article->alias }}</td>
                    <td>{!! Form::open(
                            ['url' => route('delete_article',
                                    ['articles'=>$article->alias]),
                                    'class'=>'form-horizontal',
                                    'method'=>'POST'])
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
    {!! Html::link(route('create_article'),'Добавить  материал',['class' => 'btn btn-the-salmon-dance-3']) !!}
</div>
<!-- END articles -->