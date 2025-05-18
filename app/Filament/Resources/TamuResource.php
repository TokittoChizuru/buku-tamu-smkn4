<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TamuResource\Pages;
use App\Filament\Resources\TamuResource\RelationManagers;
use App\Models\Tamu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use App\Exports\TamuExport;
use Filament\Tables\Actions\Action;
use Maatwebsite\Excel\Facades\Excel;


class TamuResource extends Resource
{
    protected static ?string $model = Tamu::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_lengkap')
                    ->required()
                    ->label('Nama Lengkap'),
                TextInput::make('asal_tamu')
                    ->required()
                    ->label('Instansi'),
                TextInput::make('menemui')
                    ->required()
                    ->label('Menemui'),
                TextArea::make('alasan')
                    ->required()
                    ->label('Alasan'),
                FileUpload::make('foto_tamu')
    ->label('Foto Tamu')
    ->directory('img') // Akan disimpan ke storage/app/public/img
    ->image()
    ->imagePreviewHeight('150')
    ->visibility('public'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_lengkap')
                ->label('Nama Lengkap'),
                TextColumn::make('asal_tamu')
                ->label('Instansi'),
                TextColumn::make('menemui')
                ->label('Menemui'),
                TextColumn::make('alasan')
                ->label('Alasan'),
                ImageColumn::make('foto_tamu')
    ->label('Foto')
    ->url(fn ($record) => asset('storage/' . $record->foto_tamu))
    ->height(60),
            ])
            ->filters([
                //
            ])
            ->headerActions([
            Action::make('export')
                ->label('Export Excel')
                ->icon('heroicon-o-arrow-down-tray')
                ->color('success')
                ->action(function () {
                    return Excel::download(new TamuExport, 'DataTamu.xlsx');
                }),
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
            'index' => Pages\ListTamus::route('/'),
            'create' => Pages\CreateTamu::route('/create'),
            'edit' => Pages\EditTamu::route('/{record}/edit'),
        ];
    }
}
