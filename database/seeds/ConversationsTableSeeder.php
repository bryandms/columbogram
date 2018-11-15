<?php

use Illuminate\Database\Seeder;
use App\Conversation;

class ConversationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Conversation::create([
            'last_message' => null,
            'last_time' => null,
            'user_id' => 1,
            'contact_id' => 2
        ]);

        Conversation::create([
            'last_message' => null,
            'last_time' => null,
            'user_id' => 1,
            'contact_id' => 3
        ]);

        Conversation::create([
            'last_message' => null,
            'last_time' => null,
            'user_id' => 2,
            'contact_id' => 1
        ]);

        Conversation::create([
            'last_message' => null,
            'last_time' => null,
            'user_id' => 3,
            'contact_id' => 1
        ]);
    }
}
