<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * @return void
     */
    public function up(): void
    {
        Schema::create('comment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_parent')->nullable();
            $table->string('author', 15)->default('Unknown');
            $table->text('content');
            $table->timestamps();
            $table->foreign('id_parent')
                ->references('id')
                ->on('comment')
                ->onDelete('cascade');
        });
    }

    /**
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('comment');
    }
};
