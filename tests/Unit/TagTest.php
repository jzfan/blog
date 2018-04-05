<?php

namespace Tests\Unit;

use App\Paragraph;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TagTest extends TestCase
{

    public function setUp()
    {
        parent::setUp();
        $this->tag = factory('App\Tag')->create();
        factory('App\Paragraph', 2)->create()->each( function ($p) {
            $p->tags()->attach($this->tag->id);
        });
    }

    /** @test */
    public function it_with_paragraph_counts()
    {
        $this->assertEquals(2, $this->tag->fresh()->paragraphs_count);
    }
    
    /** @test */
    public function it_delete_with_pivot()
    {
        $p = Paragraph::first();
        $this->assertCount(1, $p->tags);

        $this->tag->delete();
        $this->assertCount(0, $p->fresh()->tags);
    }
}
