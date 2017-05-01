<?php
return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'user.passwordResetTokenExpire' => 3600,
    'apps'=> ['backend', 'frontend'],
    'type_file_import' => [
        'agreement' => 'Hợp Đồng',
        'agreement_addendum' => 'Phụ Lục Hợp Đồng'
    ],
    'cms_url' => 'http://cms.study.edu.vn/',
    'web_url' => 'http://study.edu.vn/',
    'storage_url' => 'http://static.study.edu.vn/',
    'img_url' => [
        'avatar_admin' => [
            'folder' => 'avatar_admin',
        ],
        'avatar_teacher' => [
            'folder' => 'avatar_teacher',
        ],
        'slideshow' => [
            'folder' => 'slideshow',
        ],
        'courses_assets' => [
            'folder' => 'courses_assets'
        ]
    ],
    'ftp' => [
        'ftp_server' => 'static.study.edu.vn',
        'ftp_user_name' => 'bactv',
        'ftp_user_pass' => '123456'
    ],
    'api' => [
        'charging' => [
            'viettel' => 'http://api.viettel.vn/api/controllers/ApiContoller.php/action_charge'
        ]
    ],
    'key_encrypt' => 'bactv',
    'number_free_lesson' => 2,
];
