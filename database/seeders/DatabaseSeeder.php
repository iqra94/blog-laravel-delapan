<?php

namespace Database\Seeders;

use App\Models\Unpas\UnpasPost;
use App\Models\Unpas\UnpasCategory;
use App\Models\Unpas\UnpasUser;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        UnpasUser::create([
            'name'=>'Kira Yamato',
            'username' => 'kira',
            'email'=>'kira@gmail.com',
            'password'=>bcrypt('12345'),
        ]);
        // UnpasUser::create([
        //     'name'=>'Athrun Zala',
        //     'email'=>'athrun@gmail.com',
        //     'password'=>bcrypt('12345'),
        // ]);
        UnpasUser::factory(3)->create();
        UnpasPost::factory(15)->create();

        UnpasCategory::create([
            'name'=>'Web Desain',
            'slug'=>'web-desain',
        ]);
        UnpasCategory::create([
            'name'=>'Web Programming',
            'slug'=>'web-programming',
        ]);
        UnpasCategory::create([
            'name'=>'Personal',
            'slug'=>'personal',
        ]);

        // UnpasPost::create([
        //     'title'=> 'Judul pertama',
        //     'unpas_category_id'=> 1,
        //     'unpas_user_id'=> 1,
        //     'slug'=> 'judul-pertama',
        //     'excerpt'=> 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Numquam, exercitationem aliquam.',
        //     'body'=> '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Numquam, exercitationem aliquam. Maxime eligendi placeat nostrum at delectus repellat ab temporibus minus dicta eos magni adipisci, est harum, blanditiis veritatis eveniet distinctio molestiae ipsum amet, modi nulla explicabo. Nulla exercitationem, molestiae ab a molestias pariatur. Magni, accusamus nulla.</p><p> Aut facere culpa cupiditate fuga? Esse quibusdam molestias ipsa aperiam minus inventore animi hic totam minima eos autem, officiis veniam tempora architecto delectus repellat eum, placeat in libero. Itaque ab impedit atque eveniet doloremque, ipsa quos maiores dignissimos nulla eius? Voluptas, exercitationem nostrum, labore nam eius error explicabo, quos repudiandae voluptatibus molestias dolore reprehenderit impedit atque nobis accusamus.</p><p> Aliquam commodi provident dicta beatae molestias in eligendi sequi eum rerum, perspiciatis similique numquam sit harum dolore impedit totam, soluta esse fuga accusantium maxime quas laborum nobis at. Officia libero veniam a exercitationem voluptas aliquid repellendus natus, pariatur sequi ducimus laboriosam vitae tempora, ipsa quasi?</p>'
        // ]);
        // UnpasPost::create([
        //     'title'=> 'Judul kedua',
        //     'unpas_category_id'=> 1,
        //     'unpas_user_id'=> 1,
        //     'slug'=> 'judul-kedua',
        //     'excerpt'=> 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Numquam, exercitationem aliquam.',
        //     'body'=> '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Numquam, exercitationem aliquam. Maxime eligendi placeat nostrum at delectus repellat ab temporibus minus dicta eos magni adipisci, est harum, blanditiis veritatis eveniet distinctio molestiae ipsum amet, modi nulla explicabo. Nulla exercitationem, molestiae ab a molestias pariatur. Magni, accusamus nulla.</p><p> Aut facere culpa cupiditate fuga? Esse quibusdam molestias ipsa aperiam minus inventore animi hic totam minima eos autem, officiis veniam tempora architecto delectus repellat eum, placeat in libero. Itaque ab impedit atque eveniet doloremque, ipsa quos maiores dignissimos nulla eius? Voluptas, exercitationem nostrum, labore nam eius error explicabo, quos repudiandae voluptatibus molestias dolore reprehenderit impedit atque nobis accusamus.</p><p> Aliquam commodi provident dicta beatae molestias in eligendi sequi eum rerum, perspiciatis similique numquam sit harum dolore impedit totam, soluta esse fuga accusantium maxime quas laborum nobis at. Officia libero veniam a exercitationem voluptas aliquid repellendus natus, pariatur sequi ducimus laboriosam vitae tempora, ipsa quasi?</p>'
        // ]);
        // UnpasPost::create([
        //     'title'=> 'Judul ketiga',
        //     'unpas_category_id'=> 2,
        //     'unpas_user_id'=> 1,
        //     'slug'=> 'judul-ketiga',
        //     'excerpt'=> 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Numquam, exercitationem aliquam.',
        //     'body'=> '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Numquam, exercitationem aliquam. Maxime eligendi placeat nostrum at delectus repellat ab temporibus minus dicta eos magni adipisci, est harum, blanditiis veritatis eveniet distinctio molestiae ipsum amet, modi nulla explicabo. Nulla exercitationem, molestiae ab a molestias pariatur. Magni, accusamus nulla.</p><p> Aut facere culpa cupiditate fuga? Esse quibusdam molestias ipsa aperiam minus inventore animi hic totam minima eos autem, officiis veniam tempora architecto delectus repellat eum, placeat in libero. Itaque ab impedit atque eveniet doloremque, ipsa quos maiores dignissimos nulla eius? Voluptas, exercitationem nostrum, labore nam eius error explicabo, quos repudiandae voluptatibus molestias dolore reprehenderit impedit atque nobis accusamus.</p><p> Aliquam commodi provident dicta beatae molestias in eligendi sequi eum rerum, perspiciatis similique numquam sit harum dolore impedit totam, soluta esse fuga accusantium maxime quas laborum nobis at. Officia libero veniam a exercitationem voluptas aliquid repellendus natus, pariatur sequi ducimus laboriosam vitae tempora, ipsa quasi?</p>'
        // ]);
        // UnpasPost::create([
        //     'title'=> 'Judul kempat',
        //     'unpas_category_id'=> 2,
        //     'unpas_user_id'=> 2,
        //     'slug'=> 'judul-kempat',
        //     'excerpt'=> 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Numquam, exercitationem aliquam.',
        //     'body'=> '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Numquam, exercitationem aliquam. Maxime eligendi placeat nostrum at delectus repellat ab temporibus minus dicta eos magni adipisci, est harum, blanditiis veritatis eveniet distinctio molestiae ipsum amet, modi nulla explicabo. Nulla exercitationem, molestiae ab a molestias pariatur. Magni, accusamus nulla.</p><p> Aut facere culpa cupiditate fuga? Esse quibusdam molestias ipsa aperiam minus inventore animi hic totam minima eos autem, officiis veniam tempora architecto delectus repellat eum, placeat in libero. Itaque ab impedit atque eveniet doloremque, ipsa quos maiores dignissimos nulla eius? Voluptas, exercitationem nostrum, labore nam eius error explicabo, quos repudiandae voluptatibus molestias dolore reprehenderit impedit atque nobis accusamus.</p><p> Aliquam commodi provident dicta beatae molestias in eligendi sequi eum rerum, perspiciatis similique numquam sit harum dolore impedit totam, soluta esse fuga accusantium maxime quas laborum nobis at. Officia libero veniam a exercitationem voluptas aliquid repellendus natus, pariatur sequi ducimus laboriosam vitae tempora, ipsa quasi?</p>'
        // ]);
    }
}
