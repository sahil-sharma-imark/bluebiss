<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\BBuserController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;

use App\Http\Controllers\admin\AproviderController;
use App\Http\Controllers\admin\AuserController;
use App\Http\Controllers\admin\AtaskController;
use App\Http\Controllers\admin\ChatController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\SubcategoryController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\DisputeController;
use App\Http\Controllers\admin\QuestionController;
use App\Http\Controllers\FaceBookController;
use App\Http\Controllers\admin\EmailController;
use App\Http\Controllers\admin\AdminHomeController;









/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Make this for logout
Route::get('/logout', [HomeController::class, 'logout']);

Route::get('/404', function () {
    abort(404);
});

Route::prefix('facebook')->name('facebook.')->group( function(){
    Route::get('auth', [FaceBookController::class, 'loginUsingFacebook'])->name('login');
    Route::get('callback', [FaceBookController::class, 'callbackFromFacebook'])->name('callback');
});

// Route::view('/','frontend.home');
Route::get('/', [HomeController::class, 'index']);
Route::post('create_account', [RoleController::class, 'create_account']);
Route::get('login-account', [RoleController::class, 'index']);
Route::get('/google',[RoleController::class, 'redirecttogoogle']);
Route::get('/google/callback',[RoleController::class, 'handleGoogleCallback']);

Route::get('become-provider', [HomeController::class, 'become_provider']);
Route::post('create-provider-account',[HomeController::class, 'create_provider_account']);
Route::post('business-details',[HomeController::class, 'business_details']);
Route::get('bus-details',[HomeController::class, 'bus_details']);
Route::get('provider-created-successfuly', [HomeController::class, 'pro_cre_successfuly']);

Route::get('provider-profile-preview/{id}', [HomeController::class, 'provider_profile_preview']);
Route::get('autocomplete-search', [HomeController::class, 'autocompleteSearch']);
Route::get('bu',[HomeController::class, 'getDistanceBetweenPointsNew']);
Route::get('deals-discount', [HomeController::class, 'deals_discount']);
Route::get('deal-&-detail/{id}', [HomeController::class, 'deadetail']);




Route::get('all-services', [ServicesController::class, 'index']);
Route::get('product-list', [ServicesController::class, 'search_item']);

Route::post('products-list', [ServicesController::class, 'task_details']);
Route::get('task-details', [ServicesController::class, 'task_details']);

//Route::post('products-list', [ServicesController::class, 'search_items']);
//Route::get('task-details', [ServicesController::class, 'task_details']);
Route::post('send-req-pro', [ServicesController::class, 'send_req_pro']);

Route::get('contact', [ContactController::class, 'index']);
Route::post('/contact-store',[ContactController::class, 'store']);
Route::get('/password-changed',[ContactController::class, 'susscssful']);
Route::get('thank-you', [ContactController::class, 'thank_you']);



Route::view('/task-detail','frontend.task-detail');
Route::view('about','frontend.about');
// Route::view('faq','frontend.faq');
Route::view('how-its-work','frontend.how-its-work');
// Route::view('how-to-create-project','frontend.how-to-create-project');
// Route::view('privacy-policy','frontend.privacy-policy');
Route::view('review-policy','frontend.review-policy');
Route::view('terms-&-conditions','frontend.terms-&-conditions');
Route::view('cancellation-policy','frontend.cancellation-policy');
Route::view('login-account','frontend.login-account');
Route::view('cookies-policy','frontend.cookies-policy');
Route::view('provider-listing','frontend.provider-listing');
Route::view('pro-center','frontend.pro-center');
Route::view('career-opportunities','frontend.pro-center');
Route::view('404-page','frontend.404');
Route::view('bus','frontend.bus');


Route::get('autocomplete', [RoleController::class, 'searchDB'])->name('autocomplete');
   

Route::get('searchheader', [HomeController::class, 'searchheader'])->name('searchheader');
Route::get('header-result/{result}', [HomeController::class, 'search_header']);
Route::get('privacy-policy', [HomeController::class, 'privacy_policy']);
Route::get('review-policy', [HomeController::class, 'review_policy']);
Route::get('terms-&-conditions', [HomeController::class, 'terms_conditions']);
Route::get('cancellation-policy', [HomeController::class, 'cancellation_policy']);
Route::get('faq',[HomeController::class, 'fetch_all_faq']);
Route::get('get-subcat', [HomeController::class, 'get_subcat']);
Route::get('about',[HomeController::class, 'about']);
// Route::get('contact',[HomeController::class, 'contact']);
Route::get('how-to-create-project',[HomeController::class, 'how_create_project']);





