<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\MockResource\Pages;
use App\Models\Mock;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use ValentinMorice\FilamentJsonColumn\JsonColumn;

class MockResource extends Resource
{
    protected static ?string $model = Mock::class;

    protected static ?string $navigationIcon = 'heroicon-o-beaker';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('method')
                    ->label('HTTP Method')
                    ->options([
                        'GET' => 'GET',
                        'POST' => 'POST',
                        'PUT' => 'PUT',
                        'PATCH' => 'PATCH',
                        'DELETE' => 'DELETE',
                    ]),
                Forms\Components\TextInput::make('path')
                    ->label('Path')
                    ->placeholder('/api/mock')
                    ->required()
                    ->maxLength(255)
                    ->unique(Mock::class, 'path', fn ($record) => $record),
                Forms\Components\TextInput::make('summary')
                    ->label('Summary')
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->label('Description')
                    ->maxLength(65535)
                    ->rows(3)
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('deprecated')
                    ->label('Deprecated')
                    ->default(false),
                Forms\Components\Repeater::make('parameters')
                    ->label('Parameters')
                    ->relationship('parameter')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Parameter Name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('schema_id')
                            ->label('Schema')
                            ->relationship('schema', 'name')
                            ->searchable()
                            ->preload()
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->label('Parameter schema Name')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\KeyValue::make('values')
                                    ->label('Values')
                                    ->keyLabel('Key')
                                    ->valueLabel('Value')
                                    ->columns([
                                        'key' => 'Key',
                                        'value' => 'Value',
                                    ])
                                    ->columnSpanFull(),
                            ])
                            ->columnSpanFull(),

                        Forms\Components\Textarea::make('description')
                            ->label('Description')
                            ->maxLength(65535)
                            ->rows(3),

                        Forms\Components\Select::make('in')
                            ->label('In')
                            ->options([
                                'query' => 'Query',
                                'path' => 'Path',
                                'header' => 'Header',
                                'cookie' => 'Cookie',
                            ])
                            ->required(),

                        Forms\Components\Toggle::make('required')
                            ->label('Required')
                            ->default(false),
                    ])
                    ->columnSpanFull(),
                Forms\Components\Select::make('response_id')
                    ->label('Response')
                    ->relationship('response', 'name')
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        Forms\Components\TextInput::make('name')
                            ->label('Response Name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('status_code')
                            ->label('Status Code')
                            ->required()
                            ->maxLength(3),
                        Forms\Components\Textarea::make('description')
                            ->label('Description')
                            ->maxLength(65535)
                            ->rows(3),
                        JsonColumn::make('example')
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('method')
                    ->label('Method')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('path')
                    ->label('Path')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('summary')
                    ->label('Summary')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('deprecated')
                    ->label('Deprecated')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMocks::route('/'),
            'create' => Pages\CreateMock::route('/create'),
            'edit' => Pages\EditMock::route('/{record}/edit'),
        ];
    }
}
