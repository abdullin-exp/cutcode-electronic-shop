<?php

declare(strict_types=1);

namespace App\Traits\Models;

use Illuminate\Database\Eloquent\Model;

trait HasSlug
{
    protected static int $i = 1;

    protected static function bootHasSlug()
    {
        static::creating(function(Model $item) {
            $item->slug = $item->slug
                ?? str($item->{self::slugFrom()})
                    ->append(self::suffix($item))
                    ->slug();
        });
    }

    public static function slugFrom(): string
    {
        return 'title';
    }

    public static function suffix($item): string
    {
        $count = self::query()->where(self::slugFrom(), $item->{self::slugFrom()})->count();
        if ($count > 0) {
            return '-' . self::$i++;
        }

        return '';
    }
}
