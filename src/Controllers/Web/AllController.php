<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 1.0
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */


/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 1.0
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */


namespace NINA\Controllers\Web;

use NINA\Controllers\Controller;
use NINA\Models\PhotoModel;
use NINA\Models\SettingModel;
use NINA\Models\NewsModel;
use NINA\Models\StaticModel;
use NINA\Models\ExtensionsModel;
use NINA\Models\ProductListModel;
use NINA\Models\ProductCatModel;
use NINA\Models\NewsListModel;
use NINA\Core\Container;

class AllController extends Controller
{

    function composer($view): void
    {
        $extHotline = '';
        $photos = PhotoModel::select('photo', 'namevi', 'link', 'type')
            ->whereIn('type', ['logo', 'favicon', 'social', 'bg-slide'])
            ->whereRaw("FIND_IN_SET(?, status)", ['hienthi'])
            ->orderBy('numb', 'asc')
            ->orderBy('id', 'desc')
            ->get();

        $bannerSlide = $photos->where('type', 'bg-slide')->first();
        $logoPhoto = $photos->where('type', 'logo')->first();
        $favicon = $photos->where('type', 'favicon')->first();
        $social = $photos->where('type', 'social');



        $listProductMenu = ProductListModel::select('namevi', 'photo', 'slugvi', 'id')
            ->where('type', 'san-pham',)
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->orderBy('numb', 'asc')
            ->orderBy('id', 'desc')
            ->get();

        $listNewsMenu = NewsListModel::select('namevi', 'photo', 'slugvi', 'id')
            ->where('type', 'tin-tuc',)
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->orderBy('numb', 'asc')
            ->orderBy('id', 'desc')
            ->get();


        $aboutMenu = NewsModel::select('namevi', 'photo', 'slugvi', 'id')
            ->where('type', 'gioi-thieu',)
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->orderBy('numb', 'asc')
            ->orderBy('id', 'desc')
            ->get();


        $footer = StaticModel::select('namevi', 'contentvi', 'descvi', 'slugvi', 'photo')
            ->where('type', 'footer')
            ->first();

        $khuyenmai = StaticModel::select('namevi', 'contentvi')
            ->where('type', 'khuyen-mai')
            ->first();


        $thongTinLienHe = NewsModel::select('namevi', 'photo', 'descvi', 'slugvi', 'descvi')
            ->where('type', 'thong-tin-lien-he')
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->orderBy('numb', 'asc')
            ->get();

        $extHotline = ExtensionsModel::select('*')
            ->where('type', 'hotline')
            ->first();
          

        $extSocial = ExtensionsModel::select('*')
            ->where('type', 'social')
            ->first();

        $socialFooter = PhotoModel::select('namevi', 'photo', 'link')
            ->where('type', 'social-footer')
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->orderBy('numb', 'asc')
            ->orderBy('id', 'desc')
            ->get();


        $policy = NewsModel::select('namevi', 'photo', 'descvi', 'slugvi')
            ->where('type', 'chinh-sach')
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->orderBy('numb', 'asc')
            ->orderBy('id', 'desc')
            ->get();

        $cauhoi = NewsModel::select('namevi', 'photo', 'contentvi', 'slugvi')
            ->where('type', 'cau-hoi-thuong-gap')
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->orderBy('numb', 'asc')
            ->orderBy('id', 'desc')
            ->get();


        $partner = PhotoModel::select('namevi', 'photo', 'link')
            ->where('type', 'doi-tac')
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->orderBy('numb', 'asc')
            ->orderBy('id', 'desc')
            ->get();


        $sloganTieuchi = StaticModel::select('namevi')
            ->where('type', 'slogan-tieuchi')
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->first();

        $slogan1 = StaticModel::select('namevi')
            ->where('type', 'slogan-chungtoicogi')
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->first();


        $slogan2 = StaticModel::select('namevi')
            ->where('type', 'slogan-duan')
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->first();

        $slogan3 = StaticModel::select('namevi')
            ->where('type', 'slogan-danhgiakhachang')
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->first();

        $slogan4 = StaticModel::select('namevi')
            ->where('type', 'slogan-ketnoi')
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->first();

        $slogan5 = StaticModel::select('namevi')
            ->where('type', 'slogan-dangky')
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->first();


        $setting = SettingModel::first();
        $optSetting = json_decode($setting['options'], true);
        $configType = json_decode(json_encode(config('type')));
        $upload = json_decode(json_encode(config('upload')));
        $lang = session()->get('locale');
        $view->share(compact(
            'configType',
            'upload',
            'logoPhoto',
            'favicon',
            'setting',
            'optSetting',
            'listProductMenu',
            'social',
            'footer',
            'extHotline',
            'extSocial',
            'lang',
            'listNewsMenu',
            'thongTinLienHe',
            'socialFooter',
            'policy',
            'khuyenmai',
            'cauhoi',
            'sloganTieuchi',
            'partner',
            'aboutMenu',
            'slogan1',
            'slogan2',
            'slogan3',
            'slogan4',
            'slogan5',
            'bannerSlide'
        ));
    }
}