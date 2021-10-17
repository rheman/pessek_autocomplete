<?php

$plugin_root = __DIR__;
$root = dirname(dirname($plugin_root));
$alt_root = dirname(dirname(dirname($root)));
if (file_exists("$plugin_root/vendor/autoload.php")) {
	$path = $plugin_root;
} else if (file_exists("$root/vendor/autoload.php")) {
	$path = $root;
} else {
	$path = $alt_root;
}

return [
        'plugin' => [
                'version' => '4.0',
		'name' => 'Autocomplete input',
                'dependencies' => [
                        'pessek_ajax' => [],
                ],
        ],
	'bootstrap' => \hypeJunction\Autocomplete\Bootstrap::class,
	'views' => [
		'default' => [
			'select2/' => "$path/vendor/bower-asset/select2/dist/",
		],
	],
	'routes' => [
		'autocomplete:tags' => [
			'path' => '/autocomplete/tags',
			'controller' => \hypeJunction\Autocomplete\SearchTags::class,
			'middleware' => [
				\Elgg\Router\Middleware\AjaxGatekeeper::class,
			]
		],
		'autocomplete:guids' => [
			'path' => '/autocomplete/guids',
			'controller' => \hypeJunction\Autocomplete\SearchEntities::class,
			'middleware' => [
				\Elgg\Router\Middleware\AjaxGatekeeper::class,
			]
		],
		'groupusers:guids' => [
			'path' => '/groupusers/guids',
			'controller' => \hypeJunction\Autocomplete\SearchUsersOfGroup::class,
			'middleware' => [
				\Elgg\Router\Middleware\AjaxGatekeeper::class,
			]
		],
		'groupsuserbelongto:guids' => [
			'path' => '/groupsuserbelongto/guids',
			'controller' => \hypeJunction\Autocomplete\SearchGroupsUserBelongTo::class,
			'middleware' => [
				\Elgg\Router\Middleware\AjaxGatekeeper::class,
			]
		],
	]
];
