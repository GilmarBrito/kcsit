<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CustomerControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testStore()
    {
        $customers = DB::table('customers')
        ->join('accounts', 'customers.id', '=', 'accounts.customer_id')
        ->select('customers.*', 'accounts.current_balance', 'accounts.bonus')
        ->get();

        return view('customers.index', compact('customers'));
        
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
