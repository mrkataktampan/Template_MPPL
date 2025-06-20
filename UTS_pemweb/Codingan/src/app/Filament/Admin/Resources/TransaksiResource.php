<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\TransaksiResource\Pages;
use App\Filament\Admin\Resources\TransaksiResource\RelationManagers;
use App\Models\Transaksi;
use App\Models\Kendaraan;
use App\Models\Customer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TransaksiResource extends Resource
{
    protected static ?string $model = Transaksi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('customer_id')
                    ->relationship('customer', 'nama')
                    ->required()
                    ->default(auth()->user()->id),

                Select::make('kendaraan_id')
                    ->relationship(
                        'kendaraan',
                        'nama',
                        fn (Builder $query) => $query->where('status', 'Tersedia')
                    )
                    ->getOptionLabelFromRecordUsing(fn ($record) => "{$record->nama} ({$record->tahun})")
                    ->required(),

                TextInput::make('jumlah')
                ->numeric()
                ->required()
                ->default(1)
                ->minValue(1)
                ->maxValue(function ($get) {
                    $kendaraan = \App\Models\Kendaraan::find($get('kendaraan_id'));
                    return $kendaraan ? $kendaraan->stok : 1;
                })
                ->reactive()
                ->dehydrated(),

                TextInput::make('total_harga')
                    ->numeric()
                    ->disabled()
                    ->dehydrated()
                    ->required()
                    ->default(function ($get) {
                        $kendaraan = Kendaraan::find($get('kendaraan_id'));
                        return $kendaraan ? $kendaraan->harga * $get('jumlah') : 0;
                    })
                    ->reactive(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('customer.nama')
                    ->label('Customer')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kendaraan.nama')
                    ->label('Kendaraan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jumlah')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_harga')
                   ->money('IDR')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListTransaksis::route('/'),
            'create' => Pages\CreateTransaksi::route('/create'),
            'edit' => Pages\EditTransaksi::route('/{record}/edit'),
        ];
    }
}