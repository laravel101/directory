<?php

Route::bind('sector', function($value, $route){
    return App\Sector::where("slug", $value)->first();
});

Route::bind('company', function($value, $route){
    return App\Company::where("slug", $value)->first();
});

Route::bind("news", function($value, $route){
    return App\News::where("slug", $value)->first();
});

/**
 * Frontend Routes
 */

Route::group(["namespace" => 'Frontend', "as" => "frontend."], function(){

    Route::get("/", ["as" => "home.index", "uses" => "HomeController@index"]);

    Route::get("company", ["as" => "company.index", "uses" => "CompanyController@index"]);
    Route::get("company/{company}", ["as" => "company.show", "uses" => "CompanyController@show"]);

    Route::get("brand", ["as" => "company.brand", "uses" => "CompanyController@brand"]);

    Route::get("sector", ["as" => "sector.index", "uses" => "SectorController@index"]);
    Route::get("sector/{sector}", ["as" => "sector.show", "uses" => "SectorController@show"]);

    Route::get("search", ["as" => "company.search", "uses" => "CompanyController@search"]);

    Route::get("news", ["as" => "news.index", 'uses' => "NewsController@index"]);
    Route::get("news/{news}", ["as" => "news.show", 'uses' => "NewsController@show"]);

    Route::get("contact", ["as" => "contact.show", "uses" => "ContactController@show"]);
    Route::post("contact/send", ["as" => "contact.send", "uses" => "ContactController@send"]);

    Route::group(["middleware" => "guest"], function(){
        Route::get("login", ['as' => "user.login", "uses" => "UserController@login"]);
        Route::post("login", ['as' => "user.login", "uses" => "UserController@doLogin"]);

        Route::get("register", ['as' => "user.register", 'uses' => "UserController@register"]);
        Route::post("register", ['as' => 'user.register', 'uses' => "UserController@doRegister"]);

        Route::get("reset/email", ["as" => 'user.reset.email', 'uses' => "UserController@resetEmailForm"]);
        Route::post("reset/email", ["as" => "user.reset.email", "uses" => 'UserController@resetEmail']);
        Route::get("reset/password", ["as" => "user.reset.password", 'uses' => "UserController@resetPasswordForm"]);
        Route::post("reset/password", ["as" => "user.reset.password", 'uses' => "UserController@resetPassword"]);
    });
});

/**
 * Backend Routes
 */

Route::group(["namespace" => "Backend", "as" => "backend.", "prefix" => config('app.backend')], function(){

    Route::group(["middleware" => "guest"], function(){
        Route::get("login", ["as" => "user.login", "uses" => "UserController@login"]);
        Route::post("login", ["as" => "user.login", "uses" => "UserController@doLogin"]);
    });

    Route::group(["middleware" => "admin"], function(){
        Route::get("/", ["as" => "dashboard.index", "uses" => "DashboardController@index"]);

        Route::get("sector/{sector?}", ["as" => "sector.index", "uses" => "SectorController@index"]);
        Route::get("sector/{sector_parent}/create", ["as" => "sector.create", "uses" => "SectorController@create"]);
        Route::post("sector", ["as" => "sector.store", "uses" => "SectorController@store"]);
        Route::get("sector/{sector}/edit", ["as" => "sector.edit", "uses" => "SectorController@edit"]);
        Route::put("sector/{sector}", ["as" => "sector.update", "uses" => "SectorController@update"]);
        Route::get("sector/{sector}/delete", ["as" => "sector.destroy", "uses" => "SectorController@destroy"]);

        Route::get("company", ["as" => "company.index", "uses" => "CompanyController@index"]);
        Route::get("company/create", ["as" => "company.create", "uses" => "CompanyController@create"]);
        Route::post("company", ["as" => "company.store", "uses" => "CompanyController@store"]);
        Route::get("company/{company}/edit", ["as" => "company.edit", "uses" => "CompanyController@edit"]);
        Route::put("company/{company}", ["as" => "company.update", "uses" => "CompanyController@update"]);
        Route::get("company/{company}/delete", ["as" => "company.destroy", "uses" => "CompanyController@destroy"]);
        Route::get("company/{company}/brand", ["as" => "company.brand", "uses" => "CompanyController@brandToggle"]);
        Route::get("company/{company}/active", ["as" => "company.active", "uses" => "CompanyController@activeToggle"]);

        Route::get("user", ["as" => "user.index", "uses" => "UserController@index"]);
        Route::get("user/create", ["as" => "user.create", "uses" => "UserController@create"]);
        Route::post("user", ["as" => "user.store", "uses" => "UserController@store"]);
        Route::get("user/{user}/edit", ["as" => "user.edit", "uses" => "UserController@edit"]);
        Route::put("user/{user}", ["as" => "user.update", "uses" => "UserController@update"]);
        Route::get("user/{user}/delete", ["as" => "user.destroy", "uses" => "UserController@destroy"]);

        Route::get("inbox/{inbox_type?}", ["as" => "inbox.index", "uses" => "InboxController@index"]);
        Route::get("inbox/{inbox_type}/{inbox}", ["as" => "inbox.show", "uses" => "InboxController@show"]);

        Route::get("news", ["as" => "news.index", "uses" => "NewsController@index"]);
        Route::get("news/create", ["as" => "news.create", "uses" => "NewsController@create"]);
        Route::post("news", ["as" => "news.store", "uses" => "NewsController@store"]);
        Route::get("news/{news}/edit", ["as" => "news.edit", "uses" => "NewsController@edit"]);
        Route::put("news/{news}", ["as" => "news.update", "uses" => "NewsController@update"]);
        Route::get("news/{news}/delete", ["as" => "news.destroy", "uses" => "NewsController@destroy"]);

        Route::get("logout", ["as" => "user.logout", "uses" => "UserController@logout"]);
    });

});