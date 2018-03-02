<div class="ui centered grid container">
    <div class="twelve wide column">
    @if(isset($success))
        <div class="ui success message">
            <i class="close icon"></i>
            {{$success}}
        </div>
    @endif
    </div>

    <div class="twelve wide column">
    @if(isset($info))
        <div class="ui info message">
            <i class="close icon"></i>
            {{$info}}
        </div>
    @endif
    </div>

    <div class=twelve wide column">
    @if(isset($warning))
        <div class="ui info warning">
            <i class="close icon"></i>
            {{$warning}}
        </div>
    @endif
    </div>

    <div class="twelve wide column">
    @if(isset($error))
        <div class="ui info error">
            <i class="close icon"></i>
            {{$error}}
        </div>
    @endif
    </div>

    @if(Session::has('success'))
        <div class="ui success message">
            <i class="close icon"></i>
            {{Session::get('success')}}
        </div>
    @endif

    @if(Session::has('info'))
    <div class="ui info message">
        <i class="close icon"></i>
        {{Session::get('info')}}
    </div>
    @endif

    @if(Session::has('warning'))
        <div class="ui info warning">
            <i class="close icon"></i>
            {{Session::get('warning')}}
        </div>
    @endif

    @if(Session::has('error'))
        <div class="ui info error">
            <i class="close icon"></i>
            {{Session::get('error')}}
        </div>
    @endif

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
</div>
