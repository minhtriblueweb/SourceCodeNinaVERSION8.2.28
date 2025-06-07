<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 1.0
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */

use NINA\Core\Routing\NINARouter;
NINARouter::group(['namespace' => 'Web','prefix' => config('app.web_prefix'),'middleware' => [\NINA\Middlewares\LangRequest::class,\NINA\Middlewares\CheckRedirect::class]], function ($language='') {
    if(!empty($language) && \Illuminate\Support\Arr::has(config('app.langs'),$language)) session()->set('locale',$language);
    NINARouter::get('/change-lang/{lang}', function ($lang) {
        if(\Illuminate\Support\Arr::has(config('app.langs'),$lang)){
            session()->set('locale',$lang);
            app()->make('config')->set('app.seo_default',$lang);
            response()->redirect(url('home',['language'=>$lang]));
        }
    });

    NINARouter::get('/', 'HomeController@index')->name('home');
    NINARouter::get('/index', 'HomeController@index')->name('index');
    NINARouter::post('/load-product', 'HomeController@ajaxProduct')->name('load-product');
    NINARouter::get('/load-token', 'ApiController@token')->name('token');
    NINARouter::get('/tags-san-pham', 'TagsController@index')->name('tags');
    NINARouter::get('/lien-he', 'ContactController@index')->name('lien-he');
    NINARouter::post('/lien-he', 'ContactController@submit')->name('lien-he-post');

    NINARouter::get('/dat-hang', 'ProductController@dathang')->name('dat-hang');

    NINARouter::get('/gioi-thieu', 'NewsController@index')->name('gioi-thieu');

    NINARouter::get('/he-thong-phan-phoi', 'NewsController@index2')->name('he-thong-phan-phoi');
    NINARouter::get('/show-chi-nhanh', 'NewsController@ajaxChiNhanh')->name('show-chi-nhanh');

    NINARouter::get('/san-pham', 'ProductController@index')->name('san-pham');

    
    NINARouter::get('/tin-tuc', 'NewsController@index')->name('tin-tuc');
    NINARouter::get('/chinh-sach', 'NewsController@index')->name('chinh-sach');
    NINARouter::get('/du-an', 'NewsController@index')->name('du-an');
    NINARouter::get('/tim-kiem', 'ProductController@searchProduct')->name('tim-kiem');
    NINARouter::post('/cart/{action}', 'CartController@handle')->name('cart');
    NINARouter::get('/gio-hang', 'CartController@showcart')->name('giohang');
    NINARouter::get('/{slug}', 'SlugController@handle')->name('slugweb');
    NINARouter::post('/dang-ky-nhan-tin', 'HomeController@letter')->name('letter');
});