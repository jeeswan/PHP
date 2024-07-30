<?php
$doc = new DOMDocument();
$doc->load("product.xml");
if (!$doc->schemaValidate('product_schema.xsd')) {
    echo "Invalid xml document";
    exit;
}
header('Content-Type: application/xml');
echo $doc->saveXML();