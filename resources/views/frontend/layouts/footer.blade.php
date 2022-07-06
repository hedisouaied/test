<footer class="site-footer ">
    <div class="main-footer">
        <div class="container">
            <div class="row">

                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="footer-widget links-widget">
                        <div class="title">
                            <h3>Sociétés du groupe</h3>
                        </div><!-- /.title -->
                        <ul class="links-list">
                            @foreach (\App\Models\Feedback::where(['status' => 'active'])->orderBy('id', 'DESC')->get() as $societe_f )


                                <li><a >{{$societe_f->title}}</a></li>
                                @endforeach

                        </ul><!-- /.links-list -->
                    </div><!-- /.footer-widget links-widget -->
                </div><!-- /.col-md-2 -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-widget services-widget">
                        <div class="title">
                            <h3>Nos contact</h3>
                        </div><!-- /.title -->
                        <ul class="links-list">
                            <li><a><i class="fa fa-map-marker"></i> Adresse : Centre d’affaire NORDAMI, LOT 43, Bureau N°311 Zone Franche Tanger TFZ MAROC</a></li>
                            <li><a><i class="fa fa-envelope"></i> E-mail : info@pmm.ma</a></li>
                            <li><a><i class="fa fa-phone"></i> Téléphone Service commercial : +212 (0) 661 99 23 05</a></li>
                            <li><a><i class="fa fa-phone"></i> Téléphone Service Technique : +212 (0) 663 02 82 95</a></li>
                            <li><a><i class="fa fa-phone"></i> Téléphone Bureau : +212 (0) 539 39 50 51 / 52 / 53</a></li>
                        </ul><!-- /.links-list -->
                    </div>
                </div><!-- /.col-md-3 -->
                <div class="col-md-4 col-sm-6 col-xs-12">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2721.517046329986!2d10.66018012101702!3d35.78894747526715!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13027580d686bd19%3A0xd06c2769ee271609!2sHPC%20GROUP!5e0!3m2!1sfr!2stn!4v1644838599928!5m2!1sfr!2stn" width="600" height="300" frameborder="0" style="border:0; width: 100%" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

                </div>
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.main-footer -->
    <div class="bottom-footer">
        <div class="container">
            <div class="left-text pull-left"><p>&copy; Copyright PMM 2022. All right reserved.</p></div>
            <div class="right-text pull-right"><p>Created by <a href="https://tounesconnect.com/" target="_blank">TounesConnect</a></p></div>
        </div><!-- /.container -->
    </div><!-- /.bottom-footer -->
</footer><!-- /.site-footer -->

<section class="hidden-sidebar side-navigation">
    <a href="#" class="close-button side-navigation-close-btn fa fa-times"></a><!-- /.close-button -->
    <div class="sidebar-content">
        <div class="top-content">
            <a href="index.html"><img src="img/logo1-1.png" alt="Awesome Image"/></a>
        </div><!-- /.top-content -->
        <nav class="nav-menu middle-content">
            <ul class="navigation-box">
                <li class="current">
                    <a href="index.html">Home <span class="subnav-toggler fa fa-caret-down"></span></a>
                    <ul class="sub-menu">
                        <li><a href="index.html">Home Page One</a></li>
                        <li><a href="index2.html">Home Page Two</a></li>
                        <li><a href="index3.html">Home Page Three</a></li>
                    </ul><!-- /.sub-menu -->
                </li>
                <li> <a href="about.html">About Us</a> </li>
                <li>
                    <a href="service.html">Services <span class="subnav-toggler fa fa-caret-down"></span></a>
                    <ul class="sub-menu">
                        <li> <a href="single-service.html">Chemical Research</a> </li>
                        <li><a href="single-service.html">Fuel & Gas Management</a></li>
                        <li><a href="single-service.html">Eco & Bio Power</a></li>
                        <li><a href="single-service.html">Mechanical Engineering</a></li>
                        <li><a href="single-service.html">Petroleum Refinery</a></li>
                        <li><a href="single-service.html">Power & Energy Sector</a></li>
                    </ul><!-- /.sub-menu -->
                </li>
                <li>
                    <a href="project.html">Projects <span class="subnav-toggler fa fa-caret-down"></span></a>
                    <ul class="sub-menu">
                        <li> <a href="single-project.html">Project Details</a> </li>
                    </ul><!-- /.sub-menu -->
                </li>
                <li>
                    <a href="#">Pages <span class="subnav-toggler fa fa-caret-down"></span></a>
                    <ul class="sub-menu">
                        <li> <a href="404.html">Error 404</a> </li>
                        <li> <a href="coming-soon.html">Coming Soon</a> </li>
                        <li> <a href="project.html">Projects</a> </li>
                        <li> <a href="single-project.html">Project Details</a> </li>
                        <li><a href="team.html">Team</a></li>
                        <li><a href="testimonials.html">Testimonials</a></li>
                    </ul><!-- /.sub-menu -->
                </li>
                <li>
                    <a href="blog.html">Blog <span class="subnav-toggler fa fa-caret-down"></span></a>
                    <ul class="sub-menu">
                        <li><a href="blog.html">Blog Classic</a></li>
                        <li><a href="blog-details.html">Blog Details</a></li>
                    </ul><!-- /.sub-menu -->
                </li>
                <li> <a href="contact.html">Contact Us</a> </li>
            </ul>
        </nav><!-- /.nav-menu -->
        <div class="bottom-content">
            <div class="social">
                <a href="#" class="fab fa-facebook-f"></a><!--
                --><a href="#" class="fab fa-twitter"></a><!--
                --><a href="#" class="fab fa-google-plus-g"></a><!--
                --><a href="#" class="fab fa-instagram"></a><!--
                --><a href="#" class="fab fa-behance"></a>
            </div><!-- /.social -->
            <p class="copy-text">&copy; 2018 Industrio. <br /> made with <i class="fa fa-heart"></i> by themexriver</p><!-- /.copy-text -->
        </div><!-- /.bottom-content -->
    </div><!-- /.sidebar-content -->
</section><!-- /.hidden-sidebar -->



