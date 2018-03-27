<!-- Top Menu -->
<style>
    nav{
        min-height: 80px;
    }
    nav div.nav-wrapper{
        background-color: #fff;
        color: #000;
        min-height: 80px;
        padding: 5px 20px;
    }
    div.nav-wrapper ul li a{
        color: #000;
        background: none;
    }
    div.nav-wrapper ul li a.active{
        color: #f6d448;
        background: none;
    }
</style>
<nav>
    <div class="nav-wrapper z-depth-2">
        <a href="{{url('/')}}" class="brand-logo" style="vertical-align: middle;"><img src="{{asset('images/logo.svg')}}" width="240px" height="70px"></a>
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
                <a class="dropdown-button" href="#!" data-activates="dropdown1"><i class="user icon"></i> {{Auth::user()->first_name. " " . Auth::user()->last_name}}<i class="caret down icon"></i></a>
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
