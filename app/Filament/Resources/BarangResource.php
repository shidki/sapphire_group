<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BarangResource\Pages;
use App\Filament\Resources\BarangResource\RelationManagers;
use App\Models\Barang;
use Closure;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Unique;

class BarangResource extends Resource
{
    protected static ?string $model = Barang::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Kelola barang';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make("nama_barang")
                ->required()
                ->unique(table: barang::class, column: "nama_barang", ignorable: fn ($record) => $record)
                ->validationMessages([
                    "unique" => "Barang sudah tersedia"
                ]),


                TextInput::make("qty")
                ->label("Jumlah")
                ->required()
                ->integer()
                ->minValue(0),

                Select::make("pemilik_id")
                ->label("Pemilik")
                ->reactive()
                ->required()
                ->relationship("pemilik", "nama"),

                Select::make("qic_id")
                ->label("Qic")
                ->required()
                ->relationship("qic", "nama"),

                DatePicker::make("tanggal_pembelian")
                ->reactive()
                ->required(),

                DatePicker::make("tanggal_pencatatan")
                ->maxDate(now())
                ->required(),
            ]);
    }
    

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("nama_barang"),
                TextColumn::make("qty")->label("jumlah"),
                TextColumn::make("pemilik.nama"),
                TextColumn::make("qic.nama"),
                TextColumn::make("tanggal_pembelian"),
                TextColumn::make("tanggal_pencatatan"),
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
            'index' => Pages\ListBarangs::route('/'),
            'create' => Pages\CreateBarang::route('/create'),
            'edit' => Pages\EditBarang::route('/{record}/edit'),
        ];
    }
}
