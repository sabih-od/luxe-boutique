@extends('frontend.mail2.email')
@section('content')

    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
        <tr>
            <td align="center" valign="top">
                <table width="850" border="0" cellspacing="0" cellpadding="0"
                       class="mobile-shell">
                    <tbody>
                    <tr>
                        <td class="td container"
                            style="width:650px; min-width:650px; font-size:0pt;
                        line-height:0pt; margin:0;
                        font-weight:normal; padding:0px;">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            </table>
                            <repeater>
                                <layout label="Intro">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                        </tbody>
                                    </table>
                                </layout>
                                <layout label="Article / Full Width Image + Title + Copy + Button">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                        <tr>
                                            <td style="padding-bottom: 10px;">
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0"
                                                       bgcolor="#0e264b">
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </layout>
                                <layout label="Two Columns / Articles">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    </table>
                                </layout>
                                <layout label="Article / Image On The Left - Copy On The Right">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0"
                                           bgcolor="#12325c">
                                    </table>
                                </layout>
                                <layout label="CTA Section">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                        <tr>
                                            <td background="images/bg.png" bgcolor="#C9020E" valign="top"
                                                height="366" class="bg" style="background-size:cover !important;
					-webkit-background-size:cover !important;
					background-repeat:none;">
                                                <div>
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tbody>
                                                        <tr>

                                                            <td>
                                                                <table width="100%" height="800" border="0" cellspacing="0"
                                                                       cellpadding="0"
                                                                       style="background:url(../mail2/images/bgimg.jpg)
											0 0 transparent !important;
											background-size: cover !important;
											">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td class="p30-15" style="padding: 50px 30px;">
                                                                            <table width="100%" border="0" cellspacing="0"
                                                                                   cellpadding="0">
                                                                                <tbody>
                                                                                <tr>
                                                                                    <td class="img" style="
																		line-height:0pt;
																		 text-align:left;
																		 margin:0 auto 20px;
																		display:table;">
                                                                                        <img src="{{ asset('assets/images/ima.png') }}"
                                                                                             width="200" editable="true"
                                                                                             align="center"
                                                                                             border="0" alt="">
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="text-center white pb20"
                                                                                        style="font-family:'Muli', Arial,sans-serif;
																		font-size:16px;
																		line-height:30px;
																		text-align:center;
																		color:#ffffff;
																		padding-bottom:20px;
																		width:50%;
																		display:table;
																		margin:0 auto ;
																		">
                                                                                        <multiline>
                                                                                            Welcome To
                                                                                        </multiline>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="text-center white pb20"
                                                                                        style="font-family:'Muli', Arial,sans-serif;
																		font-size:20px;
																		line-height:30px;
																		text-align:center;
																		color:#ffffff;
																		padding-bottom:20px;
																		width:50%;
																		display:table;
																		margin:0 auto ;
																		text-transform: uppercase;
																		font-weight:600;
																		">
                                                                                        {{--                                                                                        <multiline>--}}
                                                                                        {{--                                                                                            Discount Upto <strong>30%--}}
                                                                                        {{--                                                                                                Off</strong>--}}
                                                                                        {{--                                                                                        </multiline>--}}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="text-center white pb20"
                                                                                        style="font-family:'Muli', Arial,sans-serif;
																		font-size:40px;
																		line-height:30px;
																		text-align:center;
																		color:#ffffff;
																		padding-bottom:20px;
																		width:50%;
																		display:table;
																		margin:0 auto ;
																		text-transform: uppercase;
																		font-weight:700;
																		">
                                                                                        <multiline>
                                                                                            ima usa shop
                                                                                        </multiline>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="text-center white pb20"
                                                                                        style="font-family:'Muli', Arial,sans-serif;
																		font-size:16px;
																		line-height:30px;
																		text-align:center;
																		color:#ffffff;
																		padding-bottom:20px;
																		width:50%;
																		display:table;
																		margin:0 auto ;
																		line-height: 20px;
																		">
                                                                                        <multiline>
                                                                                            <br>
                                                                                            "Subject", {{ $subject }}
                                                                                            <br><br>
                                                                                           Message : {{ $message }}
                                                                                            <br>
                                                                                        </multiline>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center">
                                                                                        <table class="center" border="0"
                                                                                               cellspacing="0"
                                                                                               cellpadding="0"
                                                                                               style="text-align:center;">
                                                                                            <tbody>
                                                                                            <tr>
                                                                                                <td class="dark-blue-button3 text-button"
                                                                                                    style="background:#fff;
																						font-family:'Muli', Arial,sans-serif;
																						font-size:14px; line-height:18px; padding:12px
																						30px; text-align:center;
																						border-radius:22px; font-weight:bold;">
                                                                                                    <multiline>
                                                                                                        <a href="{{ route('front.index') }}"
                                                                                                           target="_blank"
                                                                                                           class="link-white"
                                                                                                           style="color:#C9020E; text-decoration:none;">
																								<span class="link-white"
                                                                                                      style="color:#C9020E;
																									text-decoration:none;">Return Website</span></a>
                                                                                                    </multiline>
                                                                                                </td>
                                                                                            </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                                <!-- END Button -->
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>

                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!--[if gte mso 9]>
                                                </v:textbox>
                                                </v:rect>
                                                <![endif]-->
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </layout>
                                <!-- END CTA Section -->

                                <!-- Article / Image On The Right - Copy On The Left -->
                                <layout label="Article / Image On The Right - Copy On The Left">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    </table>
                                </layout>
                                <!-- END Article / Image On The Right - Copy On The Left -->

                                <!-- Article Secondary / Image On The Left - Copy On The Right -->
                                <layout label="Article Secondary / Image On The Left - Copy On The
	Right">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                        <tr>
                                            <td class="p30-15" bgcolor="#ff6666">
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                </table>
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </layout>
                                <!-- END Article Secondary / Image On The Left - Copy On The Right -->
                                <!-- Two Columns -->
                                <layout label="Two Columns">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    </table>
                                </layout>
                                <!-- END Two Columns -->
                            </repeater>

                            <!-- Footer -->
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tbody>
                                <tr>
                                    <td class="p30-15 bbrr" style="padding: 50px 30px 40px;
			border-radius:0px;" bgcolor="#144796">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tbody>
                                            <tr>
                                                <td align="center" style="padding-bottom: 30px;">
                                                    <table border="0" cellspacing="0" cellpadding="0">
                                                        <tbody>
                                                        <tr>
                                                            <td class="img" width="55" style="font-size:0pt;
											line-height:0pt; text-align:left;"><a href="https://twitter.com/OfficeTaskForce"
                                                                                  target="_blank"><img
                                                                        src="{{ asset('assets/images/twitter.png') }}"
                                                                        height="30" editable="true" border="0" alt=""></a>
                                                            </td>
                                                            <td class="img" width="55" style="font-size:0pt;
											line-height:0pt; text-align:left;"><a href="https://www.linkedin.com/company/ima-usa-shop"
                                                                                  target="_blank"><img
                                                                        src="{{ asset('assets/images/linkedin.png') }}" width="20"
                                                                        height="20" editable="true" border="0" alt=""></a>
                                                            </td>
                                                            <td class="img" width="55" style="font-size:0pt;
											line-height:0pt; text-align:left;"><a href="https://www.instagram.com/imausashop"
                                                                                  target="_blank"><img
                                                                        src="{{ asset('assets/images/instagram.svg') }}" width="20"
                                                                        height="20" editable="true" border="0" alt=""></a>
                                                            </td>
                                                            <td class="img" width="38" style="font-size:0pt;
											line-height:0pt; text-align:left;"><a href="https://www.tiktok.com/@imausashop1"
                                                                                  target="_blank"><img
                                                                        src="{{ asset('assets/images/tiktok.avif') }}" width="20"
                                                                        height="20" editable="true" border="0" alt=""></a>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" style="padding-bottom: 30px;">
                                                    <table border="0" cellspacing="0" cellpadding="0">
                                                        <tbody>
                                                        <tr>
                                                            <td>
                                                                <a href="{{ route('front.index') }}"
                                                                   style="font-family:'Muli', Arial,sans-serif;
												font-size:14px;
												line-height:20px;
												text-align:center;
												font-weight: 600;
												color:#fff;"
                                                                   target="_blank">
                                                                    Unsubscribe
                                                                </a></td>
                                                            <td>
                                                                <a href="{{ route('front.index') }}"
                                                                   style="font-family:'Muli', Arial,sans-serif;
												font-size:14px;
												line-height:20px;
												text-align:center;
												color:#fff;
												margin-right:15;
												font-weight: 600;
												margin-left:15;
												"


                                                                   target="_blank">
                                                                    Privacy Policy
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('front.index') }}"
                                                                   style="font-family:'Muli', Arial,sans-serif;
												font-weight: 600;
												font-size:14px;
												line-height:20px;
												text-align:center;
												color:#fff;"
                                                                   target="_blank">
                                                                    Web
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center white pb20" style="font-family:'Muli',
							Arial,sans-serif;
							font-size:16px;
							line-height:30px;
							text-align:center;
							color:#ffffff;
 							width:100%;
							display:table;
							margin:0 auto ;
							">
                                                    <multiline>
                                                        Nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                                        commodo consequat. Duis aute irure dolor cillum dolore eu
                                                        fugiat nulla pariatur.
                                                    </multiline>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>

@endsection
