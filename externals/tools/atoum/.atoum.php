<?php

/*
This file will automatically be included before EACH run.

Use it to configure atoum or anything that needs to be done before EACH run.

More information on documentation:
[en] http://docs.atoum.org/en/chapter3.html#Configuration-files
[fr] http://docs.atoum.org/fr/chapter3.html#Fichier-de-configuration
*/

use \mageekguy\atoum;

$report = $script->addDefaultReport();


//// LOGO
//
//// This will add the atoum logo before each run.
//$report->addField(new atoum\report\fields\runner\atoum\logo());
//
//// This will add a green or red logo after each run depending on its status.
//$report->addField(new atoum\report\fields\runner\result\logo());


// CODE COVERAGE SETUP

@mkdir(__DIR__ . '/../../../tests/reports/atoum/', 0777, true);

// Please replace in next line "Project Name" by your project name and "/path/to/destination/directory" by your destination directory path for html files.
$coverageField = new atoum\report\fields\runner\coverage\html('Map My Data', __DIR__ . '/../../../tests/reports/atoum/');

// Please replace in next line http://url/of/web/site by the root url of your code coverage web site.
$coverageField->setRootUrl('http://www.grummfy.be/');

$report->addField($coverageField);
