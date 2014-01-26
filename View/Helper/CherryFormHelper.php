<?php

	App::uses('FormHelper', 'View/Helper');

	class CherryFormHelper extends FormHelper {

		public $cherry = false;
		private $labelCol = 3;
		private $inputCol = 9;

		/**
		 * Returns an HTML FORM element.
		 *
		 * ### Options:
		 *
		 * - `type` Form method defaults to POST
		 * - `action`  The controller action the form submits to, (optional).
		 * - `url`  The URL the form submits to. Can be a string or a URL array. If you use 'url'
		 *    you should leave 'action' undefined.
		 * - `default`  Allows for the creation of Ajax forms. Set this to false to prevent the default event handler.
		 *   Will create an onsubmit attribute if it doesn't not exist. If it does, default action suppression
		 *   will be appended.
		 * - `onsubmit` Used in conjunction with 'default' to create ajax forms.
		 * - `inputDefaults` set the default $options for FormHelper::input(). Any options that would
		 *   be set when using FormHelper::input() can be set here. Options set with `inputDefaults`
		 *   can be overridden when calling input()
		 * - `encoding` Set the accept-charset encoding for the form. Defaults to `Configure::read('App.encoding')`
		 *
		 * @param mixed $model The model name for which the form is being defined. Should
		 *   include the plugin name for plugin models. e.g. `ContactManager.Contact`.
		 *   If an array is passed and $options argument is empty, the array will be used as options.
		 *   If `false` no model is used.
		 * @param array $options An array of html attributes and options.
		 * @return string An formatted opening FORM tag.
		 */
		public function create($model = null, $options = array()) {

			if (!isset($options['role'])) {
				$options['role'] = 'form';
			}

			if (isset($options['cherry'])) {
				$this->cherry = $options['cherry'];
				unset($options['cherry']);
			} else {
				$this->cherry = false;
			}

			if ($this->cherry !== true && $this->cherry !== false && !isset($options['class'])) {
				$options['class'] = $this->cherry;
			}

			return parent::create($model, $options);

		}

		/**
		 * Generates a form input element complete with label and wrapper div
		 *
		 * ### Options
		 *
		 * See each field type method for more information. Any options that are part of
		 * $attributes or $options for the different **type** methods can be included in `$options` for input().i
		 * Additionally, any unknown keys that are not in the list below, or part of the selected type's options
		 * will be treated as a regular html attribute for the generated input.
		 *
		 * - `type` - Force the type of widget you want. e.g. `type => 'select'`
		 * - `label` - Either a string label, or an array of options for the label. See FormHelper::label().
		 * - `div` - Either `false` to disable the div, or an array of options for the div.
		 *	See HtmlHelper::div() for more options.
		 * - `options` - For widgets that take options e.g. radio, select.
		 * - `error` - Control the error message that is produced. Set to `false` to disable any kind of error reporting (field
		 *    error and error messages).
		 * - `errorMessage` - Boolean to control rendering error messages (field error will still occur).
		 * - `empty` - String or boolean to enable empty select box options.
		 * - `before` - Content to place before the label + input.
		 * - `after` - Content to place after the label + input.
		 * - `between` - Content to place between the label + input.
		 * - `format` - Format template for element order. Any element that is not in the array, will not be in the output.
		 *	- Default input format order: array('before', 'label', 'between', 'input', 'after', 'error')
		 *	- Default checkbox format order: array('before', 'input', 'between', 'label', 'after', 'error')
		 *	- Hidden input will not be formatted
		 *	- Radio buttons cannot have the order of input and label elements controlled with these settings.
		 *
		 * @param string $fieldName This should be "Modelname.fieldname"
		 * @param array $options Each type of input takes different options.
		 * @return string Completed form widget.
		 */
		public function input($fieldName, $options = array()) {

			$this->setEntity($fieldName);
			$options = $this->_parseOptions($options);
			$type = $options['type'];

			if ($this->cherry !== false) {

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
							if ($this->cherry === 'form-horizontal') {
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

						if ((!isset($options['label']) || $label !== false) && $this->cherry === 'form-horizontal') {
							$options['label'] = array('class' => 'col-md-' . $this->labelCol . ' control-label');
							if (isset($label)) {
								$options['label']['text'] = $label;
							}
						}

						if (!isset($options['before']) && !isset($options['between']) && !isset($options['after']) && $this->cherry === 'form-horizontal') {
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

		/**
		 * Creates a submit button element. This method will generate `<input />` elements that
		 * can be used to submit, and reset forms by using $options. image submits can be created by supplying an
		 * image path for $caption.
		 *
		 * ### Options
		 *
		 * - `div` - Include a wrapping div?  Defaults to true. Accepts sub options similar to
		 *   FormHelper::input().
		 * - `before` - Content to include before the input.
		 * - `after` - Content to include after the input.
		 * - `type` - Set to 'reset' for reset inputs. Defaults to 'submit'
		 * - Other attributes will be assigned to the input element.
		 *
		 * ### Options
		 *
		 * - `div` - Include a wrapping div?  Defaults to true. Accepts sub options similar to
		 *   FormHelper::input().
		 * - Other attributes will be assigned to the input element.
		 *
		 * @param string $caption The label appearing on the button OR if string contains :// or the
		 *  extension .jpg, .jpe, .jpeg, .gif, .png use an image if the extension
		 *  exists, AND the first character is /, image is relative to webroot,
		 *  OR if the first character is not /, image is relative to webroot/img.
		 * @param array $options Array of options. See above.
		 * @return string A HTML submit button
		 */
		public function submit($caption = null, $options = array()) {

			if ($this->cherry !== false) {
				
				if (!isset($options['class'])) {
					$options['class'] = 'btn btn-default';
				}

				if (!isset($options['div'])) {
					$options['div'] = 'form-group submit';
				}

				if ((!isset($options['div']) || $options['div']) && !isset($options['before']) && !isset($options['between']) && !isset($options['after']) && $this->cherry === 'form-horizontal') {
					$options['before'] = '<div class="col-md-offset-' . $this->labelCol . ' col-md-' . $this->inputCol . '">';
					$options['after'] = '</div>';
				}

			}

			return parent::submit($caption, $options);

		}

		/**
		 * Creates an HTML link, but access the URL using the method you specify (defaults to POST).
		 * Requires javascript to be enabled in browser.
		 *
		 * This method creates a `<form>` element. So do not use this method inside an existing form.
		 * Instead you should add a submit button using FormHelper::submit()
		 *
		 * ### Options:
		 *
		 * - `data` - Array with key/value to pass in input hidden
		 * - `method` - Request method to use. Set to 'delete' to simulate HTTP/1.1 DELETE request. Defaults to 'post'.
		 * - `confirm` - Can be used instead of $confirmMessage.
		 * - Other options is the same of HtmlHelper::link() method.
		 * - The option `onclick` will be replaced.
		 *
		 * @param string $title The content to be wrapped by <a> tags.
		 * @param string|array $url Cake-relative URL or array of URL parameters, or external URL (starts with http://)
		 * @param array $options Array of HTML attributes.
		 * @param boolean|string $confirmMessage JavaScript confirmation message.
		 * @return string An `<a />` element.
		 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/form.html#FormHelper::postLink
		 */
		public function postLink($title, $url = null, $options = array(), $confirmMessage = false) {
			$requestMethod = 'POST';
			if (!empty($options['method'])) {
				$requestMethod = strtoupper($options['method']);
				unset($options['method']);
			}
			if (!empty($options['confirm'])) {
				$confirmMessage = $options['confirm'];
				unset($options['confirm']);
			}

			$formName = str_replace('.', '', uniqid('post_', true));
			$formUrl = $this->url($url);
			$formOptions = array(
				'name' => $formName,
				'id' => $formName,
				'style' => 'display:none;',
				'method' => 'post',
			);
			if (isset($options['target'])) {
				$formOptions['target'] = $options['target'];
				unset($options['target']);
			}

			$out = $this->Html->useTag('form', $formUrl, $formOptions);
			$out .= $this->Html->useTag('hidden', '_method', array(
				'value' => $requestMethod
			));
			$out .= $this->_csrfField();

			$fields = array();
			if (isset($options['data']) && is_array($options['data'])) {
				foreach ($options['data'] as $key => $value) {
					$fields[$key] = $value;
					$out .= $this->hidden($key, array('value' => $value, 'id' => false));
				}
				unset($options['data']);
			}
			$out .= $this->secure($fields);
			$out .= $this->Html->useTag('formend');

			$modalTitle = 'Are you sure?';
			if (!empty($options['modalTitle'])) {
				$modalTitle = $options['modalTitle'];
				unset($options['modalTitle']);
			}

			$confirmTitle = 'Delete';
			if (!empty($options['confirmTitle'])) {
				$confirmTitle = $options['confirmTitle'];
				unset($options['confirmTitle']);
			}

			$confirmClass = 'btn btn-danger';
			if (!empty($options['confirmClass'])) {
				$confirmClass = $options['confirmClass'];
				unset($options['confirmClass']);
			}

			$url = '#';
			$onClick = 'document.' . $formName . '.submit();';
			if ($confirmMessage) {
				$options['onclick'] = "modal({'modalTitle': '{$modalTitle}', 'modalBody': '{$confirmMessage}', 'confirmTitle': '{$confirmTitle}', 'confirmClass': '{$confirmClass}', 'confirmCallback': function() {{$onClick}}});";
			} else {
				$options['onclick'] = $onClick;
			}
			$options['onclick'] .= ' event.preventDefault();';

			$out .= $this->Html->link($title, $url, $options);
			return $out;
		}

	}
