<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;
    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?string $navigationGroup = 'محتوى الموقع';
    protected static ?string $modelLabel = 'خدمة';
    protected static ?string $pluralModelLabel = 'الخدمات';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Tabs::make()->tabs([
                Forms\Components\Tabs\Tab::make('العربية')->schema([
                    Forms\Components\TextInput::make('name_ar')
                        ->label('اسم الخدمة بالعربية')
                        ->required()
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn ($state, Forms\Set $set) =>
                            $set('slug', Str::slug($state))
                        ),
                    Forms\Components\Textarea::make('description_ar')
                        ->label('الوصف بالعربية')
                        ->rows(4),
                ]),
                Forms\Components\Tabs\Tab::make('English')->schema([
                    Forms\Components\TextInput::make('name_en')
                        ->label('Service Name in English')
                        ->required(),
                    Forms\Components\Textarea::make('description_en')
                        ->label('Description in English')
                        ->rows(4),
                ]),
            ])->columnSpanFull(),

            Forms\Components\TextInput::make('slug')
                ->label('الرابط')
                ->required()
                ->unique(ignoreRecord: true),
            Forms\Components\TextInput::make('icon')
                ->label('أيقونة (Heroicon name)'),
            Forms\Components\FileUpload::make('image')
                ->label('صورة الخدمة')
                ->image()
                ->directory('services'),
            Forms\Components\TextInput::make('category')
                ->label('التصنيف'),
            Forms\Components\TextInput::make('order')
                ->label('الترتيب')
                ->numeric()
                ->default(0),
            Forms\Components\Toggle::make('is_active')
                ->label('مفعّل')
                ->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->label('الصورة'),
                Tables\Columns\TextColumn::make('name_ar')->label('الاسم بالعربية')->searchable(),
                Tables\Columns\TextColumn::make('name_en')->label('الاسم بالإنجليزية')->searchable(),
                Tables\Columns\TextColumn::make('category')->label('التصنيف'),
                Tables\Columns\TextColumn::make('order')->label('الترتيب')->sortable(),
                Tables\Columns\IconColumn::make('is_active')->label('مفعّل')->boolean(),
            ])
            ->reorderable('order')
            ->defaultSort('order')
            ->filters([])
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
