<!-- Top Menu -->
<nav>
    <div class="nav-wrapper z-depth-2">
        <a href="{{url('/')}}" class="brand-logo" style="vertical-align: middle;"><img src="{{asset('images/logo.png')}}"></a>
        <a href="#" data-activates="mobile-demo" class="button-collapse" style="color: #000"><i class="bars icon"></i></a>
        <ul class="right hide-on-med-and-down">
            <li>
                <a href="{{url('/projects/create')}}" class="item {{Request::is('projects/create') ? 'active' :  ''}}">Find Talent</a>
            </li>
            <li>
                <a class="item">Find a Gig</a>
            </li>
            <li>
                <a class="item">Quick Quest</a>
            </li>
            <li>
                <a class="dropdown-button" href="#!" data-activates="dropdown1"><i class="user icon"></i> {{Auth::user()->name}}<i class="caret down icon"></i></a>
            </li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
            <li>
                <a href="{{url('/projects/create')}}" class="item {{Request::is('projects/create') ? 'active' :  ''}}">Find Talent</a>
            </li>
            <li>
                <a class="item">Find a Gig</a>
            </li>
            <li>
                <a class="item">Quick Quest</a>
            </li>
            <li>
                <a class="dropdown-button" href="#!" data-activates="dropdown2"><i class="user icon"></i>{{Auth::user()->name}}<i class="caret down icon"></i></a>
            </li>
        </ul>
        <!-- Dropdown Structure -->
        <ul id="dropdown1" class="dropdown-content">
            <li><a href="#!">one</a></li>
            <li><a href="#!">two</a></li>
            <li class="divider"></li>
            <li><a href="#!">three</a></li>
        </ul>
        <ul id="dropdown2" class="dropdown-content">
            <li><a href="#!">one</a></li>
            <li><a href="#!">two</a></li>
            <li class="divider"></li>
            <li><a href="#!">three</a></li>
        </ul>
    </div>
</nav>
