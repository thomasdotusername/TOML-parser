<?php

namespace ThomasHurst\TOML;

final readonly class Data
{
    function __construct(
        private string $originalFile,
        private array  $data
    ) {}

    public function all(): array
    {
        return $this->data;
    }

    public function get(string $key): mixed
    {
        return $this->data[$key];
    }

    public static function fromFile(string $file): self
    {
        return new self($file, Parser::parse($file));
    }

    public function toFile(): string
    {
        return Parser::generate($this);
    }
}