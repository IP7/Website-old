<?php

/**
 * An object used to store some data with key/value pairs on the
 * server side. An unique token must be used as a key to the data.
 *
 * Example:
 *      $t = generate_token();
 *      $f = FormData::create($t)->store('secret', '123');
 *      // in the HTML:
 *      <form method="post" action="...">
 *          <input type="hidden" name="t" value="$t" />
 *          <!-- ... -->
 *      </form>
 *
 *      // on the page where the content is posted
 *      $f = FormData::create($_POST['t'])->get('secret'); // '123'
 *      $f->destroy();
 *
 **/
class FormData {

    protected $token;
    protected $storage = null;

    private static $SESSION_NAMESPACE = 'forms_data';

    /**
     * Create a new object
     **/
    public static function create($token) {
        return new self($token);
    }

    public function __construct($token) {
        $this->token = $token;
    }

    /**
     * $f->initialize() : initialize the object's storage
     * $f->initialize(true) : force the initialization
     **/
    public function initialize($force=false) {
        if ($force) {
            return $this->reset();
        }

        if (!$this->exists()) {
            $_SESSION[self::$SESSION_NAMESPACE][$this->token] = array();
        }

        $this->storage = &$_SESSION[self::$SESSION_NAMESPACE][$this->token];

        return $this;
    }

    /**
     * $f->exists() : Test if the storage exists
     **/
    public function exists() {
        return array_key_exists($this->token, $_SESSION[self::$SESSION_NAMESPACE]);
    }

    /**
     * $f->reset() : Remove the data
     **/
    public function reset() {
        $this->initialize(true);
        return $this;
    }

    /**
     * $f->store(a) : store the values of the array `a`
     * $f->store(k, v) : store the value `v` with the key `k`
     **/
    public function store($key, $value=null) {
        if (!$this->storage) { $this->initialize(); }

        if (!isset($value) && is_array($key)) {
            foreach ($key as $k => $v) {
                $this->store($k, $v);
            }
            return $this;
        }

        $this->storage[$key] = $value;

        return $this;
    }

    /**
     * $f->get() : returns the data (associative array)
     * $f->get(key) : return the value of `key`
     **/
    public function get($key=null) {
        if (!$this->storage) { $this->initialize(); }

        if (!$key) {
            return $this->storage;
        }

        $values = $this->get();

        return array_key_exists($key, $values) ? $values[$key] : null;
    }

    /**
     * $f->delete() : delete the data
     * $f->delete(key) : delete the value of `key`
     **/
    public function delete($key=null) {
        if (!$this->storage) { $this->initialize(); }

        if (isset($key)) {
            unset($this->storage[$key]);
            return $this;
        }
        else {
            unset($_SESSION[self::$SESSION_NAMESPACE][$this->token]);
            unset($this->storage);
        }
    }

    /**
     * $f->destroy() : delete the data
     **/
    public function destroy() {
        $this->delete();
    }
}

?>
