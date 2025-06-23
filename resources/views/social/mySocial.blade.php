@extends('layouts.app')
@section('back')
    <a href="{{ url('/dashboard-user') }}" class="back-btn"> <i class="icon-left"></i> </a>
@endsection
@section('container')
    <br>
    <div id="app-wrap" class="style1">
        <div class="tf-container">
            <div id="calendar"></div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    @php
        $dayMap = [
            'Minggu' => 0,
            'Senin' => 1,
            'Selasa' => 2,
            'Rabu' => 3,
            'Kamis' => 4,
            'Jumat' => 5,
            'Sabtu' => 6,
        ];
    @endphp

    @push('style')
        <style>
            .fc-event-title,
            .fc-event-time,
            .fc-event-main {
                white-space: normal !important;
            }

            .fc-event {
                padding: 2px 4px !important;
                line-height: 1.2 !important;
            }

            .fc-event-title {
                word-break: break-word;
            }
        </style>
    @endpush


    @push('script')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var calendarEl = document.getElementById('calendar');

                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    height: 800,
                    headerToolbar: {
                        left: 'prev,next',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek'
                    },
                    events: [
                        @foreach($socials as $social)
                            @if($social->type == 'Jadwal Tetap')
                            {
                                title: '{{ $social->title }}',
                                daysOfWeek: [{{ $dayMap[$social->day] ?? 0 }}],
                                allDay: true,
                                extendedProps: {
                                    note: `{!! nl2br(e($social->note)) !!}`,
                                    contact_person: '{{ $social->contact_person }}'
                                }
                            },
                            @elseif($social->type == 'Event')
                            {
                                title: '{{ $social->title }}',
                                start: '{{ \Carbon\Carbon::parse($social->date)->format("Y-m-d") }}',
                                allDay: true,
                                backgroundColor: '#f39c12',
                                borderColor    : '#f39c12',
                                extendedProps: {
                                    note: `{!! nl2br(e($social->note)) !!}`,
                                    contact_person: '{{ $social->contact_person }}'
                                }
                            },
                            @endif
                        @endforeach
                    ],
                    eventDidMount: function(info) {
                        const tooltipContent = `
                            <strong>${info.event.title}</strong><br>
                            <small><b>Keterangan:</b> ${info.event.extendedProps.note}</small><br>
                            <small><b>Contact Person:</b> ${info.event.extendedProps.contact_person}</small>
                        `;

                        $(info.el).tooltip({
                            title: tooltipContent,
                            html: true,
                            placement: 'top',
                            container: 'body'
                        });
                    }
                });

                calendar.render();
            });
        </script>
    @endpush

@endsection
