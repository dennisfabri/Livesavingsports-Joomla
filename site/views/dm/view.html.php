<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  DLRGRettungssport
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class dlrgrettungssportViewdm extends JViewLegacy
{
	function display($tpl = null)
	{
		// Assign data to the view
		$this->title = 'Ergebnisse der Deutsche Mehrkampf-Meisterschaften im Rettungssport';
		
		$table = '';
		
        $values = array(
			array(1973, "Hannover", ""),
			array(1974, "Wolfsburg &amp; Warendorf", ""),
			array(1975, "Stetten a.k.M., Warendorf &amp; Otterndorf", ""),
			array(1976, "Frankfurt a.M., Berlin (West) &amp; Otterndorf", ""),
			array(1977, "Braunschweig", ""),
			array(1978, "Oberhausen / Rheinland", ""),
			array(1979, "Pforzheim", ""),
			array(1980, "Kassel", ""),
			array(1981, "Warendorf", ""),
			array(1982, "Wei&szlig;enh&auml;user Strand", ""),
			array(1983, "Bietigheim-Bissingen", ""),
			array(1984, "Brake", ""),
			array(1985, "Damp 2000", ""),
			array(1986, "Bad Hersfeld", ""),
			array(1987, "M&uuml;hlheim an der Ruhr", ""),
			array(1988, "Berlin (West)", ""),
			array(1989, "Ludwigshafen", ""),
			array(1990, "M&uuml;nchen", ""),
			array(1991, "Warendorf", ""),
			array(1992, "Heidelberg", ""),
			array(1993, "Bad Nauheim", ""),
			array(1994, "Bremerhaven", ""),
			array(1995, "Neu Wulmstorf", ""),
			array(1996, "Braunschweig", ""),
			array(1997, "Leinfelden-Echterdingen", ""),
			array(1998, "Regensburg", ""),
			array(1999, "Bad Nauheim", ""),
			array(2000, "Halle / Saale", ""),
			array(2001, "Itzehoe", ""),
			array(2002, "Uelzen", ""),
			array(2003, "Braunschweig", ""),
			array(2004, "Paderborn", ""),
			array(2005, "Wetzlar", ""),
			array(2006, "Wuppertal", ""),
			array(2007, "Duisburg", ""),
			array(2008, "Paderborn", ""),
			array(2009, "Itzehoe", ""),
			array(2010, "Heidenheim", ""),
			array(2011, "Bremen", ""),
			array(2012, "Paderborn", ""),
			array(2013, "Bamberg", ""),			
			array(2014, "Heidenheim", ""),
			array(2015, "Osnabr&uuml;ck", ""),
			array(2016, "W&uuml;rzburg", ""),
			array(2017, "Hagen", ""),
			array(2018, "Leipzig", ""),
			array(2019, "Hagen", ""),
			array(2020, "-<sup>2</sup>", ""),
		);

        for ($x = count($values) - 1; $x >= 0; $x--) {
	      $value = $values[$x];
	      $einzel = "-";
	      $mannschaft = "-";
	      $gesamtog = "-";
	      if ($value[0] < 2007) {
	        $gesamtog = "- <sup>1</sup>";
	      }
	      $gesamtlv = "-";
	
	      $nr = "";
	      if ($value[0] != null) {
		    $nr = $value[0] - 1972;
	      }
	
	      $og = $value[1];
	      if ($value[2] != NULL) {
		    $og = "<a target=\"_blank\" href=\"$value[2]\">$og</a>";
	      }
	      $name = "../ergebnisse/dmm/DMM_$value[0]_Ergebnis_Einzel.pdf";
	      if (file_exists($name)) {
		    $einzel = "<a href=\"$name\">Einzel</a>";
	      }
	      $name = "../ergebnisse/dmm/DMM_$value[0]_Ergebnis_Mannschaft.pdf";
	      if (file_exists($name)) {
		    $mannschaft = "<a href=\"$name\">Mannschaft</a>";
	      }
	      $name = "../ergebnisse/dmm/DMM_$value[0]_Gesamtwertung_LV.pdf";
	      if (file_exists($name)) {
		     $gesamtlv = "<a href=\"$name\">LV-Wertung</a>";
	      }
	      $name = "../ergebnisse/dmm/DMM_$value[0]_Gesamtwertung_OG.pdf";
	      if (file_exists($name)) {
		    $gesamtog = "<a href=\"$name\">OG-Wertung</a>";
	      }
	      $table .= "<tr><td style=\"border-left: 1px solid #0077BB; text-align: center; padding-right: 0.2em;\">$value[0]</td><td>$og</td><td style=\"text-align: center; padding-right: 0.2em;\">$einzel</td><td style=\"text-align: center; padding-right: 0.2em;\">$mannschaft</td><td style=\"text-align: center; padding-right: 0.2em;\">$gesamtog</td><td style=\"text-align: center; padding-right: 0.2em;\">$gesamtlv</td><td style=\"border-right: 1px solid #0077BB; text-align: right; padding-right: 0.2em;\">$nr</td></tr>";
        }
		
		$path = realpath (".");
		
		$message = '<p>Die Deutschen Meisterschaften der DLRG werden unabh&auml;ngig von den Deutschen Seniorenmeisterschaften ausgetragen und stellen f&uuml;r viele Sportler den H&ouml;hepunkte in des nationalen Wettkampfjahrs dar.</p>';
		$message .= '<p>1968 fand das erste Bundesjugendtreffen (BJTR) der DLRG-Jugend statt. 1970 (Flensburg) und 1971 (Essen) fanden zuerst Mannschaftswettk&auml;mpfe und anschlie&szlig;end Einzelwettk&auml;mpfe im Rahmen des BJTR unter dem Name "Jugend-Rettungsvergleich" statt. Seit 1973 finden j&auml;hrlich Deutsche Meisterschaften statt, die bis 1974 "Bundesentscheid" und bis 1984 "Bundesmeisterschaften" hie&szlig;en.</p>';
		$message .= '<p>2019 wurde das Wettkampfkonzept &uuml;berarbeitet und der bisherigen DM die DEM (Deutsche Einzelstrecken-Meisterschaft) zur Seite gestellt. Zur Klarstellung der Ausrichtung der jeweiligen Wettk&auml;mpfe wurde die bisherige DM in DMM (Deutsche Mehrkampf-Meisterschaften) umbenannt.</p>';

		$message .= '<table style="border: 1px solid #0077BB; width: 99%; border-collapse: collapse;">';
		$message .= '<tr style="background-color: #0077BB; color: WHITE; border: 1px solid #0077bb;"><th style="border-left: 1px solid #0077BB; text-align: center;">Jahr</th><th style="text-align: center;">Ort</th><th colspan="4" style="text-align: center;">Ergebnisse</th><th colspan="3" style="border-right: 1px solid #0077BB; text-align: center;">Nr</th></tr>';
		$message .= $table;
		$message .= '</table>';
		
		$message .= '<p><sup>1</sup>) Vor 2007 wurde auf Deutschen Meisterschaften keine Ortsgruppenwertung durchgef&uuml;hrt.</p>';
		$message .= "<p><sup>2</sup>) Diese Wettkämpfe wurden wegen des Ausbruchs von SARS-CoV-2 (Corona) abgesagt.</p>";
		$message .= '<p>Die Daten stammen zum Teil von der Internetseite <a target="_blank" href="http://dm.dlrg-jugend.de">dm.dlrg-jugend.de</a> und den von dort verlinkten Seiten (*.dlrg-jugend.de) (31.05.2011).</p>';

		$this->body = $message;

		// Display the view
		parent::display($tpl);
	}
}
