<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package   Attendance
 * @author    Sebastian Buck
 * @license   LGPL
 * @copyright Sebastian Buck 2014
 */


/**
 * Übersetzungen für die Eingabemaske der Charts 
 */ 
 
$GLOBALS['TL_LANG']['tl_gpcharts']['chartTypes'] = array(
	"line"     =>"Linie",
	"column"   =>"Säulen",
	"bar"     =>"Balken",
	"histogram"    =>"Histogramm",
	"area"       =>"Flächen",
	"SteppedArea"       =>"Stufen",
	"pie"    =>"Kreis",
	"bubble"    =>"Bubble",
	"donut"    =>"Donut"
);

$GLOBALS['TL_LANG']['tl_gpcharts']['legend_positions'] = array(
	"none"=>"Nicht anzeigen",
	"bottom"=>"Unten",
	"top"=>"Oben",
	"right"=>"Rechts",
	"left"=>"Links",
	"in"=>"Innerhalb"
);

$GLOBALS['TL_LANG']['tl_gpcharts']['pointShapes'] = array(
	"circle"     =>"Kreis",
	"triangle"   =>"Dreieck",
	"square"     =>"Quadrat",
	"diamond"    =>"Diamant",
	"star"       =>"Stern",
	"polygon"    =>"Polygon"
);

$GLOBALS['TL_LANG']['tl_gpcharts']['vAxis_formats'] = array(
	"none"     =>"Ohne",
	"decimal"   =>"Dezimal",
	"scientific"     =>"Wisssenschaftlich",
	"currency"    =>"Währung",
	"percent"       =>"Prozent",
	"short"    =>"Kurz",
	"long"    =>"Lang"
);

// Operationen
$GLOBALS['TL_LANG']['tl_gpcharts']['new'][0] = 'Neuer Chart';
$GLOBALS['TL_LANG']['tl_gpcharts']['new'][1] = 'Einen neuen Chart anlegen';

$GLOBALS['TL_LANG']['tl_gpcharts']['edit'][0] = 'Chart bearbeiten';
$GLOBALS['TL_LANG']['tl_gpcharts']['edit'][1] = 'Chart ID %s bearbeiten';
 
$GLOBALS['TL_LANG']['tl_gpcharts']['delete'][0] = 'Chart löschen';
$GLOBALS['TL_LANG']['tl_gpcharts']['delete'][1] = 'Chart ID %s löschen';
 
$GLOBALS['TL_LANG']['tl_gpcharts']['show'][0] = 'Chart-Details';
$GLOBALS['TL_LANG']['tl_gpcharts']['show'][1] = 'Details des Chart ID %s anzeigen';


// Legends
$GLOBALS['TL_LANG']['tl_gpcharts']['title_legend'] = 'Titel und Überschrift';
$GLOBALS['TL_LANG']['tl_gpcharts']['data_legend'] = 'Daten';
$GLOBALS['TL_LANG']['tl_gpcharts']['type_legend'] = 'Chart Typ';
$GLOBALS['TL_LANG']['tl_gpcharts']['lineFormatting_legend'] = 'Linien Darstellung';
$GLOBALS['TL_LANG']['tl_gpcharts']['dimensions_legend'] = 'Abmessungen';
$GLOBALS['TL_LANG']['tl_gpcharts']['chartarea_legend'] = 'Diagrammbereich';
$GLOBALS['TL_LANG']['tl_gpcharts']['vAxis_legend'] = 'Y-Achse';
$GLOBALS['TL_LANG']['tl_gpcharts']['hAxis_legend'] = 'X-Achse';
$GLOBALS['TL_LANG']['tl_gpcharts']['legend_legend'] = 'Legende';
$GLOBALS['TL_LANG']['tl_gpcharts']['background_legend'] = 'Hintergrund';
$GLOBALS['TL_LANG']['tl_gpcharts']['label_legend'] = 'Achsen-Beschriftung';
$GLOBALS['TL_LANG']['tl_gpcharts']['general_legend'] = 'Allgemeine Einstellungen';


// Felder 
$GLOBALS['TL_LANG']['tl_gpcharts']['title'] = array('Name', 'Geben Sie hier den Titel des Charts ein.');
$GLOBALS['TL_LANG']['tl_gpcharts']['subtitle'] = array('Untertitel', 'Geben Sie hier den Untertitel des Charts ein.');

