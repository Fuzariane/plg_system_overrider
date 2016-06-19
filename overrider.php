<?php
defined('_JEXEC') or die;

class plgSystemOverrider extends JPlugin
{
	/**
	 * Overide joomla registered class from template with <override> tag in templateDetails.xml
	 * @example
	 * 	<override>
	 * 		<libraries>
	 * 			<library name="JHtmlBootstrap" path="/libraries_override/cms/html/bootstrap.php" />
	 * 		</libraries>
	 * 	</override>
	 *
	 * @throws Exception
	 */
	function onAfterInitialise()
	{
		$app = JFactory::getApplication();
		$baseTemplatePath = JPATH_THEMES.DIRECTORY_SEPARATOR.$app->getTemplate();

		// Joomla XML Parser deprecated for 13.3 or J4
		$xml = simplexml_load_file($baseTemplatePath . DIRECTORY_SEPARATOR . 'templateDetails.xml');

		if(!empty($xml->override)) {
			$libs = $xml->override->libraries->library;
			if(!empty($libs)) {
				foreach($libs as $lib) {
					$filename = $baseTemplatePath.DIRECTORY_SEPARATOR.current($lib->attributes()->path);
					if(file_exists($filename)) {
						JLoader::register(current($lib->attributes()->name), $filename, true);
					}
				}
			}
		}
	}
}

?>
