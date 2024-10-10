<?php

namespace App\Filament\Admin\Resources\BrangayOfficialsResource\Pages;

use App\Filament\Admin\Resources\BrangayOfficialsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBrangayOfficials extends ListRecords
{
    protected static string $resource = BrangayOfficialsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
