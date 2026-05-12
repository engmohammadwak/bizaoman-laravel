@extends('layouts.app')

@section('title', 'تواصل معنا')

@section('content')
<section class="py-20 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4">
        <div class="text-center mb-16">
            <h1 class="text-4xl font-black text-secondary mb-4">تواصل معنا</h1>
            <div class="w-20 h-1 bg-primary mx-auto rounded"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            {{-- Contact Info --}}
            <div class="space-y-6">
                <h2 class="text-2xl font-bold text-secondary">معلومات التواصل</h2>
                @if(!empty($settings['contact_email']))
                <div class="flex items-center gap-4">
                    <span class="text-3xl">📧</span>
                    <a href="mailto:{{ $settings['contact_email'] }}" class="text-gray-600 hover:text-primary transition">{{ $settings['contact_email'] }}</a>
                </div>
                @endif
                @if(!empty($settings['contact_phone']))
                <div class="flex items-center gap-4">
                    <span class="text-3xl">📞</span>
                    <a href="tel:{{ $settings['contact_phone'] }}" class="text-gray-600 hover:text-primary transition">{{ $settings['contact_phone'] }}</a>
                </div>
                @endif
                @if(!empty($settings['contact_whatsapp']))
                <div class="flex items-center gap-4">
                    <span class="text-3xl">💬</span>
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings['contact_whatsapp']) }}" target="_blank" class="text-green-500 hover:text-green-600 transition">واتساب</a>
                </div>
                @endif
                @if(!empty($settings['contact_address_ar']))
                <div class="flex items-center gap-4">
                    <span class="text-3xl">📍</span>
                    <p class="text-gray-600">{{ $settings['contact_address_ar'] }}</p>
                </div>
                @endif
            </div>

            {{-- Contact Form --}}
            <div class="bg-white rounded-2xl shadow-lg p-8">
                @if(session('success'))
                <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-6">
                    {{ session('success') }}
                </div>
                @endif

                <form method="POST" action="/contact" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">الاسم الكامل *</label>
                        <input type="text" name="name" value="{{ old('name') }}" required
                               class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-yellow-400 focus:outline-none @error('name') border-red-400 @enderror">
                        @error('name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">البريد الإلكتروني *</label>
                        <input type="email" name="email" value="{{ old('email') }}" required
                               class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-yellow-400 focus:outline-none @error('email') border-red-400 @enderror">
                        @error('email')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">رقم الهاتف</label>
                        <input type="text" name="phone" value="{{ old('phone') }}"
                               class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-yellow-400 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">الموضوع</label>
                        <input type="text" name="subject" value="{{ old('subject') }}"
                               class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-yellow-400 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">الرسالة *</label>
                        <textarea name="message" rows="5" required
                                  class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-yellow-400 focus:outline-none @error('message') border-red-400 @enderror">{{ old('message') }}</textarea>
                        @error('message')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                    <button type="submit" class="btn-primary w-full text-center text-lg">
                        ✉️ إرسال الرسالة
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
