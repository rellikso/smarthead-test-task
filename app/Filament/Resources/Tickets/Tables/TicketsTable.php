<?php

namespace App\Filament\Resources\Tickets\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TicketsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('customer.name')
                    ->searchable(isIndividual: true)
                    ->sortable(),
                TextColumn::make('customer.email')
                    ->searchable(isIndividual: true)
                    ->sortable(),
                TextColumn::make('subject')
                    ->searchable(isIndividual: true)
                    ->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->searchable(isIndividual: true)
                    ->sortable(),
               TextColumn::make('response_date')
                    ->dateTime()
                    ->searchable(isIndividual: true)
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
