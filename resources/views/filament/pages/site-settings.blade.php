<x-filament-panels::page>
    <form wire:submit="save">
        <div class="space-y-6">

            {{-- General Settings --}}
            <x-filament::section>
                <x-slot name="heading">🌐 الإعدادات العامة</x-slot>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">اسم الموقع بالعربية</label>
                        <input type="text" wire:model="data.site_name_ar" class="w-full border rounded-lg px-3 py-2 dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Site Name in English</label>
                        <input type="text" wire:model="data.site_name_en" class="w-full border rounded-lg px-3 py-2 dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">الشعار الفرعي بالعربية</label>
                        <input type="text" wire:model="data.site_tagline_ar" class="w-full border rounded-lg px-3 py-2 dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Site Tagline in English</label>
                        <input type="text" wire:model="data.site_tagline_en" class="w-full border rounded-lg px-3 py-2 dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">رابط اللوجو (Logo URL)</label>
                        <input type="text" wire:model="data.site_logo" class="w-full border rounded-lg px-3 py-2 dark:bg-gray-800 dark:border-gray-600 dark:text-white" placeholder="/storage/logo.png">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">رابط الـ Favicon</label>
                        <input type="text" wire:model="data.site_favicon" class="w-full border rounded-lg px-3 py-2 dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                    </div>
                </div>
            </x-filament::section>

            {{-- Colors --}}
            <x-filament::section>
                <x-slot name="heading">🎨 الألوان</x-slot>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    @foreach([
                        'color_primary' => 'اللون الأساسي',
                        'color_secondary' => 'اللون الثانوي',
                        'color_accent' => 'لون التمييز',
                        'color_background' => 'لون الخلفية',
                        'color_text' => 'لون النص',
                        'color_navbar' => 'لون الناف بار',
                        'color_footer' => 'لون الفوتر',
                    ] as $key => $label)
                    <div class="flex flex-col items-center gap-2">
                        <label class="text-sm font-medium text-gray-700 dark:text-gray-200">{{ $label }}</label>
                        <input type="color" wire:model="data.{{ $key }}"
                               class="w-16 h-12 rounded-lg cursor-pointer border-2 border-gray-300">
                        <input type="text" wire:model="data.{{ $key }}"
                               class="w-full text-xs border rounded px-2 py-1 dark:bg-gray-800 dark:border-gray-600 dark:text-white text-center">
                    </div>
                    @endforeach
                </div>
            </x-filament::section>

            {{-- Contact --}}
            <x-filament::section>
                <x-slot name="heading">📞 معلومات التواصل</x-slot>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">البريد الإلكتروني</label>
                        <input type="email" wire:model="data.contact_email" class="w-full border rounded-lg px-3 py-2 dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">رقم الهاتف</label>
                        <input type="text" wire:model="data.contact_phone" class="w-full border rounded-lg px-3 py-2 dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">واتساب</label>
                        <input type="text" wire:model="data.contact_whatsapp" class="w-full border rounded-lg px-3 py-2 dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">العنوان بالعربية</label>
                        <input type="text" wire:model="data.contact_address_ar" class="w-full border rounded-lg px-3 py-2 dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Address in English</label>
                        <input type="text" wire:model="data.contact_address_en" class="w-full border rounded-lg px-3 py-2 dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                    </div>
                </div>
            </x-filament::section>

            {{-- Social Media --}}
            <x-filament::section>
                <x-slot name="heading">📱 السوشيال ميديا</x-slot>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach([
                        'social_linkedin' => 'LinkedIn',
                        'social_twitter' => 'Twitter / X',
                        'social_instagram' => 'Instagram',
                        'social_facebook' => 'Facebook',
                        'social_youtube' => 'YouTube',
                    ] as $key => $label)
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">{{ $label }}</label>
                        <input type="url" wire:model="data.{{ $key }}" class="w-full border rounded-lg px-3 py-2 dark:bg-gray-800 dark:border-gray-600 dark:text-white" placeholder="https://...">
                    </div>
                    @endforeach
                </div>
            </x-filament::section>

            {{-- Hero Section --}}
            <x-filament::section>
                <x-slot name="heading">🏠 القسم الرئيسي (Hero)</x-slot>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">العنوان بالعربية</label>
                        <input type="text" wire:model="data.hero_title_ar" class="w-full border rounded-lg px-3 py-2 dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Title in English</label>
                        <input type="text" wire:model="data.hero_title_en" class="w-full border rounded-lg px-3 py-2 dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">النص الفرعي بالعربية</label>
                        <input type="text" wire:model="data.hero_subtitle_ar" class="w-full border rounded-lg px-3 py-2 dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Subtitle in English</label>
                        <input type="text" wire:model="data.hero_subtitle_en" class="w-full border rounded-lg px-3 py-2 dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                    </div>
                    <div class="col-span-full">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">رابط صورة الخلفية</label>
                        <input type="text" wire:model="data.hero_bg_image" class="w-full border rounded-lg px-3 py-2 dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                    </div>
                </div>
            </x-filament::section>

            {{-- SEO --}}
            <x-filament::section>
                <x-slot name="heading">🔍 SEO</x-slot>
                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">الوصف التعريفي بالعربية</label>
                        <textarea wire:model="data.meta_description_ar" rows="2" class="w-full border rounded-lg px-3 py-2 dark:bg-gray-800 dark:border-gray-600 dark:text-white"></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Meta Description in English</label>
                        <textarea wire:model="data.meta_description_en" rows="2" class="w-full border rounded-lg px-3 py-2 dark:bg-gray-800 dark:border-gray-600 dark:text-white"></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Google Analytics ID</label>
                        <input type="text" wire:model="data.google_analytics" class="w-full border rounded-lg px-3 py-2 dark:bg-gray-800 dark:border-gray-600 dark:text-white" placeholder="G-XXXXXXXXXX">
                    </div>
                </div>
            </x-filament::section>

            <div class="flex justify-end">
                <x-filament::button type="submit" size="lg">
                    💾 حفظ الإعدادات
                </x-filament::button>
            </div>
        </div>
    </form>
</x-filament-panels::page>
