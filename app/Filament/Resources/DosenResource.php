<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DosenResource\Pages;
use App\Models\Dosen;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;

class DosenResource extends Resource
{
    protected static ?string $model = Dosen::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $label = 'Dosen';
    protected static ?string $navigationLabel = 'Dosen';
    protected static ?string $pluralModelLabel = 'Dosen';
    protected static ?string $singularModelLabel = 'Dosen';
    protected static ?string $slug = 'dosen';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('NIP')
                    ->label('NIP')
                    ->required()
                    // ->unique('NIP')
                    ->disabled(fn ($record) => $record !== null)
                    ->maxLength(20),
                TextInput::make('Nama')
                    ->label('Nama Dosen')
                    ->required()
                    ->maxLength(100),
                Textarea::make('Alamat')
                    ->label('Alamat'),
                TextInput::make('Nohp')
                    ->label('Nomor HP')
                    ->maxLength(15),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('NIP')->label('NIP')->sortable()->searchable(),
                TextColumn::make('Nama')->label('Nama Dosen')->sortable()->searchable(),
                TextColumn::make('Alamat')->label('Alamat')->wrap(),
                TextColumn::make('Nohp')->label('Nomor HP'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDosens::route('/'),
            'create' => Pages\CreateDosen::route('/create'),
            'edit' => Pages\EditDosen::route('/{record}/edit'),
        ];
    }
 
}