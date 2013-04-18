<?php

// return the current URL
function url() {
  return $_SERVER['REQUEST_URI'];
}

// return the current URL without the Config::$root_uri prefix
function config_url() {
    $u = url();
    $root_uri_len = strlen(Config::$root_uri);

    if (substr($u, 0, $root_uri_len) == Config::$root_uri) {
        return substr($u, $root_uri_len);
    }
    return $u;
}

// return the URL of a cursus
function cursus_url($c) {
    return Config::$root_uri.'cursus/'.$c->getShortName();
}

// return the URL of a course
function course_url($cursus, $course) {
    $u  = cursus_url($cursus);
    $u .= '/'. ($course === NULL ? 'global' : $course->getShortName());

    return $u;
}

// return the URL of a content
function content_url($cursus, $course, $content, $force_uri=false) {
    if (!$cursus) { return ''; }
    
    $uri = course_url($cursus, $course) . '/' . $content->getId();
    
    if ($content->getYear()) {
        $uri .= '/' . $content->getYear() . '-' . ($content->getYear() + 1);
    }

    return $uri . '/' . name_encode($content->getTitle(), $force_uri);
}

// return the URL of an user's profile
function user_url($user) {
    return Config::$root_uri.'p/'.$user->getUsername();
}

// return the URL of a news
function news_url($n) {
    $anchor = $n ? '#news-' . $n->getId() : '';

    return Config::$root_uri.'actus/archives' . $anchor;
}

// return the URL of an educational path
function educpath_url($cursus, $ep) {
    return cursus_url($cursus).'/parcours/'.$ep.'/';
}

// return the URL for a CSS file
function css_url($name) {
    return css_or_js_url('styles', $name, 'css');
}

// return the URL for a JS file
function js_url($name) {
    return css_or_js_url('scripts', $name, 'js');
}

// return the URL for a CSS or JS file
function css_or_js_url($dir, $name, $ext) {
    $path = Config::$app_dir.'/views/static/'.$dir.'/'.$name;

    if (file_exists($path.'.min.'.$ext)) {
        $name = $name.'.min';
    }

    return Config::$root_uri.'views/static/'.$dir.'/'.$name.'.'.$ext;
}

/* return an URL part for the name of a file/content, e.g.:
    name_encode("Foo bar.pdf) --> "Foo-bar.pdf"

    $force_uri : if true, the encoded name can be used in an URL,
                 if not, it can't, but it can be used in an IRI. */
function name_encode($n, $force_uri=false) {

    $n = preg_replace('/[^._a-zA-Z0-9éèàùÉÀ]+/', '-', $n);
    // remove unwanted hyphens at the beginning/end
    $n = preg_replace('/^-+|-+$/', '', $n);

    if (!$force_uri) { return $n; }

    return urlencode($n);
}

## Short URLs

/**
 * Return a short URL for the given URL. If the URL is not from *.infop7.org,
 * the function returns its argument.
 **/
function create_short_url($url) {

    $root = 'http://s.infop7.org/';

    $parts = parse_url($url);

    $long_url = substr($parts['path'], 1);
   
    if ($parts['query']) { $long_url .= '?' . $parts['query']; }
    if ($parts['fragment']) { $long_url .= '#' . $parts['fragment']; }

    if (!preg_match('/\.?infop7\.org$/', $parts['host'])) {
        return $url;
    }

    $q = ShortLinkQuery::create()
                ->findOneByUrl( $long_url );

    if ($q) {
        return $root . $q->getShortUrl();
    }

    $short_url = get_random_string(2) . dechex(strlen($url));

    $sl = new ShortLink();
    $sl->setShortUrl($short_url);
    $sl->setUrl($long_url);
    $sl->save();

    return $root . $short_url;

}

// encode a string for a link on the wiki, e.g.:
// "Foo Bar" -> "Foo_Bar"
function wiki_url($str) {
    return preg_replace('/\s/', '_', $str);
}

// return the URL of a file
function file_url($file) {
    return Config::$root_uri.'file/'.$file->getId().'/'.name_encode($file->getTitle());
}
