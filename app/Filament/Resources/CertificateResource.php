<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CertificateResource\Pages;
use App\Models\Certificate;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CertificateResource extends Resource
{
    protected static ?string $model = Certificate::class;
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationGroup = 'محتوى الموقع';
    protected static ?string $modelLabel = 'شهادة';
    protected static ?string $pluralModelLabel = 'الشهادات';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\FileUpload::make('image')->label('صورة الشهادة')->image()->directory('certificates')->required()->columnSpanFull(),
            Forms\Components\Tabs::make()->tabs([
                Forms\Components\Tabs\Tab::make('العربية')->schema([
                    Forms\Components\TextInput::make('title_ar')->label('العنوان بالعربية')->required(),
                    Forms\Components\Textarea::make('description_ar')->label('الوصف بالعربية')->rows(3),
                ]),
                Forms\Components\Tabs\Tab::make('English')->schema([
                    Forms\Components\TextInput::make('title_en')->label('Title in English')->required(),
                    Forms\Components\Textarea::make('description_en')->label('Description in English')->rows(3),
                ]),
            ])->columnSpanFull(),
            Forms\Components\TextInput::make('issuer')->label('الجهة المانحة'),
            Forms\Components\DatePicker::make('issued_at')->label('تاريخ الإصدار'),
            Forms\Components\TextInput::make('order')->label('الترتيب')->numeric()->default(0),
            Forms\Components\Toggle::make('is_active')->label('مفعّل')->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->label('الصورة'),
                Tables\Columns\TextColumn::make('title_ar')->label('العنوان')->searchable(),
                Tables\Columns\TextColumn::make('issuer')->label('الجهة المانحة'),
                Tables\Columns\TextColumn::make('issued_at')->label('التاريخ')->date(),
                Tables\Columns\IconColumn::make('is_active')->label('مفعّل')->boolean(),
            ])
            ->defaultSort('order')
            ->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCertificates::route('/'),
            'create' => Pages\CreateCertificate::route('/create'),
            'edit' => Pages\EditCertificate::route('/{record}/edit'),
        ];
    }
}
