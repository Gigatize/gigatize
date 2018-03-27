@if(isset($success) or isset($info) or isset($warning) or isset($error) or Session::has('success') or Session::has('info') or Session::has('warning') or Session::has('error') or Session::has('errors'))
<div class="ui centered grid container" style="margin-top: 10px;">
    @if(isset($success))
    <div class="sixteen wide column" style="text-align: center">
        <div class="ui success message">
            <i class="close icon"></i>
            {{$success}}
        </div>
    </div>
    @endif

    @if(isset($info))
    <div class="sixteen wide column" style="text-align: center">
        <div class="ui info message">
            <i class="close icon"></i>
            {{$info}}
        </div>
    </div>
    @endif

    @if(isset($warning))
    <div class="sixteen wide column" style="text-align: center">
        <div class="ui info warning">
            <i class="close icon"></i>
            {{$warning}}
        </div>
    </div>
    @endif

    @if(isset($error))
    <div class="sixteen wide column" style="text-align: center">
        <div class="ui info error">
            <i class="close icon"></i>
            {{$error}}
        </div>
    </div>
    @endif

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

    @if ($errors->any())
    <div class="sixteen wide column" style="text-align: center">
        <div class="ui fluid error message" >
            <i class="close icon"></i>
            <div class="header">
                There were some errors with your submission
            </div>
            <div class="ui list" style="text-align: center">
                @foreach ($errors->all() as $error)
                    <div class="item">{{ $error }}</div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
</div>
@endif
