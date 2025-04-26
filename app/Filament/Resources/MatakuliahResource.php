<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MatakuliahResource\Pages;
use App\Filament\Resources\MatakuliahResource\RelationManagers;
use App\Models\Matakuliah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MatakuliahResource extends Resource
{
    protected static ?string $model = Matakuliah::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $label = 'Matakuliah';
    protected static ?string $navigationLabel = 'Matakuliah';
    protected static ?string $pluralModelLabel = 'Matakuliah';
    protected static ?string $singularModelLabel = 'Matakuliah';
    protected static ?string $slug = 'matakuliah';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('Kode_mk')
                ->label('Kode Matakuliah')
                ->required()
                // ->unique()
                ->disabled(fn ($record) => $record !== null)
                ->maxLength(20),
            Forms\Components\TextInput::make('Nama_mk')
                ->label('Nama Matakuliah')
                ->required()
                ->maxLength(100),
            Forms\Components\TextInput::make('sks')
                ->label('SKS')
                ->numeric()
                ->required(),
            Forms\Components\TextInput::make('semester')
                ->label('Semester')
                ->numeric()
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Kode_mk')
                ->label('Kode Matakuliah')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('Nama_mk')
                    ->label('Nama Matakuliah'),
                Tables\Columns\TextColumn::make('sks')
                    ->label('SKS'),
                Tables\Columns\TextColumn::make('semester')
                    ->label('Semester'),
                ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListMatakuliahs::route('/'),
            'create' => Pages\CreateMatakuliah::route('/create'),
            'edit' => Pages\EditMatakuliah::route('/{record}/edit'),
        ];
    }
}
