<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1100">
    <link rel="icon" href="{{ asset('img/test.png') }}" type="image/png">
    <title>TOEFL Junior Certificate</title>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Lato', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color:  #f5f5f5;
        }
        .certificate-container {
            position: relative;
            width: 1000px;
            height: 700px;
            padding: 20px;
            border: 20px solid #ffee00;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            background: #fff;
        }
        .background-img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 1;
            z-index: -1;
            background-image: url('https://bpi-english-lab.com/wp-content/uploads/2025/05/toefl-junior-e1747042658628.png');
            background-size: contain;
            background-position: center;
            background-repeat: no-repeat;
        }
        .header {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
            margin-top: 20px;
            position: relative;
        }

        .logo-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: absolute;
            left: 20px;
            top: 0;
        }

        .logo {
            width: 90px;
            height: auto;
        }

        .test-date {
            font-size: 12px;
            margin-top: 10px;
            text-align: center;
            color: #000;
        }

        .title {
            font-size: 34px;
            font-weight: 400;
            text-align: center;
            font-style: italic;
        }

        .certificate-title {
            font-size: 32px;
            font-weight: bold;
            text-align: center;
            margin: 20px 0;
        }
        .certify-text {
            font-size: 20px;
            font-style: italic;
            text-align: center;
            margin: 20px 0;
        }
        .student-name {
            font-size: 40px;
            font-weight: bold;
            text-align: center;
            margin: 20px 0;
        }
        .achievement-text {
            font-size: 20px;
            font-style: italic;
            text-align: center;
            margin: 10px 0;
        }
        .test-type {
            font-size: 28px;
            font-weight: bold;
            text-align: center;
            margin: 20px 0;
        }
        .scores {
            display: flex;
            text-align: left;
            margin: 20px 0 35px 200px;
            font-style: italic;
        }
        
        .scores-left {
            text-align: right;
            margin-left: 120px;
        }

        .scores-left strong{
            padding-left: 30px;
        }

        .score-item {
            margin: 5px 0;
            font-size: 16px;
        }

        .signatures {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
        }
        .signature {
            text-align: center;
            width: 32%;
        }

        .cap {
      display: block;
      margin: 0 auto;
      width: 120px;
      height: auto;
      object-fit: contain;
      margin-top: -25px;
      margin-bottom: 140px;
      margin-left: 30px;
      z-index: 1;
      position: absolute;
    }
        .cap2 {
      display: block;
      margin: 0 auto;
      width: 170px;
      height: auto;
      object-fit: contain;
      margin-top: -25px;
      margin-bottom: 140px;
      margin-left: 5px;
      z-index: 1;
      position: absolute;
    }

    .signature-sign {
      display: block;
      margin: 0 auto;
      width: 150px;
      height: 80px;
      object-fit: contain;
      margin-top: 10px;
      margin-bottom: 10px;
      z-index: 9;
    }

        .signature-line {
        width: 80%;
        margin: 10px auto 0 auto;
        border-top: 1px solid #000;
        }

        .signature-title {
            font-size: 13px;
            text-align: center;
        }
        .signature-name {
            font-size: 14px;
        }
        .certificate-number {
            text-align: center;
            margin: 5px 0 20px 0;
        }
        .validation-section {
            position: absolute;
            top: 40px;
            right: 40px;
            text-align: center;
        }
        .validation-text {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .qrcode {
          width: 100px;
          height: 100px;
          margin: 7px auto;
        }
        .valid-until {
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    @php
        use Carbon\Carbon;
        $formattedExamDate = Carbon::parse($certificatetoefljunior->exam_date)->format('d-m-Y');
        $formattedDateofBirth = Carbon::parse($certificatetoefljunior->date_of_birth)->format('d-m-Y');
         $formattedValidDate = Carbon::parse($certificatetoefljunior->valid_date)->format('F Y');
    @endphp
    <div class="certificate-container">
        <div class="background-img"></div>
        
        <div class="validation-section">
            <div class="validation-text">Scan here for validation</div>
              <div class="qrcode">
              {!! $qrCode !!}
            </div>
            <div class="valid-until">Valid until: {{ $formattedValidDate}}</div>
        </div>

        <div class="certificate-number">No. {{ $certificatetoefljunior->no_sertif }}</div>

        <div class="header">
            <div class="logo-container">
                <img src="https://bpiedu.id/yayasanbpi/images/2022/10/03/logo%20bpi%20clear.png" alt="BPI Logo" class="logo">
                <div class="test-date">Test Date: {{  $formattedExamDate }}</div>
            </div>
            <div class="title">TOEFL <strong>Junior.</strong></div>
        </div>

        <div class="certificate-title">CERTIFICATE OF ACHIEVEMENT</div>
        
        <div class="certify-text">This is to certify that</div>
        
        <div class="student-name">{{ $certificatetoefljunior->name }}</div>
        
        <div class="achievement-text">has achieved the following scores on the</div>
        <div class="test-type">TOEFL Junior Prediction Test</div>
        
        
        <div class="scores">
            <div class="scores-left">
                <div class="score-item">Listening: <strong>{{ $certificatetoefljunior->listening_score }}</strong></div>
                <div class="score-item">Language Form and Meaning: <strong>{{ $certificatetoefljunior->language_form_score }}</strong></div>
                <div class="score-item">Reading: <strong>{{ $certificatetoefljunior->reading_score }}</strong></div>
                <div class="score-item">Overall Score: <strong>{{ $certificatetoefljunior->total_score }}</strong></div>
            </div>
        </div>

        
        <div class="signatures">
            <div class="signature">
                <div class="signatory-title">Development Director<br>of BPI Foundation</div>
                <img src="https://bpi-english-lab.com/wp-content/uploads/2025/05/LAR-2.png" alt="Tanda Tangan" class="signature-sign">
                <div class="signature-space"></div>
                <div class="signature-line"></div>
                <div class="signatory-name">Lukman Arif Rachman, M.Pd.</div>
            </div>         
            <div class="signature">
                <div class="signatory-title">Principal of BPI<br>Junior High School</div>
                <img src="https://bpi-english-lab.com/wp-content/uploads/2025/05/cap-smp.png" alt="cap" class="cap2">
                <img src="https://bpi-english-lab.com/wp-content/uploads/2025/05/RI-2.png" alt="Tanda Tangan" class="signature-sign">
                <div class="signature-space"></div>
                <div class="signature-line"></div>
                <div class="signatory-name">Rina Indrawaty, S.Pd</div>
            </div>
            <div class="signature">
                <div class="signatory-title">
                    Bandung, May 30, 2025<br>
                    Head of UPK Prodiksus
                </div>
                 <img src="https://bpi-english-lab.com/wp-content/uploads/2025/05/upk-e1747674338525.png" alt="cap" class="cap">
                <img src="https://bpi-english-lab.com/wp-content/uploads/2025/05/LR-2.png" alt="Tanda Tangan" class="signature-sign">
                <div class="signature-space"></div>
                <div class="signature-line"></div>
                <div class="signatory-name">Lina Roufah, S.Pd.</div>
            </div>
        </div>
    </div>
</body>
</html>