<?php

namespace App\Filament\Admin\Resources\SchoolarResource\Pages;

use App\Filament\Admin\Resources\SchoolarResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSchoolar extends EditRecord
{
    protected static string $resource = SchoolarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
