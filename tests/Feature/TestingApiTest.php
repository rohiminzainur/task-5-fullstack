<?php

namespace Tests\Feature;

use App\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Category;
use App\User;
use SebastianBergmann\Type\VoidType;

class TestingApiTest extends TestCase
{
    use WithFaker;
    // use RefreshDatabase;

    protected $user;
    protected $category;
    public function setUp(): void
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
        $this->category = factory(Category::class)->create();

        $this->actingAs($this->user, 'api');
        $this->actingAs($this->category, 'api');
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateArticle()
    {

        $formData = [
            'title' => 'Python',
            'content' => 'Python adalah bahasa pemrograman prosedural yang dibuat di Google menggunakan bahasa pemrograman C oleh Robert Griesemer, Rob Pike dan Ken Thompson pada tahun 2007 dan dirilis sebagai bahasa pemrograman open source pada tahun 2009. Golang mulai populer sejak digunakan untuk membuat Docker pada tahun 2011.',
            'image' => 'golang.jpg',
            'users_id' => 8,
            'categories_id' => 6
        ];


        $this->json('POST', route('article.store'), $formData)
            ->assertStatus(200)
            ->assertJson(['data' => $formData]);
    }
    public function testUpdateArticle()
    {
        $article = factory(Article::class)->make();
        $this->user->articles()->save($article);
        $this->category->articles()->save($article);

        $updatedData = [
            'id' => 3,
            'title' => 'Javascript',
            'content' => 'Javascript adalah bahasa pemrograman prosedural yang dibuat di Google menggunakan bahasa pemrograman C oleh Robert Griesemer, Rob Pike dan Ken Thompson pada tahun 2007 dan dirilis sebagai bahasa pemrograman open source pada tahun 2009. Golang mulai populer sejak digunakan untuk membuat Docker pada tahun 2011.',
            'image' => 'javascript.jpg',
            'users_id' => 7,
            'categories_id' => 4
        ];

        $this->json('POST', route('article.update', $article->id), $updatedData)
            ->assertStatus(200)
            ->assertJson(['data' => $updatedData]);
    }

    public function testShowArticle()
    {
        $article = factory(Article::class)->make();
        $this->user->articles()->save($article);
        $this->category->articles()->save($article);
        $this->get(route('article.show', $article->id))->assertStatus(200);
    }
    public function testDeleteArticle()
    {
        $article = factory(Article::class)->make();
        $this->user->articles()->save($article);
        $this->category->articles()->save($article);
        $this->delete(route('article.delete', $article->id))->assertStatus(405);
    }

    public function testListArticle()
    {
        $article = factory(Article::class)->make();

        $this->user->articles()->save($article);

        $this->get(route('article.index'))
            ->assertStatus(200);
    }
}