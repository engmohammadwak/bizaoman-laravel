<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user
        User::factory()->create([
            'name' => 'Admin BizaOman',
            'email' => 'admin@bizaoman.com',
            'password' => Hash::make('password'),
        ]);

        // Default settings
        $settings = [
            // General
            ['key' => 'site_name_ar', 'value' => 'بيزا عمان', 'group' => 'general'],
            ['key' => 'site_name_en', 'value' => 'BizaOman', 'group' => 'general'],
            ['key' => 'site_tagline_ar', 'value' => 'شريكك في النجاح', 'group' => 'general'],
            ['key' => 'site_tagline_en', 'value' => 'Your Partner in Success', 'group' => 'general'],
            ['key' => 'site_logo', 'value' => '', 'group' => 'general'],
            ['key' => 'site_favicon', 'value' => '', 'group' => 'general'],

            // Colors
            ['key' => 'color_primary', 'value' => '#C49A45', 'group' => 'colors'],
            ['key' => 'color_secondary', 'value' => '#1A1A2E', 'group' => 'colors'],
            ['key' => 'color_accent', 'value' => '#E8C97A', 'group' => 'colors'],
            ['key' => 'color_background', 'value' => '#FFFFFF', 'group' => 'colors'],
            ['key' => 'color_text', 'value' => '#1A1A2E', 'group' => 'colors'],
            ['key' => 'color_navbar', 'value' => '#1A1A2E', 'group' => 'colors'],
            ['key' => 'color_footer', 'value' => '#1A1A2E', 'group' => 'colors'],

            // Contact
            ['key' => 'contact_email', 'value' => 'info@bizaoman.com', 'group' => 'contact'],
            ['key' => 'contact_phone', 'value' => '+968 XXXX XXXX', 'group' => 'contact'],
            ['key' => 'contact_address_ar', 'value' => 'مسقط، سلطنة عُمان', 'group' => 'contact'],
            ['key' => 'contact_address_en', 'value' => 'Muscat, Sultanate of Oman', 'group' => 'contact'],
            ['key' => 'contact_whatsapp', 'value' => '', 'group' => 'contact'],

            // Social
            ['key' => 'social_linkedin', 'value' => '', 'group' => 'social'],
            ['key' => 'social_twitter', 'value' => '', 'group' => 'social'],
            ['key' => 'social_instagram', 'value' => '', 'group' => 'social'],
            ['key' => 'social_facebook', 'value' => '', 'group' => 'social'],
            ['key' => 'social_youtube', 'value' => '', 'group' => 'social'],

            // SEO
            ['key' => 'meta_description_ar', 'value' => 'بيزا عمان - شركة استشارات الأعمال الرائدة في سلطنة عُمان', 'group' => 'seo'],
            ['key' => 'meta_description_en', 'value' => 'BizaOman - Leading Business Consulting Company in Sultanate of Oman', 'group' => 'seo'],
            ['key' => 'google_analytics', 'value' => '', 'group' => 'seo'],

            // Hero Section
            ['key' => 'hero_title_ar', 'value' => 'مرحباً بكم في بيزا عمان', 'group' => 'hero'],
            ['key' => 'hero_title_en', 'value' => 'Welcome to BizaOman', 'group' => 'hero'],
            ['key' => 'hero_subtitle_ar', 'value' => 'شريكك الموثوق في تطوير الأعمال والاستشارات', 'group' => 'hero'],
            ['key' => 'hero_subtitle_en', 'value' => 'Your trusted partner in business development and consulting', 'group' => 'hero'],
            ['key' => 'hero_bg_image', 'value' => '', 'group' => 'hero'],
        ];

        foreach ($settings as $setting) {
            DB::table('settings')->insert(array_merge($setting, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
