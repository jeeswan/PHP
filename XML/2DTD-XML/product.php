<?php
$doc = new DOMDocument();
$doc->load("product.xml");
if (!$doc->validate()) {
    echo "Invalid xml document";
    exit;
}

header('Content-Type: application/xml');
echo $doc->saveXML();