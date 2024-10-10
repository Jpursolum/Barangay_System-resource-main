<?php

namespace App\Filament\Admin\Resources\ParkResource\Pages;

use App\Filament\Admin\Resources\ParkResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListParks extends ListRecords
{
    protected static string $resource = ParkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
