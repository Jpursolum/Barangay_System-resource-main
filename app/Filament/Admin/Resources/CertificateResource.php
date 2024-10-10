<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\CertificateResource\Pages;
use App\Models\Certificate;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class CertificateResource extends Resource
{
    protected static ?string $model = Certificate::class;

    protected static ?string $navigationIcon = 'heroicon-o-document';

    protected static ?string $navigationGroup = 'Certificate Appointments';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Name')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required(),

                Forms\Components\Select::make('certificate_type')
                    ->label('Certificate Type')
                    ->options([
                        'Indigency_certificate' => 'Indigency Certificate',
                        'barangay_clearance' => 'Barangay Clearance',
                        'business_permit' => 'Business Permit',
                    ])
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        $prices = [
                            'Indigency_certificate' => '100.00',
                            'barangay_clearance' => '150.00',
                            'business_permit' => '300.00',
                        ];

                        $set('price', $prices[$state] ?? '0.00');
                    }),

                Forms\Components\TextInput::make('price')
                    ->label('Price')
                    ->prefix('₱')
                    ->readOnly()
                    ->maxLength(255),

                Forms\Components\Textarea::make('purpose')
                    ->label('Purpose')
                    ->required(),

                // Add the payment method field
                Forms\Components\Select::make('payment_method')
                    ->label('Payment Method')
                    ->options([
                        'cash' => 'Cash',
                        'gcash' => 'Gcash',
                    ])
                    ->required(),

                Forms\Components\Select::make('payment_status')
                    ->label('Payment Status')
                    ->options([
                        'pending' => 'Pending',
                        'paid' => 'Paid',
                        'failed' => 'Failed',
                    ])
                    ->default('pending')
                    ->required()
                    ->disabled(fn () => Auth::user()->hasRole('brgyUser')),

                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options([
                        'submitted' => 'Submitted',
                        'received' => 'Received',
                        'under_processing' => 'Under Processing',
                        'pending' => 'Pending',
                        'ready_for_release' => 'Ready for Release',
                        'released' => 'Released',
                        'cancelled' => 'Cancelled',
                    ])
                    ->default('submitted')
                    ->required()
                    ->disabled(fn () => Auth::user()->hasRole('brgyUser')),

                Forms\Components\Toggle::make('is_approved')
                    ->label('Approved')
                    ->disabled()
                    ->visible(fn () => Auth::user()->hasRole('brgySecretary')),
                // Hidden field to automatically set the user_id
                Forms\Components\Hidden::make('user_id')
                    ->default(Auth::id()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Name')
                    ->searchable(),

                TextColumn::make('email')
                    ->label('Email'),

                TextColumn::make('certificate_type')
                    ->label('Certificate Type')
                    ->formatStateUsing(fn ($state) => ucfirst(str_replace('_', ' ', $state))),

                TextColumn::make('price')
                    ->label('Price')
                    ->prefix('₱')
                    ->sortable(),

                // Display the payment method
                TextColumn::make('payment_method')
                    ->label('Payment Method')
                    ->formatStateUsing(fn ($state) => ucfirst($state))
                    ->sortable(),

                TextColumn::make('payment_status')
                    ->label('Payment Status')
                    ->formatStateUsing(fn ($state) => ucfirst($state))
                    ->sortable(),

                TextColumn::make('purpose')
                    ->label('Purpose')
                    ->limit(50),

                BooleanColumn::make('is_approved')
                    ->label('Approved')
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle'),

                TextColumn::make('status')
                    ->label('Status')
                    ->formatStateUsing(fn ($state) => ucfirst(str_replace('_', ' ', $state)))
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                Filter::make('certificate_type')
                    ->label('Certificate Type')
                    ->query(fn (Builder $query) => $query->where('certificate_type', '!=', null)),

                // Filter by status
                Filter::make('status')
                    ->label('Status')
                    ->form([
                        Forms\Components\Select::make('status')
                            ->options([
                                'submitted' => 'Submitted',
                                'received' => 'Received',
                                'under_processing' => 'Under Processing',
                                'pending' => 'Pending',
                                'ready_for_release' => 'Ready for Release',
                                'released' => 'Released',
                                'cancelled' => 'Cancelled',
                            ])
                            ->placeholder('All'),
                    ])
                    ->query(fn (Builder $query, array $data) => $data['status'] ? $query->where('status', $data['status']) : $query),
            ])
            ->actions([
                Action::make('approve')
                    ->label('Approve')
                    ->action(function (Certificate $record) {
                        $record->is_approved = true; // Set approved status to true
                        $record->save();
                    })
                    ->visible(fn (Certificate $record) => Auth::user()->hasAnyRole(['brgySecretary', 'super_admin']) && ! $record->is_approved), // Visible for both roles and if not approved yet

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
            'index' => Pages\ListCertificates::route('/'),
            'create' => Pages\CreateCertificate::route('/create'),
            'edit' => Pages\EditCertificate::route('/{record}/edit'),
        ];
    }
    // public static function beforeCreate($record, $data)
    // {
    //     $prices = [
    //         'Indigency_certificate' => '100.00',
    //         'barangay_clearance' => '150.00',
    //         'business_permit' => '300.00',
    //     ];

    //     $record->price = $prices[$data['certificate_type']] ?? '0.00';
    // }
    public static function mutateFormDataBeforeCreate(array $data): array
    {
        $prices = [
            'Indigency_certificate' => '100.00',
            'barangay_clearance' => '150.00',
            'business_permit' => '300.00',
        ];

        $data['price'] = $prices[$data['certificate_type']] ?? '0.00';

        return $data;
    }

    // public static function beforeSave($record, $data)
    // {
    //     $prices = [
    //         'Indigency_certificate' => '100.00',
    //         'barangay_clearance' => '150.00',
    //         'business_permit' => '300.00',
    //     ];

    //     $record->price = $prices[$data['certificate_type']] ?? '0.00';
    // }
    public static function mutateFormDataBeforeSave(array $data): array
    {
        $prices = [
            'Indigency_certificate' => '100.00',
            'barangay_clearance' => '150.00',
            'business_permit' => '300.00',
        ];

        $data['price'] = $prices[$data['certificate_type']] ?? '0.00';

        return $data;
    }

    public static function getEloquentQuery(): Builder
    {
        // Check if the user has the 'brgyUser' role
        if (Auth::user()->hasRole('brgyUser')) {
            // Restrict the query to show only certificates created by the logged-in user
            return parent::getEloquentQuery()->where('user_id', Auth::id());
        }

        // For other roles, show all certificates
        return parent::getEloquentQuery();
    }
}
