<?php

namespace Emresari\Options;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Casts.
     *
     * @var array
     */
    protected $casts = [
        'value' => 'json',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var [type]
     */
    protected $fillable = [
        'key',
        'value',
        'type',
    ];

    /**
     * Determine if the given option value exists.
     *
     * @param string $key
     * @return bool
     */
    public function exists($key)
    {
        return self::where('key', $key)->exists();
    }

    /**
     * Get the All option values.
     *
     * @return mixed
     */
    public function getAll()
    {
        $option = self::all();
        return $option;
    }

    /**
     * Get the All option values.
     *
     * @return mixed
     */
    public function getID($id)
    {
        $option = self::find($id);
        return $option;
    }

    /**
     * Set a given option value.
     *
     * @param array|string $key
     * @param mixed $value
     * @param mixed $type
     * @return void
     */
    public function set($key, $value = null, $type = null)
    {
        $keys = is_array($key) ? $key : [$key => $value];

        foreach ($keys as $key => $value) {
            if ($type != null) {
                self::updateOrCreate(['key' => $key], ['value' => $value], ['type' => $type]);
            } else {
                self::updateOrCreate(['key' => $key], ['value' => $value]);
            }
        }

        return self::get($key);
        // @todo: return the option
    }

    /**
     * Get the specified option value.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public function get($key, $default = null)
    {
        if ($option = self::where('key', $key)->first()) {
            return $option->value;
        }

        return $default;
    }

    /**
     * Remove/delete the specified option value.
     *
     * @param string $key
     * @return bool
     */
    public function remove($key)
    {
        return (bool)self::where('key', $key)->delete();
    }
}
