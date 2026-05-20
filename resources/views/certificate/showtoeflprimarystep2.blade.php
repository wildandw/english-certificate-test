<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=1200">
  <link rel="icon" href="{{ asset('img/test.png') }}" type="image/png">
  <title>TOEFL Primary Step 2</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Lato:ital,wght@0,400;0,700;1,400&family=PT+Serif:ital,wght@0,400;0,700;1,400&family=Source+Serif+Pro:wght@400;700&display=swap" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Montserrat:ital,wght@1,300&display=swap" rel="stylesheet"/>

  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Lato', sans-serif;
      background-color: #f5f5f5;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      padding: 20px;
    }

    .certificate {
      width: 100%;
      max-width: 1000px;
      height: 700px;
      background-color: white;
      border: 25px solid #0d87c0;
      position: relative;
      padding: 40px;
      margin: 0 auto;
      color: #000;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    .certificate-number {
      font-size: 14px;
    }

    .certificate-inner {
      position: relative;
      width: 100%;
      height: 100%;
      z-index: 10;
      text-align: center;
    }

    .watermark {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      opacity: 1;
      width: 100%;
      height: auto;
      z-index: 1;
    }

    .logo-container {
      position: absolute;
      top: -10px;
      left: -10px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .logo {
      width: 80px;
      height: auto;
    }

    .test-date {
      font-size: 11px;
      margin-top: 4px;
      color: #000;
      text-align: center;
    }

    .qr-code {
      position: absolute;
      top: -5px;
      right: -5px;
      width: 100px;
      height: 100px;
    }

    .qr-validation {
      position: absolute;
      top: -25px;
      right: -15px;
      font-size: 12px;
    }

    .toefl-header {
      margin-top: 25px;
      font-size: 28px;
      font-family: 'Montserrat', sans-serif;
      font-style: italic;
      font-weight: 600;
    }

    .step {
      font-size: 18px;
      margin-top: 10px;
      font-weight: bold;
    }

    .title {
      font-size: 28px;
      font-weight: bold;
      margin-top: 20px;
    }

    .subtitle {
      font-size: 14px;
      margin-top: 20px;
    }

    .participant {
      font-size: 32px;
      font-weight: bold;
      margin: 10px 0;
    }

    .test-description {
      font-size: 14px;
      font-style: italic;
      margin-bottom: 10px;
    }

    .scores-container {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 5px;
      margin-bottom: 30px;
    }

    .score-column {
      width: 100%;
      max-width: 100px;
      text-align: center;
    }

    .score-item {
      display: flex;
      justify-content: space-between;
      width: 100%;
    }

    .score-label {
      font-size: 14px;
      text-align: right;
      margin-left: -10px;
    }
    
    .score-value {
      font-size: 14px;
      text-align: right;
      font-weight: bold;
    }
    /* 2 */
    .score-label2 {
      font-size: 14px;
      text-align: right;
      margin-left: -16px;
    }
    
    .score-value2 {
      font-size: 14px;
      text-align: right;
      font-weight: bold;
    }
    /* 3 */
    .score-label3 {
      font-size: 14px;
      text-align: right;
      margin-left: -15px;
    }
    
    .score-value3 {
      font-size: 14px;
      text-align: right;
      font-weight: bold;
    }
    /* 4 */
    .score-label4 {
      font-size: 14px;
      text-align: right;
      margin-left: -6px;
    }
    
    .score-value4 {
      font-size: 14px;
      text-align: right;
      font-weight: bold;
    }
    
    .stars img {
        height: auto;
        width: 24px;
     }


    .score-item {
        display: flex;
        align-items: center;
        gap: 8px; /* jarak antara label dan bintang */
        white-space: nowrap;
    }

    .score-value {
        display: flex;
        align-items: center;
    }

    .footer {
      display: flex;
      justify-content: space-between;
      margin-top: 30px;
    }

    .date {
      font-size: 13px;
      text-align: left;
      margin-top: -40px;
      margin-bottom: -50px;
    }

    .valid-until {
      font-size: 13px;
      position: absolute;
      top: 100px;
      right: -15px;
    }

    .signatures {
      display: flex;
      justify-content: space-between;
      margin-top: 5px;
    }

    .signature {
      text-align: center;
      width: 30%;
    }

    .signatory-title {
      font-size: 13px;
      margin-bottom: 10px;
      line-height: 1.3;
    }

    .signature-space {
      height: 40px;
    }

    .signature-line {
        width: 80%;
        margin: -30px auto 0 auto;
        border-top: 1px solid #000;
        }

    .cap {
      display: block;
      margin: 0 auto;
      width: 110px;
      height: auto;
      object-fit: contain;
      margin-top: -20px;
      margin-bottom: 100px;
      margin-left: 10px;
      z-index: -5;
      position: absolute;
    }
    .cap2 {
      display: block;
      margin: 0 auto;
      width: 160px;
      height: auto;
      object-fit: contain;
      margin-top: -25px;
      margin-bottom: 140px;
      margin-left: -10px;
      z-index: -5;
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
        margin: -40px auto 0 auto;
        border-top: 1px solid #000;
        }

    .signatory-name {
      font-size: 13px;
    }
  </style>
</head>
<body>

 
     <!-- bintang untuk listening dan reading -->
    @php
    function toeflPrimaryStars($score) {
        if ($score >= 113 && $score <=115) $level = 4;
        elseif ($score >= 110 && $score <=112) $level = 4;
        elseif ($score >= 107 && $score <=109) $level = 3;
        elseif ($score >= 104 && $score <=106) $level = 2;
        else return '-';

        $output = '<div class="stars">';
        for ($i = 0; $i < $level; $i++) {
            $output .= '<img src="https://bpi-english-lab.com/wp-content/uploads/2025/05/badge.png" alt="star">';
        }
        $output .= '</div>';
        return $output;
    }
    @endphp

    <!-- bintang untuk speaking -->
     @php
    function toeflPrimaryStars2($score) {
        if ($score >= 23 && $score <=27) $level = 5;
        elseif ($score >= 18 && $score <=22) $level = 4;
        elseif ($score >= 13 && $score <=17) $level = 3;
        elseif ($score >= 7 && $score <=12) $level = 2;
        elseif ($score >= 1 && $score <=6) $level = 1;
        else return '-';

        $output = '<div class="stars">';
        for ($i = 0; $i < $level; $i++) {
            $output .= '<img src="https://bpi-english-lab.com/wp-content/uploads/2025/05/badge.png" alt="badge">';
        }
        $output .= '</div>';
        return $output;
    }
    @endphp

    <!-- bintang untuk writing -->
     @php
    function toeflPrimaryStars3($score) {
        if ($score >= 16 && $score <=17) $level = 4;
        elseif ($score >= 11 && $score <=15) $level = 3;
        elseif ($score >= 6 && $score <=10) $level = 2;
        elseif ($score >= 0 && $score <=5) $level = 1;
        else return '-';

        $output = '<div class="stars">';
        for ($i = 0; $i < $level; $i++) {
            $output .= '<img src="https://bpi-english-lab.com/wp-content/uploads/2025/05/badge.png" alt="badge">';
        }
        $output .= '</div>';
        return $output;
    }
    @endphp

    @php
            use Carbon\Carbon;
            $formattedExamDate = Carbon::parse($certificatetoeflprimarystep2->exam_date)->format('d-m-Y');
            $formattedDateofBirth = Carbon::parse($certificatetoeflprimarystep2->date_of_birth)->format('d-m-Y');
        @endphp


  <div class="certificate">
    <img class="watermark" src="https://bpi-english-lab.com/wp-content/uploads/2025/05/toefl-primary-e1747036028969.png" alt="BPI Watermark"/>

    <div class="certificate-inner">
      <div class="logo-container">
        <img class="logo" src="https://bpiedu.id/yayasanbpi/images/2022/10/03/logo%20bpi%20clear.png" alt="BPI Logo"/>
        <div class="test-date">Test Date: {{ $formattedExamDate}}</div>
      </div>


      <div class="certificate-number">No: {{ $certificatetoeflprimarystep2->no_sertif }}</div>
      <div class="qr-validation">Scan here for validation</div>
          <div class="qr-code">{!! $qrCode !!}</div>
      <div class="valid-until">Valid until: {{ $formattedValidDate}}</div>

      <div class="toefl-header">TOEFL PRIMARY</div>
      <div class="step">Step 2</div>
      <div class="title">Certificate of Achievement</div>
      <div class="subtitle">This is to certify that</div>
      <div class="participant">{{ $certificatetoeflprimarystep2->name }}</div>

      <div class="test-description">Has earned the following levels on the TOEFL Primary Prediction Test</div>

        <div class="scores-container">
          <div class="score-column">
              <div class="score-item">
                  <span class="score-label">Reading:</span>
                  <span class="score-value">{!! toeflPrimaryStars($certificatetoeflprimarystep2->reading_score ?? 0) !!}</span>
              </div>
          </div>
          <div class="score-column">
              <div class="score-item">
                  <span class="score-label2">Listening:</span>
                  <span class="score-value2">{!! toeflPrimaryStars($certificatetoeflprimarystep2->listening_score ?? 0) !!}</span>
              </div>
          </div>
          <!-- <div class="score-column">
              <div class="score-item">
                  <span class="score-label3">Speaking:</span>
                  <span class="score-value3">{!! toeflPrimaryStars2($certificatetoeflprimarystep2->speaking_score ?? 0) !!}</span>
              </div>
          </div> -->
          <div class="score-column">
              <div class="score-item">
                  <span class="score-label4">Writing:</span>
                  <span class="score-value4">{!! toeflPrimaryStars3($certificatetoeflprimarystep2->writing_score ?? 0) !!}</span>
              </div>
          </div>
        </div>

      <div class="signatures">
        <div class="signature">
          <div class="signatory-title">Development Director<br>of BPI Foundation</div>
          <img src="https://bpi-english-lab.com/wp-content/uploads/2025/05/LAR-2.png" alt="Tanda Tangan" class="signature-sign">
          <div class="signature-space"></div>
          <div class="signature-line"></div>
          <div class="signatory-name">Lukman Arif Rahman, M.Pd.</div>
        </div>
        <div class="signature">
          <div class="signatory-title">Principal of BPI<br>Elementary School</div>
          <img src="https://bpi-english-lab.com/wp-content/uploads/2025/05/cap-sd.png" alt="cap" class="cap2">
          <img src="https://bpi-english-lab.com/wp-content/uploads/2025/05/RT-2.png" alt="Tanda Tangan" class="signature-sign">
          <div class="signature-space"></div>
          <div class="signature-line"></div>
          <div class="signatory-name">Rini Trisnawulan, S.S.</div>
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
  </div>
</body>
</html>
