<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=1200">
  <link rel="icon" href="{{ asset('img/test.png') }}" type="image/png">
  <title>TOEIC Prediction Certificate</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Lato:ital,wght@0,400;0,700;1,400&family=PT+Serif:ital,wght@0,400;0,700;1,400&family=Source+Serif+Pro:wght@400;700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
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
      width: 1000px;
      height: 700px;
      background-image: url('https://bpi-english-lab.com/wp-content/uploads/2025/05/toeic.png');
      background-size: cover;
      background-position: center;
      padding: 40px;
      position: relative;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      border: solid 30px #9c6e22;
    }

    .certificate-number {
      text-align: center;
      margin-top: 10px;
      font-size: 14px;
      font-family: 'Lato', sans-serif;
    }

    .certify-section {
      margin: 20px auto 30px auto;
      text-align: center;
      padding: 0 60px;
    }


    .logo {
      position: absolute;
      top: 40px;
      left: 50px;
      width: 70px;
    }

    .title {
      text-align: center;
      font-family: 'Helvetica', Arial, sans-serif;
      font-style: italic;
      font-weight: bold;
      font-size: 35px;
      margin-top: 35px;
    }

    .subtitle {
      text-align: center;
      font-family: 'Source Serif Pro', serif;
      font-weight: bold;
      font-size: 26px;
      margin-top: 20px;
    }

    .test-date {
      position: absolute;
      top: 150px;
      left: 15px;
      font-size: 14px;
      font-family: 'Lato', sans-serif;
    }
    .certify-section {
      text-align: center;
      padding: 0 60px;
    }

    .certify-text {
      font-family: 'Lato', sans-serif;
      font-style: italic;
      font-size: 15px;
      margin-bottom: 5px;
    }

    .participant-name {
      font-family: 'DM Serif Display', serif;
      font-weight: bold;
      font-size: 26px;
      margin: 20px 0;
      text-transform: uppercase;
    }

    .score-text {
      font-family: 'PT Serif', serif;
      font-style: italic;
      font-size: 15px;
      text-align: center;
      margin-bottom: 10px;
    }

    .test-title {
      font-family: 'PT Serif', serif;
      font-weight: bold;
      font-size: 22px;
      text-align: center;
      font-style: italic;
      margin-bottom: 10px;
    }

    .scores-section {
      display: flex;
      justify-content: center;
      font-weight: bold;
    }
    
    .scores-labels {
      font-family: 'PT Serif', serif;
      text-align: right;
      line-height: 1.6;
    }
    
    .scores-values {
      font-family: 'PT Serif', serif;
      text-align: left;
      padding-left: 40px;
      line-height: 1.6;
    }

    .info-table {
      width: 60%;
      margin: 10px auto;
      font-size: 13px;
    }
    
    .info-row {
      display: flex;
      margin-bottom: 5px;
    }
    
    .info-label {
      font-family: 'PT Serif', serif;
      text-align: right;
      padding-right: 10px;
      font-style: italic;
      width: 50%;
    }
    
    .info-value {
      font-family: 'PT Serif', serif;
      text-align: left;
      padding-left: 10px;
      font-weight: bold;
      width: 50%;
    }

    .toeic-scale-1 { 
      margin-top: 10px;
      text-align: left;
      padding-left: 10px;
      width: 50%;
      font-family: 'Lato', sans-serif;
      font-weight: bold;
    }

    .toeic-scale { 
      text-align: left;
      padding-left: 10px;
      width: 50%;
      font-family: 'Lato', sans-serif;
    }

   /* FOOTER */
   .footer {
      display: flex;
      justify-content: space-between;
      align-items: flex-end;
      margin-top: -70px;
      position: relative;
      z-index: 1;
    }
    .qrcode-section {
      text-align: center;
      font-size: 11px;
    }

    .qrcode-topright {
      position: absolute;
      top: 40px;
      right: 45px;
      text-align: center;
      font-size: 11px;
    }

    .qrcode-topright .qrcode {
      margin: 5px auto;
    }
    

    .signatures {
      display: flex;
      justify-content: space-between;
      margin-top: 10px;
      padding: 0 60px;
    }

    .signature {
      text-align: center;
      font-size: 14px;
       position: relative;
      z-index: 99;
    }


    .signature-line {
       width: 100%;
      margin: 5px auto 0 auto;
      border-top: 1px solid #000;
    }

    .cap {
      display: block;
      margin: 0 auto;
      width: 110px;
      height: auto;
      object-fit: contain;
      margin-top: -15px;
      margin-bottom: 90px;
      margin-left: -40px;
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
      margin-bottom: 5px;
      z-index: 9;
    }
    .signature-sign2 {
      display: block;
      margin: 0 auto;
      width: 220px;
      height: 110px;
      object-fit: contain;
      margin-top: -15px;
      margin-bottom: -5px;
      z-index: -5;
    }

    .signatory-title{
      z-index: 99;
    }

  </style>
</head>
<body>
  @php
      use Carbon\Carbon;
      $formattedExamDate = Carbon::parse($certificatetoeic->exam_date)->format('d-m-Y');
      $formattedDateofBirth = Carbon::parse($certificatetoeic->date_of_birth)->format('d-m-Y');
  @endphp
  <div class="certificate">
    <img src="https://bpiedu.id/yayasanbpi/images/2022/10/03/logo%20bpi%20clear.png" alt="Logo" class="logo" />
    
    <div class="certificate-number">No: {{ $certificatetoeic->no_sertif }}</div>
    <div class="test-date">Test Date: {{ $formattedExamDate }}</div>

    <div class="title">TOEIC Prediction Test</div>
    <div class="subtitle">Certificate of Achievement</div>


    <div class="qrcode-topright">
      Scan here for validation
      <div class="qrcode">{!! $qrCode !!}</div>
      Valid until: {{ $formattedValidDate}}
    </div>

    <div class="certify-section">
      <p class="certify-text">This is to certify that</p>
      <div class="participant-name">{{ $certificatetoeic->name }}</div>
    </div>
    <p class="score-text">achieved the following scores on the</p>
    <div class="test-title">Test of English for International Communication</div>

    <div class="scores-section">
      <div class="scores-labels">
        <p>Listening:</p>
        <p>Reading:</p>
        <p>Total:</p>
      </div>
      <div class="scores-values">
        <p>{{ $certificatetoeic->listening_score }}</p>
        <p>{{ $certificatetoeic->reading_score }}</p>
        <p>{{ $certificatetoeic->total_score }}</p>
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
          <div class="signatory-title">Principal of BPI<br>Vocational High School</div>
          <div class="signature-space"></div>
          <img src="https://bpi-english-lab.com/wp-content/uploads/2025/05/DAM-ttd-e1748083111153.png" alt="Tanda Tangan" class="signature-sign2">
          <div class="signature-line"></div>
          <div class="signatory-name">Doni Agus Maulana, S.Pd.</div>
        </div>
            <div class="signature">
                <div class="signature-title">
                    Bandung, May 30, 2025<br>
                    Head of UPK Prodiksus
                </div>
                 <img src="https://bpi-english-lab.com/wp-content/uploads/2025/05/upk-e1747674338525.png" alt="cap" class="cap">
                <img src="https://bpi-english-lab.com/wp-content/uploads/2025/05/LR-2.png" alt="Tanda Tangan" class="signature-sign">
                <div class="signature-line"></div>
                <div class="signature-name">Lina Roufah, S.Pd.</div>
            </div>
      </div>
  </div>
</body>
</html>