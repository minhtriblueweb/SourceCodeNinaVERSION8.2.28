<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 1.0
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */

return [
    'gioi-thieu-trang-chu' => [
        'title_main' => "Giới thiệu Trang chủ",
        'website' => [
            'type' => 'object',
            'title' => 'gioithieutrangchu'
        ],
        'status' => [
            "hienthi" => 'Hiển thị'
        ],
        'images' => [
            'photo' => [
                'title' =>  'Hình ảnh',
                'width' => '300',
                'height' => '300',
                'thumb' => '300x300x1'
            ]
        ],
        'name' => true,
        'desc' => true,
        'desc_cke' => false,
        'content' => true,
        'content_cke' => true,
        'seo' => false,
        'gallery' => [
            'gioi-thieu-trang-chu' => [
                "title_main_photo" => "Hình ảnh Giới thiệu",
                "title_sub_photo" => "Hình ảnh",
                "status_photo" => ["hienthi" => "Hiển thị"],
                "number_photo" => 3,
                "images_photo" => true,
                "avatar_photo" => true,
                "name_photo" => true,
                "width_photo" => 550,
                "height_photo" => 730,
                "thumb_photo" => '100x100x1'
            ],
        ],
    ],
    'lienhe' => [
        'title_main' => "Liên hệ",
        'website' => [
            'title' => 'lienhe'
        ],
        'status' => [
            "hienthi" => 'Hiển thị'
        ],
        'images' => [
            // 'photo' => [
            //     'title' =>  'Hình ảnh',
            //     'width' => '300',
            //     'height' => '300',
            //     'thumb' => '300x300x1'
            // ]
        ],
        'name' => false,
        'content' => true,
        'content_cke' => true,
    ],
   

    'footer' => [
        'title_main' => "Footer",
        'status' => [
            "hienthi" => 'Hiển thị'
        ],
        'images' => [
            'photo' => [
                'title' =>  'Hình ảnh',
                'width' => '146',
                'height' => '126',
                'thumb' => '146x126x2'
            ]
        ],
        'name' => true,
        'desc' => false,
        'content' => true,
        'content_cke' => true,
    ],


    'khuyen-mai' => [
        'title_main' => "Khuyến mãi",
        'status' => [
            "hienthi" => 'Hiển thị'
        ],
       
        'name' => true,
        'desc' => false,
        'content' => true,
        'content_cke' => true,
    ],

    'slogan-tieuchi' => [
        'title_main' => "Mô tả Tiêu chí",
        'status' => [
            "hienthi" => 'Hiển thị'
        ],
        'name' => true,
    ],


    'slogan-chungtoicogi' => [
        'title_main' => "Mô tả Chúng tôi có gì ?",
        'status' => [
            "hienthi" => 'Hiển thị'
        ],
        'name' => true,
    ],

    'slogan-duan' => [
        'title_main' => "Mô tả Dự án",
        'status' => [
            "hienthi" => 'Hiển thị'
        ],
        'name' => true,
    ],

    'slogan-danhgiakhachang' => [
        'title_main' => "Mô tả Đánh giá khách hàng",
        'status' => [
            "hienthi" => 'Hiển thị'
        ],
        'name' => true,
    ],

    'slogan-ketnoi' => [
        'title_main' => "Mô tả Kết nối với chúng tôi",
        'status' => [
            "hienthi" => 'Hiển thị'
        ],
        'name' => true,
    ],

    'slogan-dangky' => [
        'title_main' => "Mô tả Đăng ký nhận tin",
        'status' => [
            "hienthi" => 'Hiển thị'
        ],
        'name' => true,
    ],
   
];