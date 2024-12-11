<?php

namespace PHPStan\Type;

enum AccessOffsetMode
{
	case Exist;
	case Read;
	case Write;
	case ReadWrite;
	case Unset;
	case Append;
	case IncrementDecrement;
	case Fetch; // By reference fetch
}
