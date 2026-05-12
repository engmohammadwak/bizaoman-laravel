<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeamMemberResource\Pages;
use App\Models\TeamMember;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TeamMemberResource extends Resource
{
    protected static ?string $model = TeamMember::class;
    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'محتوى الموقع';
    protected static ?string $modelLabel = 'عضو فريق';
    protected static ?string $pluralModelLabel = 'الفريق';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\FileUpload::make('image')
                ->label('الصورة الشخصية')
                ->image()
                ->directory('team')
                ->columnSpanFull(),

            Forms\Components\Tabs::make()->tabs([
                Forms\Components\Tabs\Tab::make('العربية')->schema([
                    Forms\Components\TextInput::make('name_ar')->label('الاسم بالعربية')->required(),
                    Forms\Components\TextInput::make('position_ar')->label('المنصب بالعربية'),
                    Forms\Components\Textarea::make('bio_ar')->label('السيرة الذاتية بالعربية')->rows(3),
                ]),
                Forms\Components\Tabs\Tab::make('English')->schema([
                    Forms\Components\TextInput::make('name_en')->label('Name in English')->required(),
                    Forms\Components\TextInput::make('position_en')->label('Position in English'),
                    Forms\Components\Textarea::make('bio_en')->label('Bio in English')->rows(3),
                ]),
            ])->columnSpanFull(),

            Forms\Components\TextInput::make('email')->label('البريد الإلكتروني')->email(),
            Forms\Components\TextInput::make('linkedin')->label('LinkedIn URL')->url(),
            Forms\Components\TextInput::make('twitter')->label('Twitter URL')->url(),
            Forms\Components\TextInput::make('order')->label('الترتيب')->numeric()->default(0),
            Forms\Components\Toggle::make('is_active')->label('مفعّل')->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->label('الصورة')->circular(),
                Tables\Columns\TextColumn::make('name_ar')->label('الاسم')->searchable(),
                Tables\Columns\TextColumn::make('position_ar')->label('المنصب'),
                Tables\Columns\TextColumn::make('order')->label('الترتيب')->sortable(),
                Tables\Columns\IconColumn::make('is_active')->label('مفعّل')->boolean(),
            ])
            ->reorderable('order')
            ->defaultSort('order')
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
            'index' => Pages\ListTeamMembers::route('/'),
            'create' => Pages\CreateTeamMember::route('/create'),
            'edit' => Pages\EditTeamMember::route('/{record}/edit'),
        ];
    }
}
