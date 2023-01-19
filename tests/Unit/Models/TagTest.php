<?php

namespace Tests\Unit\Models;

use PHPUnit\Framework\TestCase;
use App\Models\Tag;

class TagTest extends TestCase
{
    public function testSlug()
    {
        $tag = new Tag;
        $tag->name = 'Proyecto Testing';

        

        $this->assertEquals('proyecto-testing', $tag->slug);
    }
}
