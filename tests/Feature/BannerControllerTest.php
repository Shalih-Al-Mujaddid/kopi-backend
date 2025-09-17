<?php

namespace Tests\Feature;

use App\Models\Banner;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BannerControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_all_banners()
    {
        Banner::factory()->count(3)->create();

        $response = $this->getJson('/api/banners');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'message',
                'data' => [
                    '*' => ['id', 'title', 'subtitle', 'image', 'link', 'is_active', 'created_at', 'updated_at']
                ]
            ]);
    }

    /** @test */
    public function it_can_create_a_banner()
    {
        $bannerData = [
            'title' => 'Test Banner',
            'subtitle' => 'Test Subtitle',
            'image' => 'test-image.jpg',
            'link' => 'https://example.com',
            'is_active' => true
        ];

        $response = $this->postJson('/api/banners', $bannerData);

        $response->assertStatus(201)
            ->assertJson([
                'message' => 'Banner created successfully',
                'data' => $bannerData
            ]);

        $this->assertDatabaseHas('banners', $bannerData);
    }

    /** @test */
    public function it_validates_required_fields_when_creating_banner()
    {
        $response = $this->postJson('/api/banners', []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['title', 'image']);
    }

    /** @test */
    public function it_can_show_a_specific_banner()
    {
        $banner = Banner::factory()->create();

        $response = $this->getJson("/api/banners/{$banner->id}");

        $response->assertStatus(200)
            ->assertJson([
                'message' => 'Banner retrieved successfully',
                'data' => $banner->toArray()
            ]);
    }

    /** @test */
    public function it_can_update_a_banner()
    {
        $banner = Banner::factory()->create();

        $updateData = [
            'title' => 'Updated Title',
            'subtitle' => 'Updated Subtitle',
            'is_active' => false
        ];

        $response = $this->putJson("/api/banners/{$banner->id}", $updateData);

        $response->assertStatus(200)
            ->assertJson([
                'message' => 'Banner updated successfully',
                'data' => array_merge($banner->toArray(), $updateData)
            ]);

        $this->assertDatabaseHas('banners', $updateData);
    }

    /** @test */
    public function it_can_delete_a_banner()
    {
        $banner = Banner::factory()->create();

        $response = $this->deleteJson("/api/banners/{$banner->id}");

        $response->assertStatus(204);

        $this->assertDatabaseMissing('banners', ['id' => $banner->id]);
    }
}
