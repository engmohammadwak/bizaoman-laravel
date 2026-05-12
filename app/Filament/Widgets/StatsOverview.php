<?php

namespace App\Filament\Widgets;

use App\Models\Certificate;
use App\Models\Client;
use App\Models\ContactMessage;
use App\Models\Service;
use App\Models\TeamMember;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('الخدمات', Service::count())
                ->description('إجمالي الخدمات')
                ->descriptionIcon('heroicon-m-briefcase')
                ->color('success'),

            Stat::make('الفريق', TeamMember::count())
                ->description('أعضاء الفريق')
                ->descriptionIcon('heroicon-m-users')
                ->color('info'),

            Stat::make('العملاء', Client::count())
                ->description('إجمالي العملاء')
                ->descriptionIcon('heroicon-m-building-office')
                ->color('warning'),

            Stat::make('رسائل جديدة', ContactMessage::unread()->count())
                ->description('رسائل غير مقروءة')
                ->descriptionIcon('heroicon-m-envelope')
                ->color('danger'),

            Stat::make('الشهادات', Certificate::count())
                ->description('الشهادات والجوائز')
                ->descriptionIcon('heroicon-m-academic-cap')
                ->color('primary'),
        ];
    }
}
