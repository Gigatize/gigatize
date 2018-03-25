@extends('layouts.app')

@section('title','Find Talent')

@section('header_styles')
    <link href="https://fonts.googleapis.com/css?family=Cambay" rel="stylesheet">
    <style type="text/css" rel="stylesheet">
        /*basic reset*/
        * {
            margin: 0;
            padding: 0;
        }

        html {
            height: 100%;
        }

        body {
            background-image: url("{{asset('images/create-project.jpg')}}");
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
        }

        .row {
            margin-bottom: 0;
            text-align: left;
        }

        #msform label {
            text-align: left;
            text-transform: capitalize;
        }

        /*form styles*/
        #msform {
            background-image: linear-gradient(to bottom, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 1) 100%), linear-gradient(to right bottom, rgba(228, 209, 148, .8) 0%, rgba(246, 194, 67, 1) 100%);
            background-clip: content-box, padding-box;
            border: 0 none;
            border-radius: 0px;
            box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
            box-sizing: border-box;
            text-align: center;
            position: relative;
            margin-top: 30px;
            padding: 30px;
        }

        #msform fieldset {
            padding: 30px 30px;
            margin: 0 10%;
            border: none;
            /*stacking fieldsets above each other*/
            position: relative;
        }

        /*Hide all except first fieldset*/
        #msform fieldset:not(:first-of-type) {
            display: none;
        }

        /*inputs*/
        #msform input, #msform .ui.dropdown {
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
            width: 100%;
            box-sizing: border-box;
            color: #2C3E50;
            font-size: 13px;
            height: 45px;
            min-height: 45px;
        }

        #msform textarea {
            padding: 15px;
            margin-bottom: 10px;
            font-family: inspira-sans;
            border-radius: 5px;
            color: #2C3E50;
            font-size: 13px;
            width: 95%;
        }

        #msform input:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: 1px solid #10069F;
            outline-width: 0;
            transition: All 0.5s ease-in;
            -webkit-transition: All 0.5s ease-in;
            -moz-transition: All 0.5s ease-in;
            -o-transition: All 0.5s ease-in;
        }

        #msform textarea:focus {
            border-bottom: 1px solid #10069F;
        }

        input:not([type]):focus:not([readonly]) + label,
        input[type=text]:not(.browser-default):focus:not([readonly]) + label,
        input[type=password]:not(.browser-default):focus:not([readonly]) + label,
        input[type=email]:not(.browser-default):focus:not([readonly]) + label,
        input[type=url]:not(.browser-default):focus:not([readonly]) + label,
        input[type=time]:not(.browser-default):focus:not([readonly]) + label,
        input[type=date]:not(.browser-default):focus:not([readonly]) + label,
        input[type=datetime]:not(.browser-default):focus:not([readonly]) + label,
        input[type=datetime-local]:not(.browser-default):focus:not([readonly]) + label,
        input[type=tel]:not(.browser-default):focus:not([readonly]) + label,
        input[type=number]:not(.browser-default):focus:not([readonly]) + label,
        input[type=search]:not(.browser-default):focus:not([readonly]) + label,
        textarea.materialize-textarea:focus:not([readonly]) + label {
            color: #10069F;
        }

        .dropdown-content li > a, .dropdown-content li > span {
            font-size: 16px;
            color: #10069F;
            display: block;
            line-height: 22px;
            padding: 14px 16px;
        }

        /*buttons*/
        #msform .action-button {
            width: 200px;
            background: #f6c243;
            font-family: 'Cambay', sans-serif;
            font-size: 14px;
            color: white;
            border: 0 none;
            border-radius: 5px;
            cursor: pointer;
            padding: 10px 20px;
            margin: 15px 10px;
        }

        #msform .action-button:hover, #msform .action-button:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px #f6c243;
        }

        #msform .action-button.previous {
            width: 200px;
            background: #7f7f7f;
            font-family: 'Cambay', sans-serif;
            font-size: 14px;
            color: white;
            border: 0 none;
            border-radius: 5px;
            cursor: pointer;
            padding: 10px 20px;
            margin: 15px 10px;
        }

        #msform .action-button.previous:hover, #msform .action-button.previous:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px #7f7f7f;
        }

        /*headings*/
        .fs-title {
            font-size: 18px;
            text-transform: uppercase;
            color: #2C3E50;
            margin-bottom: 10px;
            letter-spacing: 2px;
            font-weight: bold;
        }

        .fs-subtitle {
            font-weight: normal;
            font-size: 13px;
            color: #666;
            margin-bottom: 20px;
        }

        /*progressbar*/
        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            /*CSS counters to number the steps*/
            counter-reset: step;
        }

        #progressbar li {
            list-style-type: none;
            color: #7f7f7f;
            text-transform: uppercase;
            font-size: 14px;
            width: 33.33%;
            float: left;
            position: relative;
            letter-spacing: 1px;
            z-index: 1000;
        }

        #progressbar li:before {
            content: counter(step);
            counter-increment: step;
            width: 40px;
            height: 40px;
            line-height: 43px;
            display: block;
            font-size: 18px;
            color: white;
            background: #7f7f7f;
            border-radius: 25px;
            margin: 0 auto 10px auto;
            z-index: 1;
        }

        /*progressbar connectors*/
        #progressbar li:after {
            content: '';
            width: 80%;
            height: 2px;
            background: #c2c2c2;
            position: absolute;
            left: -40%;
            top: 18px;
            z-index: -1; /*put it behind the numbers*/
        }

        #progressbar li:first-child:after {
            /*connector not needed before the first step*/
            content: none;
        }

        /*marking active/completed steps green*/
        /*The number of the step and the connector before it = green*/
        #progressbar li.active:before, #progressbar li.active:after {
            background: #f6c243;
            color: white;
        }

        .switch label input[type=checkbox]:checked + .lever {
            background-color: #99c453;
        }

        .switch label input[type=checkbox]:checked + .lever:after {
            background-color: #f1f1f1;
        }

        .ui.button {
            border-radius: 5px;
        }

    </style>
