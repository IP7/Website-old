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
        $u = substr($u, $root_uri_len);
    }
    return $u;
}

// return the URL of a cursus
function cursus_url($c) {
    return Config::$root_uri.'cursus/'.$c->getShortName();
}

// return the URL of a course
function course_url($cursus, $course) {
    $u  = Config::$root_uri.'cursus/'.$cursus->getShortName();
    if ($course) { $u .= '/'.$course->getCode(); }

    return $u;
}

// return the URL of a content
function content_url($cursus, $course, $content) {
    if (!$cursus) { return ''; }
    return course_url($cursus, $course) . '/' . $content->getId();
}

// return the URL of an user's profile
function user_url($user) {
    return Config::$root_uri.'p/'.$user->getUsername();
}

/* return an URL part for the name of a file, e.g.:
        user_file_name2url("Foo bar.pdf) --> "Foo-bar.pdf" */
function filename_encode($fn) {
    return preg_replace('/[^-.a-zA-Z0-9]+/', '-', $fn);
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

?>