Route::get('get-subcat_list', [ProviderController::class, 'get_subcat_list']);
Route::get('get-sub', [ProviderController::class, 'get_sub']);



//Route::get('get-subcat-list-edit', [ProviderController::class, 'get_subcat_list_edit']);





Route::view('forget-password','auth.forgot-password');
Route::view('go-to-mail','auth.go-to-mail');



 Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
//Admin section route
Route::get('providers', [AProviderController::class, 'index']);
Route::get('providers-view/{id}', [AProviderController::class, 'show']);
Route::get('providers-edit/{id}', [AProviderController::class, 'edit']);
Route::post('providers-update/{id}', [AProviderController::class, 'update']);
Route::post("insert_url",[AProviderController::class,'insert_rough_provider']);
Route::get('view-all-to/{id}', [AProviderController::class, 'view_all_to']);


Route::get('users', [AuserController::class, 'index']);
Route::get('users-view/{id}', [AuserController::class, 'show']);
Route::get('users-update/{id}', [AuserController::class, 'update']);
Route::post("users-update-detail/{id}",[AuserController::class,'updtae_detail']);

Route::get('post-task', [AtaskController::class, 'index']);
Route::get('request-tasks', [AtaskController::class, 'request_tasks']);
Route::get('broadcast-task/{id}', [AtaskController::class, 'broadcast_task']);
Route::get('task-view/{id}', [AtaskController::class, 'task_view']);
Route::get('task-edit/{id}', [AtaskController::class, 'task_edit']);
Route::post('task-update/{id}', [AtaskController::class, 'task_update']);


Route::post('broadcast-all', [AtaskController::class, 'broadcast_all']);
Route::post('edit-profile/{id}', [AProviderController::class, 'edit_profile']);
Route::post('business-edit/{id}', [AProviderController::class, 'business_edit']);
Route::get('categories', [CategoryController::class, 'index']);
Route::get('add', [CategoryController::class, 'add']);
Route::post('add-category', [CategoryController::class, 'add_category']);
Route::get('sub-category', [SubcategoryController::class, 'index']);
Route::get('add-subcategory', [SubcategoryController::class, 'add']);
Route::post('addsubcategory', [SubcategoryController::class, 'addsubcategory']);
Route::get('update-sub-cat/{id}', [SubcategoryController::class, 'update_sub_cat']);
Route::post('update-subcat/{id}', [SubcategoryController::class, 'update_subcat']);
Route::get('cat-status', [CategoryController::class, 'updateStatus']);
Route::get('cat-show-desk', [CategoryController::class, 'cat_show_desk']);
Route::get('show-popular-cat', [CategoryController::class, 'show_popular_cat']);
Route::get('subcat-show-desk', [SubcategoryController::class, 'subcat_show_desk']);
Route::get('status-subcat', [SubcategoryController::class, 'status_subcat']);




Route::get('delete-category/{id}', [CategoryController::class, 'delete_category']);
Route::get('edit-category/{id}', [CategoryController::class, 'edit_category']);
Route::post('update-category/{id}', [CategoryController::class, 'update_category']);


Route::get('delete-sub-cat/{id}', [SubcategoryController::class, 'delete_subcategory']);

