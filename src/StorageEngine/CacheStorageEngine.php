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

namespace DataTables\StorageEngine;

use Cake\Cache\Cache;
use DataTables\Table\ConfigBundle;

/**
 * Class CacheStorageEngine
 *
 * @author   Allan Carvalho <allan.m.carvalho@outlook.com>
 * @license  MIT License https://github.com/allanmcarvalho/cakephp-datatables/blob/master/LICENSE
 * @link     https://github.com/allanmcarvalho/cakephp-datatables
 */
class CacheStorageEngine implements StorageEngineInterface {

	/**
	 * @var string
	 */
	private $_cacheConfigName = '_data_tables_config_bundles_';

	/**
	 * CacheStorageEngine constructor.
	 *
	 * @param string|null $cacheConfigName
	 */
	public function __construct(?string $cacheConfigName = null) {
		if (!empty($cacheConfigName)) {
			$this->_cacheConfigName = $cacheConfigName;
		}
		Cache::getConfigOrFail($this->_cacheConfigName);
	}

	/**
	 * @inheritDoc
	 */
	public function save(string $key, ConfigBundle $configBundle): bool {
		return Cache::write($key, $configBundle, '_data_tables_config_bundles_');
	}

	/**
	 * @inheritDoc
	 */
	public function exists(string $key): bool {
		return Cache::read($key, '_data_tables_config_bundles_') instanceof ConfigBundle;
	}

	/**
	 * @inheritDoc
	 */
	public function read(string $key): ?ConfigBundle {
		$configBundle = Cache::read($key, '_data_tables_config_bundles_');
		return ($configBundle instanceof ConfigBundle) ? $configBundle : null;
	}

	/**
	 * @inheritDoc
	 */
	public function delete(string $key): bool {
		return Cache::delete($key, '_data_tables_config_bundles_');
	}

}
