<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1300">
    <link rel="icon" href="{{ asset('img/test.png') }}" type="image/png">
    <title>IELTS Prediction Test Report Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Lato', sans-serif;
            margin: 0;
            padding: 20px;
            position: relative;
            background-color:  #f5f5f5;
        }
        .container {
            position: relative;
            padding: 20px;
            width: 1000px;
            height: 700px;
            margin: 0 auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        .background-img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 1;
            z-index: -1;
            background-image: url('https://bpi-english-lab.com/wp-content/uploads/2025/05/ielts_bg.png');
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 5px;
            margin-left: 25px;
        }
        .ielts-logo {
            width: 120px;
            height: auto;
            margin-top: 35px;
            margin-bottom: -40px;
        }

        .bpi-logo {
            width: 70px;
            height: auto;
            margin-right: 40px;
            margin-bottom: 10px;
            margin-top: 35px;
        }

        .report-title {
            font-weight: bold;
            font-size: 16px;
            margin-left: -500px;
            margin-top: 98px;
        }
        .date-section {
            display: flex;
            justify-content: space-between;
            margin: 10px 40px 0 190px;
        }
        .date-input {
            width: 200px;
            height: 25px;
            text-align: center;
            border: 1px solid #000;
            font-size: 14px;
        }
        .reference-input {
            width: 250px;
            height: 25px;
            text-align: center;
            border: 1px solid #000;
            font-size: 12px;
        }
        .divider {
            border-top: 1px solid #000;
            width: 95%;
            margin: 10px 0 0 20px;
        }
        .divider2 {
            border-top: 1px solid #000;
            width: 95%;
            margin: 0 0 -10px 20px;
        }
        .candidate-section {
            display: flex;
            justify-content: space-between;
            margin-left: 40px;
            margin-right: 40px;
        }
        .candidate-left {
            width: 70%;
            margin-top: -10px;
        }
        .candidate-right {
            margin-top: 10px;
            width: 30%;
            text-align: center;
        }
        .form-row-nama {
            display: flex;
            margin-bottom: 10px;
            align-items: center;
            width: 450px;
        }

        .form-row-birth {
            display: flex;
            margin-bottom: 10px;
            align-items: center;
            width: 450px;
        }

        .form-row {
            display: flex;
            margin-bottom: 3px;
            align-items: center;
        }

        .form-label-nama {
            width: 50px;
            font-weight: bold;
            font-size: 13px;
        }
        .form-label-birth {
            width: 150px;
            font-weight: bold;
            font-size: 13px;
        }

        .form-label {
            width: 200px;
            font-weight: bold;
            font-size: 13px;
        }

        .form-input-nama {
            flex: 1;
            height: 40px;
            width: 10%;
            border: 2px solid #000;
            text-align: center;
            padding: 5px;
            font-size: 18px;
        }

        .form-input-birth {
            flex: 1;
            height: 18px;
            width: 20%;
            border: 1px solid #000;
            text-align: center;
            padding: 5px;
            font-size: 15px;
        }

        .form-input {
            flex: 1;
            height: 18px;
            border: 1px solid #000;
            text-align: left;
            padding: 5px;
            font-size: 14px;
        }

        .sex-input {
            width: 40px;
            height: 33px;
            border: 1px solid #000;
            text-align: center;
            margin-left: 10px;
            font-size: 14px;
        }

        .test-results {
            margin: 0 40px 0 40px;
        }
        .results-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: -50px 0 -30px 0;
        }
        .result-box {
            display: flex;
            align-items: center;
            margin-top: 10px;
            
        }
        .result-label {
            font-weight: bold;
            font-size: 12px;
            margin-right: 10px;
            color: #333;
        }
        .result-value {
            width: 50px;
            height: 35px;
            border: 2px solid #000;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 18px;
            background-color: #c4cacc;
        }
        
        .cefr-container {
            display: flex;
            flex-direction: column;
            margin-left: 20px;
            margin-bottom: 50px;
        }

        .cefr-box {
            border: 2px solid #000;
            width: 80px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 28px;
            background-color: #c4cacc;
        }

        .validation-section {
            text-align: center;
            margin: 10px -100px 0 0;
        }
        .validation-text {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .qrcode {
            width: 100px;
            height: 100px;
            margin: 0 auto;
        }
        .valid-until {
            font-weight: bold;
            margin-top: 10px;
        }
        .cefr-label {
            font-weight: bold;
            font-size: 22px;
            margin-bottom: 10px;
            text-align: center;
        }
        .signatures {
            display: flex;
            justify-content: space-between;
            margin-top: 25px;
            margin-bottom: 20px;
        }
        .signature {
            text-align: center;
            width: 30%;
        }
       .signature-line {
        width: 80%;
        margin: 20px auto 0 auto;
        border-top: 1px solid #000;
        }

        .cap {
        display: block;
        margin: 0 auto;
        width: 120px;
        height: auto;
        object-fit: contain;
        margin-top: -25px;
        margin-bottom: 140px;
        margin-left: 20px;
        z-index: -1;
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

        .signature-title {
            font-weight: bold;
            font-size: 12px;
            margin-bottom: 5px;
            text-align: center;
        }
        .signature-name {
            margin-top: 5px;
            font-weight: bold;
            font-size: 14px;
        }
    </style>
</head>
<body>
@php
    function getCefrLevel($score) {
        if ($score == 9) return 'C2';
        elseif ($score >= 7.0 && $score <= 8.0) return 'C1';
        elseif ($score >= 5.5 && $score <= 6.5) return 'B2';
        elseif ($score >= 4.0 && $score <= 5.0) return 'B1';
        else return 'Below B1';
    }
@endphp

    <div class="container">
        <div class="background-img"></div>
        <div class="header">
            <img src="https://1000logos.net/wp-content/uploads/2021/03/IELTS-logo.png" alt="IELTS Logo" class="ielts-logo">
            <div class="report-title">Prediction Test Report Form</div>
            <img src="https://bpiedu.id/yayasanbpi/images/2022/10/03/logo%20bpi%20clear.png" alt="BPI Logo" class="bpi-logo">
        </div>
        @php
            use Carbon\Carbon;
            $formattedExamDate = Carbon::parse($certificateieltstestc->exam_date)->format('d-m-Y');
            $formattedDateofBirth = Carbon::parse($certificateieltstestc->date_of_birth)->format('d-m-Y');
             $formattedValidDate = Carbon::parse($certificate->valid_date)->format('F Y');
        @endphp


        <div class="date-section">
            <div>Test Date: <input type="text" class="date-input" value="{{ $formattedExamDate }}" readonly></div>
            <input type="text" class="reference-input" value="No: {{ $certificateieltstestc->no_sertif }}" readonly>
        </div>
        
        <div class="divider"></div>
        
        <div class="candidate-section">
            <div class="candidate-left">
                <h3>Candidate Details</h3>
                
                <div class="form-row-nama">
                    <div class="form-label-nama">Nama</div>
                    <input type="text" class="form-input-nama" value="{{ $certificateieltstestc->name}}" readonly>
                </div>

                <div class="form-row-birth">
                    <div class="form-label-birth">Date of Birth Sex (M/F)</div>
                    <input type="text" class="form-input-birth" style="width: 200px;" value="{{ $formattedDateofBirth }}" readonly> 
                    <input type="text" class="sex-input" value="{{ strtolower($certificateieltstestc->gender ?? '') === 'female' ? 'F' : 'M' }}" readonly>
                </div>
                
                <div class="form-row">
                    <div class="form-label">Country or Region of Origin</div>
                    <input type="text" class="form-input" value="{{ $certificateieltstestc->country_region_origin}}" readonly>
                </div>
                
                <div class="form-row">
                    <div class="form-label">Country or Region of Nationality</div>
                    <input type="text" class="form-input" value="{{ $certificateieltstestc->country_region_nationality}}" readonly>
                </div>
                
                <div class="form-row">
                    <div class="form-label">First Language</div>
                    <input type="text" class="form-input" value="{{ $certificateieltstestc->native_language}}" readonly>
                </div>
            </div>
            
            <div class="candidate-right">
                <div class="validation-section">
                    <div class="validation-text">Scan here for validation</div>
                       <div class="qrcode">{!! $qrCode !!}</div> 
                    <div class="valid-until">Valid until: {{ $formattedValidDate}}</div>
                </div>
            </div>
        </div>
        
        <div class="test-results">
            <div class="form-label">Test Results</div>
            <div class="results-row">
                <div class="result-box">
                    <div class="result-label">LISTENING</div>
                    <div class="result-value">{{ $certificateieltstestc->listening_score}}</div>
                </div>
                <div class="result-box">
                    <div class="result-label">READING</div>
                    <div class="result-value">{{ $certificateieltstestc->reading_score}}</div>
                </div>
                <div class="result-box">
                    <div class="result-label">WRITING</div>
                    <div class="result-value">{{ $certificateieltstestc->writing_score}}</div>
                </div>
                <div class="result-box">
                    <div class="result-label">SPEAKING</div>
                    <div class="result-value">{{ $certificateieltstestc->speaking_score}}</div>
                </div>
                <div class="result-box">
                    <div class="result-label">OVERALL BAND SCORE</div>
                    <div class="result-value">{{ $certificateieltstestc->total_score}}</div>
                </div>
                    <div class="cefr-container">
                        <div class="cefr-label">CEFR</div>
                        <div class="cefr-box">{{ getCefrLevel($certificateieltstestc->total_score) }}</div>
                    </div>
            </div>
        
        
        <div class="divider2"></div>
        
        <div class="signatures">
            <div class="signature">
                <div class="signature-title">Development Director<br>of BPI Foundation</div>
                <img src="https://bpi-english-lab.com/wp-content/uploads/2025/05/LAR-2.png" alt="Tanda Tangan" class="signature-sign">
                <div class="signature-line"></div>
                <div class="signature-name">Lukman Arif Rachman, M.Pd.</div>
            </div>
            <div class="signature">
                <div class="signature-title">Principal of BPI 1<br>Senior High School</div>
                <img src="https://bpi-english-lab.com/wp-content/uploads/2025/05/cap-sma-e1747674943239.png" alt="cap" class="cap">
                <img src="https://bpi-english-lab.com/wp-content/uploads/2025/05/T-2.png" alt="Tanda Tangan" class="signature-sign">
                <div class="signature-line"></div>
                <div class="signature-name">Tatang, M.Pd.</div>
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