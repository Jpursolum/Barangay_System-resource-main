<?php

namespace App\Filament\Admin\Resources\BrgyInhabitantResource\Pages;

use App\Filament\Admin\Resources\BrgyInhabitantResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBrgyInhabitant extends EditRecord
{
    protected static string $resource = BrgyInhabitantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
