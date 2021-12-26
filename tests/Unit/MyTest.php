<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\News;
use App\Models\Categories;

class MyTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $item = new News(new Categories);
        $this->assertIsArray($item->getNews());
    }
}
