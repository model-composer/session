<?php namespace Model\Session;

interface SessionInterface
{
	public function get(string $key, mixed $default = null): mixed;

	public function has(string $key): bool;

	public function set(string $key, mixed $value): void;
}
