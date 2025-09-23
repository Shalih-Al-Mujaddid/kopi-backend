<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BannerResource\Pages;
use App\Models\Banner;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BannerResource extends Resource
{
    protected static ?string $model = Banner::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationGroup = 'Banners';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->required()
                    ->directory('banners')
                    ->maxSize(5120)
                    ->minSize(10)
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('16:9')
                    ->imageResizeTargetWidth('1920')
                    ->imageResizeTargetHeight('1080')
                    ->helperText('Recommended: 1920x1080px, Max 5MB, JPG/PNG/GIF'),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->helperText('Maximum 255 characters'),
                Forms\Components\TextInput::make('title_secondary')
                    ->label('Secondary Title')
                    ->maxLength(255)
                    ->extraAttributes([
                        'class' => 'text-brown-600 placeholder-brown-400 focus:border-brown-500 focus:ring-brown-500',
                    ]),
                Forms\Components\Textarea::make('subtitle')
                    ->maxLength(1000)
                    ->helperText('Maximum 1000 characters'),
                Forms\Components\TextInput::make('link')
                    ->url()
                    ->nullable()
                    ->maxLength(500)
                    ->helperText('Optional link when banner is clicked'),
                Forms\Components\Toggle::make('is_active')
                    ->required()
                    ->default(true),
                Forms\Components\ColorPicker::make('text_color')
                    ->label('Text Color')
                    ->default('#8B4513')
                    ->helperText('Choose text color for the banner (default: brown)'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->square()
                    ->size(50),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\ColorColumn::make('text_color')
                    ->label('Text Color'),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d/m/Y H:i'),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBanners::route('/'),
            'create' => Pages\CreateBanner::route('/create'),
            'edit' => Pages\EditBanner::route('/{record}/edit'),
        ];
    }
}
