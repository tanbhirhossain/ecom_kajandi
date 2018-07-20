<?php
namespace App\Http\Controllers;
use App\Blog;
use App\ContactForm;
use App\Mail\SubscribersMail;
use App\PageModel;
use Illuminate\Http\Request;
use App\User;
use DB;
use Session;
use App\Seller;
use App\Customer;

class CustomUserController extends Controller{

    public function storeUser(Request $request){
        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'user_type' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);


        $user_type =  $request->user_type;

        if ($user_type == 2) {

        $su = new User();
        $su->name = $request->name;
        $su->email = $request->email;
        $su->phone = $request->phone;
        $su->user_type = $request->user_type;
        $su->password = bcrypt($request->password);
        $su->save();

        $seller_id = $su->id;
          Session::put('id',$seller_id);

          // $cust = new Customer();
          // $cust->cus_id = $seller_id;
          // $cust->save();

          $pa = new Seller();
          $pa->user_id = Session::get('id');
          $pa->vendorname = $request->name;
          $pa->email = $request->email;
          $pa->contactphone = $request->phone;
          $pa->password = bcrypt($request->password);

          $pa->save();
        }else {
          $su = new User();
          $su->name = $request->name;
          $su->email = $request->email;
          $su->phone = $request->phone;
          $su->user_type = $request->user_type;
          $su->password = bcrypt($request->password);
          $su->save();

          $seller_id = $su->id;
            Session::put('cus_id',$seller_id);
          // $cust = new Customer();
          // $cust->cus_id = $seller_id;
          // $cust->bil_email = $request->email;
          // $cust->save();
        }


        return redirect()->route('custLog')->with('message_success', 'Registration Successfully Complete Please Login');
    }


    public function show_contact_form(){
        return view('frontend.page.contact_us');
    }
    public function save_contact_form(Request $request){
        $this->validate($request, [
            'name' => 'required|min:3|max:30',
            'email' => 'required|email',
            'subject' =>  'required|min:3|max:30',
            'message' => 'required|min:10|max:1000',
        ]);
        $contact = new ContactForm();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();
        return redirect('show-contact-form')->with('message_success', 'Message Successfully Send');
    }
    public function page_view($id){
       $single_page = PageModel::find($id);
       return view('frontend.page.single_page_view',compact('single_page'));
    }
    public function about_us(){
        return view('frontend.page.about_us');
    }
    public function faq(){
        return view('frontend.faq.faq_list');
    }
    public function blog(){
        $blog_post = Blog::orderBy('id','desc')->paginate(6);
        return view('frontend.page.blog',compact('blog_post'));
    }
    public function blog_single($id){
        $single_post = Blog::find($id);
        return view('frontend.page.blog_single',compact('single_post'));
    }
    public function post_by_cat($id){
        $blog_post = Blog::where('cat_id',$id)->orderBy('cat_id','desc')->paginate(6);
        return view('frontend.page.blog',compact('blog_post'));
    }
    public function blog_search(Request $request){
        $search = $request->key;
        $blog_post = DB::table('blogs')
            ->where('blogs.name', 'LIKE', "%$search%")
            ->orWhere('blogs.description', 'LIKE', "%$search%")
            ->paginate(6);
        return view('frontend.page.blog',compact('blog_post'));
    }

}
