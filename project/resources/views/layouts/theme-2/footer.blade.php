<!-- Begin: Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-2 wow fadeInLeft" data-wow-delay="1.2s">
                <a href="{{ url('/') }}"><img src="{{ asset('assets/images/'.$gs->footer_logo) }}" alt="logo"
                                              class="footerLogo"></a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 wow fadeInLeft" data-wow-delay="0.8s">
                <h3>About Us</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi velit tellus, iaculis id odio vel,
                    sodales elementum quam. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <ul class="socialIo">
                    <li><a href="#" class="fb"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#" class="insta"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#" class="utube"><i class="fab fa-youtube"></i></a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 wow fadeInLeft" data-wow-delay="0.8s">
                <h3>QUICK LINKS</h3>
                <ul class="links">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('about') }}">About Us</a></li>
                    <li><a href="#">Training Program</a></li>
                    <li><a href="{{ route('front.real-item-marketplace') }}">Marketplace</a></li>
                    <li><a href="{{ route('front.membership') }}">Membership</a></li>
                    <li><a href="#">Parent Portal</a></li>
                    <li><a href="#">SLP Helpline</a></li>
                    <li><a href="{{ route('front.blog') }}">Blog</a></li>
                    <li><a href="{{ route('front.contact') }}">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 wow fadeInLeft" data-wow-delay="0.4s">
                <h3>Contact Us</h3>
                <ul class="contactInfo">
                    <li><a href="#"><i class="fas fa-map-marker-alt"></i>{{ $ps->street }}</a></li>
                    <li><a href="tel:{{ $ps->phone }}"><i class="fas fa-phone-alt"></i>{{ $ps->phone }}</a></li>
                    <li><a href="mailto:{{ $ps->email }}"><i class="fas fa-envelope"></i>{{ $ps->email }}</a></li>
                </ul>
            </div>
        </div>
        <div class="row copyRight">
            <div class="col-lg-12 col-md-12 wow fadeInLeft" data-wow-delay="0.5s">
                <p>{{ $gs->copyright }}</p>
            </div>
        </div>
    </div>
</footer>
<!-- END: Footer -->
