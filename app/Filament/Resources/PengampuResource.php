<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengampuResource\Pages;
use App\Filament\Resources\PengampuResource\RelationManagers;
use App\Models\Pengampu;
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

class PengampuResource extends Resource
{
    protected static ?string $model = Pengampu::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $label = 'Pengampu';
    protected static ?string $navigationLabel = 'Pengampu';
    protected static ?string $pluralModelLabel = 'Pengampu';
    protected static ?string $singularModelLabel = 'Pengampu';
    protected static ?string $slug = 'pengampu';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('Kode_mk')
                    ->label('Kode Mata Kuliah')
                    ->options(\App\Models\Matakuliah::pluck('nama_mk', 'Kode_mk'))
                    ->required(),
                
                Forms\Components\Select::make('NIP')
                    ->label('NIP Dosen')
                    ->options(\App\Models\Dosen::pluck('nama', 'NIP'))
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
{
    return $table
        ->columns([
            TextColumn::make('Kode_mk') // Menggunakan TextColumn
                ->label('Kode Mata Kuliah')
                ->sortable(),
            
            TextColumn::make('NIP') // Menggunakan TextColumn
                ->label('NIP Dosen')
                ->sortable(),
        ])
        ->filters([
            // Tambahkan filter jika diperlukan
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListPengampus::route('/'),
            'create' => Pages\CreatePengampu::route('/create'),
            'edit' => Pages\EditPengampu::route('/{record}/edit'),
        ];
    }
}
