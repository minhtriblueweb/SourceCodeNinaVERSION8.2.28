<?php

/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 1.0
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */


namespace NINA\Controllers\Web;

use Illuminate\Http\Request;
use NINA\Core\Support\Facades\View;
use NINA\Core\Support\Facades\BreadCrumbs;
use NINA\Controllers\Controller;
use NINA\Core\Support\Facades\Seo;
use NINA\Models\NewsModel;
use NINA\Models\ProductModel;
use NINA\Models\ProductListModel;
use NINA\Models\ProductCatModel;
use NINA\Models\ProductItemModel;
use NINA\Models\ProductSubModel;
use NINA\Models\PropertiesListModel;

class ProductController extends Controller
{

    public function index()
    {
        $product = ProductListModel::select('id', 'namevi', 'nameen', 'descvi', 'descen', 'slugvi', 'slugen', 'photo')
            ->where('type', $this->type)
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->datePublish()
            ->orderBy('numb', 'asc')
            ->orderBy('id', 'desc')
            ->paginate(12);
        $titleMain =  $this->infoSeo('product', $this->type, 'title');
        $titleMain = __('web.' . $titleMain);
        BreadCrumbs::setBreadcrumb(type: $this->type, title: $titleMain);
        $this->seoPage($titleMain, $this->infoSeo('product', $this->type, 'type', 'index'));
        return view('product.product_list', compact('product', 'titleMain'));
    }


    public function dathang()
    {
        $productAll = ProductListModel::select('id', 'namevi', 'nameen', 'descvi', 'descen', 'slugvi', 'slugen', 'photo')
            ->where('type', 'san-pham')
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->datePublish()
            ->orderBy('numb', 'asc')
            ->orderBy('id', 'desc')
            ->get();
        $titleMain = "Đặt hàng";
        BreadCrumbs::setBreadcrumb(type: $this->type, title: $titleMain);
        $this->seoPage($titleMain, $this->infoSeo('productAll', $this->type, 'type', 'index'));
        return view('product.dathang', compact('productAll', 'titleMain'));
    }

    public function list($slug, Request $request)
    {
      
        $itemList = ProductListModel::select('id', 'namevi', 'nameen', 'descvi', 'descen', 'slugvi', 'slugen', 'photo', 'type', 'contentvi')
            ->where(function ($query) use ($slug) {
                $query->where("slugvi", $slug)->orwhere("slugen", $slug);
            })
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->first();


        $dm_cap2 = ProductCatModel::select('namevi', 'photo', 'descvi', 'slugvi', 'id')
            ->where(['type' => $itemList['type'], 'id_list' => $itemList->id])
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->orderBy('numb', 'asc')
            ->orderBy('id', 'desc')
            ->get();


           

        $listProperties =  $this->searchListProperties($itemList['id']);

        $this->type =  $itemList->type;
        $titleMain = $itemList['name' . $this->lang];
        BreadCrumbs::setBreadcrumb(list: $itemList);
        $product = $this->productItem($itemList, $request);
        $seoPage = $itemList->getSeo('product-list', 'save')->first();
        $seoPage['type'] = $this->infoSeo('product', $this->type, 'type', 'index');
        Seo::setSeoData($seoPage, 'product', 'seo');
        return View::share('idList', $itemList['id'])->view('product.product', compact('product', 'titleMain', 'listProperties', 'itemList', 'dm_cap2'));
    }

    public function cat($slug, Request $request)
    {
        $itemCat = ProductCatModel::select('id', 'id_list', 'namevi', 'nameen', 'descvi', 'descen', 'slugvi', 'slugen', 'photo', 'id_list', 'type')
            ->where(function ($query) use ($slug) {
                $query->where("slugvi", $slug)->orwhere("slugen", $slug);
            })
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->first();
        $listProperties =  $this->searchListProperties($itemCat['id_list']);
        $this->type =  $itemCat->type;
        $titleMain = $itemCat['name' . $this->lang];
        $itemList = $itemCat->getCategoryList;
        BreadCrumbs::setBreadcrumb(list: $itemList, cat: $itemCat);
        $product = $this->productItem($itemCat, $request);
        $seoPage = $itemCat->getSeo('product-cat', 'save')->first();
        $seoPage['type'] = $this->infoSeo('product', $this->type, 'type', 'index');
        Seo::setSeoData($seoPage, 'product', 'seo');
        return view('product.product', compact('product', 'titleMain', 'listProperties'));
    }

