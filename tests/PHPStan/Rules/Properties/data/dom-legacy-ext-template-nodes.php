<?php

use function PHPStan\Testing\assertType;

function basic_node(\DOMNode $node): void {
	if ($node->hasAttributes()) {
		assertType(DOMNamedNodeMap::class . '<' . DOMAttr::class . '>', $node->attributes);
	} else {
		assertType('null', $node->attributes);
	}
}

function element_node(\DOMElement $element): void
{
	if ($element->hasAttribute('class')) {
		assertType(DOMNamedNodeMap::class . '<' . DOMAttr::class . '>', $element->attributes);
		$attribute = $element->getAttributeNode('class');
		assertType(DOMAttr::class, $attribute);
		assertType('string', $attribute->value);
	} else {
		assertType('DOMNamedNodeMap::class . '<' . DOMAttr::class . '>'|null', $element->attributes);
	}
}

function element_node_attribute_fetch_via_attributes_property(\DOMElement $element): void
{
	if ($element->hasAttribute('class')) {
		assertType(DOMNamedNodeMap::class . '<' . DOMAttr::class . '>', $element->attributes);
		$attribute = $element->attributes->getNamedItem('class');
		if ($attribute === null) {
			return;
		}
		assertType(DOMAttr::class, $attribute);
		assertType('string', $attribute->value);
	} else {
		assertType('DOMNamedNodeMap::class . '<' . DOMAttr::class . '>'|null', $element->attributes);
	}
}
