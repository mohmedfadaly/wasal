<?php


Route::group(['middleware' => ['web']], function() {

    # home
    // Route::get('/','front\HomeController@Home')->name('welcome');
    
    Route::get('logout-acuant','front\AuthController@Logout')->name('acuant_Logout');
    Route::get('profile-customer','front\AuthController@profile')->name('profile_customer');
    Route::post('update-profile-customer','front\AuthController@updateprofile')->name('update_profile_customer');
    Route::get('all-notfications','front\AuthController@notfication')->name('all_notfications');
    Route::post('store-email','front\HomeController@email')->name('store_email');
    Route::get('info-complate-provider','front\AuthController@infoprovider')->name('info_provider')->middleware('provider');
    Route::get('update-fcm-token/{token?}/{type?}','front\HomeController@UpdateToken');

});

Route::group(['middleware' => ['web','customer_guest']], function() {
    
   
    # change type
    Route::get('change-account','front\AuthController@types')->name('change_type');
    
    Route::get('register-provider','front\AuthController@registerprovider')->name('register_provider');
    Route::get('register-customer','front\AuthController@registercustomer')->name('register_customer');
    
    # register 
    Route::post('register-account','front\AuthController@register')->name('register_acuant');
    Route::post('register-complate','front\AuthController@complate')->name('register_complate');
    Route::get('customer-send-email/{token}','front\AuthController@logincustomeremail')->name('login_customer_email_send');
    Route::get('provider-send-email/{token}','front\AuthController@loginProvideremail')->name('login_provider_email_send');


    #login
    Route::get('provider-login','front\AuthController@loginprovider')->name('loginprovider');
    Route::get('change-account-login','front\AuthController@typeslogin')->name('change_type_login');
    Route::post('login-account','front\AuthController@login')->name('acuant_login');
    Route::get('customer-login','front\AuthController@logincustomer')->name('logincustomer');
    
    Route::get('email-password-customer','front\AuthController@emailpasswordcustomer')->name('emailpasswordcustomer');
    Route::get('email-password-provider','front\AuthController@emailpasswordprovider')->name('emailpasswordprovider');
    Route::post('send-mail-password','front\AuthController@sendmailpassword')->name('sendmailpassword');
    Route::get('change-password-customer/{token}','front\AuthController@passwordcustomeremail')->name('passwordcustomeremail');
    Route::get('change-password-provider/{token}','front\AuthController@passwordProvideremail')->name('passwordProvideremail');
    Route::post('new-password','front\AuthController@newpassword')->name('newpassword');


    Route::get('auth/facebook', 'front\AuthController@redirectToFacebook')->name('customer_facebook');
    Route::get('auth/facebook/callback', 'front\AuthController@handleFacebookCallback');

    Route::get('provider/auth/facebook', 'front\AuthController@redirectToFacebookprov')->name('provider_facebook');
    Route::get('provider/auth/facebook/callback', 'front\AuthController@handleFacebookCallbackprov');
   

    Route::get('auth/google', 'front\AuthController@redirectToGoogle')->name('customer_google');
    Route::get('auth/google/callback', 'front\AuthController@handleGoogleCallback');

    Route::get('provider/auth/google', 'front\AuthController@redirectToGoogleprov')->name('provider_google');
    Route::get('provider/auth/google/callback', 'front\AuthController@handleGoogleCallbackprov');

});


