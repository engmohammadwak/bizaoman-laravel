@extends('layouts.app')

@section('title', 'الرئيسية')

@section('content')

{{-- Hero Section --}}
<section class="relative min-h-screen flex items-center justify-center text-white overflow-hidden"
    style="background: linear-gradient(135deg, var(--color-secondary) 0%, var(--color-primary) 100%);
    @if(!empty($settings['hero_bg_image'])) background-image: url('{{ $settings['hero_bg_image'] }}'); background-size: cover; background-position: center; @endif">
    <div class="absolute inset-0 bg-black/40"></div>
    <div class="relative z-10 text-center px-4 max-w-4xl mx-auto">
        <h1 class="text-5xl md:text-7xl font-black mb-6 leading-tight">
            {{ $settings['hero_title_ar'] ?? 'مرحباً بكم في بيزا عمان' }}
        </h1>
        <p class="text-xl md:text-2xl text-gray-200 mb-10 leading-relaxed">
            {{ $settings['hero_subtitle_ar'] ?? 'شريكك الموثوق في تطوير الأعمال' }}
        </p>
        <a href="/contact" class="btn-primary text-lg px-10 py-4">تواصل معنا اليوم</a>
    </div>
</section>

{{-- Services --}}
@if($services->count())
<section id="services" class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-black text-secondary mb-4">خدماتنا</h2>
            <div class="w-20 h-1 bg-primary mx-auto rounded"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($services as $service)
            <div class="bg-white rounded-2xl shadow-lg p-8 hover:shadow-xl transition hover:-translate-y-1">
                @if($service->image)
                <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name_ar }}" class="w-full h-48 object-cover rounded-xl mb-6">
                @endif
                <h3 class="text-xl font-bold text-secondary mb-3">{{ $service->name_ar }}</h3>
                <p class="text-gray-600 leading-relaxed">{{ $service->description_ar }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- Team --}}
@if($team->count())
<section id="team" class="py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-black text-secondary mb-4">فريقنا</h2>
            <div class="w-20 h-1 bg-primary mx-auto rounded"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($team as $member)
            <div class="text-center">
                @if($member->image)
                <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name_ar }}" class="w-32 h-32 rounded-full object-cover mx-auto mb-4 border-4 border-primary">
                @else
                <div class="w-32 h-32 rounded-full bg-primary mx-auto mb-4 flex items-center justify-center text-white text-3xl font-bold">
                    {{ mb_substr($member->name_ar, 0, 1) }}
                </div>
                @endif
                <h3 class="text-lg font-bold text-secondary">{{ $member->name_ar }}</h3>
                <p class="text-primary font-medium">{{ $member->position_ar }}</p>
                <div class="flex justify-center gap-3 mt-3">
                    @if($member->linkedin)<a href="{{ $member->linkedin }}" target="_blank" class="text-gray-400 hover:text-primary transition">LinkedIn</a>@endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- Clients --}}
@if($publicClients->count())
<section id="clients" class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-black text-secondary mb-4">عملاؤنا</h2>
            <div class="w-20 h-1 bg-primary mx-auto rounded"></div>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8 items-center">
            @foreach($publicClients as $client)
            <div class="text-center grayscale hover:grayscale-0 transition">
                @if($client->logo)
                <img src="{{ asset('storage/' . $client->logo) }}" alt="{{ $client->name }}" class="max-h-16 mx-auto object-contain">
                @else
                <p class="font-bold text-gray-600">{{ $client->name }}</p>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- Certificates --}}
@if($certificates->count())
<section id="certificates" class="py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-black text-secondary mb-4">شهاداتنا وجوائزنا</h2>
            <div class="w-20 h-1 bg-primary mx-auto rounded"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($certificates as $cert)
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition">
                <img src="{{ asset('storage/' . $cert->image) }}" alt="{{ $cert->title_ar }}" class="w-full h-56 object-cover">
                <div class="p-6">
                    <h3 class="text-lg font-bold text-secondary">{{ $cert->title_ar }}</h3>
                    @if($cert->issuer)<p class="text-primary text-sm mt-1">{{ $cert->issuer }}</p>@endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- CTA Section --}}
<section class="py-20" style="background: linear-gradient(135deg, var(--color-secondary), var(--color-primary));">
    <div class="max-w-4xl mx-auto px-4 text-center text-white">
        <h2 class="text-4xl font-black mb-6">هل أنت مستعد للنجاح؟</h2>
        <p class="text-xl text-gray-200 mb-10">تواصل معنا اليوم ودعنا نبني معاً مستقبل أعمالك</p>
        <a href="/contact" class="bg-white text-secondary font-black px-10 py-4 rounded-xl text-lg hover:bg-gray-100 transition inline-block">ابدأ الآن</a>
    </div>
</section>

@endsection
