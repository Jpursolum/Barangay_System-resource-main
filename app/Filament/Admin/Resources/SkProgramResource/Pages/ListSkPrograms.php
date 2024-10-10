<?php

namespace App\Filament\Admin\Resources\SkProgramResource\Pages;

use App\Filament\Admin\Resources\SkProgramResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSkPrograms extends ListRecords
{
    protected static string $resource = SkProgramResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
