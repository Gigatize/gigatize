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
            background-image: linear-gradient(to bottom, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 1) 100%), linear-gradient(to right bottom, rgba(251, 222, 128, .7) 0%, rgba(250, 205, 57, 1) 100%);
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
            border: 1px solid #6C6865;
            border-radius: 5px;
            margin-bottom: 10px;
            width: 100%;
            box-sizing: border-box;
            color: #454955;
            font-size: 13px;
            height: 45px;
            min-height: 45px;
        }

        #msform textarea {
            padding: 15px;
            margin-bottom: 10px;
            font-family: inspira-sans;
            border-radius: 5px;
            color: #454955;
            font-size: 13px;
            width: 95%;
        }

        #msform input:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: 1px solid #87BCDE;
            outline-width: 0;
            transition: All 0.5s ease-in;
            -webkit-transition: All 0.5s ease-in;
            -moz-transition: All 0.5s ease-in;
            -o-transition: All 0.5s ease-in;
        }

        #msform textarea:focus {
            border-bottom: 1px solid #87BCDE;
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
            color: #87BCDE;
        }

        .dropdown-content li > a, .dropdown-content li > span {
            font-size: 16px;
            color: #87BCDE;
            display: block;
            line-height: 22px;
            padding: 14px 16px;
        }

        /*buttons*/
        #msform .action-button {
            width: 200px;
            background: #FACD39;
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
            box-shadow: 0 0 0 2px white, 0 0 0 3px #FACD39;
        }

        #msform .action-button.previous {
            width: 200px;
            background: #6C6865;
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
            box-shadow: 0 0 0 2px white, 0 0 0 3px #6C6865;
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
            color: #6C6865;
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
            color: #6C6865;
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
            background: #6C6865;
            border-radius: 25px;
            margin: 0 auto 10px auto;
            z-index: 1;
        }

        /*progressbar connectors*/
        #progressbar li:after {
            content: '';
            width: 80%;
            height: 2px;
            background: #6C6865;
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
            background: #FACD39;
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
                            <svg class="users"  version="1.1" data-users="1" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 62 62" height="100" width="100" xml:space="preserve" style="enable-background:new 0 0 55 55; float: left; padding: 0 5px;">
                                <defs>
                                    <style>.cls-1 {
                                            fill: #fff;
                                        }

                                        .cls-2 {
                                            fill: #b3b3b3;
                                        }</style>
                                </defs>
                                <title>person-icon</title>
                                <path class="cls-2" d="M668.5,426" transform="translate(-714 -353)"/>
                                <path class="cls-2" d="M795.75,356.94" transform="translate(-714 -353)"/>
                                <path class="cls-2" d="M764.25,332.5" transform="translate(-714 -353)"/>
                                <circle class="cls-2" cx="31" cy="31" r="31"/>
                                <circle class="cls-1" cx="31" cy="31" r="27.06"/>
                                <circle class="cls-2" cx="32" cy="24.75" r="13"/>
                                <ellipse class="cls-2" cx="44.75" cy="45.96" rx="7.5" ry="10.41"/>
                                <rect class="cls-2" x="12.5" y="41.71" width="35.09" height="16.35" rx="8.18"
                                      ry="8.18"/>
                                <path class="cls-2"
                                      d="M762.54,395.12c.8,10.72-9.54,17.88-16.89,17.88s-17-7.09-17-17.88c0-12.89,9.66-1.65,17-1.65S761.51,381.37,762.54,395.12Z"
                                      transform="translate(-714 -353)"/>
                                <ellipse class="cls-2" cx="16.9" cy="45.96" rx="7.5" ry="10.41"/>
                            </svg>
                            <svg class="users"  version="1.1" data-users="2" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 62 62" height="100" width="100" xml:space="preserve" style="enable-background:new 0 0 55 55; float: left; padding: 0 5px;">
                                <defs>
                                    <style>.cls-1 {
                                            fill: #fff;
                                        }

                                        .cls-2 {
                                            fill: #b3b3b3;
                                        }</style>
                                </defs>
                                <title>person-icon</title>
                                <path class="cls-2" d="M668.5,426" transform="translate(-714 -353)"/>
                                <path class="cls-2" d="M795.75,356.94" transform="translate(-714 -353)"/>
                                <path class="cls-2" d="M764.25,332.5" transform="translate(-714 -353)"/>
                                <circle class="cls-2" cx="31" cy="31" r="31"/>
                                <circle class="cls-1" cx="31" cy="31" r="27.06"/>
                                <circle class="cls-2" cx="32" cy="24.75" r="13"/>
                                <ellipse class="cls-2" cx="44.75" cy="45.96" rx="7.5" ry="10.41"/>
                                <rect class="cls-2" x="12.5" y="41.71" width="35.09" height="16.35" rx="8.18"
                                      ry="8.18"/>
                                <path class="cls-2"
                                      d="M762.54,395.12c.8,10.72-9.54,17.88-16.89,17.88s-17-7.09-17-17.88c0-12.89,9.66-1.65,17-1.65S761.51,381.37,762.54,395.12Z"
                                      transform="translate(-714 -353)"/>
                                <ellipse class="cls-2" cx="16.9" cy="45.96" rx="7.5" ry="10.41"/>
                            </svg><svg class="users"  version="1.1" data-users="3" xmlns="http://www.w3.org/2000/svg"
                                       viewBox="0 0 62 62" height="100" width="100" xml:space="preserve" style="enable-background:new 0 0 55 55; float: left; padding: 0 5px;">
                                <defs>
                                    <style>.cls-1 {
                                            fill: #fff;
                                        }

                                        .cls-2 {
                                            fill: #b3b3b3;
                                        }</style>
                                </defs>
                                <title>person-icon</title>
                                <path class="cls-2" d="M668.5,426" transform="translate(-714 -353)"/>
                                <path class="cls-2" d="M795.75,356.94" transform="translate(-714 -353)"/>
                                <path class="cls-2" d="M764.25,332.5" transform="translate(-714 -353)"/>
                                <circle class="cls-2" cx="31" cy="31" r="31"/>
                                <circle class="cls-1" cx="31" cy="31" r="27.06"/>
                                <circle class="cls-2" cx="32" cy="24.75" r="13"/>
                                <ellipse class="cls-2" cx="44.75" cy="45.96" rx="7.5" ry="10.41"/>
                                <rect class="cls-2" x="12.5" y="41.71" width="35.09" height="16.35" rx="8.18"
                                      ry="8.18"/>
                                <path class="cls-2"
                                      d="M762.54,395.12c.8,10.72-9.54,17.88-16.89,17.88s-17-7.09-17-17.88c0-12.89,9.66-1.65,17-1.65S761.51,381.37,762.54,395.12Z"
                                      transform="translate(-714 -353)"/>
                                <ellipse class="cls-2" cx="16.9" cy="45.96" rx="7.5" ry="10.41"/>
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
            $('.users').find('.cls-2').css({fill: '#b3b3b3'});
            var count = $(this).attr('data-users');
            $(this).prevAll('.users').find('.cls-2').css({fill: '#FACD39'});
            $(this).find('.cls-2').css({fill: '#FACD39'});
            $('input[name="user_count"]').val(count);

        });
    </script>
@endsection