    public function item($slug, Request $request)
    {
        $itemItem = ProductItemModel::select('id', 'id_list', 'namevi', 'nameen', 'descvi', 'descen', 'slugvi', 'slugen', 'photo', 'id_list', 'id_cat', 'type')
            ->where(function ($query) use ($slug) {
                $query->where("slugvi", $slug)->orwhere("slugen", $slug);
            })
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->first();
        $listProperties =  $this->searchListProperties($itemItem['id_list']);
        $this->type =  $itemItem->type;
        $titleMain = $itemItem['name' . $this->lang];
        $itemList = $itemItem->getCategoryList;
        $itemCat = $itemItem->getCategoryCat;
        BreadCrumbs::setBreadcrumb(list: $itemList, cat: $itemCat, item: $itemItem);
        $product = $this->productItem($itemList, $request);
        $seoPage = $itemItem->getSeo('product-item', 'save')->first();
        $seoPage['type'] = $this->infoSeo('product', $this->type, 'type', 'index');
        Seo::setSeoData($seoPage, 'product', 'seo');
        return view('product.product', compact('product', 'titleMain', 'listProperties'));
    }
    public function sub($slug)
    {
        $itemSub = ProductSubModel::select('id', 'namevi', 'nameen', 'descvi', 'descen', 'slugvi', 'slugen', 'photo', 'id_list', 'id_cat', 'id_item', 'type')
            ->where(function ($query) use ($slug) {
                $query->where("slugvi", $slug)->orwhere("slugen", $slug);
            })
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->first();

        $this->type =  $itemSub->type;
        $titleMain = $itemSub['name' . $this->lang];
        $itemList = $itemSub->getCategoryList;
        $itemCat = $itemSub->getCategoryCat;
        $itemItem = $itemSub->getCategoryItem;
        BreadCrumbs::setBreadcrumb(list: $itemList, cat: $itemCat, item: $itemItem, sub: $itemSub);
        $product = $itemSub->getItems(['id', 'namevi', 'nameen', 'descvi', 'descen', 'slugvi', 'slugen', 'photo', 'regular_price', 'sale_price', 'discount'])->paginate(12);
        $seoPage = $itemSub->getSeo('product-sub', 'save')->first();
        $seoPage['type'] = $this->infoSeo('product', $this->type, 'type', 'index');
        Seo::setSeoData($seoPage, 'product', 'seo');
        return view('product.product', compact('product', 'titleMain'));
    }
    public function detail($slug)
    {
        $rowDetail = ProductModel::select('type', 'id', 'id_list', 'properties', 'namevi', 'nameen', 'slugvi', 'slugen', 'descvi', 'descen', 'contentvi', 'contenten', 'parametervi', 'parameteren', 'incentivesvi', 'incentivesen', 'promotionvi', 'promotionen', 'code', 'view', 'id_brand', 'id_list', 'id_cat', 'id_item', 'id_sub', 'photo', 'options', 'sale_price', 'regular_price', 'type', 'discount', 'view', 'link_video')->where(function ($query) use ($slug) {
            $query->where("slugvi", $slug)->orwhere("slugen", $slug);
        })->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])->first();
        if (!empty($rowDetail)) $rowDetail->increment('view');

        $query = PropertiesListModel::select('type', 'id', 'namevi')
            ->where('type', 'san-pham')
            ->whereRaw("FIND_IN_SET(?,status)", ['cart']);

        if (!empty(config('type.categoriesProperties'))) $query->whereRaw("FIND_IN_SET(?,id_list)", [$rowDetail['id_list']]);
        $listProperties = $query->orderBy('numb', 'asc')->get()->map(fn($v) => [$v, $v->getProperties()->whereIn('id',  explode(',', $rowDetail['properties']))->get()]);

        $this->type =  $rowDetail->type;
        $seoPage = $rowDetail->getSeo('product', 'save')->first();

        $seoPage['type'] = $this->infoSeo('product', $this->type, 'type', 'detail');

        Seo::setSeoData($seoPage, 'product', 'seo');

        $rowDetailPhoto = $rowDetail->getPhotos('product')->where('type', 'san-pham')->get();
        $rowDetailPhoto1 = $rowDetail->getPhotos('product')->where('type', 'hinh-anh')->get();

        $rowNews = $rowDetail->getNews()->get();

        $tags = $rowDetail->tags ?? [];
        BreadCrumbs::setBreadcrumb(detail: $rowDetail, list: $rowDetail->getCategoryList, cat: $rowDetail->getCategoryCat, item: $rowDetail->getCategoryItem, sub: $rowDetail->getCategorySub);

        $query = ProductModel::select('id', 'namevi', 'photo', 'descvi', 'slugvi', 'regular_price', 'discount', 'sale_price')->where('type', 'san-pham') ->where("id","!=",$rowDetail['id'])
        ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
        ->orderBy('numb', 'asc')
        ->orderBy('id', 'desc');
        if (!empty($rowDetail['id_list'])) $query->where('id_list', $rowDetail['id_list']);
        if (!empty($rowDetail['id_cat'])) $query->where('id_cat', $rowDetail['id_cat']);
        $query->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])->limit(10);
        $product = $query->get();
        return View::share('idList', $rowDetail['id_list'])->view('product.detail', compact('rowDetail', 'rowDetailPhoto', 'product', 'tags', 'rowNews', 'listProperties', 'rowDetailPhoto1'));
    }

    public function searchProduct(Request $request)
    {
        $keyword = $request->query('keyword');

        $product = ProductModel::select('id', 'namevi', 'nameen', 'descvi', 'descen', 'slugvi', 'slugen', 'photo', 'regular_price', 'sale_price', 'discount')
            ->where('type', 'san-pham')
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->where('namevi', 'like', '%' . $keyword . '%')
            ->orderBy('numb', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(20);
        $titleMain = 'Tìm kiếm sản phẩm';
       $com = 'tim-kiem';
        return View::share('com', 'tim-kiem')->view('product.product', compact('product', 'titleMain', 'com'));
    }

    public function suggestProduct(Request $request)
    {
        $keyword = $request->query('keyword');
        $product = ProductModel::select('id', 'namevi', 'nameen', 'descvi', 'descen', 'slugvi', 'slugen', 'photo', 'regular_price', 'sale_price', 'discount')
            ->search($keyword)
            ->where('type', 'san-pham')
            ->whereRaw("FIND_IN_SET(?,status)", ['hienthi'])
            ->orderBy('numb', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(15);

        return view('ajax.itemSearch', ['productAjax' => $product ?? []]);
    }

    protected function  checkListProperties($properties = [])
    {
        foreach ($properties as $k => $v) if (empty($v['data'])) unset($properties[$k]);
        return $properties;
    }

    private function  searchListProperties($idl)
    {
        $querySearch = PropertiesListModel::select('type', 'id', 'namevi', 'slugvi')
            ->where('type', 'san-pham')
            ->whereRaw("FIND_IN_SET(?,id_list)", [$idl])
            ->whereRaw("FIND_IN_SET(?,status)", ['search']);
        return $querySearch->orderBy('numb', 'asc')->get()->map(fn($v) => [$v, $v->getProperties()->get()]);
    }

    private function  productItem($array = null, $request = null)
    {
        $propaties = $request->getQueryString() ?? '';

        $query = $array->getItems(['id', 'namevi', 'nameen', 'descvi', 'descen', 'slugvi', 'slugen', 'photo', 'regular_price', 'sale_price', 'discount']);
        if (!empty($propaties)) {
            parse_str($propaties, $result);

            $query->where(function ($query) use ($result) {

                foreach (array_values($result) as $key => $propertyGroup) {
                    $items = explode(',', $propertyGroup);

                    if ($key == 0) {
                        foreach ($items as $item) {

                            $query->orWhereRaw('FIND_IN_SET(?, properties)', [$item]);
                        }
                    } else {
                        $query->where(function ($subQuery) use ($items) {
                            foreach ($items as $item) {

                                $subQuery->orWhereRaw('FIND_IN_SET(?, properties)', [$item]);
                            }
                        });
                    }
                }
            });
        }
        return $product = $query->orderBy('numb', 'desc')
            ->orderBy('id', 'desc')->paginate(12);
    }
}