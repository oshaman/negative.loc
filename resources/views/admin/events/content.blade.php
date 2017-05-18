<div id="primary" class="layout-sidebar-no home-section">
    <div class="inner group">
<!-- START CONTENT -->
<div id="content" class="group">
{!! Form::open(
    ['url' => route('admin_events'),
        'class'=>'form-horizontal',
        'method'=>'POST'])
!!}
<h4>{!! Form::label('day', trans('admin.pick_a_day')); !!}</h4>
{!! Form::selectRange('day', 1, 31); !!}
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
                ])
!!}
{!! Form::button(trans('admin.find'), ['class' => 'btn btn-the-salmon-dance-3','type'=>'submit']) !!}
{!! Form::close() !!}
@if (count($errors) > 0)
        <div class="contact-form">
                <p class="error">
                @foreach ($errors->toArray() as $key=>$error)
                    {!! str_replace($key, '<strong>' . trans('admin.' . $key) . '</strong>', $error[0]) !!}</br>
                @endforeach
                </p>
        </div>
    @endif
    <h3>{{ trans('admin.events') . substr($day, -2) . ' ' . trans('dates.' . substr($day, -4, -2) ) }}</h3>
@if($events)
    <div class="page type-page status-publish hentry group">
        <table class="short-table blue" style="width: 100%" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th>{{ trans('admin.id') }}</th>
                    <th>{{ trans('admin.title') }}</th>
                    <th>{{ trans('admin.text') }}</th>
                    <th>{{ trans('admin.image') }}</th>
                    <th>{{ trans('admin.alias') }}</th>
                    <th>{{ trans('admin.delete') }}</th>
                </tr>
            </thead>
            <tbody>
            @foreach($events as $event)
                <tr>
                    <th class="features">{{ $event->id }}</th>
                    <td>{!! Html::link(route('edit_event',['events'=>$event->id]),$event->title) !!}</td>
                    <td>{{ str_limit($event->description,200) }}</td>
                    <td>
                        @if(isset($event->img->micro))
                            {!! Html::image(asset(config('settings.theme')).'/images/events/'.$event->img->micro) !!}
                        @else
                            {!! Html::image(asset(config('settings.theme')).'/images/events/no-picture.png', $event->title, array('width' => 90 , 'height' => 90)) !!}
                        @endif
                    </td>
                    <td>{{ $event->alias }}</td>
                    <td>{!! Form::open(
                            ['url' => route('delete_event',
                                    ['events'=>$event->id]),
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
    
    @if($events->lastPage() > 1) 
            
        @if($events->currentPage() !== 1)
            <a href="{{ $events->url(($events->currentPage() - 1)) }}">{{ Lang::get('pagination.previous') }}</a>
        @endif
        
        @for($i = 1; $i <= $events->lastPage(); $i++)
            @if($events->currentPage() == $i)
                <a class="selected disabled">{{ $i }}</a>
            @else
                <a href="{{ $events->url($i) }}">{{ $i }}</a>
            @endif		
        @endfor
        
        @if($events->currentPage() !== $events->lastPage())
            <a href="{{ $events->url(($events->currentPage() + 1)) }}">{{ Lang::get('pagination.next') }}</a>
        @endif
        
        
        @endif

    </div>
    @else
        <h3>{{ trans('ua.no_events') }}</h3>
    @endif
    {!! Html::link(route('create_event'),trans('admin.add'),['class' => 'btn btn-the-salmon-dance-3']) !!}
</div>
<!-- END events -->