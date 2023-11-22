<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserAddress>
 */
class UserAddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $addresses = [
            ['北京市', '市辖区', '东城区'],
            ['河北省', '石家庄市', '长安区'],
            ['江苏省', '南京市', '浦口区'],
            ['江苏省', '苏州市', '相城区'],
            ['广东省', '深圳市', '福田区'],
        ];
        $address = fake()->randomElement($addresses);
        return [
            'contact_name' => fake()->name(),
            'contact_phone' => fake()->phoneNumber(),
            'province'      => $address[0],
            'city'          => $address[1],
            'district'      => $address[2],
            'address'       => sprintf('第%d街道第%d号', fake()->randomNumber(2), fake()->randomNumber(3)),
        ];
    }
}
