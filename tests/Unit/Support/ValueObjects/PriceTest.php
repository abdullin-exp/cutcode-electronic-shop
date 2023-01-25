<?php

declare(strict_types=1);

namespace Tests\Unit\Support\ValueObjects;

use Support\ValueObjects\Price;
use InvalidArgumentException;
use Tests\TestCase;

final class PriceTest extends TestCase
{
    /**
     * @test
     * @return void
     */
    public function it_all(): void
    {
        $price = Price::make(10000);

        $this->assertInstanceOf(Price::class, $price);
        $this->assertEquals(100, $price->value());
        $this->assertEquals(10000, $price->raw());
        $this->assertEquals('RUB', $price->currency());
        $this->assertEquals('₽', $price->symbol());
//        $this->assertEquals('100 ₽', $price); ошибка тут, нужно вернуться

        $this->expectException(InvalidArgumentException::class);

        Price::make(-10000);
        Price::make(10000, 'USD');
    }
}