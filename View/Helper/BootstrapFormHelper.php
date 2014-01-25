<?php

	App::uses('FormHelper', 'View/Helper');

	class BootstrapFormHelper extends FormHelper {

		public $bootstrap = false;
		private $labelCol = 4;
		private $inputCol = 8;

		public function create($model = null, $options = array()) {

			if (!isset($options['role'])) {
				$options['role'] = 'form';
			}

			if (isset($options['bootstrap'])) {
				$this->bootstrap = $options['bootstrap'];
				unset($options['bootstrap']);
			} else {
				$this->bootstrap = false;
			}

			if ($this->bootstrap !== true && $this->bootstrap !== false && !isset($options['class'])) {
				$options['class'] = $this->bootstrap;
			}

			return parent::create($model, $options);

		}

		/**
		 * Takes an array of options to output markup that works with
		 * twitter bootstrap forms.
		 *
		 * @param array $options
		 * @access public
		 * @return string
		 */
		public function input($fieldName, $options = array()) {

			$this->setEntity($fieldName);
			$options = $this->_parseOptions($options);
			$type = $options['type'];

			if ($this->bootstrap !== false) {

				switch($type) {

					case 'checkbox':

						if (!isset($options['div'])) {
							$options['div'] = 'form-group';
						}

						if (!isset($options['before']) && !isset($options['between'])) {
							$after = '';
							if (isset($options['after'])) {
								$after = ' ' . $options['after'];
							}
							if ($this->bootstrap === 'form-horizontal') {
								$options['before'] = '<div class="col-md-offset-' . $this->labelCol . ' col-md-' . $this->inputCol . '"><div class="checkbox">';
								$options['after'] = $after . '</div></div>';
							} else {
								$options['before'] = '<div class="checkbox">';
								$options['after'] = $after . '</div>';
							}
						}

					break;

					default:

						if (!isset($options['div'])) {
							$options['div'] = 'form-group';
						}

						if (!isset($options['class'])) {
							$options['class'] = 'form-control';
						} else {
							$options['class'] .= ' form-control';
						}

						if (isset($options['label'])) {
							$label = $options['label'];
						}

						if ((!isset($options['label']) || $label !== false) && $this->bootstrap === 'form-horizontal') {
							$options['label'] = array('class' => 'col-md-' . $this->labelCol . ' control-label');
							if (isset($label)) {
								$options['label']['text'] = $label;
							}
						}

						if (!isset($options['before']) && !isset($options['between']) && !isset($options['after']) && $this->bootstrap === 'form-horizontal') {
							$options['between'] = '<div class="col-md-' . $this->inputCol . '">';
							$options['after'] = '</div>';
						}

						if (!isset($options['error'])) {
							$options['error'] = array(
								'attributes' => array(
									'wrap' => 'div',
									'class' => 'help-block text-danger'
								)
							);
						}

					break;

				}

			}

			return parent::input($fieldName, $options);

		}

		public function submit($caption = null, $options = array()) {

			if ($this->bootstrap !== false) {
				
				if (!isset($options['class'])) {
					$options['class'] = 'btn btn-default';
				}

				if (!isset($options['div'])) {
					$options['div'] = 'form-group submit';
				}

				if ((!isset($options['div']) || $options['div']) && !isset($options['before']) && !isset($options['between']) && !isset($options['after']) && $this->bootstrap === 'form-horizontal') {
					$options['before'] = '<div class="col-md-offset-' . $this->labelCol . ' col-md-' . $this->inputCol . '">';
					$options['after'] = '</div>';
				}

			}

			return parent::submit($caption, $options);

		}

	}
