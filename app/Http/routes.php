<?php

/**
 * Frontend Routes
 */

Route::group(["namespace" => 'Frontend', "as" => "frontend."], function(){

    Route::get("/", ["as" => "home.index", "uses" => "HomeController@index"]);

    Route::get("company", ["as" => "company.index", "uses" => "CompanyController@index"]);
    Route::get("company/{company}", ["as" => "company.show", "uses" => "CompanyController@show"]);

    Route::get("brand", ["as" => "brand.index", "uses" => "BrandController@index"]);

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