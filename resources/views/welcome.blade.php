@extends('layouts.app')

@section('title','Home')

@section('header_styles')
  <style type="text/css">
      .overlay{
          background-color: rgba(255,255,255,.8);
          height: 100%;
      }
      .parallax-container{
          height: 750px;
          width: 100%;
      }
      .max-height{
          height: 100%;
      }
      button.ui.button.tile-button{
          width:95%;
          border: 2px solid #6C6865;
          position: absolute;
          bottom: 0;
          line-height: .5em;
          margin: 2.5%;
      }
      button.ui.button.tile-button span {
          color: #6C6865;
          font-size: 16px;
      }
        .icon-label {
            border: 2px solid #ffd45a;
            padding: 8px;
            text-transform: uppercase;
            display: inline-block;
            font-weight: 700;
            font-size: 16px;
        }

        .icon {
            display: block;
            margin: 16px auto;
            width: 140px;
        }

        .testimonial_photo {
            border-radius: 50%;
            overflow: hidden;
            margin: 16px auto;
            width: 200px;
            height: 200px;
            text-align: center;
        }

        .testimonial_photo img {
            width: 200px;
            height: 200px;
        }
  </style>
@endsection

@section('content')
    <div id="index-banner" class="parallax-container">
        <div class="row no-pad-bot max-height">
            <div class="col m12 l7">
            </div>
            <div class="col m12 l5 overlay" style="padding: 5% 5%">
                <h1 class="header white-text" style="text-transform: capitalize">
                    <b>LET'S <br><span class="yellow-text">TRANSFORM</span> <br>THE WAY<br>WE WORK</b>
                </h1>
                <h5 class="dark-grey-text darken-2">
                    Find help when you need it,<br>help others when you can.
                </h5>
                <br>
                <a href="{{url('/projects')}}"><button class="ui big yellow basic button" style="border: 2px solid #FBBD08;"><span class="black-text" style="text-transform: capitalize">Find A Gig</span></button></a>
                <a href="{{url('/projects/create')}}"><button class="ui big yellow basic button" style="border: 2px solid #FBBD08;"><span class="black-text" style="text-transform: capitalize">Post A Gig</span></button></a>
            </div>
        </div>
        <div class="parallax">
            <video autoplay muted loop id="bgvid">
                <source src="{{asset('video/background1.mp4')}}" type="video/mp4">
            </video>
        </div>
    </div>


    <div class="container">
        <div class="section">

            <!--   Icon Section   -->
            <div class="row" style="padding: 50px 0 0">
                <div class="col s12 m4">
                    <div class="icon-block center">
                        <img src="/images/productivity_icon.png" class="icon" />
                        <div class="icon-label">
                            Productivity
                        </div>
                        <h4>Embrace the<br />Gig Economy</h4>
                        <p>
                            We connect solution seekers with problem solvers to leverage the power of your internal workforce. Our dashboards visualize your productivity savings in real-time.
                        </p>
                        <a class="waves-effect waves-light btn-small" href="#" style="color: #DDB40D;">Read More &gt;</a>
                    </div>
                </div>
                <div class="col s12 m4">
                    <div class="icon-block center">
                        <img src="/images/engagement_icon.png" class="icon" />
                        <div class="icon-label">
                            Engagement
                        </div>
                        <h4>Inspire Loyalty,<br />Reduce Turnover</h4>
                        <p>
                            Are you ready for the #FutureOfWork? We help you combat growing skill shortages, turnover, and disengagement through a platform that empowers your workforce to take the lead!
                        </p>
                        <a class="waves-effect waves-light btn-small" href="#" style="color: #DDB40D;">Read More &gt;</a>
                    </div>
                </div>
                <div class="col s12 m4">
                    <div class="icon-block center">
                        <img src="/images/crosstrain_icon.png" class="icon" />
                        <div class="icon-label">
                            Cross-Train
                        </div>
                        <h4>Upskill Your<br />Workforce</h4>
                        <p>
                            We partner skill seekers with subject matter experts to encourage learning by doing and sharing. Why outsource if you can insource quality, homegrown talent?
                        </p>
                        <a class="waves-effect waves-light btn-small" href="#" style="color: #DDB40D;">Read More &gt;</a>
                    </div>
                </div>
            </div>
            <div class="row" style="padding: 20px 0 50px">
                <div class="col s12 m4 offset-m2">
                    <div class="icon-block center">
                        <img src="/images/empower_icon.png" class="icon" />
                        <div class="icon-label">
                            Empower
                        </div>
                        <h4>Break Down<br />Knowledge Silos</h4>
                        <p>
                            We help your organization establish an organic network that goes beyond the confines of roles and org charts to get you connected with the guidance you need.
                        </p>
                        <a class="waves-effect waves-light btn-small" href="#" style="color: #DDB40D;">Read More &gt;</a>
                    </div>
                </div>
                <div class="col s12 m4">
                    <div class="icon-block center">
                        <img src="/images/recognize_icon.png" class="icon" />
                        <div class="icon-label">
                            Recognize
                        </div>
                        <h4>Cultivate a<br />Community Culture</h4>
                        <p>
                            We gamify gigs and quests so your workforce is well-recognized and rewarded for their engagement. We ensure that your org has an easy way to visibly track and showcase above &amp; beyond efforts.
                        </p>
                        <a class="waves-effect waves-light btn-small" href="#" style="color: #DDB40D;">Read More &gt;</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <h3 class="header col s12 yellow-text center" style="padding: 30px 0;"><strong>LEARN HOW GIGATIZE IS<br />TRANSFORMING COMPANIES</strong></h3>
    </div>
    <div style="background-image: url('/images/room.jpg'); background-size: cover;">
        <div class="row" style="padding: 50px 0;">
            <div class="col s12 m4" style="padding: 0 30px;">
                <div class="testimonial_photo">
                    <img src="/images/photo_allyson.jpg">
                </div>
                <h4 class="center" style="color: #DDB40D;">Allyson MacKay, M&amp;T Bank</h4>
                <p style="text-align: center; line-height: 1.6;">
                    As a Project Leader, it is difficult to find the resources I need when my team faces roadblocks. Gigatize has given me the freedom to find resources without having to go through a painfully long external hire process and the best part is, I am meeting new people within my organization that have the skills and desire to work on what I'm trying to drive
                    <div style="font-size: 70px; font-family: serif; color: #DDB40D; line-height: 80px;">&rdquo;</div>
                </p>
            </div>
            <div class="col s12 m4" style="padding: 0 30px;">
                <div class="testimonial_photo">
                    <img src="/images/photo_dominique.jpg">
                </div>
                <h4 class="center" style="color: #DDB40D;">Dominique Riley, GE</h4>
                <p style="text-align: center; line-height: 1.6;">
                    My background is in Chemistry, but I've been taking coding classes and have been loving it! Gigatize was able to connect me with opportunities so I could apply what I am learning and help my company at the same time
                    <div style="font-size: 70px; font-family: serif; color: #DDB40D; line-height: 80px;">&rdquo;</div>
                </p>
            </div>
            <div class="col s12 m4" style="padding: 0 30px;">
                <div class="testimonial_photo">
                    <img src="/images/photo_kareem.jpg">
                </div>
                <h4 class="center" style="color: #DDB40D;">Kareem Dandy, First Data</h4>
                <p style="text-align: center; line-height: 1.6;">
                    Cybersecurity experts are hard to find and even harder to keep given the competitive market. I've been fortunate that several of the people who've completed gigs for my team have joined as full-time members and have proved more valuable than many of the external hires we fight to hire and lose after a few months.
                    <div style="font-size: 70px; font-family: serif; color: #DDB40D; line-height: 80px;">&rdquo;</div>
                </p>
            </div>
        </div>
    </div>
@endsection

@section('footer_scripts')
  <script type="application/javascript">
    $(document).ready(function(){
        $('.parallax').parallax();
    });
  </script>
@endsection