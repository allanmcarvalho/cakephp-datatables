<?php
/**
 * Copyright (c) Allan Carvalho 2020.
 * Under Mit License
 * php version 7.2
 *
 * link     https://github.com/allanmcarvalho/cakephp-data-renderer
 * author   Allan Carvalho <allan.m.carvalho@outlook.com>
 */
declare(strict_types = 1);

return [
	'DataTables' => [
		'StorageEngine' => [
			'class' => \DataTables\StorageEngine\CacheStorageEngine::class,
			'duration' => 43200,
			'disableWhenDebugOn' => true,
		],
	],
];
