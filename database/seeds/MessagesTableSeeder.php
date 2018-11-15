<?php

use Illuminate\Database\Seeder;
use App\Message;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Message::create([
            'from_id' => 1,
            'to_id' => 2,
            'content' => 'Hi, what do you think about Columbogram?' 
        ]);

        Message::create([
            'from_id' => 2,
            'to_id' => 1,
            'content' => 'It\'s amazing' 
        ]);

        Message::create([
            'from_id' => 1,
            'to_id' => 3,
            'content' => 'Hi, Columbrogram is excellent right?' 
        ]);

        Message::create([
            'from_id' => 3,
            'to_id' => 1,
            'content' => 'Hello Bryan, it\'s more than excellent' 
        ]);
    }
}
