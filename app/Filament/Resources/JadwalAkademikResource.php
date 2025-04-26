<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JadwalAkademikResource\Pages;
use App\Filament\Resources\JadwalAkademikResource\RelationManagers;
use App\Models\JadwalAkademik;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JadwalAkademikResource extends Resource
{
    protected static ?string $model = JadwalAkademik::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $label = 'Jadwal Akademik';
    protected static ?string $navigationLabel = 'Jadwal Akademik';
    protected static ?string $pluralModelLabel = 'Jadwal Akademik';
    protected static ?string $singularModelLabel = 'JadwalAkademik';
    protected static ?string $slug = 'JadwalAkademik';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('hari')
                ->label('Hari')
                ->required()
                ->maxLength(10),
                 Select::make('Kode_mk')
                ->label('Kode Matakuliah')
                ->relationship('matakuliah', 'Nama_mk')
                ->required(),
                Select::make('id_ruang')
                ->label('Ruang')
                ->relationship('ruang', 'nama_ruang')
                ->required(),
                Select::make('id_Gol')
                ->label('Golongan')
                ->relationship('golongan', 'nama_Gol')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('hari')
                ->label('Hari')
                ->sortable(),
                TextColumn::make('matakuliah.Nama_mk')
                    ->label('Matakuliah'),
                TextColumn::make('ruang.nama_ruang')
                    ->label('Ruang'),
                TextColumn::make('golongan.nama_Gol')
                    ->label('Golongan'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                
                    Tables\Actions\DeleteBulkAction::make(),
                
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
            'index' => Pages\ListJadwalAkademiks::route('/'),
            'create' => Pages\CreateJadwalAkademik::route('/create'),
            'edit' => Pages\EditJadwalAkademik::route('/{record}/edit'),
        ];
    }
}