//How It Work
Route::get('how-it-work', [AdminHomeController::class, 'how_it_work']);
Route::get('how-it-work-all', [AdminHomeController::class, 'how_it_work_all']);
//testimonials
Route::get('testimonials-all', [AdminHomeController::class, 'testimonials_all']);
Route::get('testimonial-add', [AdminHomeController::class, 'testimonial_add']);
Route::post('add-testimonial', [AdminHomeController::class, 'add_testimonial']);
Route::get('testimonial-edit/{id}', [AdminHomeController::class, 'testimonial_edit']);
Route::post('update-testimonial/{id}', [AdminHomeController::class, 'update_testimonial']);
Route::get('testimonial-delete/{id}', [AdminHomeController::class, 'testimonial_delete']);
Route::get('testimonial-status',[AdminHomeController::class, 'update_testimonial_status']);
//right-price
Route::get('right-price-all', [AdminHomeController::class, 'right_price_all']);
Route::get('right-price-add', [AdminHomeController::class, 'right_price_add']);
Route::post('add-right-price',[AdminHomeController::class, 'add_right_price']);
Route::get('rightprice-desktop',[AdminHomeController::class, 'rightprice_desktop']);
Route::get('rightprice-status',[AdminHomeController::class, 'rightprice_status']);
Route::get('rightprice-edit/{id}',[AdminHomeController::class, 'rightprice_edit']);
Route::post('update-right-price/{id}',[AdminHomeController::class, 'update_right_price']);
Route::get('right-price-delete/{id}',[AdminHomeController::class, 'right_price_delete']);
//homepage
Route::get('homepage-edit',[AdminHomeController::class, 'homepage_edit']);
Route::post('homepage-update',[AdminHomeController::class, 'homepage_update']);
//aboutus
Route::get('aboutus-edit',[AdminHomeController::class, 'aboutus_edit']);
Route::post('aboutus-update',[AdminHomeController::class, 'aboutus_update']);
//contactus
Route::get('contactus-edit',[AdminHomeController::class, 'contactus_edit']);
Route::post('contactus-update',[AdminHomeController::class, 'contactus_update']);
Route::get('subject-all',[AdminHomeController::class, 'subject_all']);
Route::get('contact-subject',[AdminHomeController::class, 'contact_subject']);
Route::get('subject-add',[AdminHomeController::class, 'subject_add']);
Route::post('add-subject',[AdminHomeController::class, 'add_subject']);
Route::get('subject-edit/{id}',[AdminHomeController::class, 'subject_edit']);
Route::post('subject-update/{id}',[AdminHomeController::class, 'subject_update']);
Route::get('subject-delete/{id}',[AdminHomeController::class, 'subject_delete']);
//our-team
Route::get('our-team-all',[AdminHomeController::class, 'our_team_all']);
Route::get('our-team-add',[AdminHomeController::class, 'our_team_add']);
Route::post('add-our-team',[AdminHomeController::class, 'add_our_team']);
Route::get('team-status',[AdminHomeController::class, 'update_team_status']);
Route::get('team-show-status',[AdminHomeController::class, 'update_team_show_status']);
Route::get('team-edit/{id}',[AdminHomeController::class, 'team_edit']);
Route::post('update-team/{id}',[AdminHomeController::class, 'update_team']);
Route::get('team-delete/{id}',[AdminHomeController::class, 'team_delete']);
//Home-top
Route::get('home-top-all',[AdminHomeController::class, 'home_top_all']);
Route::get('home-top-add',[AdminHomeController::class, 'home_top_add']);
Route::post('add-header-top',[AdminHomeController::class, 'add_header_top']);
Route::get('header-top-status',[AdminHomeController::class, 'update_headertop_status']);
Route::get('header_top-edit/{id}',[AdminHomeController::class, 'header_top_edit']);
Route::post('update-header-top/{id}',[AdminHomeController::class, 'update_header_top']);
Route::get('header_top-delete/{id}',[AdminHomeController::class, 'header_top_delete']);
//create image link
Route::get('all-image-link',[AdminHomeController::class, 'all_image_link']);
Route::get('image-link-add',[AdminHomeController::class, 'image_link_add']);
Route::post('add-image-link',[AdminHomeController::class, 'add_image_link']);
Route::get('edit-image/{id}',[AdminHomeController::class, 'edit_image']);
Route::get('delete-image/{id}',[AdminHomeController::class, 'delete_image']);
Route::post('update-image-link/{id}',[AdminHomeController::class, 'update_image_link']);
//create author
Route::get('all-author',[AdminHomeController::class, 'all_author']);
Route::get('author-add',[AdminHomeController::class, 'author_add']);
Route::post('add-author',[AdminHomeController::class, 'add_author']);
Route::get('edit-author/{id}',[AdminHomeController::class, 'edit_author']);
Route::post('update-author/{id}',[AdminHomeController::class, 'update_author']);
//Create project
Route::get('create-project-update', [AdminHomeController::class, 'create_project']);
Route::post('create-project-update', [AdminHomeController::class, 'create_project_update']);
//For change logo
Route::get('dashboard-setting', [AdminHomeController::class, 'dashboard_setting']);
Route::post('update-dashboard-setting',[AdminHomeController::class,'update_dashboard_setting']);
















