<?php

if (!function_exists('option_type')) {
    /**
     * Get / set the specified option value.
     *
     * If an array is passed as the key, we will assume you want to set an array of values.
     *
     * @param array|string $key
     * @param mixed $default
     * @param mixed $type
     * @return mixed|\Appstract\Options\Option
     */
    function option_type($key = null, $default = null, $type = null)
    {
        if (is_null($key)) {
            return app('option');
        }

        return app('option')->set($key, $default, $type);
    }
}

if (!function_exists('option')) {
    /**
     * Get / set the specified option value.
     *
     * If an array is passed as the key, we will assume you want to set an array of values.
     *
     * @param array|string $key
     * @param mixed $default
     * @return mixed|\Appstract\Options\Option
     */
    function option($key = null, $default = null, $cache = null)
    {
        if (is_null($key)) {
            return app('option');
        }

        if (is_null($cache)) {
            return app('option')->get($key, $default);
        }

        if (is_array($key)) {
            return app('option')->set($key);
        }


        return app('option')->get($key, $default);
    }
}

if (!function_exists('options')) {
    /**
     * Get / set the specified option value.
     *
     * If an array is passed as the key, we will assume you want to set an array of values.
     *
     * @param array|string $key
     * @param mixed $default
     * @return mixed|\Emresari\Options\Option
     */
    function options()
    {
        return app('option')->getAll();
    }
}
if (!function_exists('optionID')) {
    /**
     * Get / set the specified option value.
     *
     * If an array is passed as the key, we will assume you want to set an array of values.
     *
     * @param array|string $key
     * @param mixed $default
     * @return mixed|\Emresari\Options\Option
     */
    function optionID($id)
    {
        return app('option')->getID($id);
    }
}

if (!function_exists('option_exists')) {
    /**
     * Check the specified option exits.
     *
     * @param string $key
     * @return mixed
     */
    function option_exists($key)
    {
        return app('option')->exists($key);
    }
}
