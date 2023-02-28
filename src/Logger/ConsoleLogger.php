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
class ConsoleLogger extends Logger
{
	const DESTINATION_STDOUT = 'stdout';

	const DESTINATION_STDERR = 'stderr';

	protected string $destination = self::DESTINATION_STDOUT;

	/**
	 * Constructor
	 *
	 * @param string $destination
	 */
	public function __construct(string $destination)
	{
		$this->destination = $destination;
	}

	/**
	 * {@inheritDoc}
	 */
	public function write(string $data) : void
	{
		if ($this->destination == static::DESTINATION_STDERR) {
			fwrite(STDERR, $data);
		} else {
			fwrite(STDOUT, $data);
		}
	}

	/**
	 * {@inheritDoc}
	 */
	public function writeLine(string $data) : void
	{
		$this->write($data . PHP_EOL);
	}
}