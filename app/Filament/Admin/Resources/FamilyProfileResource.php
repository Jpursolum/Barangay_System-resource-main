<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\FamilyProfileResource\Pages;
use App\Models\FamilyProfile;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class FamilyProfileResource extends Resource
{
    protected static ?string $model = FamilyProfile::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Inhabitants';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('user_id')->default(auth()->id()),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('sex')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('age')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('birthdate')
                    ->required(),
                Forms\Components\TextInput::make('civilstatus')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('religion')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('educAttainment')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('occupation')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('tenurestatus')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('typeOfDwelling')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('watersource')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('toiletFacility')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('housing_materials')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('4ps')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sex')
                    ->searchable(),
                Tables\Columns\TextColumn::make('age')
                    ->searchable(),
                Tables\Columns\TextColumn::make('birthdate')
                    ->searchable(),
                Tables\Columns\TextColumn::make('civilstatus')
                    ->searchable(),
                Tables\Columns\TextColumn::make('religion')
                    ->searchable(),
                Tables\Columns\TextColumn::make('educAttainment')
                    ->searchable(),
                Tables\Columns\TextColumn::make('occupation')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tenurestatus')
                    ->searchable(),
                Tables\Columns\TextColumn::make('typeOfDwelling')
                    ->searchable(),
                Tables\Columns\TextColumn::make('watersource')
                    ->searchable(),
                Tables\Columns\TextColumn::make('toiletFacility')
                    ->searchable(),
                Tables\Columns\TextColumn::make('housing_materials')
                    ->searchable(),
                Tables\Columns\TextColumn::make('4ps')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_approved')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                BooleanColumn::make('is_approved')->label('Approved'),
            ])
            ->filters([
                Filter::make('Pending Approval')
                    ->query(fn (Builder $query) => $query->where('is_approved', false)),
            ])
            ->actions([
                Action::make('approve')
                    ->label('Approve')
                    ->action(function (FamilyProfile $record) {
                        $record->is_approved = true;
                        $record->save();
                    })
                    ->visible(fn (FamilyProfile $record) => Filament::auth()->user() && (Filament::auth()->user()->hasRole('super_admin') || Filament::auth()->user()->hasRole('brgySecretary')) && ! $record->is_approved),
                Tables\Actions\EditAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        if (auth()->user()->hasRole('super_admin') || auth()->user()->hasRole('brgySecretary')) {
            return parent::getEloquentQuery();
        }

        return parent::getEloquentQuery()->where('user_id', auth()->id());
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
            'index' => Pages\ListFamilyProfiles::route('/'),
            'create' => Pages\CreateFamilyProfile::route('/create'),
            'edit' => Pages\EditFamilyProfile::route('/{record}/edit'),
        ];
    }
}
