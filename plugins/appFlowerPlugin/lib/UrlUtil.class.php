<?php

class UrlUtil {
    /**
     * Returns a new url with the given param added.
     */
    public static function addParam($url, $param, $value) {
        $url = self::prepareForParams($url);
        return $url.sprintf('%s=%s', $param, urlencode($value));
    }

    /**
     * Returns a new url with all the given params added.
     */
    public static function addParams($url, $params) {
        $url = self::prepareForParams($url);
        $first = true;
        foreach($params as $param => $value) {
            if(!$first) {
                $url .= '&';
            }
            $url .= sprintf('%s=%s', $param, urlencode($value));
            $first = false;
        }
        return $url;
    }

    private static function prepareForParams($url) {
        if (StringUtil::isIn('?', $url)) {
            return $url.'&';
        } else {
            return $url.'?';
        }
    }

    /**
     * A faster link_to() for simple usages.
     */
    public static function link($name, $url) {
        if(!StringUtil::startsWith($url, '/')) {
            $url = '/'.$url;
        }
        return '<a href="'.$url.'">'.htmlspecialchars($name).'</a>';
    }
}
