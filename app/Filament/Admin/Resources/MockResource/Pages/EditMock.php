<?php

namespace App\Filament\Admin\Resources\MockResource\Pages;

use App\Filament\Admin\Resources\MockResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMock extends EditRecord
{
    protected static string $resource = MockResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
