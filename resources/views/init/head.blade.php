<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Custom styles for the dashboard */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8fafc;
        }

        .admin-panel {
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .admin-panel:hover {
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }

        .clock-container {
            transition: transform 0.18s ease, box-shadow 0.18s ease;
            border-radius: 9999px;
        }

        .clock-container:hover {
            transform: scale(1.02);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
        }

        #analog-clock {
            user-select: none;
            -webkit-user-select: none;
        }

        .admin-btn {
            transition: all 0.2s ease;
        }

        .admin-btn:hover {
            transform: translateY(-2px);
        }

        .admin-content {
            display: none;
        }

        .admin-content.active {
            display: block;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .nav-tab {
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .nav-tab.active {
            background-color: rgba(255, 255, 255, 0.15);
            border-radius: 6px;
        }

        .slider-table {
            width: 100%;
            border-collapse: collapse;
        }

        .slider-table th, .slider-table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }

        .slider-table th {
            background-color: #f1f5f9;
            font-weight: 600;
        }

        .slider-image {
            width: 100px;
            height: 60px;
            object-fit: cover;
            border-radius: 4px;
        }
    </style>
</head>
