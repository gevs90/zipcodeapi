<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetZipcodeTest extends TestCase
{
    /**
     * get a correct zipcode.
     */
    public function test_get_correct_zipcode(): void
    {
        $response = $this->get('/api/zip-codes/23088');

        $response->assertStatus(200)
            ->assertJsonFragment([
                "zip_code" => "23088",
                "locality" => "LA PAZ",
                "federal_entity" => [
                    "key" => 3,
                    "name" => "BAJA CALIFORNIA SUR",
                    "code" => null
                ],
            ]);
    }


    /**
     * get a incorrect zipcode.
     */
    public function test_get_inccorrect_zipcode(): void
    {
        $response = $this->get('/api/zip-codes/230');

        $response->assertStatus(404)
            ->assertJson([
            "zip_code" => "230",
            "message" => "<Core\\ZipCodeApi\\Domain\\ValueObjects\\CodeId>: The length of the postal codes is 5, it was obtained: 230"
            ]);
    }
}
