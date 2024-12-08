<?php

declare(strict_types = 1);

namespace DOMLegacyNamedNodeMap;

use DOMAttr;
use DOMElement;
use DOMNode;
use DOMNamedNodeMap;
use function PHPStan\Testing\assertType;

class Foo
{
	public function basic_node(DOMNode $node): void {
		if ($node->hasAttributes()) {
			assertType('DOMNamedNodeMap<DOMAttr>', $node->attributes);
		} else {
			assertType('null', $node->attributes);
		}
	}

	public function element_node(DOMElement $element): void
	{
		if ($element->hasAttribute('class')) {
			assertType('DOMNamedNodeMap<DOMAttr>', $element->attributes);
			$attribute = $element->getAttributeNode('class');
			assertType(DOMAttr::class, $attribute);
			assertType('string', $attribute->value);
		} else {
			assertType('DOMNamedNodeMap<DOMAttr>|null', $element->attributes);
		}
	}

	public function element_node_attribute_fetch_via_attributes_property(DOMElement $element): void
	{
		if ($element->hasAttribute('class')) {
			assertType('DOMNamedNodeMap<DOMAttr>', $element->attributes);
			$attribute = $element->attributes->getNamedItem('class');
			if ($attribute === null) {
				return;
			}
			assertType(DOMAttr::class, $attribute);
			assertType('string', $attribute->value);
		} else {
			assertType('DOMNamedNodeMap<DOMAttr>|null', $element->attributes);
		}
	}
}
