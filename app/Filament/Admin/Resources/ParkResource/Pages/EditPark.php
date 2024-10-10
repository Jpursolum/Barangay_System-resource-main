<?php

namespace App\Filament\Admin\Resources\ParkResource\Pages;

use App\Filament\Admin\Resources\ParkResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPark extends EditRecord
{
    protected static string $resource = ParkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
