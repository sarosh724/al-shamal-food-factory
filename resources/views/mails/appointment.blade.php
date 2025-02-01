@extends('template.layout.email')
@section('email.content')
    <h3>Dear {{ $userName }},</h3>
    <p>Your appointment has been submitted with the following details:</p>
    <ul>
        <li><strong>Appointment Number:</strong> {{ @$appointmentNumber }}</li>
        <li><strong>Date:</strong> {{ @$appointmentDate }}</li>
    </ul>
    <p>Thank you for choosing our service!</p>
@stop
