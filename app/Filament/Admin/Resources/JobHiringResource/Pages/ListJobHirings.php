<?php

namespace App\Filament\Admin\Resources\JobHiringResource\Pages;

use App\Filament\Admin\Resources\JobHiringResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJobHirings extends ListRecords
{
    protected static string $resource = JobHiringResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
