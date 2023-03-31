<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\DB;
use App\{Models\Category, Models\Childcategory, Models\Product, Models\Report, Models\Subcategory};
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CatalogController extends FrontBaseController
{

    // CATEGORIES SECTOPN

    public function categories()
    {

        $gs = $this->gs;
//        $prods = new Product;
        $query = Product::with('user')
            ->where('status', 1)
            ->where('user_id', '!=', 0)
            ->orderByDesc('id');
//        dd($query);

        if ($gs->active_theme == 2) {
            $query->where('type', 'Physical');
        }

        $prods = $query->paginate(isset($pageby) ? $pageby : $this->gs->page_count);
        $cat = Category::where('status', 1)->get();
        $subcat = Subcategory::where('status', 1)->get();
        $childcat = Childcategory::where('status', 1)->get();

        $states = User::select('state')
            ->whereNotNull('state')
            ->distinct('state')
            ->get();


        switch ($gs->active_theme) {
            case('1'):
                return view('frontend.products', compact('prods'));
                break;

            case('2'):
                return view('frontend.theme-2.real-item-marketplace', compact('prods', 'cat', 'states'));
                break;
            case('4'):
                return view('frontend.theme-4.shop', compact('prods', 'cat', 'states'));
                break;
        }
    }

    // -------------------------------- CATEGORY SECTION ----------------------------------------

    public function category(Request $request, $slug = null, $slug1 = null, $slug2 = null, $slug3 = null)
    {
//        dd('check category page ');
        //dd($slug, $slug1, $slug2);
        if ($request->view_check) {
            session::put('view', $request->view_check);
        }

        $cat = null;
        $subcat = null;
        $childcat = null;
        $flash = null;
        $minprice = $request->min;
        $maxprice = $request->max;
        $sort = $request->sort;
        $search = $request->search;
        $pageby = $request->pageby;
        $minprice = ($minprice / $this->curr->value);
        $maxprice = ($maxprice / $this->curr->value);
        $type = $request->has('type') ?? '';

        if ($request->has('price')) {
            $maxprice = max($request->get('price'));
            echo $maxprice;
        }

//        dd($request->get('sub_category'));

        if (!empty($slug1)) {
            $subcat = Subcategory::where('slug', $slug1)->firstOrFail();
            $data['subcat'] = $subcat;
        } else {
            $subcat = Subcategory::whereIn('id', $request->get('sub_category', []))->get();
        }


        if (!empty($slug2)) {
            $childcat = Childcategory::where('slug', $slug2)->firstOrFail();
            $data['childcat'] = $childcat;
        } else {
            $childcat = Childcategory::where('id', $request->get('child_category', []))->get();
        }

        $data['latest_products'] = Product::with('user')->whereStatus(1)->whereLatest(1)
            ->home($this->language->id)
            ->get()
            ->reject(function ($item) {
                if ($item->user_id != 0) {
                    if ($item->user->is_vendor != 2) {
                        return true;
                    }
                }
                return false;
            });

        // Code Added By Nehal
        $prods = new Product();
//        dd($prods);
//        $prods = $prods->where('user_id', 0);
//        dd($prods);

        if(isset(auth()->user()->is_vendor) && auth()->user()->is_vendor === 2) {
            $prods = $prods->where(function ($q) {
                $q->where('user_id', '=', auth()->user()->id)->orWhere('user_id', 0);
            });
        }
        $prods = $prods->where('status', 1);
        $prods = $prods->when($request->get('marketplace', []), function ($q) use ($request) {
            return $q->whereIn('type', $request->get('marketplace', []));
        });

        $prods = $prods->when($request->get('age', []), function ($q) use ($request) {
            foreach ($request->get('age', []) as $age) {
                $q->orWhereJsonContains('age', $age);
            }
            return $q;
        });
        $prods = $prods->when($request->get('state', []), function ($q) use ($request) {
            return $q->with('user')
                ->whereHas('user', function ($user) use ($request) {
                    $user->whereIn('state', $request->get('state', []));
                });
        });
        $prods = $prods->when($request->get('price', []), function ($q) use ($request) {
            return $q->where('price', '<=', $request->get('price', []));
        });

        if (!empty($slug)) {
            $cat = Category::where('slug', $slug)->firstOrFail();
            $data['cat'] = $cat;
            $prods = $prods->when($cat, function ($query, $cat) {
                return $query->where('category_id', $cat->id);
            });
        } elseif ($request->has('category')) {
            $prods = $prods->when($request->get('category', []), function ($q) use ($request) {
                return $q->whereIn('category_id', $request->get('category', []));
            });
        }

//        dd($prods->get());
        $prods = $prods->when($subcat, function ($query, $subcat) {
            if ($subcat instanceof Subcategory) {
//                dd($subcat);
                return $query->where('subcategory_id', $subcat->id);
            } elseif ($subcat->count() > 0) {
                return $query->whereIn('subcategory_id', $subcat->map(function ($item) {
                    return $item['id'];
                })->toArray());
            }
            return $query;
        })
            ->when($type, function ($query, $type) {
                return $query->with('user')->whereStatus(1)->whereIsDiscount(1)
                    ->where('discount_date', '>=', date('Y-m-d'))
                    ->whereHas('user', function ($user) {
                        $user->where('is_vendor', 2);
                    });
            })
            ->when($childcat, function ($query, $childcat) {
                if ($childcat instanceof Childcategory) {
                    return $query->where('childcategory_id', $childcat->id);
                } elseif ($childcat->count() > 0) {
                    return $query->whereIn('childcategory_id', $childcat->map(function ($item) {
                        return $item['id'];
                    })->toArray());
                }
                return $query;
            })
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%')->orWhere('name', 'like', $search . '%');
            })
            ->when($minprice, function ($query, $minprice) {
                return $query->where('price', '>=', $minprice);
            })
            ->when($maxprice, function ($query, $maxprice) {
                return $query->where('price', '<=', $maxprice);
            })


            ->when($sort, function ($query, $sort) {
                if ($sort == 'date_desc') {
                    return $query->latest('id');
                } elseif ($sort == 'date_asc') {
                    return $query->oldest('id');
                } elseif ($sort == 'price_desc') {
                    return $query->latest('price');
                } elseif ($sort == 'price_asc') {
                    return $query->oldest('price');
                }
            })
            ->where(function ($q) {
                $q->where('language_id', $this->language->id)
                    ->orWhereNull('language_id');
            })->get()
            ->map(function ($item) {
                $item->price = $item->vendorSizePrice();
                return $item;
            })
            ->paginate($pageby ?? $this->gs->page_count);
