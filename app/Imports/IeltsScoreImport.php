<?php

namespace App\Imports;

use Illuminate\Support\Facades\DB;
use App\Models\IeltsTestCScores;
use App\Models\ScoreConversionIeltsTestC;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class IeltsScoreImport implements ToModel, WithHeadingRow
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
        $rawReading   = floatval($row['reading_score']);
        $rawListening = floatval($row['listening_score']);
        $speaking     = floatval($row['speaking_score']);
        $writing      = floatval($row['writing_score']);

        $convertedReading = ScoreConversionIeltsTestC::where('test_type', 'ielts')
            ->where('raw_score', $rawReading)
            ->value('reading_score') ?? 0;

        $convertedListening = ScoreConversionIeltsTestC::where('test_type', 'ielts')
            ->where('raw_score', $rawListening)
            ->value('listening_score') ?? 0;

        $avg = ($convertedReading + $convertedListening + $speaking + $writing) / 4;

        $band = $this->roundIeltsBand($avg);

        $formatted = number_format($band, 1, '.', '');

        if (! $this->simulateOnly) {

            $kelas = $row['class'] ?? 'Unknown';

            return new IeltsTestCScores([
                'name'                       => $row['name'],
                'class'                      => $kelas,
                'email'                      => $row['email'],
                'gender'                     => $row['gender'],
                'country_region_nationality' => $row['country_of_region_of_nationality'],
                'country_region_origin'      => $row['country_of_region_of_origin'],
                'native_language'            => $row['native_language'],
                'date_of_birth'              => $this->parseExcelDate($row['date_of_birth']),
                'school_name'                => $row['school_name'],
                'exam_date'                  => $this->parseExcelDate($row['exam_date']),
                'reading_score'              => $convertedReading,
                'listening_score'            => $convertedListening,
                'speaking_score'             => $speaking,
                'writing_score'              => $writing,
                'total_score'                => $formatted,
                'no_sertif'                  => $this->no_sertif,
                'valid_date'                 => $this->valid_date,
            ]);
        }
    }

    protected function roundIeltsBand(float $avg): float
    {
        $int = floor($avg);
        $dec = $avg - $int;

        if ($dec <= 0.25) {
            return (float) $int;
        } elseif ($dec <= 0.75) {
            return $int + 0.5;
        } else {
            return $int + 1.0;
        }
    }

    protected function parseExcelDate($value): ?\DateTime
    {
        if (is_numeric($value)) {
            return \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value);
        }

        $formats = [
            'Y-m-d',
            'Y/m/d',
            'm/d/Y',
            'd/m/Y',
            'd-m-Y',
        ];

        foreach ($formats as $fmt) {
            $dt = \DateTime::createFromFormat($fmt, $value);

            if ($dt && $dt->format($fmt) === $value) {
                return $dt;
            }
        }

        try {
            return new \DateTime($value);
        } catch (\Exception $e) {
        }

        return null;
    }
}