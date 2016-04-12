@if (Session::has('flash_notification.message'))
    @if (Session::has('flash_notification.overlay'))
        @include('flash::modal', [
            'modalClass' => 'flash-modal', 
            'title'      => session('flash_notification.title'), 
            'body'       => session('flash_notification.message')
        ])
    @else
        <div class="alert alert-{{ Session::get('flash_notification.level') }}">
            <button type="button" 
                    class="close" 
                    data-dismiss="alert" 
                    aria-hidden="true">&times;</button>
                
            @if(is_array(session('flash_notification.message')))
                @foreach(session('flash_notification.message') as $msg)
                    {!! $msg !!}
                @endforeach
            @else
                {{ session('flash_notification.message') }}
            @endif
        </div>
    @endif
    
@elseif(count($errors) > 0)
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{!! strip_tags($error, '<i><b><span><strong>') !!}</li>
            @endforeach
        </ul>
    </div>
@endif
