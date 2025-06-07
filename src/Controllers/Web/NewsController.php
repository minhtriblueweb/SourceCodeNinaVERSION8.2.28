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
use NINA\Core\Support\Facades\Seo;
use NINA\Core\Support\Facades\View;
use Illuminate\Http\Request;
use NINA\Models\NewsCatModel;
use NINA\Models\NewsItemModel;
use NINA\Models\NewsListModel;
use NINA\Models\NewsModel;
use NINA\Models\GalleryModel;
use NINA\Core\Support\Facades\BreadCrumbs;
use NINA\Models\NewsSubModel;

class NewsController extends Controller
{
    public function index()
    {
        if($this->type == 'tin-tuc') {
            $news = NewsListModel::select('id', 'namevi', 'nameen', 'contentvi', 'contenten', 'slugvi', 'slugen', 'photo')
            ->where('type', $this->type)
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->orderBy('numb', 'asc')
            ->orderBy('id', 'desc')
            ->paginate(12);
        } else {
            $news = NewsModel::select('id', 'namevi', 'nameen', 'descvi', 'descen', 'slugvi', 'slugen', 'photo')
            ->where('type', $this->type)
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->orderBy('numb', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(12);
        }


    
        $titleMain =  $this->infoSeo('news', $this->type, 'title');
        $titleMain =  __("web.". $titleMain);
        BreadCrumbs::setBreadcrumb(type:$this->type,title: $titleMain);
        $this->seoPage($titleMain);

        if($this->type == 'tin-tuc') {
            return View::share('com', $this->type)->view('tintuc.news_list', ['news' => $news,'titleMain'=>$titleMain,'com'=>$this->type]);
        } else {
            return View::share('com', $this->type)->view('news.news', ['news' => $news,'titleMain'=>$titleMain,'com'=>$this->type]);
        }
       
    }


    public function index2()
    {
        $news = NewsModel::select('id', 'namevi', 'nameen', 'descvi', 'descen', 'slugvi', 'slugen', 'photo', 'address', 'phone', 'iframe')
            ->where('type', $this->type)
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->orderBy('numb', 'asc')
            ->orderBy('id', 'desc')
            ->get();

        $newsList = NewsListModel::select('id', 'namevi', 'nameen', 'descvi', 'descen', 'slugvi', 'slugen', 'photo')
            ->where('type', $this->type)
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->orderBy('numb', 'asc')
            ->orderBy('id', 'desc')
            ->get();


        $titleMain =  $this->infoSeo('news', $this->type, 'title');
        $titleMain =  __("web.". $titleMain);
        BreadCrumbs::setBreadcrumb(type:$this->type,title: $titleMain);
        $this->seoPage($titleMain);
        return View::share('com', $this->type)->view('news.chinhanh', ['news' => $news, 'newsList' => $newsList, 'titleMain'=>$titleMain,'com'=>$this->type]);
    }

    public function ajaxChiNhanh(Request $request)
    {
        $id = $request->get('id') ?? 0;
        $query = NewsModel::select('iframe')
        ->where('type', 'he-thong-phan-phoi')
        ->whereRaw("FIND_IN_SET(?,status)", ['hienthi']);        
        if (!empty($id))  $ajaxChiNhanh = $query->where('id', $id)->first();        
        return view('ajax.homeChiNhanh', ['ajaxChiNhanh' => $ajaxChiNhanh]);        
    }


    public function list($slug)
    {
        $itemList = NewsListModel::select('id', 'namevi', 'nameen', 'descvi', 'descen', 'slugvi', 'slugen', 'photo', 'type')
            ->where(function ($query) use ($slug) {
                $query->where("slugvi", $slug)->orwhere("slugen", $slug);
            })
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->first();
        if($this->infoSeo('news', $itemList->type, 'type','index')) BreadCrumbs::set(url('slugweb',['slug'=>$itemList->type]),$this->infoSeo('news', $itemList->type, 'title'));
        BreadCrumbs::setBreadcrumb(list: $itemList);
        $titleMain = $itemList['name' . $this->lang];
        $news = $itemList->getItems(['id', 'namevi', 'nameen', 'descvi', 'descen', 'slugvi', 'slugen', 'photo'])->paginate(12);
        $seoPage = $itemList->getSeo('news-list','save')->first();
        Seo::setSeoData($seoPage,'news','seo');
        
        if($itemList->type == 'tin-tuc') {
            return view('tintuc.news', compact('news','titleMain'));
        } else {
            return view('news.news', compact('news','titleMain'));
        }

        
    }

    public function cat($slug)
    {
        $itemCat = NewsCatModel::select('id', 'namevi', 'nameen', 'descvi', 'descen', 'slugvi', 'slugen', 'photo','id_list')
            ->where(function ($query) use ($slug) {
                $query->where("slugvi", $slug)->orwhere("slugen", $slug);
            })
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->first();
        $titleMain = $itemCat['name' . $this->lang];
        $itemList = $itemCat->getCategoryList;
        if($this->infoSeo('news', $itemCat->type, 'type','index')) BreadCrumbs::set(url('slugweb',['slug'=>$itemCat->type]),$this->infoSeo('news', $itemCat->type, 'title'));
        BreadCrumbs::setBreadcrumb(list: $itemList, cat: $itemCat);
        $news = $itemCat->getItems(['id', 'namevi', 'nameen', 'descvi', 'descen', 'slugvi', 'slugen', 'photo'])->paginate(12);
        $seoPage = $itemCat->getSeo('news-cat','save')->first();
        Seo::setSeoData($seoPage,'news','seo');
        return view('news.news', compact('news','titleMain'));
    }

    public function item($slug)
    {
        $itemItem = NewsItemModel::select('id', 'namevi', 'nameen', 'descvi', 'descen', 'slugvi', 'slugen', 'photo','id_list','id_cat')
            ->where(function ($query) use ($slug) {
                $query->where("slugvi", $slug)->orwhere("slugen", $slug);
            })
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->first();
        $titleMain = $itemItem['name' . $this->lang];
        $itemList = $itemItem->getCategoryList;
        $itemCat = $itemItem->getCategoryCat;
        if($this->infoSeo('news', $itemItem->type, 'type','index')) BreadCrumbs::set(url('slugweb',['slug'=>$itemItem->type]),$this->infoSeo('news', $itemItem->type, 'title'));
        BreadCrumbs::setBreadcrumb(list: $itemList, cat: $itemCat,item: $itemItem);
        $news = $itemItem->getItems(['id', 'namevi', 'nameen', 'descvi', 'descen', 'slugvi', 'slugen', 'photo'])->paginate(12);
        $seoPage = $itemItem->getSeo('news-item','save')->first();
        Seo::setSeoData($seoPage,'news','seo');
        return view('news.news', compact('news','titleMain'));
    }

    public function sub($slug)
    {
        $itemSub = NewsSubModel::select('id', 'namevi', 'nameen', 'descvi', 'descen', 'slugvi', 'slugen', 'photo','id_list','id_cat','id_item')
            ->where(function ($query) use ($slug) {
                $query->where("slugvi", $slug)->orwhere("slugen", $slug);
            })
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->first();
        $titleMain = $itemSub['name' . $this->lang];
        $itemList = $itemSub->getCategoryList;
        $itemCat = $itemSub->getCategoryCat;
        $itemItem = $itemSub->getCategoryItem;
        if($this->infoSeo('news', $itemSub->type, 'type','index')) BreadCrumbs::set(url('slugweb',['slug'=>$itemSub->type]),$this->infoSeo('news', $itemSub->type, 'title'));
        BreadCrumbs::setBreadcrumb(list: $itemList, cat: $itemCat,item: $itemItem,sub:$itemSub);
        $news = $itemSub->getItems(['id', 'namevi', 'nameen', 'descvi', 'descen', 'slugvi', 'slugen', 'photo'])->paginate(12);
        $seoPage = $itemSub->getSeo('news-sub','save')->first();
        Seo::setSeoData($seoPage,'news','seo');
        return view('news.news', compact('news','titleMain'));
    }

    public function detail($slug)
    {
        $rowDetail = NewsModel::select('type', 'id', 'namevi', 'nameen', 'slugvi', 'slugen', 'descvi', 'descen', 'contentvi', 'contenten', 'view', 'id_list', 'id_cat', 'id_item', 'id_sub', 'photo', 'options')
            ->where(function ($query) use ($slug) {
                $query->where("slugvi", $slug)->orwhere("slugen", $slug);
            })
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->first();
        $seoPage = $rowDetail->getSeo('news','save')->first();
        Seo::setSeoData($seoPage,'news','seo');
        $rowDetailPhoto = $rowDetail->getPhotos('news')->get();
        $tags = $rowDetail->tags??[];
        $itemList = $rowDetail->getCategoryList;
        $itemCat = $rowDetail->getCategoryCat;
        $itemItem = $rowDetail->getCategoryItem;
        $itemSub = $rowDetail->getCategorySub;

        $titleMain =  $this->infoSeo('news', $rowDetail->type, 'title');
        $titleMain =  __("web.". $titleMain);
    

        if($this->infoSeo('news', $rowDetail->type, 'type','index')) BreadCrumbs::set(url('slugweb',['slug'=>$rowDetail->type]),$titleMain);
        BreadCrumbs::setBreadcrumb(detail: $rowDetail, list: $itemList, cat: $itemCat, item: $itemItem, sub: $itemSub);
        $news = NewsModel::select('id', 'namevi', 'photo', 'descvi', 'slugvi')
            ->where(['type' => $rowDetail['type'], 'id_list' => $rowDetail->id_list])
            ->where("id","!=",$rowDetail['id'])
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->orderBy('numb', 'asc')
            ->orderBy('id', 'desc')
            ->get();

        if($rowDetail->type == 'du-an') {
            return View::share('com', $rowDetail->type)->view('news.project_detail', compact('rowDetail','rowDetailPhoto','news','tags', 'titleMain'));
        } else {
            return View::share('com', $rowDetail->type)->view('news.detail', compact('rowDetail','rowDetailPhoto','news','tags', 'titleMain'));
        }

        
    }
}