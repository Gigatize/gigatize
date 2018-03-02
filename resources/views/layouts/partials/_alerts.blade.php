@foreach (['error', 'warning', 'info', 'success'] as $key)
    @if(session($key))
        <div class="ui {{ $key }} message">
            <i class="close icon"></i>
            {{ session($key) }}
        </div>
    @endif
@endforeach

@if(session('errors'))
    <div class="ui error message">
        <i class="close icon"></i>
        <div class="header">
            There were some errors with your submission
        </div>
        <ul class="list">
            @foreach(session('errors') as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
