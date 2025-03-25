<?php namespace Model\Session;

class Session implements SessionInterface
{
	private bool $initialized = false;

	private function init(): void
	{
		if ($this->initialized)
			return;

		if (session_status() !== PHP_SESSION_ACTIVE)
			session_start();
		$this->initialized = true;
	}

	public function get(string $key, mixed $default = null): mixed
	{
		$this->init();
		return array_key_exists($key, $_SESSION) ? $_SESSION[$key] : $default;
	}

	public function has(string $key): bool
	{
		$this->init();
		return array_key_exists($key, $_SESSION);
	}

	public function set(string $key, mixed $value): void
	{
		$this->init();
		$_SESSION[$key] = $value;
	}

	public function delete(string $key): void
	{
		$this->init();
		unset($_SESSION[$key]);
	}
}
