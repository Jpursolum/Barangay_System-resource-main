<?php

namespace App\Filament\Admin\Pages;

use App\Models\BrgyInhabitant;
use Filament\Pages\Page;

class DemographicStatistics extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.admin.pages.demographic-statistics';

    // This method calculates the statistics needed for the page
    public function getDemographicData(): array
    {
        $totalPopulation = BrgyInhabitant::count();
        $maleCount = BrgyInhabitant::where('sex', 'Male')->count();
        $femaleCount = BrgyInhabitant::where('sex', 'Female')->count();

        $ageGroups = [
            '0-17' => BrgyInhabitant::whereBetween('age', [0, 17])->count(),
            '18-35' => BrgyInhabitant::whereBetween('age', [18, 35])->count(),
            '36-60' => BrgyInhabitant::whereBetween('age', [36, 60])->count(),
            '60+' => BrgyInhabitant::where('age', '>', 60)->count(),
        ];

        return [
            'total_population' => $totalPopulation,
            'male_count' => $maleCount,
            'female_count' => $femaleCount,
            'age_groups' => $ageGroups,
        ];
    }
}
