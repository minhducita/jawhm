<?php
/***************************************************************************
 *                                                                          *
 *   (c) 2004 Vladimir V. Kalynyak, Alexey V. Vinokurov, Ilya M. Shalnev    *
 *                                                                          *
 * This  is  commercial  software,  only  users  who have purchased a valid *
 * license  and  accept  to the terms of the  License Agreement can install *
 * and use this program.                                                    *
 *                                                                          *
 ****************************************************************************
 * PLEASE READ THE FULL TEXT  OF THE SOFTWARE  LICENSE   AGREEMENT  IN  THE *
 * "copyright.txt" FILE PROVIDED WITH THIS DISTRIBUTION PACKAGE.            *
 ****************************************************************************/

namespace Tygh\Backend\Cache;

use Tygh\Registry;

class Apc extends ABackend
{
    const CACHE_PREFIX = 'cs-cart:cache:';

    protected $global_ttl = 0;

    public function __construct($config)
    {
        if (!function_exists('apc_store') || !class_exists('APCIterator')) {
            throw new \Tygh\Exceptions\ClassNotFoundException('"APC" PHP extension is not installed.');
        }

        if (isset($config['cache_apc_global_ttl'])) {
            $this->global_ttl = (int)$config['cache_apc_global_ttl'];
        }

        parent::__construct($config);
    }

    public function set($name, $data, $condition, $cache_level = null)
    {
        if (!empty($data)) {
            apc_store(
                $this->_mapTags($name) . '/' . $cache_level,
                $data,
                ($cache_level == Registry::cacheLevel('time'))
                    ? TIME + $condition
                    : $this->global_ttl
            );
        }
    }

    public function get($name, $cache_level = null)
    {
        $key = $this->_mapTags($name) . '/' . $cache_level;

        if (apc_exists($key)) {
            return array(apc_fetch($key));
        }

        return false;
    }

    public function clear($tags)
    {
        return apc_delete($this->_mapTags($tags));
    }

    public function cleanup()
    {
        $to_be_deleted = new \APCIterator(
            'user',
            '/^' . self::CACHE_PREFIX . (empty($this->_config['saas_uid']) ? '' : ($this->_config['saas_uid'] . ':')) .'/',
            APC_ITER_VALUE
        );

        return apc_delete($to_be_deleted);
    }

    private function _mapTags($cache_keys, $company_id = null)
    {
        $cache_keys = (array)$cache_keys;
        $company_id = is_null($company_id) ? $this->_company_id : $company_id;

        foreach ($cache_keys as $i => $key_name) {
            $cache_keys[$i] = self::CACHE_PREFIX
            . (empty($this->_config['saas_uid']) ? '' : ($this->_config['saas_uid'] . ':')) // For Merchium
            . $key_name
            . (empty($company_id) ? '' : (':' . $company_id));
        }

        return sizeof($cache_keys) === 1 ? reset($cache_keys) : $cache_keys;
    }
}