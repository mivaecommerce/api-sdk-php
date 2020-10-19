<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MerchantAPI\SSHAgent;

/**
 * Class SSHAgentSignClient.
 *
 * @package MerchantAPI
 */
class SSHAgentSignClient
{
	const SSH_AGENTC_REQUEST_IDENTITIES = 11;
	const SSH_AGENTC_SIGN_REQUEST = 13;

	const SSH_AGENT_FAILURE = 5;
	const SSH_AGENT_SUCCESS = 6;
	const SSH_AGENT_IDENTITIES_ANSWER = 12;
	const SSH_AGENT_SIGN_RESPONSE = 14;

	const SSH_AGENT_RSA_SHA2_256 = 2;
	const SSH_AGENT_RSA_SHA2_512 = 4;

	protected $socket;

	protected $connection;

	/**
	 * Constructor
	 * @param sting
	 */
	public function __construct($agentPath = null)
	{
		$this->agentPath = $agentPath ? 
			$agentPath : getenv('SSH_AUTH_SOCK');
	}

    /**
     * Destructor
     */
	public function __destruct()
	{
		try {
			if ($this->isConnected()) {
				$this->disconnect();
			}
		} catch(\Exception $e) {}
	}

    /**
     * Connects to the socket
     * @throws \Exception
     */
	public function connect()
	{
		if (!is_resource($this->socket)) {
			$this->socket = socket_create(AF_UNIX, SOCK_STREAM, 0);

			if (!is_resource($this->socket)) {
				throw new \Exception(sprintf('Socket Error: [%d] %s', socket_last_error(), socket_strerror(socket_last_error())));
			}
			
			$this->connection = socket_connect($this->socket, $this->agentPath);

			if (!$this->connection) {
				throw new \Exception(sprintf('Socket Error: [%d] %s', socket_last_error(), socket_strerror(socket_last_error())));
			}
		}
	}

    /**
     * Check if the connection is active
     * @return bool
     */
	public function isConnected() {
		return is_resource($this->socket) && $this->connection;
	}

    /**
     * Disconnect the socket if its connected
     */
	public function disconnect() {
		if (is_resource($this->socket)) {
			socket_shutdown($this->socket);
			socket_close($this->socket);

			$this->socket = null;
			$this->connection = null;
		}
	}

    /**
     * Sends a SSHAgentMessage object
     * @param SSHAgentMessage $message
     * @throws \Exception
     */
	public function sendMessage(SSHAgentMessage $message)
	{
		$result = $this->send($message->pack());
		$header = unpack('N', $this->receive(4));

		if (isset($header[1]) && $header[1] > 0) {
			$message->unpack($this->receive($header[1]));
		}
	}

    /**
     * Writes to the socket
     * @param $data
     * @return int
     */
	public function send($data)
	{		
		return socket_send($this->socket, $data, strlen($data), 0);
	}

    /**
     * Reads from the socket
     * @param $amount
     * @return null
     */
	public function receive($amount)
	{
		$buffer = null;
		socket_recv($this->socket, $buffer, $amount, 0);

		return $buffer;
	}
}