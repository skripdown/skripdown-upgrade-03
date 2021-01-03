<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-GB">
    <head>
        <title>{{$title}}</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <style>
        a {
            text-decoration: none;
            color: #2C3E50;
        }
        body {
            font-family: 'Roboto', sans-serif;
            padding: 0;
            margin: 0;
        }
        .bg {
            background-image: url('{{asset('asset/bg-blank.png')}}');
            text-align: center;
        }
        .content {
            max-width: 60vw;
            margin: 0 auto;
            display: inline-block;
            padding-bottom: 10rem;
        }
        .app_logo {
            display: inline-block;
            margin: 0 auto;
            width: 10rem;
        }
        .app_title {
            text-align: center;
        }
        .text-title {
            color: #2C3E50;
            font-size : 22pt;
            margin-top: -1rem;
            margin-bottom: 1rem;
        }
        .header {
            text-align: center;
            font-weight: bold;
        }
        .main-section {
            text-align: left;
            background-color: #fff;
            padding: 2rem 1.5rem;
            border-radius: 0.25rem;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0, 0, 0, 0.5);
        }
        .main-section-title {
            color: #2C3E50;
            font-size: 26pt;
            font-weight: bold;
            padding: 0 0 0.5rem;
        }
        .main-section-content {
            border-top: #ABB2B9 solid 2px;
            border-bottom: #ABB2B9 solid 2px;
            padding: 1rem 0;
        }
        .main-section-footer {
            text-align: right;
            padding: 1rem 0 0;
        }
        p {
            font-size: 12pt;
            color: #566573;
        }
    </style>
    </head>
    <body>
        <div class="bg">
            <div class="content">
                <table>
                    <tbody>
                    <tr>
                        <td class="header">
                            <img class="app_logo" src="{{asset(env('ICON_PATH'))}}" alt="">
                            <div class="app_title text-title">
                                <a href="{{url('/')}}">Skripdown team</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="main-section">
                            <table>
                                <tbody>
                                <tr>
                                    <td class="main-section-title">@yield('content-header')</td>
                                </tr>
                                <tr>
                                    <td class="main-section-content">
                                        @yield('content')
                                    </td>
                                </tr>
                                <tr>
                                    <td class="main-section-footer">
                                        <p>best regards <strong>Skripdown team {{env('APP_YEAR')}}</strong>🤚</p>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
