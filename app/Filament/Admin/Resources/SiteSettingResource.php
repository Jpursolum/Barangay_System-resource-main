<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\SiteSettingResource\Pages;
use App\Models\SiteSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SiteSettingResource extends Resource
{
    protected static ?string $model = SiteSetting::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'Administration';

    public static function shouldRegisterNavigation(): bool
    {
        // Allow both 'admin' and 'brgy secretary' to see the resource
        return auth()->user()->hasAnyRole(['super_admin', 'brgySecretary']) || auth()->user()->can('view site settings');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('logo')
                    ->label('Site Logo')
                    ->image() // This ensures only images can be uploaded
                    ->directory('site-logos') // Store logos in 'public/site-logos' directory
                    ->required(),

                Forms\Components\FileUpload::make('slider_images')
                    ->label('Slider Images')
                    ->image() // Only image files
                    ->multiple() // Allow multiple file uploads
                    ->directory('site-sliders') // Store images in 'public/site-sliders' directory
                    ->required()
                    ->maxFiles(5), // Max 5 images for the slider
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('logo')
                    ->label('Site Logo')
                    ->square(),
                TextColumn::make('slider_images')
                    ->label('Slider Images')
                    ->limit(50), // Display a truncated list of images
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
            'index' => Pages\ListSiteSettings::route('/'),
            'create' => Pages\CreateSiteSetting::route('/create'),
            'edit' => Pages\EditSiteSetting::route('/{record}/edit'),
        ];
    }
}
