<?php

namespace App\Imports;

use Illuminate\Support\Facades\DB;
use App\Models\ToeicScores;
use App\Models\ScoreConversionToeic;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ToeicScoreImport implements ToModel, WithHeadingRow
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
        $rawListening = $row['listening'];
        $rawReading = $row['reading'];

        $convertedListening = ScoreConversionToeic::where('raw_score', $rawListening)
            ->value('listening_score') ?? 0;

        $convertedReading = ScoreConversionToeic::where('raw_score', $rawReading)
            ->value('reading_score') ?? 0;

        $total = $convertedListening + $convertedReading;

        if (! $this->simulateOnly) {

            $kelas = $row['class'] ?? 'Unknown';

            return new ToeicScores([

                'name' => $row['name'],
                'class' => $kelas,

                'email' => $row['email'],
                'gender' => $row['gender'],

                'country_region_nationality'
                    => $row['country_of_region_of_nationality'],

                'country_region_origin'
                    => $row['country_of_region_of_origin'],

                'native_language'
                    => $row['native_language'],

                'date_of_birth'
                    => $this->parseExcelDate($row['date_of_birth']),

                'school_name'
                    => $row['school_name'],

                'exam_date'
                    => $this->parseExcelDate($row['exam_date']),

                'raw_listening' => $rawListening,
                'raw_reading' => $rawReading,

                'listening_score'
                    => $this->formatDecimal($convertedListening),

                'reading_score'
                    => $this->formatDecimal($convertedReading),

                'total_score'
                    => $this->formatDecimal($total),

                'no_sertif'
                    => $this->no_sertif,

                'valid_date'
                    => $this->valid_date,
            ]);
        }
    }

    private function formatDecimal($value)
    {
        return strpos($value, '.') !== false
            ? rtrim(rtrim(number_format($value, 3, '.', ''), '0'), '.')
            : $value;
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