<?php
App::uses('HtmlHelper', 'View/Helper');

class CherryHtmlHelper extends HtmlHelper {

	public function image($path, $options = array()) {
		$path = $this->assetUrl($path, $options + array('pathPrefix' => Configure::read('App.imageBaseUrl')));
		$options = array_diff_key($options, array('fullBase' => null, 'pathPrefix' => null));

		if (!isset($options['alt'])) {
			$options['alt'] = '';
		}

		//Add Responsive Class
		if(isset($options['cherry'])){
			if ($options['cherry'] === true && !isset($options['class'])) {
				$options['class'] = 'img-responsive';
			} else if ($options['cherry'] === true && isset($options['class'])){
				$options['class'] = $options['class'] . ' img-responsive';
			}
		}

		$url = false;
		if (!empty($options['url'])) {
			$url = $options['url'];
			unset($options['url']);
		}

		$image = sprintf($this->_tags['image'], $path, $this->_parseAttributes($options, null, '', ' '));

		if ($url) {
			return sprintf($this->_tags['link'], $this->url($url), null, $image);
		}
		return $image;
	}
}
