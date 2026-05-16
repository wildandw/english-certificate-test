<?php

namespace App\Imports;

use Illuminate\Support\Facades\DB;
use App\Models\ToeflPrimaryStep2Scores;
use App\Models\ScoreConversionToeflPrimaryStep2;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class ToeflPrimaryStep2ScoreImport implements ToModel, WithHeadingRow
{
    protected bool $simulateOnly;
    protected ?string $no_sertif;
    protected ?string $valid_date;

    public function __construct(
        bool $simulateOnly = false,
        ?string $no_sertif = null,
        ?string $valid_date = null
    ) {
        $this->simulateOnly = $simulateOnly;
        $this->no_sertif = $no_sertif;
        $this->valid_date = $valid_date;
    }
    public function model(array $row)
    {
        // Ambil nilai raw
        $rawReading   = $row['reading_score'];
        $rawListening = $row['listening_score'];
        $writing      = $row['writing_score'];

        // Cari hasil konversi dari tabel conversion
        $convertedReading   = ScoreConversionToeflPrimaryStep2::where('test_type', 'Toefl Primary Step 2')
                                   ->where('raw_score', $rawReading)
                                   ->value('reading_score') ?? 0;
        $convertedListening = ScoreConversionToeflPrimaryStep2::where('test_type', 'Toefl Primary Step 2')
                                   ->where('raw_score', $rawListening)
                                   ->value('listening_score') ?? 0;

        // Hitung rata-rata dari keempat skor
        $total = (
            $convertedReading
            + $convertedListening
            + $writing
        ) / 3;

        
        $formatted = rtrim(
            rtrim(
                number_format($total, 3, '.', ''), 
            '0'),
        '.');


        if (! $this->simulateOnly) {
                $kelas = $row['class'] ?? 'Unknown';
                $noSertif = $this->generateCertificateNumber($kelas);
                return new ToeflPrimaryStep2Scores([
                    'name'           => $row['name'],
                    'class'          => $row['class'],
                    'email'                                        => $row['email'],
                    'gender'                                       => $row['gender'],
                    'country_region_nationality'             => $row['country_of_region_of_nationality'],
                    'country_region_origin'                  => $row['country_of_region_of_origin'],
                    'native_language'                               => $row['native_language'],
                    'date_of_birth'            => $this->parseExcelDate($row['date_of_birth']),
                    'school_name'              => $row['school_name'],
                    'exam_date'                => $this->parseExcelDate($row['exam_date']),
                    'reading_score'  => $convertedReading,
                    'listening_score'=> $convertedListening,
                    'writing_score'  => $writing,
                    // 'speaking_score'  =>  $row['speaking'],
                    'total_score'    => $formatted,
                    'no_sertif'                      => $this->no_sertif,
                    'valid_date'                     => $this->valid_date,
                ]);
    }
}

protected function generateCertificateNumber(string $class): string
    {
        $id = DB::table('no_sertif')->insertGetId([
            'no_sertif'  => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $period  = '05-2025'; // Atur sesuai periode
        $noUrut  = str_pad($id, 4, '0', STR_PAD_LEFT);
        $certNum = "LEAD05/13.{$noUrut}/{$class}/{$period}";

        DB::table('no_sertif')
            ->where('id', $id)
            ->update(['no_sertif' => $certNum]);

        return $certNum;
    }

     protected function parseExcelDate($value): ?\DateTime
    {
        // 1. Angka Excel serial date
        if (is_numeric($value)) {
            return \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value);
        }

        // 2. Daftar format yang akan dicoba
        $formats = [
            'Y-m-d',   // 2025-05-14
            'Y/m/d',   // 2013/05/01
            'm/d/Y',   // 05/14/2025
            'd/m/Y',   // 14/05/2025
            'd-m-Y',   // 14-05-2025
        ];

        // 3. Coba setiap format
        foreach ($formats as $fmt) {
            $dt = \DateTime::createFromFormat($fmt, $value);
            if ($dt && $dt->format($fmt) === $value) {
                return $dt;
            }
        }

        // 4. Fallback: parse string bebas
        try {
            return new \DateTime($value);
        } catch (\Exception $e) {
            // gagal parse
        }

        // 5. Jika semua gagal, kembalikan null
        return null;
    }
}