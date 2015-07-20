<?php

App::uses('Helper', 'View');

class AppHelper extends Helper {

    /**
     * Overwrite to make URLs absolute for PDF content.
     *
     * @param mixed $url
     * @param bool $full
     * @return string
     */
    public function url($url = null, $full = false) {
        if (!empty($this->request->params['ext']) && $this->request->params['ext'] === 'pdf') {
            $full = true;
        }
        return parent::url($url, $full);
    }

    /**
     * Overwrite to make paths for assets absolute so they can be found by the PDF engine.
     *
     * @param string $path
     * @param array $options
     * @return string
     */
    public function assetUrl($path, $options = array()) {
        if (!empty($this->request->params['ext']) && $this->request->params['ext'] === 'pdf') {
            $options['fullBase'] = true;
        }
        return parent::assetUrl($path, $options);
    }

}
