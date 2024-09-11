<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TimePicker;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Filament\Notifications\Notification;

class EventForm extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static string $view = 'filament.pages.event-form';
    protected static ?string $slug = 'event-form'; // Ensure this matches your URL

    protected static ?string $navigationLabel = 'مخطط السوق الزمني';
    protected static ?string $title = 'مخطط السوق الزمني';

    // Hide from the sidebar by returning false
    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }

    public $event_date;
    public $start_time;
    public $end_time;
    public $event_id;

    public function mount()
    {
        // Fetch the existing event from the database
        $event = DB::table('events')->first();

        if ($event) {
            // If an event exists, load its data into the form
            $this->event_id = $event->id;
            $this->event_date = $event->event_date;
            $this->start_time = $event->start_time;
            $this->end_time = $event->end_time;
        }
    }

    protected function getFormSchema(): array
    {
        return [
            DatePicker::make('event_date')
                ->required()
                ->label('تاريخ الحدث'),

            TimePicker::make('start_time')
                ->required()
                ->withoutSeconds() // Disable seconds
                ->label('وقت البدء'),

            TimePicker::make('end_time')
                ->required()
                ->withoutSeconds() // Disable seconds
                ->label('وقت الانتهاء'),
        ];
    }

    public function submit()
    {
        // Validate the form data with conditional rules
        $this->validate([
            'event_date' => 'required|date',
            'start_time' => [
                'required',
                'date_format:H:i',
                function ($attribute, $value, $fail) {
                    if ($this->end_time && $value >= $this->end_time) {
                        $fail('وقت البدء يجب أن يكون قبل وقت الانتهاء.'); // "Start time must be before end time" in Arabic
                    }
                },
            ],
            'end_time' => [
                'required',
                'date_format:H:i',
                'after:start_time',
            ],
        ]);

        if ($this->event_id) {
            // Update the existing event
            DB::table('events')->where('id', $this->event_id)->update([
                'event_date' => $this->event_date,
                'start_time' => $this->start_time,
                'end_time' => $this->end_time,
                'updated_at' => now(),
            ]);

            Notification::make('done')
                ->title('تم تحديد الموعد')
                ->body('تم تحديد موعد السوق بنجاح!')
                ->success()
                ->send();
        } else {
            // Create a new event if none exists
            DB::table('events')->insert([
                'event_date' => $this->event_date,
                'start_time' => $this->start_time,
                'end_time' => $this->end_time,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            Notification::make('done')
                ->title('تم تحديد الموعد')
                ->body('تم تحديد موعد السوق بنجاح!')
                ->success()
                ->send();
        }

        // Optionally reset the form
        // $this->reset(['event_date', 'start_time', 'end_time']);
    }
}
