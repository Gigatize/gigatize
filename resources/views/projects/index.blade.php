@extends('layouts.app')

@section('header_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/nouislider.css') }}">
    <style type="text/css">
        .pagination li.active{
            color: #facd39;
            background-color: #fff;
        }
        .pagination li.active span{
            color: #facd39;
            display: inline-block;
            font-size: 1.2rem;
            padding: 0 10px;
            line-height: 30px;
        }
        .pagination li span{
            color: #444;
            display: inline-block;
            font-size: 1.2rem;
            padding: 0 10px;
            line-height: 30px;
        }
        .noUi-value.noUi-value-horizontal.noUi-value-large{
            margin-top: 10px;
        }
    </style>
@endsection

@section('content')
    <div class="ui borderless menu" style="margin: 25px 50px 0 50px;">
        <a class="item"><i class="fas fa-filter" style="padding-right: 5px;"></i> Filters:</a>
        <div class="right menu">
            <div class="ui dropdown item">
                Category <i class="dropdown icon"></i>
                <div id="category-form" class="menu">
                    <div class="ui basic segment">
                        <form class="ui form">
                            @foreach(\App\Category::all() as $category)
                            <div class="field">
                                <div class="ui checkbox">
                                    <input type="checkbox" tabindex="0" class="hidden" checked>
                                    <label>{{$category->name}}</label>
                                </div>
                            </div>
                            @endforeach
                            <div class="item fluid center">
                                <div class="two fields">
                                    <div class="field">
                                        <button class="ui button" type="submit">Clear</button>
                                    </div>
                                    <div class="field">
                                        <button class="ui button green" type="submit">Apply</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="ui dropdown item">
                Points <i class="dropdown icon"></i>
                <div id="points-form" class="menu" style="min-width: 300px;">
                    <div class="ui basic segment">
                        <form class="ui form">
                            <div class="field">
                                <div id="test-slider"></div>
                            </div>
                            <br>
                            <div class="item fluid center">
                                <div class="two fields">
                                <div class="field">
                                    <button class="ui button" type="submit">Clear</button>
                                </div>
                                <div class="field">
                                    <button class="ui button green" type="submit">Apply</button>
                                </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="ui dropdown item">
                Start Date <i class="dropdown icon"></i>
                <div id="start-date-form" class="menu" style="min-width: 500px; min-height: 500px;">
                    <div class="ui basic segment">
                        <form class="ui form">
                            <div class="fifteen wide field centered text-center">
                                <label>AFTER</label>
                                <input type="text" class="datepicker">
                            </div>
                            <div class="fifteen teen wide field centered text-center">
                                <label>BEFORE</label>
                                <input type="text" class="datepicker">
                            </div>
                            <div class="item fluid center">
                                <div class="two fields">
                                    <div class="field">
                                        <button class="ui button" type="submit">Clear</button>
                                    </div>
                                    <div class="field">
                                        <button class="ui button green" type="submit">Apply</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="ui dropdown item">
                Deadline <i class="dropdown icon"></i>
                <div id="deadline-form" class="menu" style="min-width: 500px; min-height: 500px;">
                    <div class="ui basic segment">
                        <form class="ui form">
                            <div class="fifteen wide field centered text-center">
                                <label>AFTER</label>
                                <input type="text" class="datepicker">
                            </div>
                            <div class="fifteen teen wide field centered text-center">
                                <label>BEFORE</label>
                                <input type="text" class="datepicker">
                            </div>
                            <div class="item fluid center">
                                <div class="two fields">
                                    <div class="field">
                                        <button class="ui button" type="submit">Clear</button>
                                    </div>
                                    <div class="field">
                                        <button class="ui button green" type="submit">Apply</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="ui dropdown item">
                Skills <i class="dropdown icon"></i>
                <div class="menu">
                    <a class="item">English</a>
                    <a class="item">Russian</a>
                    <a class="item">Spanish</a>
                </div>
            </div>
            <div class="ui dropdown item">
                Sort By <i class="dropdown icon"></i>
                <div class="menu">
                    <a class="item">English</a>
                    <a class="item">Russian</a>
                    <a class="item">Spanish</a>
                </div>
            </div>
            <div class="ui category search item">
                <div class="ui transparent icon input">
                    <input class="prompt" type="text" placeholder="Search..." style="margin-bottom: 0">
                    <i class="search link icon"></i>
                </div>
                <div class="results"></div>
            </div>
        </div>
    </div>
    <div class="ui secondary menu" style="margin:0 50px; max-height: 25px">
        <a class="ui label" style="max-height: 25px">
            Some Filter <i class="close icon"></i>
        </a>
        <a class="ui label" style="max-height: 25px">
            Another Filter <i class="close icon"></i>
        </a>
    </div>
    <div id="project-tiles" class="ui three stackable cards" style="margin: 25px 50px;">
        @foreach($projects as $project)
            @include('projects.project_tile')
        @endforeach
    </div>
    <div class="ui grid container">
        <div class="sixteen wide column center">
            {{ $projects->links() }}
        </div>
    </div>
@endsection

@section('footer_scripts')
    <script src="{{ asset('js/nouislider.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ui.checkbox').checkbox();
            $('.datepicker').pickadate();
            $('.more-skills').popup({
                hoverable  : true,
                position   : 'bottom center',
                variation: 'inverted'
            });

            var slider = document.getElementById('test-slider');
            noUiSlider.create(slider, {
                start: [0, 100],
                connect: true,
                step: 1,
                orientation: 'horizontal', // 'horizontal' or 'vertical'
                range: {
                    'min': 0,
                    'max': 100
                },
                pips: {
                    mode: 'range',
                    density: 10
                },
                format: wNumb({
                    decimals: 0
                })
            });
        });
        $(document).on("click",".favorite",function () {
            var project_id = $(this).attr('data-project');
            //set to true if has class red-text
            var favorite = $(this).hasClass("red-text");
            if(!favorite) {
                $.post("{{url('/favorite')}}/" + project_id, {'_token': '{{csrf_token()}}'}, function (data) {
                    if (data.success) {
                        $(".favorite[data-project=" + project_id + "]").addClass('red-text');
                        var currentCount = parseInt($(".favorite-count[data-project=" + project_id + "]").html());
                        $(".favorite-count[data-project=" + project_id + "]").html(currentCount + 1);
                    }
                });
            }else{
                $.post( "{{url('/unfavorite')}}/"+project_id, { '_token': '{{csrf_token()}}' }, function( data ) {
                    if(data.success){
                        $(".favorite[data-project=" + project_id + "]").removeClass('red-text');
                        var currentCount =  parseInt($(".favorite-count[data-project="+project_id+"]").html());
                        $(".favorite-count[data-project="+project_id+"]").html(currentCount-1);
                    }
                });
            }
        });

    </script>
@endsection