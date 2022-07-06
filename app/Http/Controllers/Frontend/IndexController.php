<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\Contact;
use App\Models\AboutUs;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Contact as ModelsContact;
use App\Models\devis;
use App\Models\Feedback;
use App\Models\Gamme;
use App\Models\History;
use App\Models\Mission;
use App\Models\NewsLetter;
use App\Models\Product;
use App\Models\Service;
use App\Models\SolideEx;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


class IndexController extends Controller
{



    public function home()
    {
        $banners = Banner::where(['status' => 'active', 'condition' => 'banner'])->orderBy('id', 'ASC')->get();
        $categories = Category::where(['status' => 'active', 'is_parent' => 1])->orderBy('id', 'DESC')->limit('3')->get();

        $team = Team::where(['status' => 'active'])->orderBy('id', 'ASC')->get();

        $blog = Blog::where(['status' => 'active'])->orderBy('id', 'DESC')->limit('3')->get();

        $societe = Feedback::where(['status' => 'active'])->orderBy('id', 'DESC')->get();


        $city = Category::where(['is_parent' => true, 'status' => 'active'])->orderBy('id', 'DESC')->get();

        $partenaires = Brand::where(['status' => 'active'])->orderBy('id', 'DESC')->get();

        $services = Service::where(['status' => 'active'])->orderBy('id', 'ASC')->get();

        $header_home = "accueil";

        return view('frontend.index', compact(['banners', 'categories', 'city', 'partenaires', 'team', 'header_home', 'blog', 'societe','services']));
    }

    public function productCategory(Request $request, $slug)
    {

        $categories = Category::with('products')->where('slug', $slug)->first();

        if ($categories) {
            $speciality = Brand::where(['status' => 'active'])->orderBy('id', 'DESC')->get();

            $gammes = Gamme::where('child_cat_id',$categories->id)->get();

            if(count($gammes) == 0){
            $products = Product::where(['status' => 'active', 'child_cat_id' => $categories->id])->orderBy('id', 'ASC')->paginate(12);
            }else{
                $products = Product::where(['status' => 'active', 'child_cat_id' => $categories->id])->orderBy('id', 'ASC')->get();
            }


            $route = 'ville';

            if ($request->ajax()) {
                $view = view('frontend.layouts._single-product', compact(['products']))->render();
                return response()->json(['html' => $view]);
            }

            return view('frontend.pages.product.product-category', compact(['categories', 'route', 'products', 'speciality','gammes']));
        } else {
            return view('errors.404');
        }
    }
    // Product Detail
    public function productDetail($slug)
    {
        $product = Product::with('rel_prods')->where('slug', $slug)->first();
        if ($product) {
        $city = Category::where(['is_parent' => true, 'status' => 'active'])->orderBy('id', 'DESC')->get();
        $actual_link = 'http://' . $_SERVER["SERVER_NAME"];
        $photo = explode(',', $product->photo);
        $meta = '<meta itemprop="name" content="' . $product->title . '">
        <meta itemprop="description" content="' . substr(filter_var($product->description, FILTER_SANITIZE_STRING), 0, 200) . '...">
        <meta itemprop="image" content="' . $actual_link . $photo[0] . '">
        <meta property="twitter:card" content="summary_large_image" />
        <meta property="twitter:url" content="' . $actual_link . '" />
        <meta property="twitter:title" content="' . $product->title . '" />
        <meta property="twitter:description" content="' . substr(filter_var($product->description, FILTER_SANITIZE_STRING), 0, 200) . '..." />
        <meta property="twitter:image" content="' . $actual_link . $photo[0] . '" />
        <meta property="twitter:site" content="@HenginImmobilier" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="' . $product->title . '" />
        <meta property="og:description" content="' . filter_var($product->description, FILTER_SANITIZE_STRING) . '" />
        <meta property="og:image" content="' . $actual_link . $photo[0] . '" />';
        $title_page = $product->title;

        $randomproducts = Product::where(['status' => 'active'])->inRandomOrder()->limit(3)->get();


            return view('frontend.pages.product.product-detail', compact(['product', 'randomproducts', 'city', 'meta', 'title_page']));
        } else {
            return view('errors.404');
        }
    }

