@extends('template.layout.email')
@section('email.content')
    <h3>Dear {{ $userName }},</h3>
    <p>Your message has been submitted to us</p>
    <p>Our representative will contact you soon</p>
    {{-- <ul>
        <li><strong>Appointment Number:</strong> {{ $appointmentNumber }}</li>
        <li><strong>Date:</strong> {{ $appointmentDate }}</li>
    </ul> --}}
    <p>Thank you for choosing our service!</p>
@stop
