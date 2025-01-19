<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory {
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    public function configure() {
        return $this->afterCreating(function ($admin) {
            $admin->update([
                'avatar' => $this->getAvatar($admin->id, style: 'notionists', background: ['#ffffff']),
            ]);
        });
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        $name = fake()->name();
        $password = static::$password ?? Str::password(length: 16);
        $data = [
            'name' => $name,
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => null,
            'password' => $password,
            'remember_token' => Str::random(10),
        ];

        Log::info("created new admin '{$name}' with password : {$password}");

        return $data;
    }

    /**
     * Indicate that the user should have a verified email address.
     */
    public function verified(): Factory {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => now(),
            ];
        });
    }

    /**
     * Get a random avatar url for an avatar
     *
     * @param  string  $filename  The filename to save the avatar as (saved on public disk)
     * @param  string|null  $seed  The seed to use for the avatar
     * @param  string|null  $style  The style of the avatar
     */
    private function getAvatar(string $filename, ?string $style = 'initials', array|string|null $background = null, ?string $seed = null): string {
        // parse parameters
        if (! is_array($background)) {
            $background = [$background];
        } // convert to array if it is not
        $filename = basename($filename, '.svg'); // remove the extension
        $seed = $seed ?? Str::random(22); // generate a random seed if not provided

        // get the avatar generation service url
        $url = "https://api.dicebear.com/9.x/{$style}/svg?seed={$seed}&backgroundColor=".implode(',', $background);

        // create the directory if it does not exist
        Storage::disk('public')->makeDirectory('avatars');

        // save the avatar to the storage
        Storage::disk('public')->put("avatars/$filename.svg", file_get_contents($url));

        // return public link to the avatar
        return url("storage/avatars/$filename.svg");
    }
}