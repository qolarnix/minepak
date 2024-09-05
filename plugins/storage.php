<?php

declare(strict_types=1);

use Aws\S3\S3Client;
use League\Flysystem\Filesystem;

$client = new Aws\S3\S3Client([
    'region' => 'us-lax-1',
    'version' => 'latest',
    'endpoint' => 'https://us-lax-1.linodeobjects.com',
    'credentials' => [
        'key' => 'JL6KOFSG1YN5XD9F6WND',
        'secret' => 'qe8MW23FWDSOqVmR6d8m2vbhvAJbZgzHcMe04sd2'
    ]
]);

$adapter = new League\Flysystem\AwsS3V3\AwsS3V3Adapter(
    $client,
    'packages.minepak.com'
);
$filesystem = new League\Flysystem\Filesystem($adapter);

/**
 * List packages
 */
function listPackages(Filesystem $fs): array {
    $list = $fs->listContents('/packages/', true);

    $packages = [];
    foreach($list as $i) {
        if(substr_count($i->path(), '/') > 1) continue;
        $packages[] = substr($i->path(), strpos($i->path(), '/') + 1);
    }

    return $packages;
}

/**
 * Download a package
 */
function getPackage(S3Client $client, string $package_path, string $save_path) {
    $client->getObject([
        'Bucket' => 'packages.minepak.com',
        'Key' => $package_path,
        'SaveAs' => $save_path,
    ]);
}