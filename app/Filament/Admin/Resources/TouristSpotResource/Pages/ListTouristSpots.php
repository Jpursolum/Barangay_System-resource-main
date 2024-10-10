<?php

namespace App\Filament\Admin\Resources\TouristSpotResource\Pages;

use App\Filament\Admin\Resources\TouristSpotResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTouristSpots extends ListRecords
{
    protected static string $resource = TouristSpotResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
