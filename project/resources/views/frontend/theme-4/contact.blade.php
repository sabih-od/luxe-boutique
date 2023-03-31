@extends('layouts.theme-4.app')
@section('content')

    <section class="shopInner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="blgCont">
                        <ul>
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li><a href="javascript:;">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid p-0">
            <div class="row m-0">
                <div class="col-md-12 p-0">
                    <h1 class="banHeading">Contact Us</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="mapSec">
        <div class="container-fluid p-0">
            <div class="row m-0">
                <div class="col-md-12 p-0">
                    <div class="mapCont">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6644.021751759503!2d-112.371683!3d33.63096!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x872b50449c4f72a3%3A0x3d108204ce52db2!2sSurprise%2C%20AZ!5e0!3m2!1sen!2sus!4v1662074464740!5m2!1sen!2sus"
                            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="locSec">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="abCont">
                        <h3>Reach Out to Us</h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <div class="loctCont">
                        <i class="fas fa-map-marked-alt"></i>
                        <h3>Address</h3>
                        <p>Surprise, Arizona</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="loctCont">
                        <i class="fas fa-map-marked-alt"></i>
                        <h3>Phone No</h3>
                        <p>602 586 0204</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="loctCont">
                        <i class="fas fa-map-marked-alt"></i>
                        <h3>Email</h3>
                        <p>jesse@haboobenterprises.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contFormSec">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="abCont">
                        <h3>Get In Touch</h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="cntForm text-center">
                        <form>
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Name*">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Email*">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Subject (Optional)">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <textarea class="form-control" id="exampleFormControlTextarea1"
                                              placeholder="Message"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button type="submit" class="themeBtn">Post Comment</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
