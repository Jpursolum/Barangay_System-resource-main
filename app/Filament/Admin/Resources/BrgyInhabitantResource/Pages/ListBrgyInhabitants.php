<?php

namespace App\Filament\Admin\Resources\BrgyInhabitantResource\Pages;

use App\Filament\Admin\Resources\BrgyInhabitantResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBrgyInhabitants extends ListRecords
{
    protected static string $resource = BrgyInhabitantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
