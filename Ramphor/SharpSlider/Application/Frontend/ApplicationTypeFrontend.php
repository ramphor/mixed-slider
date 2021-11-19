<?php
namespace Ramphor\SharpSlider\Application\Frontend;

class ApplicationTypeFrontend
{
    protected static $assetDirUrl;

    public static function getAssetPath($path = '') {
        if (is_null(static::$assetDirUrl)) {
            $rootDir = dirname(SHARP_SLIDER_PLUGIN_FILE);
            static::$assetDirUrl = jankx_get_path_url($rootDir);
        }
        return sprintf('%s/assets/%s', static::$assetDirUrl, $path);
    }
}