    // Tous Locaux

    public function tousLocaux(Request $request)
    {


        $speciality = Brand::where(['status' => 'active'])->orderBy('id', 'DESC')->get();

        $villes = Category::where(['status' => 'active', 'is_parent' => 1])->orderBy('id', 'DESC')->get();
        $city = Category::where(['is_parent' => true, 'status' => 'active'])->orderBy('id', 'DESC')->get();


        $sort = '';
        if ($request->sort != null) {
            $sort = $request->sort;
        }

        $price = '';
        if ($request->price_range != null) {
            $price = $request->price_range;
        }
        $surface = '';
        if ($request->surface_range != null) {
            $surface = $request->surface_range;
        }
        $type = '';
        if ($request->search_type != null) {
            $type = $request->search_type;
        }
        $fdc = '';
        if ($request->search_conditions != null) {
            $fdc = $request->search_conditions;
        }

        $products = Product::where(['status' => 'active']);
        if (!empty($price)) {
            $price = explode('-', $price);

            $price[0] = floor($price[0]);
            $price[1] = ceil($price[1]);
            $products = $products->whereBetween('price', $price);
        }
        if (!empty($surface)) {
            $surface = explode('-', $surface);

            $surface[0] = floor($surface[0]);
            $surface[1] = ceil($surface[1]);
            $products = $products->whereBetween('surface', $surface);
        }
        if (!empty($type)) {
            $products = $products->where('conditions', $type);
        }
        if (!empty($fdc)) {
            $products = $products->where('fond', $fdc);
        }
        if (!empty($_GET['search'])) {
            $products = $products->where((function ($query) use ($request) {
                $query->where('title', "like", "%" . $_GET['search'] . "%");
                $query->orWhere('description', "like", "%" . $_GET['search'] . "%");
            }));
        }
        if (!empty($_GET['speciality'])) {
            if (!in_array('', $_GET['speciality'])) {
                $products = $products->whereIn('brand_id', $_GET['speciality']);
            }
        }
        if (!empty($_GET['ville'])) {
            $slug_ville = Category::where('slug', $_GET['ville'])->value('id');
            $products = $products->where('cat_id', $slug_ville);
        }
        if (!empty($_GET['debarquement'])) {
            $slug_ville_d = Category::where('slug', $_GET['debarquement'])->value('id');
            $products = $products->where('child_cat_id', $slug_ville_d);
        }

        if ($sort == 'priceAsc') {

            $products = $products->orderBy('price', 'ASC');

            $products = $products->paginate(12);
        } elseif ($sort == 'priceDesc') {
            $products = $products->orderBy('price', 'DESC');

            $products = $products->paginate(12);
        } elseif ($sort == 'titleAsc') {
            $products = $products->orderBy('title', 'ASC');

            $products = $products->paginate(12);
        } elseif ($sort == 'titleDesc') {
            $products = $products->orderBy('title', 'DESC');

            $products = $products->paginate(12);
        } else {
            $products = $products->orderBy('id', 'DESC');

            $products = $products->paginate(12);
        }


        $route = 'locaux';

        if ($request->ajax()) {
            $view = view('frontend.layouts._single-product', compact(['products']))->render();
            return response()->json(['html' => $view]);
        }

        return view('frontend.pages.product.locaux', compact(['products', 'route', 'speciality', 'villes', 'city']));
    }

    // Tous Locaux à vendre

