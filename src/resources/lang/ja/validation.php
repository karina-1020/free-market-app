<?php

return [
    'required'  => ':attribute を入力してください。',
    'email'     => ':attribute は正しい形式で入力してください。',
    'string'    => ':attribute は文字列で入力してください。',
    'min'       => ['string' => ':attribute は :min 文字以上で入力してください。'],
    'confirmed' => ':attribute と一致しません。',

    'attributes' => [
        'name'                  => 'お名前',
        'email'                 => 'メールアドレス',
        'password'              => 'パスワード',
        'password_confirmation' => '確認用パスワード',
    ],
];