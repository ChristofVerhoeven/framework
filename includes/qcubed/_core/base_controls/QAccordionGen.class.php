<?php
	/**
	 * QAccordionGen File
	 * 
	 * The abstract QAccordionGen class defined here is
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
	 * update QCubed state variables. See the QAccordionBase 
	 * file, which contains code to interface between this generated file and QCubed.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the QAccordion class file.
	 *
	 */

	/* Custom event classes for this control */
	
	
	/**
	 * Triggered after a panel has been activated (after animation completes). If
	 * 		the accordion was previously collapsed, <code>ui.oldHeader</code> and
	 * 		<code>ui.oldPanel</code> will be empty jQuery objects. If the accordion is
	 * 		collapsing, <code>ui.newHeader</code> and <code>ui.newPanel</code> will be
	 * 		empty jQuery objects.<ul><li><strong>event</strong> Type: <a>Event</a>
	 * 		</li> <li><strong>ui</strong> Type: <a>Object</a> 
	 * 		<ul><li><strong>newHeader</strong> Type: <a>jQuery</a> The header that was
	 * 		just activated.</li> <li><strong>oldHeader</strong> Type: <a>jQuery</a> The
	 * 		header that was just deactivated.</li> <li><strong>newPanel</strong> Type:
	 * 		<a>jQuery</a> The panel that was just activated.</li>
	 * 		<li><strong>oldPanel</strong> Type: <a>jQuery</a> The panel that was just
	 * 		deactivated.</li></ul></li></ul>
	 */
	class QAccordion_ActivateEvent extends QJqUiEvent {
		const EventName = 'accordionactivate';
	}
	/**
	 * Triggered directly before a panel is activated. Can be canceled to prevent
	 * 		the panel from activating. If the accordion is currently collapsed,
	 * 		<code>ui.oldHeader</code> and <code>ui.oldPanel</code> will be empty jQuery
	 * 		objects. If the accordion is collapsing, <code>ui.newHeader</code> and
	 * 		<code>ui.newPanel</code> will be empty jQuery
	 * 		objects.<ul><li><strong>event</strong> Type: <a>Event</a> </li>
	 * 		<li><strong>ui</strong> Type: <a>Object</a> 
	 * 		<ul><li><strong>newHeader</strong> Type: <a>jQuery</a> The header that is
	 * 		about to be activated.</li> <li><strong>oldHeader</strong> Type:
	 * 		<a>jQuery</a> The header that is about to be deactivated.</li>
	 * 		<li><strong>newPanel</strong> Type: <a>jQuery</a> The panel that is about
	 * 		to be activated.</li> <li><strong>oldPanel</strong> Type: <a>jQuery</a> The
	 * 		panel that is about to be deactivated.</li></ul></li></ul>
	 */
	class QAccordion_BeforeActivateEvent extends QJqUiEvent {
		const EventName = 'accordionbeforeactivate';
	}
	/**
	 * Triggered when the accordion is created. If the accordion is collapsed,
	 * 		<code>ui.header</code> and <code>ui.panel</code> will be empty jQuery
	 * 		objects.<ul><li><strong>event</strong> Type: <a>Event</a> </li>
	 * 		<li><strong>ui</strong> Type: <a>Object</a> 
	 * 		<ul><li><strong>header</strong> Type: <a>jQuery</a> The active header.</li>
	 * 		<li><strong>panel</strong> Type: <a>jQuery</a> The active
	 * 		panel.</li></ul></li></ul>
	 */
	class QAccordion_CreateEvent extends QJqUiEvent {
		const EventName = 'accordioncreate';
	}

	/* Custom "property" event classes for this control */

	/**
	 * Generated QAccordionGen class.
	 * 
	 * This is the QAccordionGen class which is automatically generated
	 * by scraping the JQuery UI documentation website. As such, it includes all the options
	 * as listed by the JQuery UI website, which may or may not be appropriate for QCubed. See
	 * the QAccordionBase class for any glue code to make this class more
	 * usable in QCubed.
	 * 
	 * @see QAccordionBase
	 * @package Controls\Base
	 * @property mixed $Active Which panel is currently open.<strong>Multiple types
	 * 		supported:</strong><ul><li><strong>Boolean</strong>: Setting
	 * 		<code>active</code> to <code>false</code> will collapse all panels. This
	 * 		requires the <a><code>collapsible</code></a> option to be
	 * 		<code>true</code>.</li> <li><strong>Integer</strong>: The zero-based index
	 * 		of the panel that is active (open). A negative value selects panels going
	 * 		backward from the last panel.</li></ul>
	 * @property mixed $Animate If and how to animate changing panels.<strong>Multiple types
	 * 		supported:</strong><ul><li><strong>Boolean</strong>: A value of
	 * 		<code>false</code> will disable animations.</li>
	 * 		<li><strong>Number</strong>: Duration in milliseconds with default
	 * 		easing.</li> <li><strong>String</strong>: Name of <a>easing</a> to use with
	 * 		default duration.</li> <li><strong>Object</strong>: Animation settings with
	 * 		<code>easing</code> and <code>duration</code> properties. 					<ul><li>Can
	 * 		also contain a <code>down</code> property with any of the above
	 * 		options.</li> 						<li>"Down" animations occur when the panel being
	 * 		activated has a lower index than the currently active
	 * 		panel.</li></ul></li></ul>
	 * @property boolean $Collapsible Whether all the sections can be closed at once. Allows collapsing the
	 * 		active section.
	 * @property boolean $Disabled Disables the accordion if set to <code>true</code>.
	 * @property string $Event The event that accordion headers will react to in order to activate the
	 * 		associated panel. Multiple events can be specificed, separated by a space.
	 * @property mixed $Header <p>Selector for the header element, applied via <code>.find()</code> on the
	 * 		main accordion element. Content panels must be the sibling immedately after
	 * 		their associated headers.</p>
	 * @property string $HeightStyle <p>Controls the height of the accordion and each panel. Possible
	 * 		values:</p> 				<ul><li><code>"auto"</code>: All panels will be set to the
	 * 		height of the tallest panel.</li> 					<li><code>"fill"</code>: Expand to
	 * 		the available height based on the accordion's parent height.</li>
	 * 							<li><code>"content"</code>: Each panel will be only as tall as its
	 * 		content.</li></ul>
	 * @property mixed $Icons <p>Icons to use for headers, matching an icon defined by the jQuery UI CSS
	 * 		Framework. Set to <code>false</code> to have no icons displayed.</p>
	 * 						<ul><li>header (string, default: "ui-icon-triangle-1-e")</li>
	 * 							<li>activeHeader (string, default: "ui-icon-triangle-1-s")</li></ul>
	 */

	class QAccordionGen extends QPanel	{
		protected $strJavaScripts = __JQUERY_EFFECTS__;
		protected $strStyleSheets = __JQUERY_CSS__;
		/** @var mixed */
		protected $mixActive;
		/** @var mixed */
		protected $mixAnimate = null;
		/** @var boolean */
		protected $blnCollapsible = null;
		/** @var boolean */
		protected $blnDisabled = null;
		/** @var string */
		protected $strEvent = null;
		/** @var mixed */
		protected $mixHeader = null;
		/** @var string */
		protected $strHeightStyle = null;
		/** @var mixed */
		protected $mixIcons = null;
		
		protected function makeJsProperty($strProp, $strKey) {
			$objValue = $this->$strProp;
			if (null === $objValue) {
				return '';
			}

			return $strKey . ': ' . JavaScriptHelper::toJsObject($objValue) . ', ';
		}

		protected function makeJqOptions() {
			$strJqOptions = '';
			$strJqOptions .= $this->makeJsProperty('Active', 'active');
			$strJqOptions .= $this->makeJsProperty('Animate', 'animate');
			$strJqOptions .= $this->makeJsProperty('Collapsible', 'collapsible');
			$strJqOptions .= $this->makeJsProperty('Disabled', 'disabled');
			$strJqOptions .= $this->makeJsProperty('Event', 'event');
			$strJqOptions .= $this->makeJsProperty('Header', 'header');
			$strJqOptions .= $this->makeJsProperty('HeightStyle', 'heightStyle');
			$strJqOptions .= $this->makeJsProperty('Icons', 'icons');
			if ($strJqOptions) $strJqOptions = substr($strJqOptions, 0, -2);
			return $strJqOptions;
		}

		public function getJqSetupFunction() {
			return 'accordion';
		}

		public function GetControlJavaScript() {
			return sprintf('jQuery("#%s").%s({%s})', $this->getJqControlId(), $this->getJqSetupFunction(), $this->makeJqOptions());
		}

		public function GetEndScript() {
			$str = '';
			if ($this->getJqControlId() !== $this->ControlId) {
				// #845: if the element receiving the jQuery UI events is different than this control
				// we need to clean-up the previously attached event handlers, so that they are not duplicated 
				// during the next ajax update which replaces this control.
				$str = sprintf('jQuery("#%s").off(); ', $this->getJqControlId());
			}
			return $str . $this->GetControlJavaScript() . '; ' . parent::GetEndScript();
		}
		
		/**
		 * Call a JQuery UI Method on the object. 
		 * 
		 * A helper function to call a jQuery UI Method. Takes variable number of arguments.
		 * 
		 * @param string $strMethodName the method name to call
		 * @internal param $mixed [optional] $mixParam1
		 * @internal param $mixed [optional] $mixParam2
		 */
		protected function CallJqUiMethod($strMethodName /*, ... */) {
			$args = func_get_args();

			$strArgs = JavaScriptHelper::toJsObject($args);
			$strJs = sprintf('jQuery("#%s").%s(%s)',
				$this->getJqControlId(),
				$this->getJqSetupFunction(),
				substr($strArgs, 1, strlen($strArgs)-2));	// params without brackets
			QApplication::ExecuteJavaScript($strJs);
		}


		/**
		 * Removes the accordion functionality completely. This will return the
		 * element back to its pre-init state.<ul><li>This method does not accept any
		 * arguments.</li></ul>
		 */
		public function Destroy() {
			$this->CallJqUiMethod("destroy");
		}
		/**
		 * Disables the accordion.<ul><li>This method does not accept any
		 * arguments.</li></ul>
		 */
		public function Disable() {
			$this->CallJqUiMethod("disable");
		}
		/**
		 * Enables the accordion.<ul><li>This method does not accept any
		 * arguments.</li></ul>
		 */
		public function Enable() {
			$this->CallJqUiMethod("enable");
		}
		/**
		 * Gets the value currently associated with the specified
		 * <code>optionName</code>.<ul><li><strong>optionName</strong> Type:
		 * <a>String</a> The name of the option to get.</li></ul>
		 * @param $optionName
		 */
		public function Option($optionName) {
			$this->CallJqUiMethod("option", $optionName);
		}
		/**
		 * Gets an object containing key/value pairs representing the current
		 * accordion options hash.<ul><li>This method does not accept any
		 * arguments.</li></ul>
		 */
		public function Option1() {
			$this->CallJqUiMethod("option");
		}
		/**
		 * Sets the value of the accordion option associated with the specified
		 * <code>optionName</code>.<ul><li><strong>optionName</strong> Type:
		 * <a>String</a> The name of the option to set.</li>
		 * <li><strong>value</strong> Type: <a>Object</a> A value to set for the
		 * option.</li></ul>
		 * @param $optionName
		 * @param $value
		 */
		public function Option2($optionName, $value) {
			$this->CallJqUiMethod("option", $optionName, $value);
		}
		/**
		 * Sets one or more options for the accordion.<ul><li><strong>options</strong>
		 * Type: <a>Object</a> A map of option-value pairs to set.</li></ul>
		 * @param $options
		 */
		public function Option3($options) {
			$this->CallJqUiMethod("option", $options);
		}
		/**
		 * Recompute the height of the accordion panels. Results depend on the content
		 * and the <a><code>heightStyle</code></a> option.<ul><li>This method does not
		 * accept any arguments.</li></ul>
		 */
		public function Refresh() {
			$this->CallJqUiMethod("refresh");
		}


		public function __get($strName) {
			switch ($strName) {
				case 'Active': return $this->mixActive;
				case 'Animate': return $this->mixAnimate;
				case 'Collapsible': return $this->blnCollapsible;
				case 'Disabled': return $this->blnDisabled;
				case 'Event': return $this->strEvent;
				case 'Header': return $this->mixHeader;
				case 'HeightStyle': return $this->strHeightStyle;
				case 'Icons': return $this->mixIcons;
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
			switch ($strName) {
				case 'Active':
					$this->mixActive = $mixValue;
				
					if ($this->Rendered) {
						$this->CallJqUiMethod('option', 'active', $mixValue);
					}
					break;

				case 'Animate':
					$this->mixAnimate = $mixValue;
				
					if ($this->Rendered) {
						$this->CallJqUiMethod('option', 'animate', $mixValue);
					}
					break;

				case 'Collapsible':
					try {
						$this->blnCollapsible = QType::Cast($mixValue, QType::Boolean);
						if ($this->Rendered) {
							$this->CallJqUiMethod('option', 'collapsible', $this->blnCollapsible);
						}
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Disabled':
					try {
						$this->blnDisabled = QType::Cast($mixValue, QType::Boolean);
						if ($this->Rendered) {
							$this->CallJqUiMethod('option', 'disabled', $this->blnDisabled);
						}
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Event':
					try {
						$this->strEvent = QType::Cast($mixValue, QType::String);
						if ($this->Rendered) {
							$this->CallJqUiMethod('option', 'event', $this->strEvent);
						}
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Header':
					$this->mixHeader = $mixValue;
				
					if ($this->Rendered) {
						$this->CallJqUiMethod('option', 'header', $mixValue);
					}
					break;

				case 'HeightStyle':
					try {
						$this->strHeightStyle = QType::Cast($mixValue, QType::String);
						if ($this->Rendered) {
							$this->CallJqUiMethod('option', 'heightStyle', $this->strHeightStyle);
						}
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Icons':
					$this->mixIcons = $mixValue;
				
					if ($this->Rendered) {
						$this->CallJqUiMethod('option', 'icons', $mixValue);
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
