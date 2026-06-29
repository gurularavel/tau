<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Birdəfəlik (idempotent) data təmizləyici — Stored XSS (XDMX audit #4).
 *
 * Yeni `BaseTranslation::setAttribute()` mutator-u BUNDAN SONRA yazılan
 * bütün rich-text-i input-da təmizləyir. Bu command isə KÖHNƏ (audit-dən əvvəl
 * yüklənmiş) `description` / `content` sütunlarındakı zərərli HTML-i təmizləyir.
 *
 * İstifadə:
 *   php artisan security:sanitize-html          (real təmizləmə)
 *   php artisan security:sanitize-html --dry-run (yalnız hesabat)
 */
class SanitizeStoredHtml extends Command
{
    protected $signature = 'security:sanitize-html {--dry-run : Dəyişiklik etmədən yalnız neçə sətrin təmizlənəcəyini göstər}';

    protected $description = 'Translation cədvəllərindəki description/content sütunlarını clean_html ilə təmizləyir (Stored XSS).';

    /** Sanitizasiya olunan rich-text sütun adları. */
    private const HTML_COLUMNS = ['description', 'content'];

    public function handle(): int
    {
        if (!function_exists('clean_html')) {
            $this->error('clean_html() helper tapılmadı.');
            return self::FAILURE;
        }

        $dryRun = (bool) $this->option('dry-run');
        $totalChanged = 0;

        foreach ($this->translationTables() as $table) {
            foreach (self::HTML_COLUMNS as $column) {
                if (!Schema::hasColumn($table, $column)) {
                    continue;
                }

                $changedInColumn = 0;

                DB::table($table)
                    ->select('id', $column)
                    ->whereNotNull($column)
                    ->where($column, '<>', '')
                    ->orderBy('id')
                    ->chunkById(500, function ($rows) use ($table, $column, $dryRun, &$changedInColumn) {
                        foreach ($rows as $row) {
                            $original = $row->{$column};
                            $clean = clean_html($original);

                            if ($clean !== $original) {
                                $changedInColumn++;
                                if (!$dryRun) {
                                    DB::table($table)->where('id', $row->id)->update([$column => $clean]);
                                }
                            }
                        }
                    });

                if ($changedInColumn > 0) {
                    $totalChanged += $changedInColumn;
                    $this->line(sprintf('  %s.%s → %d sətir %s', $table, $column, $changedInColumn, $dryRun ? '(təmizlənəcək)' : 'təmizləndi'));
                }
            }
        }

        $this->info(($dryRun ? '[DRY-RUN] ' : '') . "Yekun: {$totalChanged} sətir.");

        return self::SUCCESS;
    }

    /**
     * Bütün `*_translations` cədvəllərini qaytarır.
     *
     * @return array<int,string>
     */
    private function translationTables(): array
    {
        return array_values(array_filter(
            Schema::getTableListing(),
            static fn ($table) => str_ends_with($table, '_translations')
        ));
    }
}
