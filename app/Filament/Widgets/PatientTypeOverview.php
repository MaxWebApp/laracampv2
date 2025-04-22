<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Patient;

class PatientTypeOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            // Stat::make('Total Patients', Patient::count()),
            Stat::make('Cats', Patient::where('type', 'cat')->count()),
            Stat::make('Dogs', Patient::where('type', 'dog')->count()),
            Stat::make('Birds', Patient::where('type', 'bird')->count()),
            Stat::make('Rabbit', Patient::where('type', 'rabbit')->count()),
        ];
    }
}
