<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Models\Event;

class CalendarController extends Controller
{


    public function getEvents(Request $request)
    {
        try {
            $start = $request->get('start');
            $end = $request->get('end');

            // Retrieve events from the database
            $events = Event::whereBetween('start', [$start, $end])
                ->orWhereBetween('end', [$start, $end])
                ->get();

            // Format the events as an array of objects
            $formattedEvents = [];
            foreach ($events as $event) {
                $formattedEvents[] = [
                    'title' => $event->title,
                    'start' => $event->start,
                    'end' => $event->end,
                ];
            }

            return response()->json($formattedEvents);
        } catch (Exception $e) {
            // Log the error
            Log::error($e);
            return response()->json(['error' => 'An error occurred while fetching events.'], 500);
        }
    }


public function store(Request $request)
{
    try {
        // Define validation rules
        $rules = [
            'title' => 'required|string|max:255',
            'start' => 'required|date',
            'end' => 'required|date|after:start',
        ];

        // Create custom validation messages
        $messages = [
            'end.after' => 'The end date must be after the start date.',
        ];

        // Validate the input data
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            // Validation failed
            return response()->json(['error' => $validator->errors()], 422);
        }

        // Validation passed, proceed with event creation
        $title = $request->input('title');
        $start = $request->input('start');
        $end = $request->input('end');

        $event = new Event();
        $event->title = $title;
        $event->start = $start;
        $event->end = $end;
        $event->save();

        return response()->json(['message' => 'Event created successfully'], 200);
    } catch (Exception $e) {
        // Log the error
        Log::error($e);

        // Return a more informative error response
        return response()->json(['error' => 'An error occurred while creating the event: ' . $e->getMessage()], 500);
    }
}


}
