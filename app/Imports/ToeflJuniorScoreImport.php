<?php

namespace App\Imports;

use Illuminate\Support\Facades\DB;
use App\Models\ToeflJuniorScores;
use App\Models\ScoreConversionToeflJunior;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ToeflJuniorScoreImport implements ToModel, WithHeadingRow
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
        $rawReading   = $row['reading_score'];
        $rawListening = $row['listening_score'];
        $rawLanguage  = $row['language_form'];

        $convertedReading = ScoreConversionToeflJunior::where('test_type', 'toefljunior')
            ->where('raw_score', $rawReading)
            ->value('reading_score') ?? 0;

        $convertedListening = ScoreConversionToeflJunior::where('test_type', 'toefljunior')
            ->where('raw_score', $rawListening)
            ->value('listening_score') ?? 0;

        $convertedLanguage = ScoreConversionToeflJunior::where('test_type', 'toefljunior')
            ->where('raw_score', $rawLanguage)
            ->value('language_form') ?? 0;

        $total = $convertedReading + $convertedListening + $convertedLanguage;

        if (! $this->simulateOnly) {

            $kelas = $row['class'] ?? 'Unknown';

            return new ToeflJuniorScores([
                'name'                         => $row['name'],
                'class'                        => $kelas,
                'email'                        => $row['email'],
                'gender'                       => $row['gender'],
                'country_region_nationality'   => $row['country_of_region_of_nationality'],
                'country_region_origin'        => $row['country_of_region_of_origin'],
                'native_language'              => $row['native_language'],
                'date_of_birth'                => $this->parseExcelDate($row['date_of_birth']),
                'school_name'                  => $row['school_name'],
                'exam_date'                    => $this->parseExcelDate($row['exam_date']),
                'reading_score'                => $convertedReading,
                'listening_score'              => $convertedListening,
                'language_form_score'          => $convertedLanguage,
                'total_score'                  => $total,
                'no_sertif'                    => $this->no_sertif,
                'valid_date'                   => $this->valid_date,
            ]);
        }

        return null;
    }

    protected function parseExcelDate($value): ?\DateTime
    {
        // Excel serial date
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
            return null;
        }
    }
}