$GLOBALS['TL_LANG']['tl_gpcharts']['data'] = array('Daten', 'Geben Sie hier die Werte des Charts ein.');
$GLOBALS['TL_LANG']['tl_gpcharts']['chartType'] = array('Chart Typ', 'Wählen Sie den Typ des Charts.');


$GLOBALS['TL_LANG']['tl_gpcharts']['useSeries'] = array('Formatierung einzelner Linien verändern', 'Fügen Sie individuelle Linien-Darstellungen hinzu');
$GLOBALS['TL_LANG']['tl_gpcharts']['series'] = array('Linien', 'Geben Sie hier die Formatierungs-Werte für die Linien ein.');
$GLOBALS['TL_LANG']['tl_gpcharts']['seriesValue']['labelInLegend'] = array('Titel', 'Geben Sie hier den Titel ein, unter dem die Linie in der Legende erscheint.');
$GLOBALS['TL_LANG']['tl_gpcharts']['seriesValue']['visibleInLegend'] = array('Zeigen', 'Wählen Sie ob die Linie in der Legende angezeigt wird.');
$GLOBALS['TL_LANG']['tl_gpcharts']['seriesValue']['lineWidth'] = 'Linienstärke';
$GLOBALS['TL_LANG']['tl_gpcharts']['seriesValue']['color'] = 'Farbe';
$GLOBALS['TL_LANG']['tl_gpcharts']['seriesValue']['pointShape'] = 'Punkt-Form';
$GLOBALS['TL_LANG']['tl_gpcharts']['seriesValue']['pointSize'] = 'Punkt-Größe';

$GLOBALS['TL_LANG']['tl_gpcharts']['height'] = array('Höhe', 'Hier bitte die Chart Höhe ohne "px" eintragen. (z.B. 500)');
$GLOBALS['TL_LANG']['tl_gpcharts']['width'] = array('Breite', 'Hier bitte die Chart Breite ohne "px" eintragen. (z.B. 500)');

$GLOBALS['TL_LANG']['tl_gpcharts']['chartArea'] = array('Diagrammbereich verändern', 'Konfigurieren Sie die Platzierung und Größe des Diagrammbereichs (wo das Diagramm selbst gezeichnet wird, ausgenommen Achsen und Legenden)');
$GLOBALS['TL_LANG']['tl_gpcharts']['chartArea_left'] = array('Rand links', 'Wie weit soll das Diagramm vom linken Rand entfernt werden?');
$GLOBALS['TL_LANG']['tl_gpcharts']['chartArea_top'] = array('Rand oben', 'Wie weit soll das Diagramm vom oberen Rand entfernt werden?');
$GLOBALS['TL_LANG']['tl_gpcharts']['chartArea_width'] = array('Breite', 'Wie breit soll der Diagrammbereich werden?');
$GLOBALS['TL_LANG']['tl_gpcharts']['chartArea_height'] = array('Höhe', 'Wie hoch soll der Diagrammbereich werden?');
$GLOBALS['TL_LANG']['tl_gpcharts']['chartArea_backgroundColor'] = array('Hintergrundfarbe', 'Bitte geben Sie die Hintergrundfarbe des Diagrammbereichs ein.');


$GLOBALS['TL_LANG']['tl_gpcharts']['vAxis'] = array('Y-Achse verändern', 'Konfigurieren Sie die Y-Achse.');
$GLOBALS['TL_LANG']['tl_gpcharts']['vAxis_format'] = array('Format', 'Wählen sie die Formatierung der Y-Achse-Werte.');
$GLOBALS['TL_LANG']['tl_gpcharts']['vAxis_formatCustom'] = array('Eigenes Format', 'Geben Sie hier eine eigene Formatierung der Y-Achse-Werte ein (Z.B.: "#,### %" für "3.500 %"). Diese Eingabe überschreibt die unter "Format" gewählte Formatierung.');
$GLOBALS['TL_LANG']['tl_gpcharts']['vAxis_textStyle'] = array('Text-Formatierung verändern', 'Formatieren Sie den Text der Y-Achse.');
$GLOBALS['TL_LANG']['tl_gpcharts']['vAxis_textStyle_color'] = array('Schriftfarbe', 'Geben Sie hier die Farbe des Texts der Y-Achse ein.');
$GLOBALS['TL_LANG']['tl_gpcharts']['vAxis_gridlines_count'] = array('Anzahl der Rasterlinien', 'Geben Sie hier die Anzahl der Rasterlinien.');
$GLOBALS['TL_LANG']['tl_gpcharts']['vAxis_viewWindow_min'] = array('Minimaler vertikaler Datenwert', 'Geben Sie hier den minimalen vertikalen Datenwert ein, der angezeigt werden soll.');
$GLOBALS['TL_LANG']['tl_gpcharts']['vAxis_viewWindow_max'] = array('Maximaler vertikaler Datenwert', 'Geben Sie hier den maximalen vertikalen Datenwert ein, der angezeigt werden soll.');
// $GLOBALS['TL_LANG']['tl_gpcharts']['vAxis_maxValue'] = array('Minimaler vertikaler Datenwert', 'Verschiebt den Maximalwert der vertikalen Achse auf den angegebenen Wert. Dies wird in den meisten Charts aufwärts sein.');

