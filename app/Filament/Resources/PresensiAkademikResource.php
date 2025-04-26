<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PresensiAkademikResource\Pages;
use App\Filament\Resources\PresensiAkademikResource\RelationManagers;
use App\Models\PresensiAkademik;
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

class PresensiAkademikResource extends Resource
{
    protected static ?string $model = PresensiAkademik::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $label = 'Presensi Akademik';
    protected static ?string $navigationLabel = 'Presensi Akademik';
    protected static ?string $pluralModelLabel = 'Presensi Akademik';
    protected static ?string $singularModelLabel = 'PresensiAkademik';
    protected static ?string $slug = 'PresensiAkademik';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('hari')
                ->label('Hari')
                ->required()
                ->maxLength(10),
            Forms\Components\DatePicker::make('tanggal')
                ->label('Tanggal')
                ->required(),
            Forms\Components\TextInput::make('status_kehadiran')
                ->label('Status Kehadiran')
                ->required()
                ->maxLength(20),
            Forms\Components\Select::make('NIM')
                ->label('Mahasiswa')
                ->relationship('mahasiswa', 'Nama')
                ->required(),
            Forms\Components\Select::make('Kode_mk')
                ->label('Matakuliah')
                ->relationship('matakuliah', 'Nama_mk')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('hari')
                ->label('Hari'),
            Tables\Columns\TextColumn::make('tanggal')
                ->label('Tanggal'),
            Tables\Columns\TextColumn::make('status_kehadiran')
                ->label('Status Kehadiran'),
            Tables\Columns\TextColumn::make('mahasiswa.Nama')
                ->label('Mahasiswa'),
            Tables\Columns\TextColumn::make('matakuliah.Nama_mk')
                ->label('Matakuliah'),
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
            'index' => Pages\ListPresensiAkademiks::route('/'),
            'create' => Pages\CreatePresensiAkademik::route('/create'),
            'edit' => Pages\EditPresensiAkademik::route('/{record}/edit'),
        ];
    }
}
