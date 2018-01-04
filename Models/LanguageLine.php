<?php

namespace Zix\Core\Models;

use Zix\Core\Models\BaseModel;
use Spatie\TranslationLoader\LanguageLine as SpatieLanguageLine;

/**
 * Class LanguageLine
 * @package Zix\Core\Models
 */
class LanguageLine extends SpatieLanguageLine
{
    /**
     * @var array
     */
    protected $fillable = [];
}
