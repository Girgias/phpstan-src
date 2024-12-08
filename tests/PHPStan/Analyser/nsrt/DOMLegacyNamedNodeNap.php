<?php

declare(strict_types = 1);

namespace DOMLegacyNamedNodeMap;

use DOMAttr;
use DOMNode;
use DOMNamedNodeMap;
use function PHPStan\Testing\assertType;

class Foo
{
	public function checkAttributes(DOMNode $node): void {
		assertType('DOMNamedNodeMap<DOMAttr>', $node->attributes);
		if ($node->hasAttribute('attr')) {
			assertType('DOMAttr', $node->attributes->getNamedItem('attr'));
		} else {
			assertType('null', $node->attributes->getNamedItem('attr'));
		}
	}
}
