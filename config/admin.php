<?php

return [
   'menu' => [
       'users' => [
           'iconClass' => 'fa fa-user',
           'subMenu' => [
               'users' => [
                   'routeName' => 'users.index',
               ],
               'roles' => [
                   'routeName' => 'roles.index',
               ],
               'permissions' => [
                   'routeName' => 'permissions.index',
               ]
           ]
       ],
   ],
];