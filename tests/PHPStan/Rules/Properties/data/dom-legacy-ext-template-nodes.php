<?php

use function PHPStan\Testing\assertType;

function basic_node(\DOMNode $node): void {
	if ($node->hasAttributes()) {
		assertType(DOMNamedNodeMap::class . '<' . DOMAttr::class . '>', $node->attributes);
	} else {
		assertType('null', $node->attributes);
	}
};
