<?php

namespace App\Filament\Admin\Resources\SchoolarResource\Pages;

use App\Filament\Admin\Resources\SchoolarResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSchoolars extends ListRecords
{
    protected static string $resource = SchoolarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
