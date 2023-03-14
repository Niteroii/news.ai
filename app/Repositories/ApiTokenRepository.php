<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\ApiToken;
use Cornatul\Marketing\Base\Repositories\BaseTenantRepository;

class ApiTokenRepository extends BaseTenantRepository
{
    /** @var string */
    protected $modelName = ApiToken::class;
}
