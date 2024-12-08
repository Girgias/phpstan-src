<?php

use function PHPStan\Testing\assertType;

function (\DOMNode $node): void {
	assertType(DOMNamedNodeMap::class . '<' . DOMAttr::class . '>', $node->attributes);
};

function parse(\DOMElement $node): void
{
	assertType(DOMNamedNodeMap::class . '<' . DOMAttr::class . '>', $node->attributes);
	$attribute = $node->attributes->getNamedItem('class');
	if ($attribute === null) {
		return;
	}
	assertType(DOMAttr::class, $attribute);
	assertType('string', $attribute->value);
}
