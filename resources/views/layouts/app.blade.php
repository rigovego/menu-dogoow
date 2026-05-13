<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'dogoow' }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Noto+Serif:wght@600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg-main: {{ $settings->background_color ?? '#F5E9DA' }};
            --bg-soft: #FBF4EC;
            --primary: {{ $settings->primary_color ?? '#C94A3F' }};
            --primary-dark: #A63B32;
            --border: #D9C2A7;
            --text-main: #5C4033;
            --text-soft: #7A5A49;
            --promo: #D9A441;
            --success: #6D8B5B;
            --danger: #B45145;
            --shadow: 0 12px 30px rgba(92, 64, 51, 0.10);
            --radius-xl: 28px;
            --radius-lg: 22px;
            --radius-md: 16px;
            --container: 1200px;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            min-height: 100vh;
            font-family: 'Montserrat', sans-serif;
            color: var(--text-main);
            background:
                linear-gradient(rgba(245, 233, 218, 0.92), rgba(245, 233, 218, 0.96)),
                url('{{ $settings->background_image_url ?? '' }}');
            background-color: var(--bg-main);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        img {
            max-width: 100%;
            display: block;
        }

        .container {
            width: min(var(--container), calc(100% - 32px));
            margin: 0 auto;
        }

        .font-display {
            font-family: 'Noto Serif', serif;
        }

        .soft-card {
            background: rgba(251, 244, 236, 0.92);
            border: 1px solid var(--border);
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow);
        }

        .topbar {
            position: sticky;
            top: 0;
            z-index: 20;
            backdrop-filter: blur(12px);
            background: rgba(251, 244, 236, 0.72);
            border-bottom: 1px solid rgba(217, 194, 167, 0.8);
        }

        .topbar-inner {
            min-height: 78px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .brand-wrap {
            display: flex;
            align-items: center;
        }


        .topbar-actions {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            border: none;
            border-radius: 999px;
            padding: 12px 18px;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s ease, opacity 0.2s ease, background 0.2s ease;
        }

        .btn:hover {
            transform: translateY(-1px);
        }

        .btn-primary {
            background: var(--primary);
            color: #FBF4EC;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
        }

        .btn-secondary {
            background: #E9D6C2;
            color: var(--text-main);
        }

        .btn-danger {
            background: var(--danger);
            color: #FBF4EC;
        }

        .page {
            padding: 28px 0 40px;
        }

        .section {
            margin-bottom: 24px;
        }

        .page-title {
            margin-bottom: 10px;
            font-size: clamp(2rem, 4vw, 3.4rem);
            color: var(--primary);
        }

        .page-subtitle {
            color: var(--text-soft);
            font-size: 1rem;
            line-height: 1.7;
            max-width: 760px;
        }

        .alert-wrap {
            margin: 20px 0;
            display: grid;
            gap: 12px;
        }

        .alert {
            border-radius: 18px;
            padding: 14px 18px;
            border: 1px solid var(--border);
            font-size: 0.96rem;
            box-shadow: var(--shadow);
        }

        .alert-success {
            background: rgba(109, 139, 91, 0.14);
            color: #48603b;
        }

        .alert-error {
            background: rgba(180, 81, 69, 0.14);
            color: #7f3a32;
        }

        .promo-bar {
            margin-bottom: 20px;
            overflow: hidden;
            border-radius: 999px;
            border: 1px solid rgba(0, 0, 0, 0.04);
            background: linear-gradient(135deg, var(--promo), #E5BB63);
            color: var(--text-main);
            box-shadow: var(--shadow);
        }

        .promo-track {
            white-space: nowrap;
            display: inline-block;
            padding: 12px 0;
            min-width: 100%;
            animation: marquee 18s linear infinite;
            font-weight: 700;
        }

        .promo-track span {
            display: inline-block;
            padding-right: 48px;
        }

        @keyframes marquee {
            0% {
                transform: translateX(100%);
            }
            100% {
                transform: translateX(-100%);
            }
        }

        .grid {
            display: grid;
            gap: 20px;
        }

        .grid-2 {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .grid-3 {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }

        .card {
            background: rgba(251, 244, 236, 0.95);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .card-body {
            padding: 20px;
        }

        .field {
            margin-bottom: 16px;
        }

        .field label {
            display: block;
            margin-bottom: 8px;
            font-size: 0.92rem;
            font-weight: 600;
            color: var(--text-main);
        }

        .field input,
        .field textarea,
        .field select {
            width: 100%;
            border: 1px solid var(--border);
            background: #F9EFE4;
            color: var(--text-main);
            border-radius: 16px;
            padding: 13px 14px;
            font-family: 'Montserrat', sans-serif;
            font-size: 0.96rem;
            outline: none;
        }

        .field textarea {
            resize: vertical;
            min-height: 120px;
        }

        .field input:focus,
        .field textarea:focus,
        .field select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(201, 74, 63, 0.10);
        }

        .inline-check {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 6px;
        }

        .inline-check input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: var(--primary);
        }

        .table-wrap {
            overflow-x: auto;
            border-radius: var(--radius-lg);
            border: 1px solid var(--border);
            background: rgba(251, 244, 236, 0.95);
            box-shadow: var(--shadow);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 14px 16px;
            text-align: left;
            border-bottom: 1px solid rgba(217, 194, 167, 0.65);
            font-size: 0.95rem;
        }

        th {
            background: rgba(233, 214, 194, 0.55);
            color: var(--text-main);
            font-weight: 700;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .muted {
            color: var(--text-soft);
        }

        .badge {
            display: inline-flex;
            align-items: center;
            border-radius: 999px;
            padding: 7px 12px;
            font-size: 0.8rem;
            font-weight: 700;
        }

        .badge-food {
            background: rgba(201, 74, 63, 0.12);
            color: var(--primary);
        }

        .badge-drink {
            background: rgba(217, 164, 65, 0.16);
            color: #8C6414;
        }

        .badge-active {
            background: rgba(109, 139, 91, 0.14);
            color: #48603b;
        }

        .badge-inactive {
            background: rgba(122, 90, 73, 0.14);
            color: var(--text-soft);
        }

        .footer {
            padding: 18px 0 30px;
            color: var(--text-soft);
            font-size: 0.92rem;
        }

        .footer-inner {
            border-top: 1px solid rgba(217, 194, 167, 0.85);
            padding-top: 18px;
        }

        @media (max-width: 900px) {
            .grid-2,
            .grid-3 {
                grid-template-columns: 1fr;
            }

            .topbar-inner {
                align-items: flex-start;
                padding: 16px 0;
                flex-direction: column;
            }

            .topbar-actions {
                width: 100%;
            }

            .topbar-actions .btn {
                width: 100%;
            }

            .brand-text h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <header class="topbar">
        <div class="container topbar-inner">
            <div class="brand-wrap">
                <img
                    src="{{ asset('img/logo.png') }}"
                    alt="Logo de dogoow"
                    style="width: 150px; height: auto; object-fit: contain;"
                >
            </div>

            <div class="topbar-actions">
                <a href="{{ route('menu.public') }}" class="btn btn-secondary">Ver menú</a>

                @if(session('admin_authenticated'))
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Panel admin</a>

                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Salir</button>
                    </form>
                @else
                    <a href="{{ route('admin.login') }}" class="btn btn-primary" title="Administración" aria-label="Administración">
                        ⚙
                    </a>
                @endif
            </div>
        </div>
    </header>

    <main class="page">
        <div class="container">
            @if(isset($settings) && $settings->promo_active && $settings->promo_text)
                <div class="promo-bar">
                    <div class="promo-track">
                        <span>{{ $settings->promo_text }}</span>
                        <span>{{ $settings->promo_text }}</span>
                        <span>{{ $settings->promo_text }}</span>
                    </div>
                </div>
            @endif

            <div class="alert-wrap">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-error">
                        {{ session('error') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-error">
                        <strong>Hay errores en el formulario:</strong>
                        <ul style="margin-top: 10px; padding-left: 20px;">
                            @foreach($errors->all() as $error)
                                <li style="margin-bottom: 4px;">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            @yield('content')
        </div>
    </main>

    <footer class="footer">
        <div class="container footer-inner">
            <p>3.3. Aplicación web con base de datos | Conceptualización de servicios en la nube | Rigoberto Velasquez Gonzalez</p>
        </div>
    </footer>
</body>
</html>