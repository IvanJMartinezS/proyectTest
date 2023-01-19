<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Tag;

class HomeTest extends TestCase
{
    use RefreshDatabase;

    //view welcome Empty (No Tags)
    public function testEmpty()
    {
        $this->get('/')->assertStatus(200)->assertSee('No hay Etiquetas'); //Request ok and see this (if there are no Tags)
    }

    //view Welcome and See Tags
    public function testWithData()
    {
        //New Tag
        $tag = Tag::factory()->create();
        
        $this->assertNotEmpty($tag->name); //Not Empty
        $this->get('/')->assertStatus(200)->assertSee($tag->name); //Request ok and See Tag
        $this->get('/')->assertStatus(200)->assertDontSee('No hay Etiquetas'); //Request ok and not see this
    }
}
