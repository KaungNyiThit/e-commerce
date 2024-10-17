<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Product;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('specs', function (Blueprint $table) {
            $table->id();
            $table->string('modal');
            $table->string('display');
            $table->string('processor');
            $table->string('graphic');
            $table->string('storage');
            $table->string('camera');
            $table->string('battery');
            $table->string('os');
            $table->foreignIdFor(Product::class)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('specs');
    }
};
