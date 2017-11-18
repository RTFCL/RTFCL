<?php

declare(strict_types=1);

namespace PHPML\Distance\Calculator\Exception;

use PHPML\Exception\PHPMLException;

/**
 * If two sets has no common parameters to calculate distance
 */
class NoCommonParametersException extends PHPMLException
{

}