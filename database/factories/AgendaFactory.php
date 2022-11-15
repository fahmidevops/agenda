<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AgendaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'title' => $this->faker->sentence(mt_rand(2, 5)),
            // 'slug'  => $this->faker->slug(),
            // 'body' => '<p>' . implode('</p><p>', $this->faker->paragraphs(mt_rand(5, 10))) . '</p>',
            // 'user_id' => mt_rand(1, 5),
            // 'pejabat_id' => mt_rand(1, 3),
            // $table->date('date');
            // $table->time('start_time');
            // $table->time('end_time');
            // $table->string('location');
            // $table->string('pengundang');
            // $table->boolean('status_kehadiran');
            // $table->string('disposisi')->nullable();
        ];
    }
}
