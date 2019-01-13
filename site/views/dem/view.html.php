<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  DLRGRettungssport
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class dlrgrettungssportViewdem extends JViewLegacy
{
	function display($tpl = null)
	{
		$this->title = 'Ergebnisse der Deutsche Einzelstrecken-Meisterschaften im Rettungssport';
		
		$table = '';
		
        $values = array(
			array(2019, "Magdeburg", ""),
		);

        for ($x = count($values) - 1; $x >= 0; $x--) {
	      $value = $values[$x];
	      $einzel = "-";
	      $mannschaft = "-";
	
	      $nr = "";
	      if ($value[0] != null) {
		    $nr = $value[0] - 2018;
	      }
	
	      $og = $value[1];
	      if ($value[2] != NULL) {
		    $og = "<a target=\"_blank\" href=\"$value[2]\">$og</a>";
	      }
	      $name = "../ergebnisse/dem/DEM_$value[0]_Ergebnis_Einzel.pdf";
	      if (file_exists($name)) {
		    $einzel = "<a href=\"$name\">Einzel</a>";
	      }
	      $name = "../ergebnisse/dem/DEM_$value[0]_Ergebnis_Mannschaft.pdf";
	      if (file_exists($name)) {
		    $mannschaft = "<a href=\"$name\">Mannschaft</a>";
	      }
	      $table .= "<tr><td style=\"border-left: 1px solid #0077BB; text-align: center; padding-right: 0.2em;\">$value[0]</td><td>$og</td><td style=\"text-align: center; padding-right: 0.2em;\">$einzel</td><td style=\"text-align: center; padding-right: 0.2em;\">$mannschaft</td><td style=\"border-right: 1px solid #0077BB; text-align: right; padding-right: 0.2em;\">$nr</td></tr>";
        }
		
		$path = realpath (".");
		
		$message = '<p>Die DEM ist die deutsche Meisterschaft &uuml;ber die einzelnen Disziplinen und grenzt sich damit deutlich gegen die Deutsche Mehrkampf-Meisterschaft (ehemals Deutsche Meisterschaft) ab. Sie ging aus dem DLRG Cup Pool hervor, der bis 2018 insbesondere als Auswahlwettkampf f&uuml;r die Nationalmanschaft durchgef&uuml;hrt wurde.</p>';

		$message .= '<table style="border: 1px solid #0077BB; width: 99%; border-collapse: collapse;">';
		$message .= '<tr style="background-color: #0077BB; color: WHITE; border: 1px solid #0077bb;"><th style="border-left: 1px solid #0077BB; text-align: center;">Jahr</th><th style="text-align: center;">Ort</th><th colspan="2" style="text-align: center;">Ergebnisse</th><th style="border-right: 1px solid #0077BB; text-align: center;">Nr</th></tr>';
		$message .= $table;
		$message .= '</table>';
		
		$this->body = $message;

		parent::display($tpl);
	}
}
