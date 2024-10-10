<?php

namespace App\Filament\Admin\Resources\JobHiringResource\Pages;

use App\Filament\Admin\Resources\JobHiringResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJobHiring extends EditRecord
{
    protected static string $resource = JobHiringResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
