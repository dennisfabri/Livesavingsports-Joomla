<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  DLRGRettungssport
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class dlrgrettungssportViewdsm extends JViewLegacy
{
	function display($tpl = null)
	{
		// Assign data to the view
		$this->title = 'Ergebnisse der Deutschen Seniorenmeisterschaften im Rettungssport';
		
		$table = '';
		
        $values = array(
			array(1988, "Rheda-Wiedenbr&uuml;ck", "http://rheda-wiedenbrueck.dlrg.de/"),
			array(1989, "Bietigheim-Bissingen", "http://bietigheim-bissingen.dlrg.de/"),
			array(1990, "Helmstedt", "http://helmstedt.dlrg.de/"),
			array(1991, "Wetzlar", "http://www.dlrg-wetzlar.de/"),
			array(1992, "Gelsenkirchen", "http://www.ge-rettet.de/"),
			array(1993, "Memmingen", "http://memmingen.dlrg.de/"),
			array(1994, "Gladbeck", "http://gladbeck.dlrg.de/"),
			array(1995, "Bietigheim-Bissingen", "http://bietigheim-bissingen.dlrg.de/"),
			array(1996, "Rendsburg", "http://rendsburg.dlrg.de/"),
			array(1997, "Gladbeck", "http://gladbeck.dlrg.de/"),
			array(1998, "Pfullingen", "http://pfullingen.dlrg.de/"),
			array(1999, "Helmstedt", "http://helmstedt.dlrg.de/"),
			array(2000, "Georgsmarienh&uuml;tte", "http://georgsmarienhuette.dlrg.de/"),
			array(2001, "Pfullingen", "http://pfullingen.dlrg.de/"),
			array(2002, "V&ouml;lklingen/Saar", "http://voelklingen.dlrg.de/"),
			array(2003, "Bayreuth", "http://bayreuth.dlrg.de/"),
			array(2004, "Rheda-Wiedenbr&uuml;ck", "http://rheda-wiedenbrueck.dlrg.de/"),
			array(2005, "L&uuml;beck-Travem&uuml;nde (EM)", NULL),
			array(2006, "Duderstadt / Eichsfeld", "http://eichsfeld.dlrg.de/"),
			array(2007, "Bietigheim-Bissingen", "http://bietigheim-bissingen.dlrg.de/"),
			array(2008, "Weener", "http://weener.dlrg.de/"),
			array(2009, "Anklam", "http://anklam.dlrg.de/"),
			array(2010, "Harsewinkel", "http://harsewinkel.dlrg.de/"),
			array(2011, "Geislingen", "http://geislingen.dlrg.de/"),
            array(2012, "Bielefeld-Sennestadt", "http://senne.dlrg.de/"),
            array(2013, "Stuttgart", "http://bez-stuttgart.dlrg.de/"),
            array(2014, "Berlin Charlottenburg-Wilmersdorf", "http://charlottenburg-wilmersdorf.dlrg.de/"),
            array(2015, "Georgsmarienh&uuml;tte", "http://georgsmarienhuette.dlrg.de/"),
            array(2016, "Luckenwalde", "http://luckenwalde.dlrg.de/"),
            array(2017, "Andernach", "http://dlrg-andernach.de/?site=dsm"),
            array(2018, "Harsewinkel", "https://harsewinkel.dlrg.de/dsm-2018.html"),
            array(2019, "Sulzbach", "https://sulzbach.dlrg.de/"),
            array(2020, "-<sup>1</sup>", ""),
		);

        for ($x = count($values) - 1; $x >= 0; $x--) {
	      $value = $values[$x];
	      $einzel = "-";
	      $mannschaft = "-";
	      $gesamt = "-";
	
	      $og = $value[1];
	      if ($value[2] != NULL) {
		    $og = "<a target=\"_blank\" href=\"$value[2]\">$og</a>";
	      }
	
	      $name = "../ergebnisse/dsm/DSM_$value[0]_Ergebnis_Einzel.pdf";
	      if (file_exists($name)) {
		    $einzel = "<a href=\"$name\">Einzel</a>";
	      }
	      $name = "../ergebnisse/dsm/DSM_$value[0]_Ergebnis_Mannschaft.pdf";
	      if (file_exists($name)) {
		    $mannschaft = "<a href=\"$name\">Mannschaft</a>";
	      }
	      $name = "../ergebnisse/dsm/DSM_$value[0]_Gesamtwertung.pdf";
	      if (file_exists($name)) {
		    $gesamt = "<a href=\"$name\">OG-Wertung</a>";
	      }
	      $table .= "<tr><td style=\"text-align: center; margin-right: 0.2em;\">$value[0]</td><td>$og</td><td style=\"text-align: center; margin-right: 0.2em;\">$einzel</td><td style=\"text-align: center; margin-right: 0.2em;\">$mannschaft</td><td style=\"text-align: center; margin-right: 0.2em;\">$gesamt</td></tr>";
        }
		
		$path = realpath (".");
		
		$message = '<p>Die Deutschen Seniorenmeisterschaften der DLRG werden unabh&auml;ngig von den Deutschen Meisterschaften ausgetragen und stellen einen der ersten H&ouml;hepunkte in jedem Wettkampfjahr dar.</p>';
		$message .= '<table style="border: 1px solid #0077BB; width: 99%;">';
		$message .= '<tr style="background-color: #0077BB; color: WHITE;"><th style="text-align: center;">Jahr</th><th style="text-align: center;">Ort</th><th colspan="3" style="text-align: center;">Ergebnisse</th></tr>';
		$message .= $table;
		$message .= '</table>';
		$message .= "<p><sup>1</sup>) Diese Wettkämpfe wurden wegen des Ausbruchs von SARS-CoV-2 (Corona) abgesagt.</p>";
		$message .= '<p style="text-align: right;"><a href="mailto:info@dennisfabri.de">Fehler melden</a></p>';
		$message .= '<p>Die Daten stammen zum Teil von der Internetseite <a target="_blank" href="http://www.rettungssport.com/home/specials/specials-anzeigen/article/dsm-alle-infos.html">rettungssport.com</a> (05.06.2009).</p>';

		$this->body = $message;

		// Display the view
		parent::display($tpl);
	}
}
