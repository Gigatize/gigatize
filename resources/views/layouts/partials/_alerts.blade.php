@foreach (['error', 'warning', 'info', 'success'] as $key)
    @if(Session::has($key))
        <div class="ui {{ $key }} message">
            <i class="close icon"></i>
            {{ Session::get($key) }}
        </div>
    @endif
@endforeach

@if(Session::has('errors'))
    <div class="ui error message">
        <i class="close icon"></i>
        <div class="header">
            There were some errors with your submission
        </div>
        <ul class="list">
            @foreach(Session::get('errors') as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
