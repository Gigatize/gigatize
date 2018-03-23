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
            font-family: 'Cambay', sans-serif;
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
            font-size: 1rem;
        }

        /*form styles*/
        #msform {
            background-image:linear-gradient(to bottom, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 1) 100%), linear-gradient(to right bottom, rgba(228,209,148, .8) 0%, rgba(246,194,67,1) 100%);
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
        #msform input {
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 0px;
            margin-bottom: 10px;
            width: 100%;
            box-sizing: border-box;
            font-family: inspira-sans;
            color: #2C3E50;
            font-size: 13px;
        }

        #msform textarea {
            padding: 15px;
            margin-bottom: 10px;
            font-family: inspira-sans;
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
            width: 150px;
            background: #f6c243;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 5px;
            cursor: pointer;
            padding: 15px 20px;
            margin: 15px 10px;
        }

        #msform .action-button:hover, #msform .action-button:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px #f6c243;
        }

        #msform .action-button.previous {
            width: 150px;
            background: #7f7f7f;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 5px;
            cursor: pointer;
            padding: 15px 20px;
            margin: 15px 10px;
        }

        #msform .action-button-previous:hover, #msform .action-button-previous:focus {
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
            background-color: #97D700;
        }

        .switch label input[type=checkbox]:checked + .lever:after {
            background-color: #97D700;
        }

        #msform input#skills_tag {
            border: none;
        }

        #msform div.tagsinput span.tag {
            background-color: #97D700;
            color: white;
        }
    </style>
    <link type="text/css" rel="stylesheet" href="{!! asset('css/awesomplete.css') !!}"/>
    <link type="text/css" rel="stylesheet" href="{!! asset('css/jquery.tagsinput.css') !!}"/>
@endsection

@section('content')
    <!-- multistep form -->
    <div class="container">
        <form id="msform">
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
                    <input type="text" name="email" placeholder="Email" />
                    <input type="password" name="pass" placeholder="Password" />
                    <input type="password" name="cpass" placeholder="Confirm Password" />
                    <input type="button" name="next" class="next action-button" value="Next" />
                </fieldset>
                <fieldset>
                    <h2 class="fs-title">Social Profiles</h2>
                    <h3 class="fs-subtitle">Your presence on the social network</h3>
                    <input type="text" name="twitter" placeholder="Twitter" />
                    <input type="text" name="facebook" placeholder="Facebook" />
                    <input type="text" name="gplus" placeholder="Google Plus" />
                    <input type="button" name="previous" class="previous action-button" value="Previous" />
                    <input type="button" name="next" class="next action-button" value="Next" />
                </fieldset>
                <fieldset>
                    <h2 class="fs-title">Personal Details</h2>
                    <h3 class="fs-subtitle">We will never sell it</h3>
                    <input type="text" name="fname" placeholder="First Name" />
                    <input type="text" name="lname" placeholder="Last Name" />
                    <input type="text" name="phone" placeholder="Phone" />
                    <textarea name="address" placeholder="Address"></textarea>
                    <input type="button" name="previous" class="previous action-button" value="Previous" />
                    <input type="submit" name="submit" class="submit action-button" value="Submit" />
                </fieldset>
            </div>
        </form>
    </div>
    <!-- /.MultiStep Form -->
@endsection
@section('footer_scripts')
    <script src="{!! asset('js/jquery.tagsinput.js') !!}"></script>
    <script src="{!! asset('js/awesomplete.js') !!}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('select').material_select();
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
                next_fs.show();
                //hide the current fieldset with style
                current_fs.animate({opacity: 0}, {
                    step: function (now, mx) {
                        //as the opacity of current_fs reduces to 0 - stored in "now"
                        //1. scale current_fs down to 80%
                        scale = 1 - (1 - now) * 0.2;
                        //2. bring next_fs from the right(50%)
                        left = (now * 50) + "%";
                        //3. increase opacity of next_fs to 1 as it moves in
                        opacity = 1 - now;
                        current_fs.css({
                            'transform': 'scale(' + scale + ')',
                            'position': 'absolute'
                        });
                        next_fs.css({'left': left, 'opacity': opacity});
                    },
                    duration: 800,
                    complete: function () {
                        current_fs.hide();
                        animating = false;
                    },
                    //this comes from the custom easing plugin
                    easing: 'easeInOutBack'
                });
            });
            $(".previous").click(function () {
                if (animating) return false;
                animating = true;
                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();
                //de-activate current step on progressbar
                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
                //show the previous fieldset
                previous_fs.show();
                //hide the current fieldset with style
                current_fs.animate({opacity: 0}, {
                    step: function (now, mx) {
                        //as the opacity of current_fs reduces to 0 - stored in "now"
                        //1. scale previous_fs from 80% to 100%
                        scale = 0.8 + (1 - now) * 0.2;
                        //2. take current_fs to the right(50%) - from 0%
                        left = ((1 - now) * 50) + "%";
                        //3. increase opacity of previous_fs to 1 as it moves in
                        opacity = 1 - now;
                        current_fs.css({'left': left});
                        previous_fs.css({'transform': 'scale(' + scale + ')', 'opacity': opacity, 'position': 'absolute'});
                    },
                    duration: 800,
                    complete: function () {
                        current_fs.hide();
                        animating = false;
                        previous_fs.css({'position': 'relative'});
                    },
                    //this comes from the custom easing plugin
                    easing: 'easeInOutBack'
                });

            });
            $(document).ready(function () {
                var max_fields = 10; //maximum input boxes allowed
                var wrapper = $("#acceptance_criteria_inputs"); //Fields wrapper
                var add_button = $(".add_field_button"); //Add button ID
                var x = 1; //initlal text box count
                $(add_button).click(function (e) { //on add input button click
                    e.preventDefault();
                    if (x < max_fields) { //max input box allowed
                        x++; //text box increment
                        $(wrapper).append('<div class="row"><div class="twelve wide column"><div class="input-field">{{Form::text("acceptance_criteria[]",null,["placeholder"=>"ex. Logo and Icons are delivered in .svg format"]) }}</div><div class="input-field"><div class="four wide column"><a href="#" class="remove_field"><i class="ui icon close"></i></a></div></div></div>'); //add input box
                    }
                });
                $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
                    e.preventDefault();
                    $(this).parent('div').parent("div").remove();
                    x--;
                })
            });
            $('.datepicker').pickadate({
                default: 'now',
                selectMonths: true, // Creates a dropdown to control month
                selectYears: 15, // Creates a dropdown of 15 years to control year,
                today: 'Today',
                clear: 'Clear',
                close: 'Ok',
                closeOnSelect: false // Close upon selecting a date,
            });
        });
    </script>
@endsection

