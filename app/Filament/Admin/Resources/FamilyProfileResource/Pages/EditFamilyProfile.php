<?php

namespace App\Filament\Admin\Resources\FamilyProfileResource\Pages;

use App\Filament\Admin\Resources\FamilyProfileResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFamilyProfile extends EditRecord
{
    protected static string $resource = FamilyProfileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