    public function vendreLocaux(Request $request)
    {


        $speciality = Brand::where(['status' => 'active'])->orderBy('id', 'DESC')->get();

        $villes = Category::where(['status' => 'active', 'is_parent' => 1])->orderBy('id', 'DESC')->get();
        $city = Category::where(['is_parent' => true, 'status' => 'active'])->orderBy('id', 'DESC')->get();


        $sort = '';
        if ($request->sort != null) {
            $sort = $request->sort;
        }

        $price = '';
        if ($request->price_range != null) {
            $price = $request->price_range;
        }
        $surface = '';
        if ($request->surface_range != null) {
            $surface = $request->surface_range;
        }
        $fdc = '';
        if ($request->search_conditions != null) {
            $fdc = $request->search_conditions;
        }

        $products = Product::where(['status' => 'active', 'conditions' => 'sale']);
        if (!empty($price)) {
            $price = explode('-', $price);

            $price[0] = floor($price[0]);
            $price[1] = ceil($price[1]);
            $products = $products->whereBetween('price', $price);
        }
        if (!empty($surface)) {
            $surface = explode('-', $surface);

            $surface[0] = floor($surface[0]);
            $surface[1] = ceil($surface[1]);
            $products = $products->whereBetween('surface', $surface);
        }
        if (!empty($fdc)) {
            $products = $products->where('fond', $fdc);
        }
        if (!empty($_GET['search'])) {
            $products = $products->where((function ($query) use ($request) {
                $query->where('title', "like", "%" . $_GET['search'] . "%");
                $query->orWhere('description', "like", "%" . $_GET['search'] . "%");
            }));
        }
        if (!empty($_GET['speciality'])) {
            if (!in_array('', $_GET['speciality'])) {
                $products = $products->whereIn('brand_id', $_GET['speciality']);
            }
        }
        if (!empty($_GET['ville'])) {
            $slug_ville = Category::where('slug', $_GET['ville'])->value('id');
            $products = $products->where('cat_id', $slug_ville);
        }
        if (!empty($_GET['debarquement'])) {
            $slug_ville_d = Category::where('slug', $_GET['debarquement'])->value('id');
            $products = $products->where('child_cat_id', $slug_ville_d);
        }

        if ($sort == 'priceAsc') {

            $products = $products->orderBy('price', 'ASC');

            $products = $products->paginate(12);
        } elseif ($sort == 'priceDesc') {
            $products = $products->orderBy('price', 'DESC');

            $products = $products->paginate(12);
        } elseif ($sort == 'titleAsc') {
            $products = $products->orderBy('title', 'ASC');

            $products = $products->paginate(12);
        } elseif ($sort == 'titleDesc') {
            $products = $products->orderBy('title', 'DESC');

            $products = $products->paginate(12);
        } else {
            $products = $products->orderBy('id', 'DESC');

            $products = $products->paginate(12);
        }


        $route = 'vendre';

        if ($request->ajax()) {
            $view = view('frontend.layouts._single-product', compact(['products']))->render();
            return response()->json(['html' => $view]);
        }

        return view('frontend.ville.sale', compact(['products', 'route', 'speciality', 'villes', 'city']));
    }
    // Tous Locaux à louer

