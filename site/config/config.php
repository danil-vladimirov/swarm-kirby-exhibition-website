<?php

return [
  // 'debug'  => true,
  // 'cache' => [
  //   'pages' => [
  //       'active' => true
  //   ]
  // ],

  'auth' => [
    'methods' => ['password']
  ],

  'routes' => [
    [
      'pattern' => 'works/(:any)',
      'action' => function ($tag) {
        if ($page = page('works/' . $tag)) {
            return $page;
        } else {
            return Page::factory([
              'slug'     => $tag,
              'template' => 'category',
              'model'    => 'tag'
          ]);
        }
      }
    ],
    [
      'pattern' => 'logout',
      'action'  => function() {
        $kirby   = kirby();
        if ($user = $kirby->user()) {
          $user->logout();
        }
        go('login');
      }
    ],
    [
      'pattern' => 'token/([a-f0-9]{32})',
      'action'  => function($token) {
        $kirby   = kirby();
        $kirby->impersonate('kirby');
        if ($user = $kirby->user()) {
          $user->logout();
        }
        if ($user = $kirby->users()->findBy('token', $token)) {
          $user->update([
            'token'    => '',
            'password' => $user->changePassword($token),
          ]);
          if ($user->login($token)) {
            go('/account/password');
          } else {
            go('error');
          } 
        } else {
          go('error');
        }
      }
    ],
  ],
];