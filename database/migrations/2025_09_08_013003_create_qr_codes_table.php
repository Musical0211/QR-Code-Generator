<?php

// database/migrations/2025_09_08_000000_create_qr_codes_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('qr_codes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('type'); // url, text, email, wifi, vcard
            $table->json('payload'); // normalized input data
            $table->json('design')->nullable(); // colors, margin, ecc
            $table->string('file_svg')->nullable();
            $table->string('file_png')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('qr_codes');
    }
};
