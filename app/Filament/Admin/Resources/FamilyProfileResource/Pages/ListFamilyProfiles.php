<?php

namespace App\Filament\Admin\Resources\FamilyProfileResource\Pages;

use App\Filament\Admin\Resources\FamilyProfileResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFamilyProfiles extends ListRecords
{
    protected static string $resource = FamilyProfileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
