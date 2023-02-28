<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MerchantAPI\Logger;

/**
 * @package MerchantAPI\Logger
 */
class FileLogger extends Logger
{
    /** @var string */
    protected string $filePath;

    /** @var resource */
    protected $handle;

    /**
	 * Constructor
	 *
	 * @param string $filePath
     * @throws
	 */
	public function __construct(string $filePath)
	{
		$this->filePath = $filePath;
		$this->handle   = fopen($filePath, 'a+');

		if ($this->handle === false) {
			throw new \Exception(sprintf('Unable to open %s for writing', $filePath));
		}
	}

	/**
	 * Destructor
	 */
	public function __destruct()
	{
		if (is_resource($this->handle)) {
			fclose($this->handle);
		}
	}

	/**
	 * {@inheritDoc}
	 */
	public function write(string $data) : void
	{
		fwrite($this->handle, $data);
	}

	/**
	 * {@inheritDoc}
	 */
	public function writeLine(string $data) : void
	{
		$this->write($data . PHP_EOL);
	}
}