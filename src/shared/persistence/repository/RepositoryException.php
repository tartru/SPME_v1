<?php
/**
 * RepositoryException
 * 
 * Repository exceptions
 * 
 * @author Arturo Ruvalcaba, <arturo.ruvalcaba@conafor.gob.mx>
 * @version 1.0
 */

declare(strict_types=1);

namespace SPME\Shared\Persistence\Repository;

use Exception;
use RuntimeException;


class RepositoryException extends RuntimeException {}