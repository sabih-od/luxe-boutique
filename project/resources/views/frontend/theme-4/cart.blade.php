@extends('layouts.theme-4.app')
@section('content')



    <section class="blogSec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="blgCont">
                        <ul>
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li><a href="javascript:;">Cart</a></li>
                        </ul>
                        <h3>Cart</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cartSec">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="affHead">
                        <h1>Shopping bag</h1>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">PRODUCT</th>
                                <th scope="col">PRICE</th>
                                <th scope="col">Handle</th>
                                <th scope="col">SUBTOTAL</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row"><a href="javascript:;"><i class="fal fa-times"></i></a></th>
                                <td>
                                    <div><img src="assets/images/nt-3.png" class="img-fluid" alt="">
                                        <h2><a href="javascript:;">Product 6</a><br><br><span>Vendor:</span></h2>

                                    </div>
                                </td>
                                <td>$59.00</td>
                                <td><input type="number" id="quantity" name="quantity" min="1" max=""></td>
                                <td> $59.00</td>
                            </tr>

                            </tbody>
                        </table>

                        <form class="mt-5">
                            <div class="row">
                                <div class="col-5">
                                    <input type="text" class="form-control" placeholder="Coupon Code">

                                </div>
                                <div class="col-2">
                                    <button type="submit" class="cartBtn">Apply Coupon</button>
                                </div>
                                <div class="col-2 offset-3">
                                    <button type="submit" class="updtBtn">Apply Coupon</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="affHead">
                        <h1>Cart Totals</h1>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">SUBTOTAL</th>
                                <th scope="col">$59.00</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Total</td>
                                <td> $59.00</td>
                            </tr>
                            <tr>
                                <td colspan="2"><a href="javascript:;" class="proceBtn">PROCEED TO CHECKOUT</a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </section>

@endsection
