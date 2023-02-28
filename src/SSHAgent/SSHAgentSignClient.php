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

    /** @var ?string */
    protected ?string $agentPath;

    /** @var resource|\Socket */
    protected $socket;

    /** @var ?bool */
	protected ?bool $connection = null;

	/**
	 * Constructor
	 * @param ?string $agentPath
	 */
	public function __construct(?string $agentPath = null)
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
     * @return void
     * @throws \Exception
     */
	public function connect() : void
	{
		if (!$this->isSocketValid()) {
			$this->socket = socket_create(AF_UNIX, SOCK_STREAM, 0);

			if (!$this->isSocketValid()) {
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
	public function isConnected() : bool
    {
		return $this->isSocketValid() && $this->connection;
	}

    /**
     * Check the validity of the socket
     *
     * @return bool
     */
    public function isSocketValid() : bool
    {
        if (PHP_MAJOR_VERSION >= 8) {
            return $this->socket instanceof \Socket;
        }

        return is_resource($this->socket);
    }

    /**
     * Disconnect the socket if its connected
     *
     * @return void
     */
	public function disconnect() : void
    {
		if ($this->isSocketValid()) {
			socket_shutdown($this->socket);
			socket_close($this->socket);

			$this->socket = null;
			$this->connection = null;
		}
	}

    /**
     * Sends a SSHAgentMessage object
     * @param SSHAgentMessage $message
     * @return void
     * @throws \Exception
     */
	public function sendMessage(SSHAgentMessage $message) : void
	{
		$result = $this->send($message->pack());
		$header = unpack('N', $this->receive(4));

		if (isset($header[1]) && $header[1] > 0) {
			$message->unpack($this->receive($header[1]));
		}
	}

    /**
     * Writes to the socket
     * @param string $data
     * @return int
     */
	public function send(string $data) : int
	{		
		return socket_send($this->socket, $data, strlen($data), 0);
	}

    /**
     * Reads from the socket
     * @param int $amount
     * @return ?string
     */
	public function receive(int $amount) : ?string
	{
		$buffer = null;
		socket_recv($this->socket, $buffer, $amount, 0);

		return $buffer;
	}
}