    public function louerLocaux(Request $request)
    {


        $speciality = Brand::where(['status' => 'active'])->orderBy('id', 'DESC')->get();

        $villes = Category::where(['status' => 'active', 'is_parent' => 1])->orderBy('id', 'DESC')->get();
        $city = Category::where(['is_parent' => true, 'status' => 'active'])->orderBy('id', 'DESC')->get();


        $sort = '';
        if ($request->sort != null) {
            $sort = $request->sort;
        }

        $price = '';
        if ($request->price_range != null) {
            $price = $request->price_range;
        }
        $surface = '';
        if ($request->surface_range != null) {
            $surface = $request->surface_range;
        }
        $fdc = '';
        if ($request->search_conditions != null) {
            $fdc = $request->search_conditions;
        }

        $products = Product::where(['status' => 'active', 'conditions' => 'rent']);
        if (!empty($price)) {
            $price = explode('-', $price);

            $price[0] = floor($price[0]);
            $price[1] = ceil($price[1]);
            $products = $products->whereBetween('price', $price);
        }
        if (!empty($surface)) {
            $surface = explode('-', $surface);

            $surface[0] = floor($surface[0]);
            $surface[1] = ceil($surface[1]);
            $products = $products->whereBetween('surface', $surface);
        }
        if (!empty($fdc)) {
            $products = $products->where('fond', $fdc);
        }
        if (!empty($_GET['search'])) {
            $products = $products->where((function ($query) use ($request) {
                $query->where('title', "like", "%" . $_GET['search'] . "%");
                $query->orWhere('description', "like", "%" . $_GET['search'] . "%");
            }));
        }
        if (!empty($_GET['speciality'])) {
            if (!in_array('', $_GET['speciality'])) {
                $products = $products->whereIn('brand_id', $_GET['speciality']);
            }
        }
        if (!empty($_GET['ville'])) {
            $slug_ville = Category::where('slug', $_GET['ville'])->value('id');
            $products = $products->where('cat_id', $slug_ville);
        }
        if (!empty($_GET['debarquement'])) {
            $slug_ville_d = Category::where('slug', $_GET['debarquement'])->value('id');
            $products = $products->where('child_cat_id', $slug_ville_d);
        }

        if ($sort == 'priceAsc') {

            $products = $products->orderBy('price', 'ASC');

            $products = $products->paginate(12);
        } elseif ($sort == 'priceDesc') {
            $products = $products->orderBy('price', 'DESC');

            $products = $products->paginate(12);
        } elseif ($sort == 'titleAsc') {
            $products = $products->orderBy('title', 'ASC');

            $products = $products->paginate(12);
        } elseif ($sort == 'titleDesc') {
            $products = $products->orderBy('title', 'DESC');

            $products = $products->paginate(12);
        } else {
            $products = $products->orderBy('id', 'DESC');

            $products = $products->paginate(12);
        }


        $route = 'vendre';

        if ($request->ajax()) {
            $view = view('frontend.layouts._single-product', compact(['products']))->render();
            return response()->json(['html' => $view]);
        }

        return view('frontend.ville.sale', compact(['products', 'route', 'speciality', 'villes', 'city']));
    }

    // Blog list

    public function actualiteList(Request $request)
    {
        $blogs = Blog::where(['status' => 'active','type_blog'=>'news'])->orderby('id','DESC')->paginate(12);


        $route = 'actualite';

        if ($request->ajax()) {
            $view = view('frontend.layouts._single-blog', compact(['blogs']))->render();
            return response()->json(['html' => $view]);
        }

        return view('frontend.pages.actualite', compact(['blogs', 'route']));
    }

    public function eventList(Request $request)
    {
        $blogs = Blog::where(['status' => 'active','type_blog'=>'event'])->orderby('id','DESC')->paginate(12);


        $route = 'actualite';

        if ($request->ajax()) {
            $view = view('frontend.layouts._single-blog', compact(['blogs']))->render();
            return response()->json(['html' => $view]);
        }

        return view('frontend.pages.events', compact(['blogs', 'route']));
    }

