<?php 

class DictionaryEntry {


    private $key;

    function __construct() {
        require_once './dictionary.config.php';
        $this->key = $key;
    }

    public function getEntry($word) {

        $uri = "http://www.dictionaryapi.com/api/v1/references/" . urlencode('learners') . "/xml/" . 
        urlencode($word) . "?key=" . urlencode($mw_key);
        
        return file_get_contents($uri);

    }
}

 ?>