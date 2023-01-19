<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Tag;

class TagControllerTest extends TestCase
{
    use RefreshDatabase;

    //Add Tag
    public function testStore()
    {
        //$this->withoutExceptionHandling();

        $this->post('tags', ['name' => 'PHP'])->assertRedirect('/'); //Add Tag and Redirect to Welcome view

        $this->assertDatabaseHas('tags',['name' => 'PHP'] ); //Look up this Tag in the Database
    }

    //Destroy Tag
    public function testDestroy()
    {
        //$this->withoutExceptionHandling();

        //new Tag
        $tag = Tag::factory()->create();

        $this->delete("tags/$tag->id")->assertRedirect('/'); //Delete Tag and Redirect to welcome view

        $this->assertDatabaseMissing('tags',['name' => $tag->name] ); //Check that this Tag is not in the Database

    }

    //Add Tag Empty
    public function testValidateStore(){

        $this->post('tags', ['name' => ''])->assertSessionHasErrors('name'); //Valite Error with Tag Name empty
    }
}
