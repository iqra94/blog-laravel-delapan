<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnpasPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unpas_posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('unpas_category_id');
            $table->foreignId('unpas_user_id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->text('excerpt');
            $table->text('body');
            $table->timestamp('publish_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unpas_posts');
    }
}
