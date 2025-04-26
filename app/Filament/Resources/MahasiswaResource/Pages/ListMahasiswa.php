<?php

namespace App\Filament\Resources\MahasiswaResource\Pages;

use App\Filament\Resources\MahasiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMahasiswa extends ListRecords
{
    protected static string $resource = MahasiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\Action::make('downloadPdf')
            ->label('Download PDF')
            // ->icon('heroicon-o-download')
            ->url(route('mahasiswa.download-pdf'))
            ->openUrlInNewTab(),
        ];
    }
}
