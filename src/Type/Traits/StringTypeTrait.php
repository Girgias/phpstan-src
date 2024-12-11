<?php declare(strict_types = 1);

namespace PHPStan\Type\Traits;

use PHPStan\TrinaryLogic;
use PHPStan\Type\AccessOffsetMode;

trait StringTypeTrait
{
	public function isOffsetAccessLegal(AccessOffsetMode $mode): TrinaryLogic
	{
		return match ($mode) {
			AccessOffsetMode::Exist, AccessOffsetMode::Read, AccessOffsetMode::Write => TrinaryLogic::createYes(),
			default => TrinaryLogic::createNo(),
		};
	}

}
