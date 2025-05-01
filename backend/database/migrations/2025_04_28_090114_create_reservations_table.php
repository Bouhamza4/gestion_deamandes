// database/migrations/2025_04_28_000000_create_reservations_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('type'); // نوع الطلب: كهرباء، ماء، وفاة، رخصة بناء...
            $table->string('document')->nullable(); // رابط الوثيقة المرفوعة
            $table->date('reservation_date'); // تاريخ الحجز
            $table->time('reservation_time'); // ساعة الحجز
            $table->enum('status', ['en_attente', 'accepte', 'refuse', 'reporté'])->default('en_attente');
            $table->text('notes')->nullable(); // ملاحظات إدارية
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
