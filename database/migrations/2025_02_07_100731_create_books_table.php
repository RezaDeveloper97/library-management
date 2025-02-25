<?php

use App\Enums\EReturnPolicy;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title', 128);
            $table->foreignId('author_id')->constrained('authors')->onDelete('cascade');
            $table->boolean('is_vip_only')->default(false);
            $table->unsignedTinyInteger('return_policy')->default(EReturnPolicy::AnyBranch);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
