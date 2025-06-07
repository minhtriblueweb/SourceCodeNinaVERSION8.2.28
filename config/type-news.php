<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 1.0
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */

return [
    'he-thong-phan-phoi' => [
        'title_main' => "Hệ thống phân phối",
        'website' => [
            'type' => [
                'index' => 'object',
                'detail' => 'article'
            ],
            'title' => 'hethongphanphoi'
        ],
        'dropdown' => true,
        'copy' => true,
        'status' => ["hienthi" => "Hiển thị"],
        'images' => [
            'photo' => [
                'title' => 'Ảnh đại diện',
                'width' => '200',
                'height' => '200',
                'thumb' => '200x200x1'
            ]
        ],
        'show_images' => true,
        'datePublish' => false,
        'name' => true,
        'address' => true,
        'phone' => true,
        'iframe' => true,
        'categories' => [
            'list' => [
                'title_main_categories' => "Danh mục Tỉnh / thành",
                'copy_categories' => false,
                'images' => [
                    // 'photo' => [
                    //     'title' => 'Ảnh đại diện',
                    //     'width' => '500',
                    //     'height' => '500',
                    //     'thumb' => '500x500x1'
                    // ],
                ],
                'status_categories' => ["hienthi" => "Hiển thị"],
                'name_categories' => true,
                'seo_categories' => false,
            ],
        ]
    ],



    'tin-tuc' => [
        'title_main' => "Tin tức",
        'website' => [
            'type' => [
                'index' => 'object',
                'detail' => 'article'
            ],
            'title' => 'tintuc'
        ],
        'dropdown' => true,
        'tags' => false,
        'view' => true,
        'copy' => true,
        'slug' => true,
        'status' => ["noibat" => "Nổi bật", "hienthi" => "Hiển thị"],
        'images' => [
            'photo' => [
                'title' => 'Ảnh đại diện',
                'width' => '200',
                'height' => '200',
                'thumb' => '200x200x1'
            ]
        ],
        'show_images' => true,
        'datePublish' => false,
        'name' => true,
        'desc' => true,
        'content' => true,
        'content_cke' => true,
        'seo' => true,
        'schema' => true,
        'categories' => [
            'list' => [
                'title_main_categories' => "Danh mục cấp 1",
                'copy_categories' => false,
                'images' => [
                    'photo' => [
                        'title' => 'Ảnh đại diện',
                        'width' => '500',
                        'height' => '500',
                        'thumb' => '500x500x1'
                    ],
                ],
                'slug_categories' => true,
                'status_categories' => ["noibat" => "Nổi bật", "hienthi" => "Hiển thị"],
                'gallery_categories' => [],
                'name_categories' => true,
                'desc_categories' => false,
                'desc_categories_cke' => false,
                'content_categories' => false,
                'content_categories_cke' => false,
                'seo_categories' => true,
            ],
        ]
    ],

    'gioi-thieu' => [
        'title_main' => "Giới thiệu",
        'website' => [
            'type' => [
                'index' => 'object',
                'detail' => 'article'
            ],
            'title' => 'gioithieu'
        ],
        'dropdown' => false,
        'tags' => false,
        'view' => true,
        'copy' => false,
        'slug' => true,
        'status' => ["hienthi" => "Hiển thị"],
        'images' => [
            'photo' => [
                'title' => 'Ảnh đại diện',
                'width' => '150',
                'height' => '150',
                'thumb' => '150x150x1'
            ]
        ],
        'show_images' => true,
        'datePublish' => false,
        'name' => true,
        'desc' => true,
        'content' => true,
        'content_cke' => true,
        'seo' => true,
        'schema' => true,
    ],

    'du-an' => [
        'title_main' => "Dự án",
        'website' => [
            'type' => [
                'index' => 'object',
                'detail' => 'article'
            ],
            'title' => 'duan'
        ],
        'dropdown' => false,
        'tags' => false,
        'view' => true,
        'copy' => false,
        'slug' => true,
        'status' => ["noibat" => "Nổi bật", "hienthi" => "Hiển thị"],
        'images' => [
            'photo' => [
                'title' => 'Ảnh đại diện',
                'width' => '150',
                'height' => '150',
                'thumb' => '150x150x1'
            ]
        ],
        'show_images' => true,
        'datePublish' => false,
        'name' => true,
        'desc' => true,
        'content' => true,
        'content_cke' => true,
        'seo' => true,
        'schema' => true,
        'gallery' => [
            'du-an' => [
                "title_main_photo" => "Hình ảnh dự án",
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

    'danh-gia-khach-hang' => [
        'title_main' => "Đánh giá khách hàng",
        'website' => [
            'type' => [
                'index' => 'object',
            ],
            'title' => 'danhgiakhachhang'
        ],
        'dropdown' => false,
        'tags' => false,
        'view' => true,
        'copy' => true,
        'slug' => false,
        'status' => ["hienthi" => "Hiển thị"],
        'images' => [
            'photo' => [
                'title' => 'Ảnh đại diện',
                'width' => '150',
                'height' => '150',
                'thumb' => '150x150x1'
            ]
        ],
        'show_images' => true,
        'datePublish' => false,
        'name' => true,
        'desc' => true,
        'content' => true,
        'content_cke' => false,
        'seo' => false,
        'schema' => false,
    ],


    'cau-hoi-thuong-gap' => [
        'title_main' => "Câu hỏi thường gặp",
        'website' => [
            'type' => [
                'index' => 'object',
            ],
            'title' => 'cauhoithuonggap'
        ],
        'dropdown' => false,
        'tags' => false,
        'view' => true,
        'copy' => true,
        'slug' => false,
        'status' => ["hienthi" => "Hiển thị"],
        'images' => [
            // 'photo' => [
            //     'title' => 'Ảnh đại diện',
            //     'width' => '150',
            //     'height' => '150',
            //     'thumb' => '150x150x1'
            // ]
        ],
        'show_images' => false,
        'datePublish' => false,
        'name' => true,
        'desc' => false,
        'content' => true,
        'content_cke' => true,
        'seo' => false,
        'schema' => false,
    ],

    'co-so-vat-chat' => [
        'title_main' => "Cơ sở vật chất",
        'website' => [
            'type' => [
                'index' => 'object',
            ],
            'title' => 'cosovatchat'
        ],
        'dropdown' => false,
        'tags' => false,
        'view' => false,
        'copy' => false,
        'slug' => false,
        'status' => ["hienthi" => "Hiển thị"],
      
        'show_images' => false,
        'quantity' => true,
        'datePublish' => false,
        'name' => true,
        'desc' => false,
        'content' => false,
        'content_cke' => false,
        'seo' => false,
        'schema' => false,
    ],


    'tieu-chi' => [
        'title_main' => "Tiêu chí",
        'website' => [
            'type' => [
                'index' => 'object',
            ],
            'title' => 'tieuchi'
        ],
        'dropdown' => false,
        'tags' => false,
        'view' => false,
        'copy' => false,
        'slug' => false,
        'status' => ["hienthi" => "Hiển thị"],
        'images' => [
            'photo' => [
                'title' => 'Ảnh đại diện',
                'width' => '68',
                'height' => '68',
                'thumb' => '100x100x2'
            ]
        ],
        'show_images' => true,
        'quantity' => true,
        'datePublish' => false,
        'name' => true,
        'desc' => false,
        'content' => false,
        'content_cke' => false,
        'seo' => false,
        'schema' => false,
    ],


    'thong-tin-lien-he' => [
        'title_main' => "Thông tin liên hệ",
        'website' => [
            'type' => [
                'index' => 'object',
            ],
            'title' => 'thongtinlienhe'
        ],
        'dropdown' => false,
        'tags' => false,
        'view' => true,
        'copy' => true,
        'slug' => false,
        'status' => ["hienthi" => "Hiển thị"],
        'images' => [
            'photo' => [
                'title' => 'Ảnh đại diện',
                'width' => '150',
                'height' => '150',
                'thumb' => '150x150x1'
            ]
        ],
        'show_images' => true,
        'datePublish' => false,
        'name' => true,
        'desc' => true,
        'content' => false,
        'content_cke' => false,
        'seo' => false,
        'schema' => false,
    ],


    'chinh-sach' => [
        'title_main' => "Chính sách",
        'website' => [
            'type' => [
                'index' => 'object',
                'detail' => 'article'
            ],
            'title' => 'chinhsach'
        ],
        'dropdown' => false,
        'tags' => false,
        'view' => true,
        'copy' => false,
        'slug' => true,
        'status' => ["hienthi" => "Hiển thị"],
        'images' => [
            'photo' => [
                'title' => 'Ảnh đại diện',
                'width' => '150',
                'height' => '150',
                'thumb' => '150x150x1'
            ]
        ],
        'show_images' => true,
        'datePublish' => false,
        'name' => true,
        'desc' => true,
        'content' => true,
        'content_cke' => true,
        'seo' => true,
        'schema' => true,
    ],
  
    
    'hinh-thuc-thanh-toan' => [
        'title_main' => "Hình thức thanh toán",
        'dropdown' => false,
        'list' => false,
        'tags' => false,
        'view' => false,
        'copy' => false,
        'datePublish' => false,
        'copy_image' => false,
        'comment' => false,
        'slug' => false,
        'status' => ["hienthi" => "Hiển thị"],
        'images' => false,
        'icon' => false,
        'show_images' => false,
        'name' => true,
        'desc' => true,
        'desc_cke' => true,
        'content' => false,
        'content_cke' => false,
        'seo' => false,
        'schema' => false,
        'width' => 420,
        'height' => 288,
        'thumb' => '100x100x1',
        'width_icon' => 30,
        'height_icon' => 30,
        'thumb_icon' => '100x100x1',
    ]
];