<?php

namespace App\Filament\Widgets;

use App\Models\Patient;
use Illuminate\Foundation\Application;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class PatientTypeOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            // Stat::make('Total Patients', Patient::count()),
            Stat::make('Cats '.'Laravel v' . Application::VERSION . ' (PHP v' . PHP_VERSION . ')', Patient::where('type', 'cat')->count()),
            Stat::make('Dogs', Patient::where('type', 'dog')->count()),
            Stat::make('Birds', Patient::where('type', 'bird')->count()),
            Stat::make('Rabbit', Patient::where('type', 'rabbit')->count()),
        ];
    }
}
