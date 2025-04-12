<?php

namespace App\Filament\Admin\Resources\MockResource\Pages;

use App\Filament\Admin\Resources\MockResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMocks extends ListRecords
{
    protected static string $resource = MockResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
