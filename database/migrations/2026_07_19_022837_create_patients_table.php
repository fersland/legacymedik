<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
        $table->uuid('id')->primary();
        $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null'); // El paciente puede o no tener usuario web
        $table->string('document_id')->unique(); // Cédula o pasaporte
        $table->date('birth_date');
        $table->enum('gender', ['M', 'F', 'Other']);
        $table->string('blood_type', 5)->nullable();
        $table->json('emergency_contact')->nullable(); // Guardar nombre/teléfono en JSON flexible
        $table->timestamps();
        $table->softDeletes();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
