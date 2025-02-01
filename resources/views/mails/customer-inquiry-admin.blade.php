@extends('template.layout.email')
@section('email.content')
{{-- <!DOCTYPE html>
<html>
<head>
    <title>New Customer Inquiry</title> --}}
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .email-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            border-radius: 8px;
        }
        .email-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .email-header h1 {
            color: #5a5a5a;
        }
        .email-content {
            margin-bottom: 20px;
        }
        .email-footer {
            text-align: center;
            font-size: 0.9em;
            color: #777;
        }
    </style>
{{-- </head>
<body> --}}
    <div class="email-container">
        <div class="email-header">
            <h1>New Customer Inquiry</h1>
        </div>
        <div class="email-content">
            <p>Dear Admin,</p>
            <p>You have received a new inquiry from a customer. Below are the details:</p>
            <table style="width: 100%; border-collapse: collapse; margin: 20px 0;">
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><strong>Name:</strong></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">{{ @$name }}</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><strong>Email:</strong></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">{{ @$email }}</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><strong>Phone:</strong></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">{{ @$phone }}</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;"><strong>Message:</strong></td>
                    <td style="padding: 10px; border: 1px solid #ddd;">{{ @$msg }}</td>
                </tr>
            </table>
        </div>
        {{-- <div class="email-footer">
            <p>This is an automated email. Please do not reply to this message.</p>
        </div> --}}
    </div>
{{-- </body>
</html> --}}


@stop
