@extends('layouts.front')
@section('content')

    <!-- Begin: Main Slider -->
    <div class="innerBan">
        <img src="{{asset('assets/front/images/innerbnr1.webp')}}" class="w-100" alt="">
        <div class="overlay">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <h2>about us</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End: Main Slider -->


    <section class="aboutInner">
        <div class="container">
            <h2 class="secHeading ">Welcome to Luxe!</h2>
            <!--            <div class="row align-items-center">-->
            <!--                <div class="col-md-12 my-5">-->
            <!--                    <p>As I grew so did my love for the beauty industry, all I wanted for Christmas one year was-->
            <!--                        fabrics, sewing supplies, a mannequin and anything I needed to get started! However, being in a-->
            <!--                        small town I assumed my dreams would never go anywhere... So, I chose the next best thing and-->
            <!--                        became a cosmetologist. I love doing hair and making people feel on the inside how everyone sees-->
            <!--                        them on the outside! </p>-->
            <!--                    <p>Once I was getting started in my career in cosmetology, I got pregnant and brought home the most-->
            <!--                        precious baby girl, Parker. I went back to work shortly after and felt like I was missing so-->
            <!--                        much. She could come with me some, but it just wasn’t the same and I felt like I was always-->
            <!--                        working trying to build my business. Then we had our sweet baby boy, Westin. </p>-->
            <!--                    <figure>-->
            <!--                        <img src="images/abt1.webp" class="img-fluid" alt="">-->
            <!--                    </figure>-->
            <!--                </div>-->
            <!--            </div>-->
            <div class="row mt-5 align-items-center">
                <div class="col-md-6 abthead viewbtn">
                    <p>
                        We are a Mother/Daughter owned company located in Bowling Green Ky!
                    </p>
                    <p>
                        When I was young, trying to find my place in the world and decide what I wanted to be when I
                        grew up, one of those ideas was a fashion designer! For as long as I can remember I have LOVED
                        all things fashion! Not to mention I started the first few years of my life in national pageants
                        twirling away in pretty dresses and loving every minute!
                    </p>
                    <p>
                        As I grew so did my love for the beauty industry, all I wanted for Christmas one year was
                        fabrics, sewing supplies, a mannequin and anything I needed to get started! However, being in a
                        small town I assumed my dreams would never go anywhere... So, I chose the next best thing and
                        became a cosmetologist. I love doing hair and making people feel on the inside how everyone sees
                        them on the outside!
                    </p>
                    <p>
                        Once I was getting started in my career in cosmetology, I got pregnant and brought home the most
                        precious baby girl, Parker. I went back to work shortly after and felt like I was missing so
                        much. She could come with me some, but it just wasn’t the same and I felt like I was always
                        working trying to build my business. Then we had our sweet baby boy, Westin.
                    </p>
                </div>
                <div class="col-md-6">
                    <figure>
                        <img src="{{asset('assets/front/images/abt.jpg')}}" class="img-fluid w-100" alt="">
                    </figure>
                </div>
                <div class="col-12 mt-4  abthead viewbtn">
                    <p>
                        At this point I knew I needed a change, so I got to thinking about all the things I love and
                        need then putting them together. I absolutely love for my babies to match especially for
                        pictures, but I feel like I search and search for outfits just to come up empty handed. Some
                        other products I feel like I am always searching for is a good quality men’s clothing line for
                        my husband, and unique pieces for myself!
                    </p>
                    <p>
                        From this grew the idea of a family boutique to cater to everyone. I didn’t just want to cover
                        the demand of children’s clothes but also anyone in your family. Who doesn’t love a one stop
                        shop, right? You can get a fresh set of nails next door then hop on over for some great deals!
                    </p>
                    <p>
                        We strive to be the best we can be! When it comes to customer service, we expect a certain
                        experience given to every single client from every single employee. Our clientele is so much
                        more to us than that, they are our family, and we hope to all grow together! Welcome to the
                        family!
                    </p>
                    <p>
                        p.s. don’t stop following your dreams, anything is possible!
                    </p>
                    <p>
                        Can’t wait to see you all at Luxe,
                    </p>
                    <p class="signature">XO Brooklyn</p>
                    <a href="contact.php" class="themeBtn">Contact us</a>
                </div>
            </div>
            <!--            <div class="row align-items-center">-->
            <!--                <div class="col-md-12 mt-5">-->
            <!--                    <p class="mt5">At this point I knew I needed a change, so I got to thinking about all the things I-->
            <!--                        love and need then putting them together. I absolutely love for my babies to match especially-->
            <!--                        for pictures, but I feel like I search and search for outfits just to come up empty handed. Some-->
            <!--                        other products I feel like I am always searching for is a good quality men’s clothing line for-->
            <!--                        my husband, and unique pieces for myself! </p>-->
            <!--                    <p>From this grew the idea of a family boutique to cater to everyone. I didn’t just want to cover-->
            <!--                        the demand of children’s clothes but also anyone in your family. Who doesn’t love a one stop-->
            <!--                        shop, right? You can get a fresh set of nails next door then hop on over for some great deals!-->
            <!--                    </p>-->
            <!--                    <p class="mt5">We strive to be the best we can be! When it comes to customer service, we expect a-->
            <!--                        certain experience given to every single client from every single employee. Our clientele is so-->
            <!--                        much more to us than that, they are our family, and we hope to all grow together! Welcome to the-->
            <!--                        family! </p>-->
            <!--                    <p>p.s. don’t stop following your dreams, anything is possible!</p>-->
            <!--                    <p>Can’t wait to see you all at Luxe,</p>-->
            <!--                    <p><strong>XO Brooklyn</strong></p>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--            <div class="row align-items-center">-->
            <!--                <div class="col-md-4">-->
            <!--                    <figure>-->
            <!--                        <img src="images/abt3.webp" alt="">-->
            <!--                    </figure>-->
            <!--                </div>-->
            <!--                <div class="col-md-4">-->
            <!--                    <figure>-->
            <!--                        <img src="images/abt4.webp" alt="">-->
            <!--                    </figure>-->
            <!--                </div>-->
            <!--                <div class="col-md-4">-->
            <!--                    <figure>-->
            <!--                        <img src="images/abt5.webp" alt="">-->
            <!--                    </figure>-->
            <!--                </div>-->
            <!--            </div>-->
        </div>
    </section>


    <section class="instaSec">
        <div class="container-fluid p-0">
            <div class="insta-ar">
                <div class="secHeading">
                    <h2 class="secHeading mb-2">@instagram <i class="fab fa-instagram"></i></h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="swiper instaSlider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide" data-aos="zoom-in-right">
                                <figure>
                                    <img src="{{asset('assets/front/images/insta1.webp')}}" class="img-fluid" alt="img">
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </figure>
                            </div>
                            <div class="swiper-slide" data-aos="zoom-in-left">
                                <figure>
                                    <img src="{{asset('assets/front/images/insta2.webp')}}" class="img-fluid" alt="img">
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </figure>
                            </div>
                            <div class="swiper-slide" data-aos="zoom-in-right">
                                <figure>
                                    <img src="{{asset('assets/front/images/insta3.webp')}}" class="img-fluid" alt="img">
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </figure>
                            </div>
                            <div class="swiper-slide" data-aos="zoom-in-left">
                                <figure>
                                    <img src="{{asset('assets/front/images/insta4.webp')}}" class="img-fluid" alt="img">
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </figure>
                            </div>
                            <div class="swiper-slide" data-aos="zoom-in-right">
                                <figure>
                                    <img src="{{asset('assets/front/images/insta5.webp')}}" class="img-fluid" alt="img">
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </figure>
                            </div>
                        </div>
                        <div class="swiper-button-next"><span data-hover="NEXT"><i
                                        class="fal fa-long-arrow-right"></i></span></div>
                        <div class="swiper-button-prev"><span data-hover="PREV"><i
                                        class="fal fa-long-arrow-left"></i></span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
