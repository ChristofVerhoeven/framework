<?php
	/**
	 * The abstract <%= $objJqDoc->strQcClass %>Gen class defined here is
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
	 * update QCubed state variables. See the <%= $objJqDoc->strQcClass %>Base 
	 * file, which contains code to interface between this generated file and QCubed.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the <%= $objJqDoc->strQcClass %> class file.
	 *
	 */

	/* Custom event classes for this control */
	
	
<% foreach ($objJqDoc->events as $event) { %>
	/**
	 * <%= str_replace("\n", "\n\t * ", wordwrap(trim($event->description), 75, "\n\t\t")) %>
	 */
	class <%= $event->eventClassName %> extends QJqUiEvent {
		const EventName = '<%= $event->eventName %>';
	}
<% } %>


	/**
<% foreach ($objJqDoc->options as $option) { %>
	 * @property <%= $option->phpType %> $<%= $option->propName %> <%= str_replace("\n", "\n\t * ", wordwrap(trim($option->description), 75, "\n\t\t")) %>
<% } %>
	 */

	<%= $objJqDoc->strAbstract %>class <%= $objJqDoc->strQcClass %>Gen extends <%= $objJqDoc->strQcBaseClass %>	{
		protected $strJavaScripts = __JQUERY_EFFECTS__;
		protected $strStyleSheets = __JQUERY_CSS__;
<% foreach ($objJqDoc->options as $option) { %>
		/** @var <%= $option->phpType %> */
	<% if (!$option->defaultValue) { %>
		protected $<%= $option->varName %>;
	<% } %>
	<% if ($option->defaultValue) { %>
		protected $<%= $option->varName %> = null;
	<% } %>
<% } %>
		
		protected function makeJsProperty($strProp, $strKey) {
			$objValue = $this->$strProp;
			if (null === $objValue) {
				return '';
			}

			return $strKey . ': ' . JavaScriptHelper::toJsObject($objValue) . ', ';
		}

		protected function makeJqOptions() {
<% if (method_exists($objJqDoc->strQcBaseClass, 'makeJqOptions')) { %>
			$strJqOptions = parent::makeJqOptions();
			if ($strJqOptions) $strJqOptions .= ', ';
<% } %>
<% if (!method_exists($objJqDoc->strQcBaseClass, 'makeJqOptions')) { %>
			$strJqOptions = '';
<% } %>
<% foreach ($objJqDoc->options as $option) { %>
			$strJqOptions .= $this->makeJsProperty('<%= $option->propName %>', '<%= $option->name %>');
<% } %>
			if ($strJqOptions) $strJqOptions = substr($strJqOptions, 0, -2);
			return $strJqOptions;
		}

		public function getJqControlId() {
			return $this->ControlId;
		}

		public function GetControlJavaScript() {
			return sprintf('jQuery("#%s").<%= $objJqDoc->strJqSetupFunc %>({%s})', $this->getJqControlId(), $this->makeJqOptions());
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
			$strJs = sprintf('jQuery("#%s").<%= $objJqDoc->strJqSetupFunc %>(%s)', 
				$this->getJqControlId(),
				substr($strArgs, 1, strlen($strArgs)-2));	// params without brackets
			QApplication::ExecuteJavaScript($strJs);
		}


<% foreach ($objJqDoc->methods as $method) { %>
		/**
		 * <%= str_replace("\n", "\n\t\t * ", wordwrap(trim($method->description))) %>
<% foreach ($method->requiredArgs as $reqArg) { %>
    <% if ($reqArg{0} != '"') { %>
		 * @param <%= $reqArg %>
    <% } %>
<% } %>
<% foreach ($method->optionalArgs as $optArg) { %>
		 * @param <%= $optArg %>
<% } %>
		 */
		public function <%= $method->phpSignature %> {<%  
				$args = array();
				foreach ($method->requiredArgs as $reqArg) {
					$args[] = $reqArg;
				}
				foreach ($method->optionalArgs as $optArg) {
					$args[] = $optArg;
				}
				$strArgs = join(", ", $args); %>
			$this->CallJqUiMethod(<%= $strArgs; %>);
		}
<% } %>


		public function __get($strName) {
			switch ($strName) {
<% foreach ($objJqDoc->options as $option) { %>
				case '<%= $option->propName %>': return $this-><%= $option->varName %>;
<% } %>
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
<% foreach ($objJqDoc->options as $option) { %>
				case '<%= $option->propName %>':
	<% if (!$option->phpQType) { %>
					$this-><%= $option->varName %> = $mixValue;
	<% if (!($option instanceof Event)) { %>
				
					if ($this->Rendered) {
						$this->CallJqUiMethod("option", $strName, $mixValue);
					}
					break;
	<% } %>
	<% } %>
	<% if ($option->phpQType) { %>
					try {
	<% if (!($option instanceof Event)) { %>
						$this-><%= $option->varName %> = QType::Cast($mixValue, <%= $option->phpQType %>);
						if ($this->Rendered) {
							$this->CallJqUiMethod("option", $strName, $mixValue);
						}
	<% } %>
	<% if ($option instanceof Event) { %>
						$this-><%= $option->varName %> = new QJsClosure($mixValue, array("<%= join('","', $option->arrArgs) %>"));
	<% } %>
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
	<% } %>

<% } %>

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
