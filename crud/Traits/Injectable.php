<?php

namespace Crud\Traits;

use Illuminate\Support\Facades\File;

trait Injectable
{
    /**
     * @param string $subject
     * @return array
     */
    public function inject(string $subject): array
    {
        $providers = [];

        $subjectFolders = config('crud.' . $subject, []);

        foreach ($subjectFolders as $contractNamespace => $subjectNamespace) {
            $contractFolder = lcfirst(str_replace("\\", "/", $contractNamespace));
            $subjectFolder = lcfirst(str_replace("\\", "/", $subjectNamespace));

            $contracts = File::files(base_path($contractFolder));
            $subjects = File::files(base_path($subjectFolder));

            array_map(function ($contract, $subject) use (&$providers, $contractNamespace, $subjectNamespace) {
                $contractName = pathinfo($contract)['filename'];
                $subjectName = pathinfo($subject)['filename'];

                $providers[$contractNamespace . "\\" . $contractName] = $subjectNamespace . "\\" . $subjectName;
            }, $contracts, $subjects);
        }

        return $providers;
    }
}
