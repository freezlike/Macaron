<?php
/**
 * Pear Component 
 **/
App::uses('Component', 'Controller');
class PearComponent extends Component {
    
    public $components = array();

    function __construct(ComponentCollection $collection, $settings = array()) {
        parent::__construct($collection, $settings);
    }

    public function initialize($controller) {
    }

    public function startup($controller) {
    }

    public function beforeRender($controller) {
    }

    public function shutdown($controller) {
    }

    public function beforeRedirect($controller, $url, $status=null, $exit=true) {
    }
    
	public function import($key) {
		$this->__setPearEnviroment();
		App::import('Vendor', "Pear.$key", array(
			'file' => 'pear' . DS . str_replace(DS, '/', $key) . '.php',
		));
	}
	
	private function __setPearEnviroment() {
		$separator = PATH_SEPARATOR; 
        $includePath = explode($separator, ini_get("include_path"));
        $includePath[] = dirname(dirname(dirname(__FILE__))) . DS . 'vendors' . DS . 'pear';
        ini_set("include_path", implode($separator, $includePath));
	}
}