@endsection

@section('content')
    <!-- multistep form -->
    <div class="container">
        <form id="msform" class="ui form">
            <!-- progressbar -->
            <div id="form-wrapper" style="border: solid 1px #c7c7c7">
                <ul id="progressbar" style="padding-top: 30px; z-index: 2">
                    <li class="active">Description</li>
                    <li>Logistics</li>
                    <li>Finalize</li>
                </ul>
                <!-- fieldsets -->
                <fieldset>
                    <h2 class="fs-title">DESCRIPTION</h2>
                    <h3 class="fs-subtitle">TELL US ABOUT YOUR GIG</h3>
                    <div class="fields">
                        <div class="eight wide field">
                            <label>GIG NAME</label>
                            <input type="text" name="card[number]" placeholder="Gig Name">
                        </div>
                        <div class="eight wide field">
                            <label>SELECT A CATEGORY</label>
                            <div class="field">
                                <div class="ui fluid selection select dropdown">
                                    <input type="hidden" name="receipt">
                                    <i class="dropdown icon"></i>
                                    <div class="default text">Categories</div>
                                    <div class="menu">
                                        <div class="item" data-value="jenny" data-text="Jenny">
                                            <img class="ui mini avatar image" src="/images/avatar/small/jenny.jpg">
                                            Jenny Hess
                                        </div>
                                        <div class="item" data-value="elliot" data-text="Elliot">
                                            <img class="ui mini avatar image" src="/images/avatar/small/elliot.jpg">
                                            Elliot Fu
                                        </div>
                                        <div class="item" data-value="stevie" data-text="Stevie">
                                            <img class="ui mini avatar image" src="/images/avatar/small/stevie.jpg">
                                            Stevie Feliciano
                                        </div>
                                        <div class="item" data-value="christian" data-text="Christian">
                                            <img class="ui mini avatar image" src="/images/avatar/small/christian.jpg">
                                            Christian
                                        </div>
                                        <div class="item" data-value="matt" data-text="Matt">
                                            <img class="ui mini avatar image" src="/images/avatar/small/matt.jpg">
                                            Matt
                                        </div>
                                        <div class="item" data-value="justen" data-text="Justen">
                                            <img class="ui mini avatar image" src="/images/avatar/small/justen.jpg">
                                            Justen Kitsune
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sixteen wide field">
                        <label>DESCRIPTION</label>
                        <textarea rows="2" class="materialize-textarea"></textarea>
                    </div>
                    <div class="field">
                        <label>ACCEPTANCE CRITERIA</label>
                        <div class="header two fields">
                            <div id="criteria_wrapper" class="thirteen wide field">
                                <input type="text" id="criteria_input" placeholder="Enter Criteria...">
                            </div>
                            <div class="three wide field">
                                <div class="ui button green" tabindex="0" onclick="newElement()" style="width: 100px;">
                                    Add
                                </div>
                            </div>
                        </div>

                        <div id="criteria_list" class="ui middle aligned divided list">
                        </div>
                    </div>

                    <input type="button" name="next" class="next action-button" value="CONTINUE"/>
                </fieldset>
                <fieldset>
                    <h2 class="fs-title">LOGISTICS</h2>
                    <h3 class="fs-subtitle">LET'S SORT OUT THE DETAILS</h3>
                    <div class="fields">
                        <div class="eight wide field">
                            <label>START DATE</label>
                            <input type="text" class="datepicker" placeholder="&#xf310;"
                                   style="font-family:Cambay, Icons"/>
                        </div>
                        <div class="eight wide field">
                            <label>END DATE</label>
                            <input type="text" class="datepicker" placeholder="&#xf310;"
                                   style="font-family:Cambay, Icons"/>
                        </div>
                    </div>
                    <div class="fields">
                        <div class="eight wide field">
                            <label>PROJECT LOCATION</label>
                            <div class="ui search selection dropdown select">
                                <input type="hidden" name="location">
                                <i class="dropdown icon"></i>
                                <div class="default text">Location</div>
                                <div class="menu">
                                    <div class="item" data-value="1">Male</div>
                                    <div class="item" data-value="0">Female</div>
                                </div>
                            </div>
                        </div>
                        <div class="eight wide field">
                            <label>TIMEZONE PREFERENCES</label>
                            <div class="ui search selection dropdown select">
                                <input type="hidden" name="timezone">
                                <i class="dropdown icon"></i>
                                <div class="default text">Timezone</div>
                                <div class="menu">
                                    <div class="item" data-value="1">Male</div>
                                    <div class="item" data-value="0">Female</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sixteen wide field">
                        <label>THIS GIG WILL PROVIDE THE FOLLOWING BENEFITS:</label>
                        <textarea rows="2" data-length="500" class="materialize-textarea"></textarea>
                    </div>
                    <div class="fields">
                        <div class="eight wide field">
                            <label>HOW MANY PEOPLE ARE ALLOWED TO SIGN UP?</label>
                            <input type="hidden" name="user_count" value="">
                            <svg class="users" version="1.1" data-users="1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 viewBox="0 0 55 55" style="enable-background:new 0 0 55 55; float: left; padding: 0 5px;"
                                 height="100" width="100" xml:space="preserve">
                                    <path d="M55,27.5C55,12.337,42.663,0,27.5,0S0,12.337,0,27.5c0,8.009,3.444,15.228,8.926,20.258l-0.026,0.023l0.892,0.752
                                        c0.058,0.049,0.121,0.089,0.179,0.137c0.474,0.393,0.965,0.766,1.465,1.127c0.162,0.117,0.324,0.234,0.489,0.348
                                        c0.534,0.368,1.082,0.717,1.642,1.048c0.122,0.072,0.245,0.142,0.368,0.212c0.613,0.349,1.239,0.678,1.88,0.98
                                        c0.047,0.022,0.095,0.042,0.142,0.064c2.089,0.971,4.319,1.684,6.651,2.105c0.061,0.011,0.122,0.022,0.184,0.033
                                        c0.724,0.125,1.456,0.225,2.197,0.292c0.09,0.008,0.18,0.013,0.271,0.021C25.998,54.961,26.744,55,27.5,55
                                        c0.749,0,1.488-0.039,2.222-0.098c0.093-0.008,0.186-0.013,0.279-0.021c0.735-0.067,1.461-0.164,2.178-0.287
                                        c0.062-0.011,0.125-0.022,0.187-0.034c2.297-0.412,4.495-1.109,6.557-2.055c0.076-0.035,0.153-0.068,0.229-0.104
                                        c0.617-0.29,1.22-0.603,1.811-0.936c0.147-0.083,0.293-0.167,0.439-0.253c0.538-0.317,1.067-0.648,1.581-1
                                        c0.185-0.126,0.366-0.259,0.549-0.391c0.439-0.316,0.87-0.642,1.289-0.983c0.093-0.075,0.193-0.14,0.284-0.217l0.915-0.764
                                        l-0.027-0.023C51.523,42.802,55,35.55,55,27.5z M2,27.5C2,13.439,13.439,2,27.5,2S53,13.439,53,27.5
                                        c0,7.577-3.325,14.389-8.589,19.063c-0.294-0.203-0.59-0.385-0.893-0.537l-8.467-4.233c-0.76-0.38-1.232-1.144-1.232-1.993v-2.957
                                        c0.196-0.242,0.403-0.516,0.617-0.817c1.096-1.548,1.975-3.27,2.616-5.123c1.267-0.602,2.085-1.864,2.085-3.289v-3.545
                                        c0-0.867-0.318-1.708-0.887-2.369v-4.667c0.052-0.519,0.236-3.448-1.883-5.864C34.524,9.065,31.541,8,27.5,8
                                        s-7.024,1.065-8.867,3.168c-2.119,2.416-1.935,5.345-1.883,5.864v4.667c-0.568,0.661-0.887,1.502-0.887,2.369v3.545
                                        c0,1.101,0.494,2.128,1.34,2.821c0.81,3.173,2.477,5.575,3.093,6.389v2.894c0,0.816-0.445,1.566-1.162,1.958l-7.907,4.313
                                        c-0.252,0.137-0.502,0.297-0.752,0.476C5.276,41.792,2,35.022,2,27.5z M42.459,48.132c-0.35,0.254-0.706,0.5-1.067,0.735
                                        c-0.166,0.108-0.331,0.216-0.5,0.321c-0.472,0.292-0.952,0.57-1.442,0.83c-0.108,0.057-0.217,0.111-0.326,0.167
                                        c-1.126,0.577-2.291,1.073-3.488,1.476c-0.042,0.014-0.084,0.029-0.127,0.043c-0.627,0.208-1.262,0.393-1.904,0.552
                                        c-0.002,0-0.004,0.001-0.006,0.001c-0.648,0.16-1.304,0.293-1.964,0.402c-0.018,0.003-0.036,0.007-0.054,0.01
                                        c-0.621,0.101-1.247,0.174-1.875,0.229c-0.111,0.01-0.222,0.017-0.334,0.025C28.751,52.97,28.127,53,27.5,53
                                        c-0.634,0-1.266-0.031-1.895-0.078c-0.109-0.008-0.218-0.015-0.326-0.025c-0.634-0.056-1.265-0.131-1.89-0.233
                                        c-0.028-0.005-0.056-0.01-0.084-0.015c-1.322-0.221-2.623-0.546-3.89-0.971c-0.039-0.013-0.079-0.027-0.118-0.04
                                        c-0.629-0.214-1.251-0.451-1.862-0.713c-0.004-0.002-0.009-0.004-0.013-0.006c-0.578-0.249-1.145-0.525-1.705-0.816
                                        c-0.073-0.038-0.147-0.074-0.219-0.113c-0.511-0.273-1.011-0.568-1.504-0.876c-0.146-0.092-0.291-0.185-0.435-0.279
                                        c-0.454-0.297-0.902-0.606-1.338-0.933c-0.045-0.034-0.088-0.07-0.133-0.104c0.032-0.018,0.064-0.036,0.096-0.054l7.907-4.313
                                        c1.36-0.742,2.205-2.165,2.205-3.714l-0.001-3.602l-0.23-0.278c-0.022-0.025-2.184-2.655-3.001-6.216l-0.091-0.396l-0.341-0.221
                                        c-0.481-0.311-0.769-0.831-0.769-1.392v-3.545c0-0.465,0.197-0.898,0.557-1.223l0.33-0.298v-5.57l-0.009-0.131
                                        c-0.003-0.024-0.298-2.429,1.396-4.36C21.583,10.837,24.061,10,27.5,10c3.426,0,5.896,0.83,7.346,2.466
                                        c1.692,1.911,1.415,4.361,1.413,4.381l-0.009,5.701l0.33,0.298c0.359,0.324,0.557,0.758,0.557,1.223v3.545
                                        c0,0.713-0.485,1.36-1.181,1.575l-0.497,0.153l-0.16,0.495c-0.59,1.833-1.43,3.526-2.496,5.032c-0.262,0.37-0.517,0.698-0.736,0.949
                                        l-0.248,0.283V39.8c0,1.612,0.896,3.062,2.338,3.782l8.467,4.233c0.054,0.027,0.107,0.055,0.16,0.083
                                        C42.677,47.979,42.567,48.054,42.459,48.132z"/>
                            </svg>
                            <svg class="users" version="1.1" data-users="2" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 viewBox="0 0 55 55" style="enable-background:new 0 0 55 55; float: left; padding: 0 5px;"
                                 height="100" width="100" xml:space="preserve">
                                    <path d="M55,27.5C55,12.337,42.663,0,27.5,0S0,12.337,0,27.5c0,8.009,3.444,15.228,8.926,20.258l-0.026,0.023l0.892,0.752
                                        c0.058,0.049,0.121,0.089,0.179,0.137c0.474,0.393,0.965,0.766,1.465,1.127c0.162,0.117,0.324,0.234,0.489,0.348
                                        c0.534,0.368,1.082,0.717,1.642,1.048c0.122,0.072,0.245,0.142,0.368,0.212c0.613,0.349,1.239,0.678,1.88,0.98
                                        c0.047,0.022,0.095,0.042,0.142,0.064c2.089,0.971,4.319,1.684,6.651,2.105c0.061,0.011,0.122,0.022,0.184,0.033
                                        c0.724,0.125,1.456,0.225,2.197,0.292c0.09,0.008,0.18,0.013,0.271,0.021C25.998,54.961,26.744,55,27.5,55
                                        c0.749,0,1.488-0.039,2.222-0.098c0.093-0.008,0.186-0.013,0.279-0.021c0.735-0.067,1.461-0.164,2.178-0.287
                                        c0.062-0.011,0.125-0.022,0.187-0.034c2.297-0.412,4.495-1.109,6.557-2.055c0.076-0.035,0.153-0.068,0.229-0.104
                                        c0.617-0.29,1.22-0.603,1.811-0.936c0.147-0.083,0.293-0.167,0.439-0.253c0.538-0.317,1.067-0.648,1.581-1
                                        c0.185-0.126,0.366-0.259,0.549-0.391c0.439-0.316,0.87-0.642,1.289-0.983c0.093-0.075,0.193-0.14,0.284-0.217l0.915-0.764
                                        l-0.027-0.023C51.523,42.802,55,35.55,55,27.5z M2,27.5C2,13.439,13.439,2,27.5,2S53,13.439,53,27.5
                                        c0,7.577-3.325,14.389-8.589,19.063c-0.294-0.203-0.59-0.385-0.893-0.537l-8.467-4.233c-0.76-0.38-1.232-1.144-1.232-1.993v-2.957
                                        c0.196-0.242,0.403-0.516,0.617-0.817c1.096-1.548,1.975-3.27,2.616-5.123c1.267-0.602,2.085-1.864,2.085-3.289v-3.545
                                        c0-0.867-0.318-1.708-0.887-2.369v-4.667c0.052-0.519,0.236-3.448-1.883-5.864C34.524,9.065,31.541,8,27.5,8
                                        s-7.024,1.065-8.867,3.168c-2.119,2.416-1.935,5.345-1.883,5.864v4.667c-0.568,0.661-0.887,1.502-0.887,2.369v3.545
                                        c0,1.101,0.494,2.128,1.34,2.821c0.81,3.173,2.477,5.575,3.093,6.389v2.894c0,0.816-0.445,1.566-1.162,1.958l-7.907,4.313
                                        c-0.252,0.137-0.502,0.297-0.752,0.476C5.276,41.792,2,35.022,2,27.5z M42.459,48.132c-0.35,0.254-0.706,0.5-1.067,0.735
                                        c-0.166,0.108-0.331,0.216-0.5,0.321c-0.472,0.292-0.952,0.57-1.442,0.83c-0.108,0.057-0.217,0.111-0.326,0.167
                                        c-1.126,0.577-2.291,1.073-3.488,1.476c-0.042,0.014-0.084,0.029-0.127,0.043c-0.627,0.208-1.262,0.393-1.904,0.552
                                        c-0.002,0-0.004,0.001-0.006,0.001c-0.648,0.16-1.304,0.293-1.964,0.402c-0.018,0.003-0.036,0.007-0.054,0.01
                                        c-0.621,0.101-1.247,0.174-1.875,0.229c-0.111,0.01-0.222,0.017-0.334,0.025C28.751,52.97,28.127,53,27.5,53
                                        c-0.634,0-1.266-0.031-1.895-0.078c-0.109-0.008-0.218-0.015-0.326-0.025c-0.634-0.056-1.265-0.131-1.89-0.233
                                        c-0.028-0.005-0.056-0.01-0.084-0.015c-1.322-0.221-2.623-0.546-3.89-0.971c-0.039-0.013-0.079-0.027-0.118-0.04
                                        c-0.629-0.214-1.251-0.451-1.862-0.713c-0.004-0.002-0.009-0.004-0.013-0.006c-0.578-0.249-1.145-0.525-1.705-0.816
                                        c-0.073-0.038-0.147-0.074-0.219-0.113c-0.511-0.273-1.011-0.568-1.504-0.876c-0.146-0.092-0.291-0.185-0.435-0.279
                                        c-0.454-0.297-0.902-0.606-1.338-0.933c-0.045-0.034-0.088-0.07-0.133-0.104c0.032-0.018,0.064-0.036,0.096-0.054l7.907-4.313
                                        c1.36-0.742,2.205-2.165,2.205-3.714l-0.001-3.602l-0.23-0.278c-0.022-0.025-2.184-2.655-3.001-6.216l-0.091-0.396l-0.341-0.221
                                        c-0.481-0.311-0.769-0.831-0.769-1.392v-3.545c0-0.465,0.197-0.898,0.557-1.223l0.33-0.298v-5.57l-0.009-0.131
                                        c-0.003-0.024-0.298-2.429,1.396-4.36C21.583,10.837,24.061,10,27.5,10c3.426,0,5.896,0.83,7.346,2.466
                                        c1.692,1.911,1.415,4.361,1.413,4.381l-0.009,5.701l0.33,0.298c0.359,0.324,0.557,0.758,0.557,1.223v3.545
                                        c0,0.713-0.485,1.36-1.181,1.575l-0.497,0.153l-0.16,0.495c-0.59,1.833-1.43,3.526-2.496,5.032c-0.262,0.37-0.517,0.698-0.736,0.949
                                        l-0.248,0.283V39.8c0,1.612,0.896,3.062,2.338,3.782l8.467,4.233c0.054,0.027,0.107,0.055,0.16,0.083
                                        C42.677,47.979,42.567,48.054,42.459,48.132z"/>
                            </svg>
                            <svg class="users" version="1.1" data-users="3" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 viewBox="0 0 55 55" style="enable-background:new 0 0 55 55; float: left; padding: 0 5px;"
                                 height="100" width="100" xml:space="preserve">
                                    <path d="M55,27.5C55,12.337,42.663,0,27.5,0S0,12.337,0,27.5c0,8.009,3.444,15.228,8.926,20.258l-0.026,0.023l0.892,0.752
                                        c0.058,0.049,0.121,0.089,0.179,0.137c0.474,0.393,0.965,0.766,1.465,1.127c0.162,0.117,0.324,0.234,0.489,0.348
                                        c0.534,0.368,1.082,0.717,1.642,1.048c0.122,0.072,0.245,0.142,0.368,0.212c0.613,0.349,1.239,0.678,1.88,0.98
                                        c0.047,0.022,0.095,0.042,0.142,0.064c2.089,0.971,4.319,1.684,6.651,2.105c0.061,0.011,0.122,0.022,0.184,0.033
                                        c0.724,0.125,1.456,0.225,2.197,0.292c0.09,0.008,0.18,0.013,0.271,0.021C25.998,54.961,26.744,55,27.5,55
                                        c0.749,0,1.488-0.039,2.222-0.098c0.093-0.008,0.186-0.013,0.279-0.021c0.735-0.067,1.461-0.164,2.178-0.287
                                        c0.062-0.011,0.125-0.022,0.187-0.034c2.297-0.412,4.495-1.109,6.557-2.055c0.076-0.035,0.153-0.068,0.229-0.104
                                        c0.617-0.29,1.22-0.603,1.811-0.936c0.147-0.083,0.293-0.167,0.439-0.253c0.538-0.317,1.067-0.648,1.581-1
                                        c0.185-0.126,0.366-0.259,0.549-0.391c0.439-0.316,0.87-0.642,1.289-0.983c0.093-0.075,0.193-0.14,0.284-0.217l0.915-0.764
                                        l-0.027-0.023C51.523,42.802,55,35.55,55,27.5z M2,27.5C2,13.439,13.439,2,27.5,2S53,13.439,53,27.5
                                        c0,7.577-3.325,14.389-8.589,19.063c-0.294-0.203-0.59-0.385-0.893-0.537l-8.467-4.233c-0.76-0.38-1.232-1.144-1.232-1.993v-2.957
                                        c0.196-0.242,0.403-0.516,0.617-0.817c1.096-1.548,1.975-3.27,2.616-5.123c1.267-0.602,2.085-1.864,2.085-3.289v-3.545
                                        c0-0.867-0.318-1.708-0.887-2.369v-4.667c0.052-0.519,0.236-3.448-1.883-5.864C34.524,9.065,31.541,8,27.5,8
                                        s-7.024,1.065-8.867,3.168c-2.119,2.416-1.935,5.345-1.883,5.864v4.667c-0.568,0.661-0.887,1.502-0.887,2.369v3.545
                                        c0,1.101,0.494,2.128,1.34,2.821c0.81,3.173,2.477,5.575,3.093,6.389v2.894c0,0.816-0.445,1.566-1.162,1.958l-7.907,4.313
                                        c-0.252,0.137-0.502,0.297-0.752,0.476C5.276,41.792,2,35.022,2,27.5z M42.459,48.132c-0.35,0.254-0.706,0.5-1.067,0.735
                                        c-0.166,0.108-0.331,0.216-0.5,0.321c-0.472,0.292-0.952,0.57-1.442,0.83c-0.108,0.057-0.217,0.111-0.326,0.167
                                        c-1.126,0.577-2.291,1.073-3.488,1.476c-0.042,0.014-0.084,0.029-0.127,0.043c-0.627,0.208-1.262,0.393-1.904,0.552
                                        c-0.002,0-0.004,0.001-0.006,0.001c-0.648,0.16-1.304,0.293-1.964,0.402c-0.018,0.003-0.036,0.007-0.054,0.01
                                        c-0.621,0.101-1.247,0.174-1.875,0.229c-0.111,0.01-0.222,0.017-0.334,0.025C28.751,52.97,28.127,53,27.5,53
                                        c-0.634,0-1.266-0.031-1.895-0.078c-0.109-0.008-0.218-0.015-0.326-0.025c-0.634-0.056-1.265-0.131-1.89-0.233
                                        c-0.028-0.005-0.056-0.01-0.084-0.015c-1.322-0.221-2.623-0.546-3.89-0.971c-0.039-0.013-0.079-0.027-0.118-0.04
                                        c-0.629-0.214-1.251-0.451-1.862-0.713c-0.004-0.002-0.009-0.004-0.013-0.006c-0.578-0.249-1.145-0.525-1.705-0.816
                                        c-0.073-0.038-0.147-0.074-0.219-0.113c-0.511-0.273-1.011-0.568-1.504-0.876c-0.146-0.092-0.291-0.185-0.435-0.279
                                        c-0.454-0.297-0.902-0.606-1.338-0.933c-0.045-0.034-0.088-0.07-0.133-0.104c0.032-0.018,0.064-0.036,0.096-0.054l7.907-4.313
                                        c1.36-0.742,2.205-2.165,2.205-3.714l-0.001-3.602l-0.23-0.278c-0.022-0.025-2.184-2.655-3.001-6.216l-0.091-0.396l-0.341-0.221
                                        c-0.481-0.311-0.769-0.831-0.769-1.392v-3.545c0-0.465,0.197-0.898,0.557-1.223l0.33-0.298v-5.57l-0.009-0.131
                                        c-0.003-0.024-0.298-2.429,1.396-4.36C21.583,10.837,24.061,10,27.5,10c3.426,0,5.896,0.83,7.346,2.466
                                        c1.692,1.911,1.415,4.361,1.413,4.381l-0.009,5.701l0.33,0.298c0.359,0.324,0.557,0.758,0.557,1.223v3.545
                                        c0,0.713-0.485,1.36-1.181,1.575l-0.497,0.153l-0.16,0.495c-0.59,1.833-1.43,3.526-2.496,5.032c-0.262,0.37-0.517,0.698-0.736,0.949
                                        l-0.248,0.283V39.8c0,1.612,0.896,3.062,2.338,3.782l8.467,4.233c0.054,0.027,0.107,0.055,0.16,0.083
                                        C42.677,47.979,42.567,48.054,42.459,48.132z"/>
                            </svg>
                        </div>
                        <div class="eight wide field">
                            <label>ESTIMATED HOURS</label>
                            <input type="number" placeholder="Max: 20 hrs" max="20">
                        </div>
                    </div>
                    <div class="sixteen wide field">
                        <label>SKILLS REQUIRED</label>
                        <div class="ui search selection dropdown select">
                            <input type="hidden" name="skills">
                            <i class="dropdown icon"></i>
                            <div class="default text">skills</div>
                            <div class="menu">
                                <div class="item" data-value="1">Male</div>
                                <div class="item" data-value="0">Female</div>
                            </div>
                        </div>
                    </div>
                    <input type="button" name="previous" class="previous action-button" value="PREVIOUS"/>
                    <input type="button" name="next" class="next action-button" value="CONTINUE"/>
                </fieldset>
                <fieldset>
                    <h2 class="fs-title">FINALIZE</h2>
                    <h3 class="fs-subtitle">GET READY TO POST YOUR GIG</h3>
                    <div class="sixteen wide field">
                        <label>LINK TO PROJECT RESOURCES</label>
                        <input type="text" name="card[number]" placeholder="Http://">
                    </div>
                    <div class="sixteen wide field">
                        <label>ADDITIONAL INFORMATION</label>
                        <textarea rows="2" data-length="500" class="materialize-textarea"></textarea>
                    </div>
                    <div class="inline field" style="text-align: left;">
                        <div class="switch">
                            <label>
                                <input type="checkbox">
                                <span class="lever"></span>
                                FLEXIBLE START DATE?
                            </label>
                        </div>
                    </div>
                    <div class="inline field" style="text-align: left;">
                        <div class="switch">
                            <label>
                                <input type="checkbox">
                                <span class="lever"></span>
                                RESOURCE MUST BE ON SITE?
                            </label>
                        </div>
                    </div>
                    <div class="inline field" style="text-align: left;">
                        <div class="switch">
                            <label>
                                <input type="checkbox">
                                <span class="lever"></span>
                                POTENTIAL TO RENEW GIG?
                            </label>
                        </div>
                    </div>
                    <input type="button" name="previous" class="previous action-button" value="PREVIOUS"/>
                    <input type="submit" name="submit" class="submit action-button" value="SUBMIT"/>
                </fieldset>
            </div>
        </form>
    </div>
    <!-- /.MultiStep Form -->
