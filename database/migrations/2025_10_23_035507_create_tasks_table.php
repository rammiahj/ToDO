<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content')->nullable();
            $table->unsignedTinyInteger('status')->default(0); // 0 = todo, 1 = done
            $table->timestamp('time')->useCurrent();           // your “time” field
            $table->timestamps();                              // created_at, updated_at
            $table->index(['status', 'time']);
        });
    }
    public function down(): void {
        Schema::dropIfExists('tasks');
    }
};
