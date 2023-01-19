<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Tag;

class HomeTest extends TestCase
{
    use RefreshDatabase;

    //view welcome Empty
    public function testEmpty()
    {
        $this->get('/')->assertStatus(200)->assertSee('No hay Etiquetas');
    }

    public function testWithData()
    {
        $tag = Tag::factory()->create();
        
        $this->assertNotEmpty($tag->name);
        $this->get('/')->assertStatus(200)->assertSee($tag->name);
        $this->get('/')->assertStatus(200)->assertDontSee('No hay Etiquetas');
    }
}
