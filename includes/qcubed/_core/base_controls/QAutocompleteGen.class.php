<?php
	/**
	 * The abstract QAutocompleteGen class defined here is
	 * code-generated and contains options, events and methods scraped from the
	 * JQuery UI documentation Web site. It is not generated by the typical
	 * codegen process, but rather is generated periodically by the core QCubed
	 * team and checked in. However, the code to generate this file is
	 * in the assets/_core/php/_devetools/jquery_ui_gen/jq_control_gen.php file
	 * and you can regenerate the files if you need to.
	 *
	 * The comments in this file are taken from the JQuery UI site, so they do
	 * not always make sense with regard to QCubed. They are simply provided
	 * as reference. Note that this is very low-level code, and does not always
	 * update QCubed state variables. See the QAutocompleteBase 
	 * file, which contains code to interface between this generated file and QCubed.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the QAutocomplete class file.
	 *
	 */

	/* Custom event classes for this control */
	
	
	/**
	 * This event is triggered when autocomplete is created.
	 */
	class QAutocomplete_CreateEvent extends QJqUiEvent {
		const EventName = 'autocompletecreate';
	}
	/**
	 * Before a request (source-option) is started, after minLength and delay are
	 * 		met. Can be canceled (return false), then no request will be started and no
	 * 		items suggested.
	 */
	class QAutocomplete_SearchEvent extends QJqUiEvent {
		const EventName = 'autocompletesearch';
	}
	/**
	 * Triggered when the suggestion menu is opened.
	 */
	class QAutocomplete_OpenEvent extends QJqUiEvent {
		const EventName = 'autocompleteopen';
	}
	/**
	 * Before focus is moved to an item (not selecting), ui.item refers to the
	 * 		focused item. The default action of focus is to replace the text field's
	 * 		value with the value of the focused item, though only if the focus event
	 * 		was triggered by a keyboard interaction. Canceling this event prevents the
	 * 		value from being updated, but does not prevent the menu item from being
	 * 		focused.
	 */
	class QAutocomplete_FocusEvent extends QJqUiEvent {
		const EventName = 'autocompletefocus';
	}
	/**
	 * Triggered when an item is selected from the menu; ui.item refers to the
	 * 		selected item. The default action of select is to replace the text field's
	 * 		value with the value of the selected item. Canceling this event prevents
	 * 		the value from being updated, but does not prevent the menu from closing.
	 */
	class QAutocomplete_SelectEvent extends QJqUiEvent {
		const EventName = 'autocompleteselect';
	}
	/**
	 * When the list is hidden - doesn't have to occur together with a change.
	 */
	class QAutocomplete_CloseEvent extends QJqUiEvent {
		const EventName = 'autocompleteclose';
	}
	/**
	 * Triggered when the field is blurred, if the value has changed; ui.item
	 * 		refers to the selected item.
	 */
	class QAutocomplete_ChangeEvent extends QJqUiEvent {
		const EventName = 'autocompletechange';
	}


	/**
	 * @property boolean $Disabled Disables (true) or enables (false) the autocomplete. Can be set when
	 * 		initialising (first creating) the autocomplete.
	 * @property mixed $AppendTo Which element the menu should be appended to.
	 * @property boolean $AutoFocus If set to true the first item will be automatically focused.
	 * @property integer $Delay The delay in milliseconds the Autocomplete waits after a keystroke to
	 * 		activate itself. A zero-delay makes sense for local data (more responsive),
	 * 		but can produce a lot of load for remote data, while being less responsive.
	 * @property integer $MinLength The minimum number of characters a user has to type before the Autocomplete
	 * 		activates. Zero is useful for local data with just a few items. Should be
	 * 		increased when there are a lot of items, where a single character would
	 * 		match a few thousand items.
	 * @property mixed $Position Identifies the position of the Autocomplete widget in relation to the
	 * 		associated input element. The "of" option defaults to the input element,
	 * 		but you can specify another element to position against. You can refer to
	 * 		the jQuery UI Position utility for more details about the various options.
	 * @property mixed $Source Defines the data to use, must be specified. See Overview section for more
	 * 		details, and look at the various demos.
	 */

	class QAutocompleteGen extends QTextBox	{
		protected $strJavaScripts = __JQUERY_EFFECTS__;
		protected $strStyleSheets = __JQUERY_CSS__;
		/** @var boolean */
		protected $blnDisabled = null;
		/** @var mixed */
		protected $mixAppendTo = null;
		/** @var boolean */
		protected $blnAutoFocus = null;
		/** @var integer */
		protected $intDelay = null;
		/** @var integer */
		protected $intMinLength = null;
		/** @var mixed */
		protected $mixPosition = null;
		/** @var mixed */
		protected $mixSource;
		
		protected function makeJsProperty($strProp, $strKey) {
			$objValue = $this->$strProp;
			if (null === $objValue) {
				return '';
			}

			return $strKey . ': ' . JavaScriptHelper::toJsObject($objValue) . ', ';
		}

		protected function makeJqOptions() {
			$strJqOptions = '';
			$strJqOptions .= $this->makeJsProperty('Disabled', 'disabled');
			$strJqOptions .= $this->makeJsProperty('AppendTo', 'appendTo');
			$strJqOptions .= $this->makeJsProperty('AutoFocus', 'autoFocus');
			$strJqOptions .= $this->makeJsProperty('Delay', 'delay');
			$strJqOptions .= $this->makeJsProperty('MinLength', 'minLength');
			$strJqOptions .= $this->makeJsProperty('Position', 'position');
			$strJqOptions .= $this->makeJsProperty('Source', 'source');
			if ($strJqOptions) $strJqOptions = substr($strJqOptions, 0, -2);
			return $strJqOptions;
		}

		public function getJqControlId() {
			return $this->ControlId;
		}

		public function GetControlJavaScript() {
			return sprintf('jQuery("#%s").autocomplete({%s})', $this->getJqControlId(), $this->makeJqOptions());
		}

		public function GetEndScript() {
			return  $this->GetControlJavaScript() . '; ' . parent::GetEndScript();
		}
		
		/**
		 * Call a JQuery UI Method on the object. Takes variable number of arguments.
		 * 
		 * @param string $strMethodName the method name to call
		 * @internal param $mixed [optional] $mixParam1
		 * @internal param $mixed [optional] $mixParam2
		 */
		protected function CallJqUiMethod($strMethodName /*, ... */) {
			$args = array();
			$args = func_get_args();

			$strArgs = JavaScriptHelper::toJsObject($args);
			$strJs = sprintf('jQuery("#%s").autocomplete(%s)', 
				$this->getJqControlId(),
				substr($strArgs, 1, strlen($strArgs)-2));	// params without brackets
			QApplication::ExecuteJavaScript($strJs);
		}


		/**
		 * Remove the autocomplete functionality completely. This will return the
		 * element back to its pre-init state.
		 */
		public function Destroy() {
			$this->CallJqUiMethod("destroy");
		}
		/**
		 * Disable the autocomplete.
		 */
		public function Disable() {
			$this->CallJqUiMethod("disable");
		}
		/**
		 * Enable the autocomplete.
		 */
		public function Enable() {
			$this->CallJqUiMethod("enable");
		}
		/**
		 * Get or set any autocomplete option. If no value is specified, will act as a
		 * getter.
		 * @param $optionName
		 * @param $value
		 */
		public function Option($optionName, $value = null) {
			$this->CallJqUiMethod("option", $optionName, $value);
		}
		/**
		 * Set multiple autocomplete options at once by providing an options object.
		 * @param $options
		 */
		public function Option1($options) {
			$this->CallJqUiMethod("option", $options);
		}
		/**
		 * Triggers a search event, which, when data is available, then will display
		 * the suggestions; can be used by a selectbox-like button to open the
		 * suggestions when clicked. If no value argument is specified, the current
		 * input's value is used. Can be called with an empty string and minLength: 0
		 * to display all items.
		 * @param $value
		 */
		public function Search($value = null) {
			$this->CallJqUiMethod("search", $value);
		}
		/**
		 * Close the Autocomplete menu. Useful in combination with the search method,
		 * to close the open menu.
		 */
		public function Close() {
			$this->CallJqUiMethod("close");
		}


		public function __get($strName) {
			switch ($strName) {
				case 'Disabled': return $this->blnDisabled;
				case 'AppendTo': return $this->mixAppendTo;
				case 'AutoFocus': return $this->blnAutoFocus;
				case 'Delay': return $this->intDelay;
				case 'MinLength': return $this->intMinLength;
				case 'Position': return $this->mixPosition;
				case 'Source': return $this->mixSource;
				default: 
					try { 
						return parent::__get($strName); 
					} catch (QCallerException $objExc) { 
						$objExc->IncrementOffset(); 
						throw $objExc; 
					}
			}
		}

		public function __set($strName, $mixValue) {
			$this->blnModified = true;

			switch ($strName) {
				case 'Disabled':
					try {
						$this->blnDisabled = QType::Cast($mixValue, QType::Boolean);
						if ($this->Rendered) {
							$this->CallJqUiMethod("option", $strName, $mixValue);
						}
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AppendTo':
					$this->mixAppendTo = $mixValue;
				
					if ($this->Rendered) {
						$this->CallJqUiMethod("option", $strName, $mixValue);
					}
					break;

				case 'AutoFocus':
					try {
						$this->blnAutoFocus = QType::Cast($mixValue, QType::Boolean);
						if ($this->Rendered) {
							$this->CallJqUiMethod("option", $strName, $mixValue);
						}
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Delay':
					try {
						$this->intDelay = QType::Cast($mixValue, QType::Integer);
						if ($this->Rendered) {
							$this->CallJqUiMethod("option", $strName, $mixValue);
						}
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MinLength':
					try {
						$this->intMinLength = QType::Cast($mixValue, QType::Integer);
						if ($this->Rendered) {
							$this->CallJqUiMethod("option", $strName, $mixValue);
						}
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Position':
					$this->mixPosition = $mixValue;
				
					if ($this->Rendered) {
						$this->CallJqUiMethod("option", $strName, $mixValue);
					}
					break;

				case 'Source':
					$this->mixSource = $mixValue;
				
					if ($this->Rendered) {
						$this->CallJqUiMethod("option", $strName, $mixValue);
					}
					break;


				case 'Enabled':
					$this->Disabled = !$mixValue;	// Tie in standard QCubed functionality
					parent::__set($strName, $mixValue);
					break;
					
				default:
					try {
						parent::__set($strName, $mixValue);
						break;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}

?>
