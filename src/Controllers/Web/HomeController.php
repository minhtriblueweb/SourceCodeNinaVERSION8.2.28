<?php

/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 1.0
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */


namespace NINA\Controllers\Web;

use Carbon\Carbon;
use Illuminate\Http\Request;
use NINA\Controllers\Controller;
use NINA\Models\PhotoModel;
use NINA\Models\NewsModel;
use NINA\Models\ProductModel;
use NINA\Models\ProductListModel;
use NINA\Models\SettingModel;
use NINA\Models\StaticModel;
use NINA\Models\ProductCatModel;
use NINA\Models\TagsModel;
use NINA\Models\GalleryModel;
use NINA\Models\NewslettersModel;
use NINA\Core\Support\Facades\Func;
use NINA\Models\NewsListModel;

class HomeController extends Controller
{
    public function index(Request $request)
    {

        $albumAbout = GalleryModel::select('photo')
            ->where('type', 'gioi-thieu-trang-chu')
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->orderBy('numb', 'desc')
            ->get();

        $slider = PhotoModel::select('namevi', 'photo', 'link')
            ->where('type', 'slide')
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->orderBy('numb', 'desc')
            ->get();

        $slider01 = PhotoModel::select('namevi', 'photo', 'link')
            ->where('type', 'slide-1')
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->orderBy('numb', 'desc')
            ->get();

        $slider02 = PhotoModel::select('namevi', 'photo', 'link')
            ->where('type', 'slide-2')
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->orderBy('numb', 'desc')
            ->get();

        $slider03 = PhotoModel::select('namevi', 'photo', 'link')
            ->where('type', 'slide-3')
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->orderBy('numb', 'desc')
            ->get();

        
        $ketnoi = PhotoModel::select('namevi', 'photo', 'link')
            ->where('type', 'ket-noi-voi-chung-toi')
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->orderBy('numb', 'desc')
            ->get();

        $listNewsHot = NewsListModel::select('namevi', 'photo', 'slugvi', 'id')
            ->where('type', 'tin-tuc',)
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->orderBy('numb', 'asc')
            ->orderBy('id', 'desc')
            ->get();


        $gioithieuHot = NewsModel::select('namevi', 'photo', 'descvi', 'slugvi', 'descvi')
            ->where('type', 'gioi-thieu')
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->orderBy('numb', 'desc')
            ->get();

        $listProductNB = ProductListModel::select('namevi', 'descvi', 'photo', 'id', 'slugvi')
            ->where('type', 'san-pham')
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->whereRaw("FIND_IN_SET(?,status)", ['noibat'])
            ->orderBy('numb', 'asc')
            ->orderBy('id', 'desc')
            ->get();

        $about = StaticModel::select('namevi', 'contentvi', 'descvi', 'slugvi', 'photo')
            ->where('type', 'gioi-thieu-trang-chu')
            ->first();

        $thanhTuu = NewsModel::select('namevi', 'quantity')
            ->where('type', 'co-so-vat-chat')
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->orderBy('numb', 'asc')
            ->orderBy('id', 'asc')
            ->get();

        $tieuchi = NewsModel::select('namevi', 'quantity', 'photo')
            ->where('type', 'tieu-chi')
            ->get();

        $projectHot = NewsModel::select('namevi', 'photo', 'descvi', 'slugvi')
            ->where('type', 'du-an')
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->whereRaw("FIND_IN_SET(?,status)", ['noibat'])
            ->orderBy('numb', 'desc')
            ->get();

        $danhGia = NewsModel::select('namevi', 'photo', 'descvi', 'slugvi', 'contentvi')
            ->where('type', 'danh-gia-khach-hang')
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->orderBy('numb', 'desc')
            ->get();
            
        /* SEO */
        $titleMain = SettingModel::pluck('namevi')->first();
        $this->seoPage($titleMain);
        return view('home.index', compact('slider',  'listProductNB',  'about', 'albumAbout', 'gioithieuHot', 'thanhTuu', 'tieuchi', 'projectHot', 'danhGia',  'ketnoi', 'listNewsHot', 'slider01', 'slider02', 'slider03'));
    }



    public function letter(Request $request)
    {
        if (!empty($request->csrf_token)){
            $responseCaptcha = $request->input('recaptcha_response_newsletter') ?? '';
            $resultCaptcha = Func::checkRecaptcha($responseCaptcha);
            $scoreCaptcha = (!empty($resultCaptcha['score'])) ? $resultCaptcha['score'] : 0;
            $actionCaptcha = (!empty($resultCaptcha['action'])) ? $resultCaptcha['action'] : '';
            $testCaptcha = (!empty($resultCaptcha['test'])) ? $resultCaptcha['test'] : false;
            $data = (!empty($request->dataNewsletter)) ? $request->dataNewsletter : null;

            if (($scoreCaptcha >= 0.5 && $actionCaptcha == 'newsletter') || config('app.recaptcha.active')==false) {
                foreach ($data as $column => $value) {
                    $data[$column] = $value ?? '';
                }

                $data['date_created'] = Carbon::now()->timestamp;
                $data['confirm_status'] = 1;
                $data['type'] = 'dang-ky-nhan-tin';
                $data['subject'] = "Đăng ký nhận tin";
                if (NewslettersModel::create($data)) {
                    transfer('Đăng ký nhận tin thành công !', 1, PeceeRequest()->getHeader('http_referer'));
                } else {
                    transfer('Đăng ký nhận tin thất bại !', 0, PeceeRequest()->getHeader('http_referer'));
                }
            } else {
                transfer('Đăng ký nhận tin thất bại !', 0, PeceeRequest()->getHeader('http_referer'));
            }
        }
        
    }
}