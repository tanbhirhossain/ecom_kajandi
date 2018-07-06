<?php


//==========================Front Start ==========================//


Route::get('/', function () {
    return view('frontend.front_view.main_page.index');
});
Route::get('/error-page', function () {
    return view('frontend.page.404');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//Faq route
Route::get('/faq', 'GuestController@askQuestion')->name('faq');
Route::post('/faq-question', 'FAQController@postQuestion')->name('postQuestion');
//End Faw route
//Subscriber route
Route::post('/subscribe-email', 'EmailSubscriberController@saveEmail')->name('saveEmail');
Route::get('/subscribed-list', 'AdminSubscriberController@subsList')->name('subsList');
Route::get('/delete-subscriber/{id}', 'AdminSubscriberController@deleteSubs')->name('deleteSubs');
Route::get('/send-newsletter', 'AdminSubscriberController@sendNewsletter')->name('sendNewsletter');
Route::post('/send-mail', 'AdminSubscriberController@sendMail')->name('sendMail');
Route::get('/show-single-mail/{id}', 'AdminSubscriberController@showSingleMail')->name('showSingleMail');
Route::post('/send-single-mail', 'AdminSubscriberController@sendSingleMail')->name('sendSingleMail');
//End Subscriber route

//Product sortBy Route start
Route::get('/shop','FSortByController@shop_content')->name('shop');
Route::get('/error-page','FSortByController@error_page')->name('error-page');
Route::get('/product-category/{id}','FSortByController@product_by_category')->name('product-category');
Route::get('/product-sub-category/{id}','FSortByController@product_by_sub_category')->name('product-sub-category');
Route::get('/product-manufacturer/{id}','FSortByController@product_by_manufacturer')->name('product-manufacturer');
Route::get('/product-model/{id}','FSortByController@product_by_model')->name('product-model');
Route::get('/search','FSortByController@search')->name('search');
Route::get('/search-by-all-department','FSortByController@advance_search')->name('advance-search');
Route::get('/product-sorting','FSortByController@product_sorting')->name('product-sorting');
Route::get('/product-sorting-item','FSortByController@product_sorting_item')->name('product-sorting-item');
Route::get('/product-by-category','FSortByController@product_by_cat')->name('product-by-category');
Route::get('/product-details/{id}','FSortByController@product_details')->name('product-single');
Route::get('/filter-by-price','FSortByController@filter_by_price')->name('filter-by-price');
Route::get('/product-by-v-type','FSortByController@filter_by_v_type')->name('product-by-v-type');
Route::get('/product-by-d-type','FSortByController@product_by_po_delivery')->name('product-by-po-delivery');
Route::get('/product-by-condition','FSortByController@product_by_condition')->name('product-by-condition');
Route::get('/product-by-supply-type','FSortByController@product_by_supply_type')->name('product-by-supply-type');
Route::get('/product-by-manufacture','FSortByController@product_by_manufacture')->name('product-by-manufacture');



//Product sortBy Route End

//Cart Route Start
Route::POST('add-to-cart','CartController@add_to_cart')->name('add-to-cart');
Route::GET('accessories-add-to-cart/{id}','CartController@acc_add_to_cart')->name('accessories-add-to-cart');
Route::get('/cart','CartController@view_cart')->name('cart');
Route::get('/remove-cart-item/{id}','CartController@remove_cart_item')->name('remove-cart-item');
Route::POST('/update-cart','CartController@update_cart')->name('update-cart');

//Cart Route End

//Compare Route Start
Route::get('/compare','CompareController@compare')->name('compare');
Route::POST('add-to-compare','CompareController@add_to_compare')->name('add-to-compare');
Route::get('/remove-compare-item/{id}','CompareController@remove_compare_item')->name('remove-compare-item');
Route::get('/login-register','CartController@login_register')->name('login-register');

//Compare Route End
//Wishlist Route Start
Route::get('/wishlist','WishlistController@my_wishlish')->name('wishlist');
Route::GET('add-to-wishlist/{id}','WishlistController@add_to_wishlist')->name('add-to-wishlist');
Route::GET('remove-wishlist-item/{id}','WishlistController@remove_wishlist_item')->name('remove-wishlist-item');

//Wishlist Route End

//Checkout Controller Start
Route::get('/checkout','CheckoutController@checkout')->name('checkout');
Route::get('/shipping','CheckoutController@shipping')->name('shipping');
Route::get('/billing','CheckoutController@billing')->name('billing');
Route::post('/save-billing','CheckoutController@save_billing')->name('save-billing');
Route::post('/save-shipping','CheckoutController@save_shipping')->name('save-shipping');
Route::POST('/place-order','CheckoutController@place_order')->name('place-order');
Route::get('/order-complete','CheckoutController@order_complete')->name('order-complete');

//Checkout Controller End

//Customer Review Start
Route::POST('/write-customer-review','CustomerReviewController@write_customer_review')->name('write-customer-review');

//Customer Review End


//==========================Front End ==========================//
//CustomUserController route start
//Custom Authenticatation
Route::post('/store-user', 'CustomUserController@storeUser')->name('storeUser');
Route::get('customer-login', function(){
    return view('frontend.loginregister.login_register');
})->name('custLog');
Route::get('show-contact-form','CustomUserController@show_contact_form')->name('show-contact-form');
Route::post('save-contact-form','CustomUserController@save_contact_form')->name('save-contact-form');
Route::get('/page-view/{id}','CustomUserController@page_view')->name('page-view');
Route::get('/about-us','CustomUserController@about_us')->name('about-us');
Route::get('/blog','CustomUserController@blog')->name('blog');
Route::get('/blog-single/{id}','CustomUserController@blog_single')->name('blog-single');
Route::get('/post-by-cat/{id}','CustomUserController@post_by_cat')->name('post-by-cat');
Route::get('/blog-search','CustomUserController@blog_search')->name('blog-search');


//CustomUserController route end


// Seller Panel Route
Route::GET('seller/home','SellerController@index');
Route::GET('seller/editor','EditorController@index');
Route::GET('seller/test','EditorController@test');
Route::GET('seller','Seller\LoginController@showLoginForm')->name('seller.login');
Route::POST('seller','Seller\LoginController@login');

Route::get('seller-regi', 'Seller\RegisterController@showRegPage');
Route::POST('seller-reg-post','Seller\RegisterController@register')->name('sellerReg');

Route::POST('seller-password/email','Seller\ForgotPasswordController@sendResetLinkEmail')->name('seller.password.email');
Route::GET('seller-password/reset','Seller\ForgotPasswordController@showLinkRequestForm')->name('seller.password.request');
Route::POST('seller-password/reset','Seller\ResetPasswordController@reset');
Route::GET('seller-password/reset/{token}','Seller\ResetPasswordController@showResetForm')->name('seller.password.reset');
//End Seller Panel Route
//My Account route Start
Route::get('my-account/{id}','MyAccountController@my_account')->name('my-account');
Route::get('customer-orders/{id}','MyAccountController@customer_orders')->name('customer-orders');
Route::get('customer-report/{id}','MyAccountController@customer_report')->name('customer-report');
Route::get('customer-accounting/{id}','MyAccountController@customer_accounting')->name('customer-accounting');
Route::get('customer-wallet/{id}','MyAccountController@customer_wallet')->name('customer-wallet');
Route::get('customer-payment/{id}','MyAccountController@customer_payment')->name('customer-payment');
Route::get('customer-research/{id}','MyAccountController@customer_research')->name('customer-research');
Route::get('view-each-order/{id}','MyAccountController@view_each_order')->name('view-each-order');
Route::get('customer-review/{id}','MyAccountController@customer_review')->name('customer-review');
Route::get('customer-personal-info/{id}','MyAccountController@customer_personal_info')->name('customer-personal-info');
Route::post('update-personal-info','MyAccountController@update_personal_info')->name('update-personal-info');
Route::get('customer-change-password/{id}','MyAccountController@customer_change_password')->name('customer-change-password');
Route::post('change-customer-email','MyAccountController@change_customer_email')->name('change-customer-email');
Route::post('customer-password-change','MyAccountController@customer_password_change')->name('customer-password-change');
//My account Route End
//Footer Route start
Route::get('/social-option','FooterController@social_option')->name('social-option');
Route::post('/save-social','FooterController@save_social')->name('save-social');
Route::get('/apps-download-option','FooterController@apps_download_option')->name('apps-download-option');
Route::post('/save-apps-download-link','FooterController@save_apps_download_link')->name('save-apps-download-link');
Route::get('/contact-option','FooterController@contact_option')->name('contact-option');
Route::get('/view-contact-message/{id}','FooterController@view_contact_messsage')->name('view-contact-message');
Route::get('/replay-contact-message/{id}','FooterController@replay_contact_messsage')->name('replay-contact-message');
Route::get('/delete-contact-message/{id}','FooterController@delete_contact_message')->name('delete-contact-message');
Route::post('/replay-contact-message','FooterController@replay_contact_message')->name('replay-contact-message');

//Footer Route End

//Customer Q&A Route Start
Route::get('/ask-a-question','CustomerQAController@ask_a_question')->name('ask-a-question');
Route::get('/answer-a-question','CustomerQAController@answer_a_question')->name('answer-a-question');
//Customer Q&A Route End

//FAQ route
Route::get('/pending-faq-list', 'AdminFAQController@pendingFaqList')->name('pendingFaqList');
Route::get('/answer-faq/{id}', 'AdminFAQController@answerFaq')->name('answerFaq');
Route::post('/answer-faq-post', 'AdminFAQController@postFaqAnswer')->name('postFaqAnswer');
Route::get('/faq-delete/{id}', 'AdminFAQController@faqPendingDelete')->name('faqPendingDelete');
Route::get('/faq-answered-list', 'AdminFAQController@faqAnsweredList')->name('faqAnsweredList');
Route::get('/faq-answer-edit/{id}', 'AdminFAQController@faqAnsEdit')->name('faqAnsEdit');
Route::post('/faq-answer-update/{id}','AdminFAQController@faqAnsUpdate')->name('faqAnsUpdate');
//END FAQ route




//==========================BackEnd Start ==========================//
// Admin Panel Route
Route::GET('admin/home','AdminController@index')->name('admin-home');
Route::GET('admin/editor','EditorController@index');
Route::GET('admin/test','EditorController@test');
Route::GET('admin','Admin\LoginController@showLoginForm')->name('admin.login');
Route::POST('admin','Admin\LoginController@login');

Route::POST('admin-password/email','Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::GET('admin-password/reset','Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::POST('admin-password/reset','Admin\ResetPasswordController@reset');
Route::GET('admin-password/reset/{token}','Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
//End Admin Panel Route


//category Route Start
Route::get('add-category','CategoryController@add_category')->name('add-category');
Route::post('save-category','CategoryController@save_category')->name('save-category');
Route::get('category-list','CategoryController@category_list')->name('category-list');
Route::get('delete-category/{id}','CategoryController@category_delete')->name('delete-category');
Route::get('edit-category/{id}','CategoryController@category_edit')->name('edit-category');
Route::post('update-category','CategoryController@category_update')->name('update-category');
//category Route End

//Manufacter Route Start
Route::get('add-manufacturer','ManufacturerController@add_manufacturer')->name('add-manufacturer');
Route::post('save-manufacturer','ManufacturerController@save_manufacturer')->name('save-manufacturer');
Route::get('manufacturer-list','ManufacturerController@manufacturer_list')->name('manufacturer-list');
Route::get('delete-manufacturer/{id}','ManufacturerController@manufacturer_delete')->name('delete-manufacturer');
Route::get('edit-manufacturer/{id}','ManufacturerController@manufacturer_edit')->name('edit-manufacturer');
Route::post('update-manufacturer','ManufacturerController@manufacturer_update')->name('update-manufacturer');
//manufacter Route End

//category Route Start
Route::get('add-sub-category','SubCategoryController@add_category')->name('add-sub-category');
Route::post('save-sub-category','SubCategoryController@save_category')->name('save-sub-category');
Route::get('sub-category-list','SubCategoryController@category_list')->name('sub-category-list');
Route::get('delete-sub-category/{id}','SubCategoryController@category_delete')->name('delete-sub-category');
Route::get('edit-sub-category/{id}','SubCategoryController@category_edit')->name('edit-sub-category');
Route::post('update-sub-category','SubCategoryController@category_update')->name('update-sub-category');
//category Route End

//Product Model Route Start
Route::get('add-model','ProductModelController@add_model')->name('add-model');
Route::post('save-model','ProductModelController@save_model')->name('save-model');
Route::get('model-list','ProductModelController@model_list')->name('model-list');
Route::get('delete-model/{id}','ProductModelController@model_delete')->name('delete-model');
Route::get('edit-model/{id}','ProductModelController@model_edit')->name('edit-model');
Route::post('update-model','ProductModelController@model_update')->name('update-model');
//Product Model Route End
//Product Unit Route Start
Route::get('add-unit','UnitController@add_unit')->name('add-unit');
Route::post('save-unit','UnitController@save_unit')->name('save-unit');
Route::get('unit-list','UnitController@unit_list')->name('unit-list');
Route::get('delete-unit/{id}','UnitController@unit_delete')->name('delete-unit');
Route::get('edit-unit/{id}','UnitController@unit_edit')->name('edit-unit');
Route::post('update-unit','UnitController@unit_update')->name('update-unit');
//Product Unit Route End
//Product  Route Start
Route::get('add-product','ProductController@add_product')->name('add-product');
Route::post('save-product','ProductController@save_product')->name('save-product');
Route::get('product-list','ProductController@product_list')->name('product-list');
Route::get('product-view/{id}','ProductController@product_view')->name('product-view');
Route::get('delete-product/{id}','ProductController@product_delete')->name('delete-product');
Route::get('edit-product/{id}','ProductController@product_edit')->name('edit-product');
Route::post('update-product','ProductController@product_update')->name('update-product');
//Product  Route End

//order Route Start
Route::get('/manage-order','OrderController@manage_order')->name('manage-order');
Route::get('/order-status/{id}','OrderController@order_status');
Route::get('/order-delete/{id}','OrderController@order_delete');
Route::get('/view-order/{id}','OrderController@view_order')->name('view-order');
Route::get('/download-pdf/{id}','OrderController@download_pdf');
//order Route Start

//Vendor Route Start

Route::get('/add-vendor', 'AdminAddSellerController@addVendor')->name('addVendor');
Route::post('/store-vendor', 'AdminAddSellerController@storeVendor')->name('storeVendor');
Route::get('/vendor-list', 'AdminAddSellerController@vendorList')->name('vendorList');
Route::get('/vendor-blocked-list', 'AdminAddSellerController@vendorBlockedList')->name('vendorBlockedList');
Route::get('/edit-vendor/{id}', 'AdminAddSellerController@editVendor')->name('editVendor');
Route::post('/update-vendor/{id}', 'AdminAddSellerController@updateVendor')->name('updateVendor');
Route::get('/delete-vendor/{id}', 'AdminAddSellerController@deleteVendor')->name('deleteVendor');
Route::get('/block-vendor/{id}', 'AdminAddSellerController@blockVendor')->name('blockVendor');
Route::get('/unblock-vendor/{id}', 'AdminAddSellerController@unblockVendor')->name('unblockVendor');
//Vendor Route End
//Vendor Product Approval
Route::get('/approved-seller-pro', 'AdminVendorProductController@approvedSellerPro')->name('approvedSellerPro');
Route::get('/pending-vendor-pro', 'AdminVendorProductController@pendingVendorPro')->name('pendingVendorPro');
Route::get('/approve-vendor-pro/{id}', 'AdminVendorProductController@approveVendorPro')->name('approveVendorPro');
//Vendor Product Approval End
//Home featured By Vendor
Route::get('/add-home-advert', 'AdvertController@addHomeAdvert')->name('addHomeAdvert');
Route::post('/select-pro', ['as'=>'select-pro','uses'=>'AdvertController@selectPro']);
Route::post('/post-home-advert', 'AdvertController@storeAdvert')->name('storeAdvert');
Route::get('/home-advert-list', 'AdvertController@adrvertList')->name('adrvertList');
Route::get('/edit-advert/{id}', 'AdvertController@editAdvert')->name('editAdvert');
Route::post('/update-advert/{id}', 'AdvertController@updateAdvert')->name('updateAdvert');
Route::get('/delete-advert/{id}', 'AdvertController@deleteAdvert')->name('deleteAdvert');

//End Home featured By Vendor

//Amin Qa Route Start
Route::get('/manage-q-a','AdminQAController@manage_q_a')->name('manage-q-a');
Route::get('/delete-qa/{id}','AdminQAController@delete_qa')->name('delete-qa');
Route::get('/view-qa/{id}','AdminQAController@view_qa')->name('view-qa');
Route::get('/delete-answer/{id}/{question_id}','AdminQAController@delete_answer')->name('delete-answer');
//Amin Qa Route End
//Page Builder Route start
Route::get('/add-new-page','PageBuilderController@add_new_page')->name('add-new-page');
Route::get('/page-list','PageBuilderController@page_list')->name('page-list');
Route::post('/save-page','PageBuilderController@save_page')->name('save-page');
Route::get('/delete-page/{id}','PageBuilderController@delete_page')->name('delete-page');
Route::post('/update-page','PageBuilderController@update_page')->name('update-page');
Route::get('/edit-page/{id}','PageBuilderController@edit_page')->name('edit-page');
//Page Builder Route End

//Blog Route Start
Route::get('add-blog-category','BlogCategoryController@add_category')->name('add-blog-category');
Route::post('save-blog-category','BlogCategoryController@save_category')->name('save-blog-category');
Route::get('blog-category-list','BlogCategoryController@category_list')->name('blog-category-list');
Route::get('delete-blog-category/{id}','BlogCategoryController@category_delete')->name('delete-blog-category');
Route::get('edit-blog-category/{id}','BlogCategoryController@category_edit')->name('edit-blog-category');
Route::post('update-blog-category','BlogCategoryController@category_update')->name('update-blog-category');

Route::get('add-blog','BlogCategoryController@add_blog')->name('add-blog');
Route::post('save-blog','BlogCategoryController@save_blog')->name('save-blog');
Route::get('blog-list','BlogCategoryController@blog_list')->name('blog-list');
Route::get('delete-blog/{id}','BlogCategoryController@blog_delete')->name('delete-blog');
Route::get('edit-blog/{id}','BlogCategoryController@blog_edit')->name('edit-blog');
Route::post('update-blog','BlogCategoryController@blog_update')->name('update-blog');

//Blog Route End

//Admin User Manage Start
Route::get('add-user','AdminController@add_user')->name('add-user');
Route::get('user-list','AdminController@user_list')->name('user-list');
Route::post('save-user','AdminController@save_user')->name('save-user');

//Admin User Manage End

//==========================BackEnd End ==========================//
//==========================Vendor Start ==========================//
Route::get('/seller/add-product', 'SellerProductController@index')->name('addSellerPro');
Route::post('/seller/post-product', 'SellerProductController@postSellerProduct')->name('postSellerProduct');
Route::get('/seller/product-list', 'SellerProductController@productList')->name('productList');
Route::get('/seller/edit-product/{id}', 'SellerProductController@editProduct')->name('editProduct');
Route::post('/seller/update-product/{id}', 'SellerProductController@updateSellerPro')->name('updateSellerPro');
Route::get('/seller/delete-product/{id}', 'SellerProductController@deleteProduct')->name('deleteSellerPro');

Route::get('/seller/edit-profile', 'SellerProfileController@editProfile')->name('editSellerProfile');
Route::post('/seller/update-profile', 'SellerProfileController@updateProfile')->name('updateVendorProfile');

//test
Route::get('/seller/destroy/', 'SellerProductController@deleteMultiPro')->name('deleteMultiPro');
Route::get('/seller/json', 'SellerProductController@json')->middleware('ajax');
// Route for list of users with specific status in json format
Route::get('/seller/json/{pro_status}', 'SellerProductController@json')->middleware('ajax');
