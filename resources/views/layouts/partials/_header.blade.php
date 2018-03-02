<header>
    <div class="ui top attached borderless menu" style="height: 75px; box-shadow: 0px -4px 13px 2px rgba(0,0,0,0.34);">
        <a class="item" style="font-size: 2em;"><b>gig</b><span style="font-style: italic;">atize</span></a>
        <div class="right menu">

            <a href="{{url('/')}}" class="item {{Request::is('/') ? 'active' :  ''}}">Home</a>
            <a class="item">Company Impact</a>
            <a href="{{url('/projects/create)}}" class="item {{Request::is('/projects/create') ? 'active' :  ''}}">Find Talent</a>
            <a class="item">Find a Gig</a>
            <a class="item">Quick Quest</a>
            <div class="ui dropdown item">
                <i class="user icon"></i> {{Auth::user()->first_name . ' ' . Auth::user()->last_name}} <i class="dropdown icon"></i>
                <div class="menu">
                    <a class="item"><i class="address card outline icon"></i> Profile</a>
                    <a class="item"><i class="cog icon"></i> Settings</a>
                    <a class="item"><i class="sign out alternate icon"></i> Logout</a>
                </div>
            </div>

        </div>
    </div>
</header>