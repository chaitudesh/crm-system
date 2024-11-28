<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('name');                // Name of the lead
            $table->string('email')->unique();     // Email of the lead
            $table->string('phone')->nullable();   // Phone number (optional)
            $table->string('source');              // Source (e.g., website, referral, etc.)
            $table->string('status')->default('new'); // Status (new, contacted, qualified, etc.)
            $table->text('notes')->nullable();     // Notes or additional details
            $table->timestamps();
        });

        Schema::create('opportunities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lead_id')->constrained()->onDelete('cascade'); // Link to lead
            $table->string('title');              // Title of the opportunity
            $table->string('stage');              // Stage (e.g., prospecting, negotiation, closed)
            $table->decimal('value', 10, 2);      // Estimated deal value
            $table->date('close_date')->nullable(); // Expected close date
            $table->string('status')->default('open'); // Status (open, won, lost)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(table: 'leads');
        Schema::dropIfExists('opportunities');
    }
};
