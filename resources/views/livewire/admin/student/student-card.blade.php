<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <title>کارت شاگرد</title>
    <style>
        body {
            background: #e0f2fe;
            font-family: "Vazir", Tahoma, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .card {
            position: relative;
            width: 400px;
            height: 500px;
            background: linear-gradient(135deg, #3b82f6, #60a5fa);
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(59, 130, 246, 0.5);
            color: white;
            overflow: hidden;
            padding: 20px;
            box-sizing: border-box;
        }

        .logo-left,
        .logo-right {
            position: absolute;
            top: 20px;
            width: 60px;
            height: 60px;
            opacity: 0.8;
            filter: drop-shadow(0 0 5px rgba(0, 0, 0, 0.3));
        }

        .logo-left {
            left: 20px;
        }

        .logo-right {
            right: 20px;
        }

        .header-text {
            text-align: center;
            margin-top: 80px;
            line-height: 1.5;
        }

        .photo {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 4px solid white;
            overflow: hidden;
            margin: 10px auto 15px auto;
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.6);
        }

        .photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .info {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            padding: 10px 20px;
            text-align: center;
            box-shadow: inset 0 0 10px rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(10px);
        }

        .info h2 {
            margin: 0 0 5px 0;
            font-size: 18px;
            font-weight: 700;
        }

        .info p {
            margin: 4px 0;
            font-weight: 500;
            font-size: 14px;
        }

        .circle1,
        .circle2 {
            position: absolute;
            border-radius: 50%;
            filter: blur(40px);
            opacity: 0.3;
            z-index: 0;
        }

        .circle1 {
            width: 160px;
            height: 160px;
            background: #2563eb;
            top: -60px;
            right: -60px;
        }

        .circle2 {
            width: 140px;
            height: 140px;
            background: #3b82f6;
            bottom: -50px;
            left: -50px;
        }
    </style>
</head>

<body>
    <div class="card">

        <!-- لوگوها -->
        <img src="{{ $logoLeft }}" class="logo-left" />
        <img src="{{ $logoRight }}" class="logo-right" />

        <!-- متن رسمی -->
        <div class="header-text">
            <p>امارت اسلامی افغانستان</p>
            <p>وزارت مخابرات و تکنالوژی معلوماتی</p>
            <p>ریاست مخابرات و تکنالوژی معلوماتی ولایت غور</p>
        </div>

        <!-- عکس شاگرد -->
        <div class="photo">
            <img src="{{ $student->imageBase64 }}" alt="عکس شاگرد" />
        </div>

        <!-- مشخصات -->
        <div class="info">
            <h4>نام شاگرد: {{ $student->users->name }}</h4>
            <p>تخلص: {{ $student->last_name }}</p>
            <p>ولد: {{ $student->fname }}</p>
        </div>

        <div class="circle1"></div>
        <div class="circle2"></div>
    </div>
</body>

</html>
