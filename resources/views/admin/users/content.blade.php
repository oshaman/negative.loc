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
    <div class="page type-page status-publish hentry group">
        <table class="short-table blue">
            <thead>
                <th>ID</th>
                <th>{{ trans('ua.name') }}</th>
                <th>{{ trans('ua.email') }}</th>
                <th>{{ trans('admin.roles') }}</th>
                <th>{{ trans('admin.delete') }}</th>
            </thead>
            <tbody>
            @if($users)
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{!! Html::link(route('user_update',['users' => $user->id]),$user->name) !!}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->roles->implode('name', ', ') }}</td>
                    <td>
                    {!! Form::open(['url' => route('delete_user',['users'=> $user->id]),'class'=>'form-horizontal','method'=>'GET']) !!}
                        {!! Form::button(trans('admin.delete'), ['class' => 'btn btn-french-5','type'=>'submit']) !!}
                    {!! Form::close() !!}
                    </td>
                </tr>										
                @endforeach
                
            @endif
            </tbody>
        </table>
        
    </div>
    <!--PAGINATION-->
    
    <div class="general-pagination group">
    
    @if($users->lastPage() > 1) 
            
        @if($users->currentPage() !== 1)
            <a href="{{ $users->url(($users->currentPage() - 1)) }}">{{ Lang::get('pagination.previous') }}</a>
        @endif
        
        @for($i = 1; $i <= $users->lastPage(); $i++)
            @if($users->currentPage() == $i)
                <a class="selected disabled">{{ $i }}</a>
            @else
                <a href="{{ $users->url($i) }}">{{ $i }}</a>
            @endif		
        @endfor
        
        @if($users->currentPage() !== $users->lastPage())
            <a href="{{ $users->url(($users->currentPage() + 1)) }}">{{ Lang::get('pagination.next') }}</a>
        @endif
        
        
    @endif

    </div>
</div>
<!-- END users -->