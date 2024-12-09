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
        Schema::create('malfunctions', function (Blueprint $table) {
            $table->id();
            // de constrained voegt een foreign key constraint toe die automatisch de relatie met de bijbehorende tabel maakt
            //de onDelete functie zorgt ervoor dat alles wat te maken heeft met een mahcine verwijdert wordt als de machine zelf ook verwijdert is.
            $table->foreignId('machine_id')->constrained()->onDelete('cascade'); 
            $table->foreignId('status_id')->constrained()->onDelete('cascade');
            // Verwijzing naar de 'users' tabel, mag null zijn (kan zonder gebruiker)
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->text('description');
            $table->timestamp('finished_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('malfunctions');
    }
};
