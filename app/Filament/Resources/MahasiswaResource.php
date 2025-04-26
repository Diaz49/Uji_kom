<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MahasiswaResource\Pages;
use App\Filament\Resources\MahasiswaResource\RelationManagers;
use App\Models\Mahasiswa;
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

class MahasiswaResource extends Resource
{
    protected static ?string $model = Mahasiswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $label = 'Mahasiswa';
    protected static ?string $navigationLabel = 'Mahasiswa';
    protected static ?string $pluralModelLabel = 'Mahasiswa';
    protected static ?string $singularModelLabel = 'Mahasiswa';
    protected static ?string $slug = 'mahasiswa';
    
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make('NIM')
                ->required()
                ->maxLength(20)
                ->unique(Mahasiswa::class, 'NIM') // Validasi unik di database
                ->label('Nomor Induk Mahasiswa'),
                // ->label('Nomor Induk Mahasiswa')
                // ->extraAttributes(['class' => 'custom-class']),
            TextInput::make('Nama')
                ->required()
                ->maxLength(100),
            Textarea::make('Alamat')
                ->required(),
            TextInput::make('Nohp')
                ->required()
                ->maxLength(15),
            TextInput::make('Semester')
                ->required()
                ->numeric(),
            Select::make('id_Gol')
                ->relationship('golongan', 'nama_Gol')
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('no')
                ->label('No')
                ->getStateUsing(function ($record, $livewire) {
                    // Mengambil halaman aktif dan jumlah data per halaman dari Livewire
                    $currentPage = $livewire->getTablePage(); // Halaman aktif saat ini
                    $perPage = $livewire->getTableRecordsPerPage(); // Jumlah data per halaman

                    // Menghitung nomor urut
                    $startIndex = ($currentPage - 1) * $perPage + 1;
                    
                    // Menampilkan nomor urut
                    return $startIndex + (int)$record->getKey(); // Menggunakan record key untuk menghitung nomor urut
                }),
                TextColumn::make('NIM')->sortable()->searchable(),
                TextColumn::make('Nama')->sortable()->searchable(),
                TextColumn::make('Alamat')->limit(50),
                TextColumn::make('Nohp')->limit(20)->label('Nomor HP'),
                TextColumn::make('Semester'),
                TextColumn::make('golongan.nama_Gol')->label('Golongan'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListMahasiswa::route('/'),
            'create' => Pages\CreateMahasiswa::route('/create'),
            'edit' => Pages\EditMahasiswa::route('/{record}/edit'),
        ];
    }

    public static function downloadPdf()
    {
        $mahasiswa = Mahasiswa::all();  // Ambil data mahasiswa
        // $pdf = PDF::loadView('filament.pdf.mahasiswa', compact('mahasiswa')); // Tampilkan data mahasiswa ke view PDF
        // return $pdf->download('mahasiswa.pdf');  // Download PDF
        return view('filament.pdf.mahasiswa', compact('mahasiswa'));
    }
}