//        dd($prods);

        if (!empty($slug) && !empty($slug1) && !empty($slug2)) {
            $prods = $prods->where(function ($query) use ($cat, $subcat, $childcat, $type, $request) {
                $flag = 0;
                if (!empty($cat)) {

                    foreach ($cat->attributes as $key => $attribute) {
                        $inname = $attribute->input_name;
                        $chFilters = $request["$inname"];

                        if (!empty($chFilters)) {
                            $flag = 1;
                            foreach ($chFilters as $key => $chFilter) {
                                if ($key == 0) {
                                    $query->where('attributes', 'like', '%' . '"' . $chFilter . '"' . '%');
                                } else {
                                    $query->orWhere('attributes', 'like', '%' . '"' . $chFilter . '"' . '%');
                                }
                            }
                        }
                    }
                }

                if (!empty($subcat)) {
                    foreach ($subcat->attributes as $attribute) {
//                        dd($attribute);
                        $inname = $attribute->input_name;
                        $chFilters = $request["$inname"];

                        if (!empty($chFilters)) {
                            $flag = 1;
                            foreach ($chFilters as $key => $chFilter) {
                                if ($key == 0 && $flag == 0) {
                                    $query->where('attributes', 'like', '%' . '"' . $chFilter . '"' . '%');
                                } else {
                                    $query->orWhere('attributes', 'like', '%' . '"' . $chFilter . '"' . '%');
                                }
                            }
                        }
                    }
                }

                if (!empty($childcat)) {
                    foreach ($childcat->attributes as $attribute) {
                        $inname = $attribute->input_name;
                        $chFilters = $request["$inname"];

                        if (!empty($chFilters)) {
                            $flag = 1;
                            foreach ($chFilters as $key => $chFilter) {
                                if ($key == 0 && $flag == 0) {
                                    $query->where('attributes', 'like', '%' . '"' . $chFilter . '"' . '%');
                                } else {
                                    $query->orWhere('attributes', 'like', '%' . '"' . $chFilter . '"' . '%');
                                }
                            }
                        }
                    }
                }
            });
        }


//        $prods = $prods->reject(function ($item) {
//            if ($item->is_printify == 0) {
//                if ($item->user_id != 0) {
//                    if ($item->user->is_vendor != 2) {
//                        return true;
//                    }
//                }
//
//                if (isset($_GET['max'])) {
//                    if ($item->vendorSizePrice() >= $_GET['max']) {
//                        return true;
//                    }
//                }
//                return false;
//            }
//        })
//            ->map(function ($item) {
//                $item->price = $item->vendorSizePrice();
//                return $item;
//            })
//            ->paginate($pageby ?? $this->gs->page_count);


        $data['prods'] = $prods;
//        dd($data);
        //        $cat = Category::where('status', 1)->get();
        $data['cat'] = Category::where('status', 1)->get();

        $data['selectedCategory'] = Category::where('slug', \Illuminate\Support\Facades\Request::segment(2))->first();
//        $data['subCategories'] = Subcategory::where('category_id', $data['selectedCategory']->id)->where('status', 1)->with(['childs'])->get();
//        dd($data['subCategories']);

        if ($request->ajax()) {
            $data['ajax_check'] = 1;
            return view('frontend.ajax.category', $data);
        }

//        dd(request()->segments(1), request()->segment(count(request()->segments())));
        $printify = '';
        $data['pageName'] = ucfirst(str_replace('-', ' ', request()->segment(count(request()->segments()))));
        switch ($this->gs->active_theme) {
            case('1'):
                return view('frontend.products', $data);
                break;

            case('2'):
//                return view('frontend.theme-2.real-item-marketplace', $data);
                return view('frontend.theme-2.products', $data);
                break;
        }
    }


    public function getsubs(Request $request)
    {
        $category = Category::where('slug', $request->category)->firstOrFail();
        $subcategories = Subcategory::where('category_id', $category->id)->get();
        return $subcategories;
    }

    public function report(Request $request)
    {

        //--- Validation Section
        $rules = [
            'note' => 'max:400',
        ];
        $customs = [
            'note.max' => 'Note Must Be Less Than 400 Characters.',
        ];
        $validator = Validator::make($request->all(), $rules, $customs);
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section
        $data = new Report;
        $input = $request->all();
        $data->fill($input)->save();
        //--- Logic Section Ends

        //--- Redirect Section
        $msg = 'New Data Added Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
    }

    public function search(Request $request)
    {
        $search = $request->q;
        $results = DB::table('products')
            ->select('name')
            ->where('name', 'like', '%'.$search.'%')
            ->get();
        return response()->json($results);
    }
}
