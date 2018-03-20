<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/23 0023
 * Time: 下午 3:56
 */

namespace think;
use think\Redis;

use think\RedisException;

class RedisArray
{
    /**
     * Constructor
     *
     * @param   string  $name   Name of the redis array to create (required if using redis.ini to define array)
     * @param   array   $hosts  Array of hosts to construct the array with
     * @param   array   $opts   Array of options
     * @link    https://github.com/nicolasff/phpredis/blob/master/arrays.markdown
     */
    function __construct($name = '', array $hosts = NULL, array $opts = NULL) {}

    /**
     * @return  array   list of hosts for the selected array
     */
    public function _hosts() {}

    /**
     * @return  string  the name of the function used to extract key parts during consistent hashing
     */
    public function _function() {}

    /**
     * @param   string  $key     The key for which you want to lookup the host
     * @return  string  the host to be used for a certain key
     */
    public function _target($key) {}

    /**
     * Use this function when a new node is added and keys need to be rehashed.
     */
    public function _rehash() {}

}