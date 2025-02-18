<?php namespace Model\Session;

class Session implements SessionInterface
{
	private bool $initialized = false;

	private function init(): void
	{
		if ($this->initialized)
			return;

		session_start();
		$this->initialized = true;
	}

	public function get(string $key, mixed $default = null): mixed
	{
		$this->init();
		return array_key_exists($key, $_SESSION) ? $_SESSION[$key] : $default;
	}

	public function set(string $key, mixed $value): void
	{
		$this->init();
		$_SESSION[$key] = $value;
	}
}