@endsection
@section('footer_scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ui.select').select();
            $('.ui.checkbox').checkbox();
            $('.datepicker').pickadate();
            //jQuery time
            var current_fs, next_fs, previous_fs; //fieldsets
            var left, opacity, scale; //fieldset properties which we will animate
            var animating; //flag to prevent quick multi-click glitches
            $(".next").click(function () {
                if (animating) return false;
                animating = true;
                current_fs = $(this).parent();
                next_fs = $(this).parent().next();
                //activate next step on progressbar using the index of next_fs
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
                //show the next fieldset
                //hide the current fieldset with style
                current_fs.animate({opacity: 0}, {
                    step: function (now, mx) {
                        //increase opacity of next_fs to 1 as it moves in
                        opacity = 1 - now;
                        next_fs.css({'opacity': opacity});
                    },
                    duration: 800,
                    complete: function () {
                        current_fs.hide(500);
                        next_fs.show(500);
                        animating = false;
                    },
                });
            });
            $(".previous").click(function () {
                if (animating) return false;
                animating = true;
                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();
                //de-activate current step on progressbar
                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
                //hide the current fieldset with style
                current_fs.animate({opacity: 0}, {
                    step: function (now, mx) {
                        //increase opacity of previous_fs to 1 as it moves in
                        opacity = 1 - now;
                        previous_fs.css({'opacity': opacity});
                    },
                    duration: 800,
                    complete: function () {
                        current_fs.hide(500);
                        previous_fs.show(500);
                        animating = false;
                    },
                });

            });

        });

        //acceptance criteria
        // Create a new list item when clicking on the "Add" button

        function newElement() {
            if (typeof newElement.counter == 'undefined') {
                newElement.counter = 0;
            }
            newElement.counter++;
            var list = $('#criteria_list');
            var inputList = $('#criteria_wrapper');
            var inputValue = $('#criteria_input').val();
            if (inputValue === '') {
                alert("You must write something!");
            } else {
                var item = '<div class="item"><div class="right floated content"><div class="ui button red remove" data-item="' + newElement.counter + '">Remove</div></div><div class="content" style="padding-top: 15px;">' + inputValue + '</div> </div>';
                list.append(item);
                var input = '<input type="hidden" name="acceptance_criteria[]" value="' + inputValue + '" data-item="' + newElement.counter + '">';
                inputList.append(input);
                $('#criteria_input').val('');
            }
        }

        $(document).on("click", ".remove", function () {
            $(this).closest("div.item").remove();
            item = $(this).attr('data-item');
            $('input[name="acceptance_criteria[]"][data-item="' + item + '"]').remove();
        });

        $(document).on("click", ".users", function () {
            $('.users').css({fill: '#000'});
            var count = $(this).attr('data-users');
            $(this).prevAll('.users').css({fill: '#f6d448'});
            $(this).css({fill: '#f6d448'});
            $('input[name="user_count"]').val(count);

        });
    </script>
@endsection