Route::post('how-it-work-add', [AdminHomeController::class, 'how_it_work_add']);
Route::get('how-it-work-edit/{id}', [AdminHomeController::class, 'how_it_work_edit']);
Route::post('how-it-work-update/{id}', [AdminHomeController::class, 'how_it_work_update']);
Route::get('how-it-work-delete/{id}', [AdminHomeController::class, 'how_it_work_delete']);
Route::get('privacy-policy-update', [AdminHomeController::class, 'privacy_policy']);
Route::post('privacy-policy-upd', [AdminHomeController::class, 'privacy_policy_update']);
Route::get('review-policy-update', [AdminHomeController::class, 'review_policy']);
Route::post('review-policy-upd', [AdminHomeController::class, 'review_policy_update']);
Route::get('terms-conditions-update', [AdminHomeController::class, 'terms_conditions']);
Route::post('terms-conditions-upd', [AdminHomeController::class, 'terms_conditions_update']);
Route::get('cancellation-policy-update', [AdminHomeController::class, 'cancellation_policy']);
Route::post('cancellation-policy-upd', [AdminHomeController::class, 'cancellation_policy_update']);
Route::get('faq-add', [AdminHomeController::class, 'faq_add']);
Route::get('faq-all', [AdminHomeController::class, 'faq_all']);
Route::post('add-faq',[AdminHomeController::class, 'add_faq']);
Route::get('faq-status',[AdminHomeController::class, 'update_faq_status']);
// Provider Profile Preview
Route::get('provider-profile-customer/{id}',[ProviderController::class, 'provider_rofile_customer']);














Route::get('add-blag', [BlogController::class, 'add_blog']);
Route::post('addblog', [BlogController::class, 'addblog']);
Route::get('all-blog', [BlogController::class, 'all_blog']);
Route::get('custom-foote', [CustomFooterController::class, 'custom_foote']);
Route::get('blogs', [HomeController::class, 'blogs']);
Route::get('blog-detail/{id}', [HomeController::class, 'blog_detail']);
Route::get('edit-blog/{id}', [BlogController::class, 'edit_blog']);
Route::post('editblog/{id}', [BlogController::class, 'editblog']);
Route::get('deleteblog/{id}', [BlogController::class, 'delete']);
//Dispute
Route::get('all-disputes', [DisputeController::class, 'all_dispute']);
Route::get('deletedispute/{id}', [DisputeController::class, 'delete']);
//Questions
Route::get('add-pages', [QuestionController::class, 'add_page']);
Route::post('backend-que', [QuestionController::class, 'backend_que']);
Route::get('all-questions', [QuestionController::class, 'all_questions']);
Route::get('delete_que/{id}', [QuestionController::class, 'delete_que']);
Route::get('edit-que/{id}', [QuestionController::class, 'edit_que']);
Route::post('update-backend-que/{id}',[QuestionController::class, 'update_backend_que']);

//Email
Route::get('email-template', [EmailController::class, 'templates']);
Route::get('email-tem-edit/{id}', [EmailController::class, 'email_tem_edit']);
Route::post('email-tem-update/{id}', [EmailController::class, 'email_tem_update']);
//Report
Route::get('report-customer/{id}', [ProviderController::class, 'report_customer']);
Route::post('dispute', [ProviderController::class, 'dispute']);
Route::get('report-provider/{id}', [BBuserController::class, 'report_provider']);
Route::post('cus-dispute', [BBuserController::class, 'cus_dispute']);
//Chat Controller
Route::post('create-chat', [ChatController::class, 'create_chat']);
Route::post('request-quote', [ChatController::class, 'request_quote']);
Route::post('request-quote-user', [ChatController::class, 'request_quote_user']);
Route::get('accept-book', [ChatController::class, 'raccept_book']);
Route::get('reject-quote', [ChatController::class, 'reject_quote']);
Route::post('schedule-task', [ChatController::class, 'schedule_task']);
Route::get('accept-schedule', [ChatController::class, 'accept_schedule']);
Route::get('reject-schedule', [ChatController::class, 'reject_schedule']);
Route::get('admin-chat', [ChatController::class, 'admin_chat']);
Route::get('select-user', [ChatController::class, 'select_user']);
Route::get('select-tasks', [ChatController::class, 'select_tasks']);
Route::post('getadmin-chat', [ChatController::class, 'getadmin_chat']);
Route::get('admin-persentage', [ChatController::class, 'admin_persentage']);
Route::post('add_comm', [ChatController::class, 'add_comm']);
Route::post('resend-quote', [ChatController::class, 'resend_quote']);

//Modify Quotation
// modify-quote/QuoID-67
// Route::get('modify-quote/{quote_id}',[ChatController::class, 'modify_quote'])
Route::any('insert-task', [BBuserController::class, 'insert_task'])->name('insert-task');









