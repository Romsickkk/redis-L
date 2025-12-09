<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class RedisTestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'redis:go';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Post::all()->each(function ($post) {
        //     Cache::put("posts:" . $post->id, $post);
        // });

        //================================================
        // $data = [
        //     'title' => 'some title',
        //     "content" => "some content",
        //     "likes" => 2
        // ];
        // $post = Post::create($data);
        // Cache::put('posts:' . $post->id, $post);
        //================================================

        //================================================
        // $post = Post::find(1);
        // Redis::set('posts:' . $post->id, $post);
        // $post = Redis::get('posts:1');
        // dd($post);

        // Redis::lpush('names', 'Gevor', 'another_name');
        // Redis::rpush('names', 'Roma');
        // $user = ['id' => 1, 'name' => 'Gevor', 'email' => 'a@b.com'];
        // Redis::rpush('users', json_encode($user));

        // $posts = Redis::lrange("users", 0, -1);

        // dd($posts);
        //================================================

        $sqlBefore =  microtime(true);
        $sqlPosts = Post::all();
        $sqlAfter =  microtime(true);

        $redisBefore =  microtime(true);
        $redisPosts = Cache::get('posts:all');
        $redisAfter =  microtime(true);


        dd([
            "sql get time: " . $sqlAfter - $sqlBefore,
            "redis get time: " . $redisAfter - $redisBefore,
        ]);
    }
}
