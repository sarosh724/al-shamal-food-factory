<html>
<head>
    <title>PDF</title>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
            font-size: 12.5px;
        }

        h1, h2, h3, h4, h5, h6 {
            padding: 0;
            margin: 4px 0px;
            text-align: left;
        }

        @page {
            margin: 90px 35px 75px;
        }

        header {
            position: fixed;
            top: -75px;
            left: 0px;
            right: 0px;
            border-bottom: 1px solid black;
        }

        #header-table {
            margin: 0px;
            border: none;
            width: 100%;
        }
        #header-table td {
            padding: 0;
            margin: 0;
            border: none !important;
        }
        #header-table .logo { width: 20%; text-align: left }
        #header-table .title { width: 60%; text-align: center; color: #10398d
        }
        #header-table .date { width: 20%; text-align: right }
        #header-table .address { width: 50%; text-align: left; color: black}
        #header-table .contact { width: 50%; text-align: right;}

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            padding: 10px 5px;
            text-align: left;
            font-size: 12px;
            border-bottom: 1px solid #CCC;
        }

        footer {
            position: fixed;
            bottom: -60px;
            left: 0px;
            right: 0px;
            height: 50px;
            border-top: 1px solid #10398d;
        }

        .heading {
            text-align: center !important;
            font-weight: normal;
            margin-top: 20px;
        }
    </style>
    @yield('styles')
</head>
<body>

@include('template.pdf.layout.header')
@include('template.pdf.layout.footer')
<h1 class="heading">@yield('heading')</h1>
@yield('content')
</body>
</html>
