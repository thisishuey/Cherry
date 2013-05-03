<?php

	App::uses('FormHelper', 'View/Helper');

	class BootstrapFormHelper extends FormHelper {

		/**
		 * Takes an array of options to output markup that works with
		 * twitter bootstrap forms.
		 *
		 * @param array $options
		 * @access public
		 * @return string
		 */
		public function input($field, $options = array()) {

			if(isset($options['cake']) && $options['cake'] === true) {

				unset($options['cake']);

			} else {

				$options['label'] = array(
					'class' => 'control-label'
				);
				$options['div'] = false;
				$options['class'] = 'span6';
				$options['before'] = '<div class="control-group">';
				$options['between'] = '<div class="controls">';
				$options['after'] = '</div></div>';

			}

			return parent::input($field, $options);

		}

		public function submit($value = 'Submit', $options = array()) {

			$options['type'] = 'submit';
			$controls = $this->Html->tag('div', parent::button($value, $options), array('class' => 'controls'));
			$controlGroup = $this->Html->tag('div', $controls, array('class' => 'control-group'));
			return $controlGroup;

		}

	}
