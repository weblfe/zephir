<?php

/*
 * This file is part of the Zephir.
 *
 * (c) Phalcon Team <team@zephir-lang.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Zephir\Documentation\File;

use Zephir\Documentation\FileInterface;

class Sitemap implements FileInterface
{
    protected $classes;
    protected $namespaces;
    protected $baseUrl;
    private $baseDir;

    public function __construct($baseDir, $baseUrl, $classList, $namespaceList)
    {
        $this->classes = $classList;
        $this->namespaces = $namespaceList;
        $this->baseUrl = rtrim($baseUrl, '\\/').\DIRECTORY_SEPARATOR;
        $this->baseDir = $baseDir;
    }

    /**
     * {@inheritdoc}
     *
     * @return string
     */
    public function getTemplateName(): string
    {
        return $this->baseDir.'/Api/sitemap.php';
    }

    /**
     * {@inheritdoc}
     *
     * @return array
     */
    public function getData(): array
    {
        return [
            'classes' => $this->classes,
            'namespaces' => $this->namespaces,
            'baseUrl' => $this->baseUrl,
        ];
    }

    /**
     * {@inheritdoc}
     *
     * @return string
     */
    public function getOutputFile(): string
    {
        return 'sitemap.xml';
    }
}
