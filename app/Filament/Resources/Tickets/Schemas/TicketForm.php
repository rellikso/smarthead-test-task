<?php

namespace App\Filament\Resources\Tickets\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Html;
use Filament\Schemas\Schema;

class TicketForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('customer_id')
                    ->relationship('customer', 'name')
                    ->searchable()
                    ->preload()
                    ->disabled(),
                TextInput::make('subject')
                    ->required()
                    ->readonly(),
                Textarea::make('text')
                    ->required()
                    ->columnSpanFull()
                    ->readOnly(),
                Select::make('status')
                    ->options([
                        'Новый' => 'Новый',
                        'В работе' => 'В работе',
                        'Обработан' => 'Обработан',
                    ])
                    ->default('Новый')
                    ->required(),
                DatePicker::make('response_date'),
                Html::make('attachments')
                    ->columnSpanFull()
                    ->content(fn ($get, $record) => $record
                        ? collect($record->getMedia('attachments'))
                            ->map(fn ($file) => "<a href='{$file->getUrl()}' target='_blank'>{$file->name}</a>")
                            ->implode('<br>')
                        : 'Нет файлов'),
            ]);
    }
}