    // Blog Detail
    public function blogDetail($slug)
    {
        $blog = Blog::where('slug', $slug)->first();


        if ($blog) {

        $related_blogs = Blog::limit("3")->get();

        $actual_link = 'http://' . $_SERVER["SERVER_NAME"];
        $meta = '<meta itemprop="name" content="' . $blog->title . '">
        <meta itemprop="description" content="' . substr(filter_var($blog->description, FILTER_SANITIZE_STRING), 0, 200) . '...">
        <meta itemprop="image" content="' . $actual_link . $blog->photo . '">
        <meta property="twitter:card" content="summary_large_image" />
        <meta property="twitter:url" content="' . $actual_link . '" />
        <meta property="twitter:title" content="' . $blog->title . '" />
        <meta property="twitter:description" content="' . substr(filter_var($blog->description, FILTER_SANITIZE_STRING), 0, 200) . '..." />
        <meta property="twitter:image" content="' . $actual_link . $blog->photo . '" />
        <meta property="twitter:site" content="@HenginImmobilier" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="' . $blog->title . '" />
        <meta property="og:description" content="' . substr(filter_var($blog->description, FILTER_SANITIZE_STRING), 0, 200) . '..." />
        <meta property="og:image" content="' . $actual_link . $blog->photo . '" />';
        $title_page = $blog->title;


            return view('frontend.pages.blog-details', compact(['blog', 'meta', 'title_page','related_blogs']));
        } else {
            return view('errors.404');
        }
    }
        // Service Detail
        public function serviceDetail($slug)
        {
            $blog = Service::where('slug', $slug)->first();


            if ($blog) {

            $related_blogs = Service::where(['status'=>'active'])->get();

            $actual_link = 'http://' . $_SERVER["SERVER_NAME"];
            $meta = '<meta itemprop="name" content="' . $blog->title . '">
            <meta itemprop="description" content="' . substr(filter_var($blog->description, FILTER_SANITIZE_STRING), 0, 200) . '...">
            <meta itemprop="image" content="' . $actual_link . $blog->photo . '">
            <meta property="twitter:card" content="summary_large_image" />
            <meta property="twitter:url" content="' . $actual_link . '" />
            <meta property="twitter:title" content="' . $blog->title . '" />
            <meta property="twitter:description" content="' . substr(filter_var($blog->description, FILTER_SANITIZE_STRING), 0, 200) . '..." />
            <meta property="twitter:image" content="' . $actual_link . $blog->photo . '" />
            <meta property="twitter:site" content="@HPC" />
            <meta property="og:type" content="website" />
            <meta property="og:title" content="' . $blog->title . '" />
            <meta property="og:description" content="' . substr(filter_var($blog->description, FILTER_SANITIZE_STRING), 0, 200) . '..." />
            <meta property="og:image" content="' . $actual_link . $blog->photo . '" />';
            $title_page = $blog->title;


                return view('frontend.pages.service-details', compact(['blog', 'meta', 'title_page','related_blogs']));
            } else {
                return view('errors.404');
            }
        }
    // About Us
    public function aboutUs()
    {
        $tem = Feedback::where(['status' => 'active'])->orderBy('id', 'DESC')->get();
        $team = Team::where(['status' => 'active'])->orderBy('id', 'ASC')->get();
        $missions = Mission::orderby('id','ASC')->get();
        $solides = SolideEx::orderby('id','ASC')->get();
        $history = History::orderby('id','ASC')->get();

        $about = AboutUs::first();
        return view('frontend.pages.about-us', compact(['about', 'tem', 'team','missions','solides','history']));
    }

    // Contact Us
    public function contactUs()
    {
        return view('frontend.pages.contact-us');
    }
    public function contactSubmit(Request $request)
    {
        $this->validate($request, [
            'name' => 'string|required',
            'lastname' => 'string|required',
            'secteur_activite' => 'string|required',
            'adresse' => 'string|required',
            'email' => 'string|required',
            'phone' => 'string|required',
            'subject' => 'string|required',
            'content' => 'string|required',
        ]);
        $data = $request->all();

        ModelsContact::create($data);

        //$to = "hedisouaied2018@gmail.com";
        //$to = get_setting('email');


       Mail::send('mail/contact', $data, function ($message) use ($data) {
            $message->to("hedisouaied2018@gmail.com")
                ->from($data['email'])->subject($data['subject']);
        });

        return back()->with('success', 'Votre message a été envoyé avec succès');
    }

    // Demandez un devis

    public function devisSubmit(Request $request)
    {
        $this->validate($request, [
            'nom_local' => 'string|required',
            'name' => 'string|required',
            'email' => 'string|required',
            'phone' => 'string|required',
            'content' => 'string|required',
            'date_d' => 'string|required',
            'time_d' => 'string|required',
        ]);
        $data = $request->all();

        devis::create($data);
        //Modelsdevis::create($data);


        Mail::send('mail/devis', $data, function ($message) use ($data) {
            $message->to(get_setting('email'))
                ->from($data['email'])->subject("Demande de devis de " . $data['name']);
        });

        return back()->with('success', 'Votre devis a été envoyé avec succès');
    }

}
