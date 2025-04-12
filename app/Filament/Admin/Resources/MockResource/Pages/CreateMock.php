<?php

namespace App\Filament\Admin\Resources\MockResource\Pages;

use App\Filament\Admin\Resources\MockResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMock extends CreateRecord
{
    protected static string $resource = MockResource::class;
}