$GLOBALS['TL_LANG']['tl_gpcharts']['hAxis'] = array('X-Achse verändern', 'Konfigurieren Sie die X-Achse.');
$GLOBALS['TL_LANG']['tl_gpcharts']['hAxis_slantedText'] = array('45 Grad Winkel', 'Text der horizontalen Achse im 45 Grad Winkel anzeigen.');
$GLOBALS['TL_LANG']['tl_gpcharts']['hAxis_textStyle'] = array('Text-Formatierung verändern', 'Formatieren Sie den Text der X-Achse.');
$GLOBALS['TL_LANG']['tl_gpcharts']['hAxis_textStyle_color'] = array('Schriftfarbe', 'Geben Sie hier die Farbe des Texts der X-Achse ein.');

$GLOBALS['TL_LANG']['tl_gpcharts']['legend'] = array('Legende verändern', 'Konfigurieren Sie die Legende.');
$GLOBALS['TL_LANG']['tl_gpcharts']['legend_position'] = array('Position', 'Wählen Sie die Position der Legende.');



$GLOBALS['TL_LANG']['tl_gpcharts']['name_x'] = array('Beschriftung der X Achse', 'Hier bitte die Chart Bezeichnung der X Achse angeben.');
$GLOBALS['TL_LANG']['tl_gpcharts']['name_y'] = array('Beschriftung der Y Achse', 'Hier bitte die Chart Bezeichnung der Y Achse angeben.');

$GLOBALS['TL_LANG']['tl_gpcharts']['fontSize'] = array('Standardschriftgröße', 'Die Standardschriftgröße des gesamten Textes im Diagramm.');
$GLOBALS['TL_LANG']['tl_gpcharts']['colors'] = array('Linienfarbe', 'Geben Sie hier die Farbe der den Chart-Linie ein.');
$GLOBALS['TL_LANG']['tl_gpcharts']['pointShape'] = array('Punkt-Form', 'Wählen Sie hier die Form der Daten-Punkte.');
$GLOBALS['TL_LANG']['tl_gpcharts']['pointSize'] = array('Punkt-Größe', 'Geben Sie hier die Größe der Daten-Punkte ein.');
$GLOBALS['TL_LANG']['tl_gpcharts']['lineWidth'] = array('Stärke der Datenlinie', 'Verwenden Sie Null, um alle Zeilen auszublenden und nur die Punkte anzuzeigen');
$GLOBALS['TL_LANG']['tl_gpcharts']['textcolor'] = array('Textfarbe', 'Geben Sie hier die Farbe des Texts ein.');

$GLOBALS['TL_LANG']['tl_gpcharts']['backgroundColor'] = array('Hintergrund verändern', 'Konfigurieren Sie den Hintergrund des Diagramms');
$GLOBALS['TL_LANG']['tl_gpcharts']['backgroundColor_fill'] = array('Farbe des Hintergrunds', 'Geben Sie die Farbe des Hintergrunds ein');
$GLOBALS['TL_LANG']['tl_gpcharts']['backgroundColor_stroke'] = array('Farbe der Hintergrund-Kontur', 'Geben Sie die Farbe der Hintergrund-Kontur ein');
$GLOBALS['TL_LANG']['tl_gpcharts']['backgroundColor_strokeWidth'] = array('Breite der Hintergrund-Kontur', 'Geben Sie die Breite der Hintergrund-Kontur ein');


























$GLOBALS['TL_LANG']['tl_gpcharts']['textcolor'] = array('Textfarbe', 'Hier sollten Sie Schriftfarbe Festlegen z.B für die Farbe dunkelgrau 333333');