Route::group(['middleware'=>['pro_vider']],function(){
   Route::get('provider-profile/{id}', [ProviderController::class, 'pro_profile']);
   Route::post('provider-profile-update/{id}', [ProviderController::class, 'profile_update']);
   Route::get('provider-edit-profile/{id}', [ProviderController::class, 'pro_profile_edit']);
   Route::post('provider-update-profile/{id}', [ProviderController::class, 'pro_profile_update']);
   Route::get('pro', [ProviderController::class, 'pr']);
   Route::get('delete-pro-img/{id}', [ProviderController::class, 'delete_img']);
   Route::post('create-new-listing/{id}', [ProviderController::class, 'add_list']);
   Route::get('list-delete/{id}', [ProviderController::class, 'list_destroy']);
   Route::get('edit-list/{id}', [ProviderController::class, 'edit_list']);
   Route::post('edit-listing/{id}', [ProviderController::class, 'edit_listing']);
   Route::get('pause-listing/{id}', [ProviderController::class, 'pause_listing']);
   Route::post('create-new-deal/{id}', [ProviderController::class, 'add_deal']);
   Route::get('deal-detail/{id}', [ProviderController::class, 'deal_detail']);
   Route::get('edit-deal/{id}', [ProviderController::class, 'edit_deal']);
   Route::get('delete-deal/{id}', [ProviderController::class, 'delete_deal']);
   Route::post('update-deal-detail/{id}', [ProviderController::class, 'update_deal_detail']);
   Route::post('provider-review', [ProviderController::class, 'provider_review']);
   Route::post('provider-change-pass/{id}', [ProviderController::class, 'pro_pass']);
   Route::post('pro-payment-details/{id}', [ProviderController::class, 'pro_paymentdetail']);
   Route::get('provider-account', [ProviderController::class, 'provider_account']);
   Route::get('tasks-detail-provider/{id}', [ProviderController::class, 'tasks_detail_provider']);
   Route::post('pro-ref-bonus',[ProviderController::class, 'pro_refbonus']);
   Route::get('provider-revert/{id}', [ProviderController::class, 'provider_revert']);
   Route::get('customer-chat', [ProviderController::class, 'customer_chat']);
   Route::post('pro-create-chat', [ProviderController::class, 'pro_create_chat']);
   Route::get('edit-business-profile/{id}', [ProviderController::class, 'edit_business_profile']);
   Route::post('update-business-profile/{id}', [ProviderController::class, 'update_business_profile']);
   Route::post('provider-socialmedia/{id}', [ProviderController::class, 'provider_socialmedia']);
   Route::get('process-broadcast/{id}', [ProviderController::class, 'process_broadcast']);
   Route::post('edit-business-details/{id}', [ProviderController::class, 'edit_business_details']);

   Route::get('check-sub-cat', [ProviderController::class, 'check_sub_cat']);
   
});



Route::group(['middleware'=>['user_middleware']],function(){
   Route::get('profile/{id}', [BBuserController::class, 'profile']);
   Route::post('profile-update/{id}', [BBuserController::class, 'profile_update']);
   Route::post('change-password/{id}', [BBuserController::class, 'change_password']);
   Route::get('delete-img/{id}', [BBuserController::class, 'delete_img'])->name('delete-img');
   Route::post('billing-details',[BBuserController::class, 'billing_details']);
   Route::get(' favorite-provider/{id}', [BBuserController::class, 'favorite_provider']);
   Route::post('user-change-pass',[BBuserController::class, 'user_change_pass']);
   Route::post('referral-bonus',[BBuserController::class, 'referralbonus']);
   Route::get('delete-favorite/{id}', [BBuserController::class, 'delete_favorite']);
   //task
   
   Route::get('my-tasks/{id}', [BBuserController::class, 'my_task']);
   Route::get('cancle-task/{id}', [BBuserController::class, 'cancle_task']);
   Route::get('edit-task-detail/{id}', [BBuserController::class, 'edit_task']);
   Route::post('update-task/{id}', [BBuserController::class, 'update_task']);
   Route::get('taskc-created-successfuly', [BBuserController::class, 'tcs']);
   Route::get('my-task-detail/{id}', [BBuserController::class, 'my_task_detail']);
   Route::get('interested-provider-chat', [BBuserController::class, 'interested_pro_chat']);
   Route::post('user-review', [BBuserController::class, 'user_review']);
   
});

Route::view("verify-mobile-number","frontend.verify-mobile-number");
Route::post("otpverfy_mail",[BBuserController::class, 'otpsendmobile']);
Route::get("very_otpresend_mobile",[BBuserController::class, 'resendotp']);




Route::get('/test/env', function () {
    dd(env('DB_DATABASE')); // Dump 'db' variable value one by one
});













 

