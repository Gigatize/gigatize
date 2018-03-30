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
    @media only screen and (max-width: 600px) {
        .searchbarfix{
            height: 56px !important;


        }
    }
    @media only screen and (min-width: 601px) {
        .searchbarfix{
            height: 64px !important;

        }
    }
    .navfix {
        position:relative;
        margin-right: 0;
    }

    .navfix2 {
        position:absolute;

    }
    input#search:focus{
        border-bottom: 1px solid #FACD39;
        box-shadow: 0 1px 0 0 #FACD39;
        -webkit-box-shadow: 0 1px 0 0 #FACD39;
    }
    input#search:focus + label{
        color: #FACD39;
    }
</style>
<nav>
    <div class="nav-wrapper z-depth-2">
        <a href="{{url('/')}}" class="brand-logo" style="vertical-align: middle;"><img src="{{asset('images/logo.svg')}}" width="240px" height="70px"></a>
        <a href="#" data-activates="mobile-demo" class="button-collapse" style="color: #000; z-index: 1001;"><i class="bars icon"></i></a>
        <ul class="right hide-on-med-and-down">
            <li>
                <form id="navbarsearch">
                    <div class="navfix">
                        <div id="navfix2">
                            <div class="input-field">
                                <input class="searchbarfix" id="search" type="search" required style="margin: 0;">
                                <label class="label-icon search-label" for="search" style="top: -15%; left:80%;"><i class="fas fa-search"></i></label>
                            </div>
                        </div>
                    </div>
                </form>
            </li>
            <li>
                <a href="{{url('/projects/create')}}" class="item {{Request::is('projects/create') ? 'active' :  ''}}">Find Talent</a>
            </li>
            <li>
                <a href="{{url('/projects')}}" class="item {{Request::is('projects') ? 'active' :  ''}}">Find a Gig</a>
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
            <li><a class="item"><i class="edit icon"></i>Edit Profile</a></li>
            <li><a class="item"><i class="settings icon"></i>Account Settings</a></li>
        </ul>
        <ul id="dropdown2" class="dropdown-content">
            <li><a class="item"><i class="edit icon"></i>Edit Profile</a></li>
            <li><a class="item"><i class="settings icon"></i>Account Settings</a></li>
        </ul>
    </div>
</nav>
