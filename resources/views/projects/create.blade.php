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
            text-align: left;
            text-transform: capitalize;
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
            background-color: #97D700;
        }

        .switch label input[type=checkbox]:checked + .lever:after {
            background-color: #97D700;
        }

        .ui.button{
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
                            <input type="text" name="card[number]" maxlength="16" placeholder="Gig Name">
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
                                <div class="ui button green" tabindex="0" onclick="newElement()" style="width: 100px;">Add</div>
                            </div>
                        </div>

                        <div id="criteria_list" class="ui middle aligned divided list" >
                        </div>
                    </div>

                    <input type="button" name="next" class="next action-button" value="CONTINUE" />
                </fieldset>
                <fieldset>
                    <h2 class="fs-title">LOGISTICS</h2>
                    <h3 class="fs-subtitle">LET'S SORT OUT THE DETAILS</h3>
                    <input type="text" name="twitter" placeholder="Twitter" />
                    <input type="text" name="facebook" placeholder="Facebook" />
                    <input type="text" name="gplus" placeholder="Google Plus" />
                    <input type="button" name="previous" class="previous action-button" value="PREVIOUS" />
                    <input type="button" name="next" class="next action-button" value="CONTINUE" />
                </fieldset>
                <fieldset>
                    <h2 class="fs-title">FINALIZE</h2>
                    <h3 class="fs-subtitle">GET READY TO POST YOUR GIG</h3>
                    <input type="text" name="fname" placeholder="First Name" />
                    <input type="text" name="lname" placeholder="Last Name" />
                    <input type="text" name="phone" placeholder="Phone" />
                    <textarea name="address" placeholder="Address"></textarea>
                    <input type="button" name="previous" class="previous action-button" value="PREVIOUS" />
                    <input type="submit" name="submit" class="submit action-button" value="SUBMIT" />
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
            if( typeof newElement.counter == 'undefined' ) {
                newElement.counter = 0;
            }
            newElement.counter++;
            var list = $('#criteria_list');
            var inputList = $('#criteria_wrapper');
            var inputValue = $('#criteria_input').val();
            if (inputValue === '') {
                alert("You must write something!");
            } else {
                var item = '<div class="item"><div class="right floated content"><div class="ui button red remove" data-item="'+newElement.counter+'">Remove</div></div><div class="content" style="padding-top: 15px;">' + inputValue +'</div> </div>';
                list.append(item);
                var input = '<input type="hidden" name="acceptance_criteria[]" value="'+inputValue+'" data-item="'+newElement.counter+'">';
                inputList.append(input);
                $('#criteria_input').val('');
            }
        }

        $(document).on("click",".remove", function(){
            $(this).closest("div.item").remove();
            item = $(this).attr('data-item');
            $('input[name="acceptance_criteria[]"][data-item="'+item+'"]').remove();
        });
    </script>
@endsection

