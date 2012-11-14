<?php

include('config.inc');

 
class SessionSaveHandler {
    protected $mc;
 
    public function __construct() {
        session_set_save_handler(
            array($this, "open"),
            array($this, "close"),
            array($this, "read"),
            array($this, "write"),
            array($this, "destroy"),
            array($this, "gc")
        );
    }
    
    public function open($savePath, $sessionName) {
        $this->mc = new Memcache();
        $this->mc->connect($memcachedhost, 11211);
        return true;
    }
 
    public function close() {
        $this->mc->close();
        return true;
    }
 
    public function read($id) {
        return $this->mc->get($id);
    }
 
    public function write($id, $data) {
        return $this->mc->set($id, $data, false, ini_get('session.gc_maxlifetime'));
    }
 
    public function destroy($id) {
        return $this->mc->delete($id);
    }
 
    public function gc($maxlifetime) {
    }
    
}
 
$mcsess = new SessionSaveHandler();
session_start();
 
