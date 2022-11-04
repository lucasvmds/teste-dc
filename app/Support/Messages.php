<?php

declare(strict_types=1);

namespace App\Support;

use App\Enums\MessageLevel;

class Messages
{
    private array $messsages = [];

    private function add(MessageLevel $level, string $content): void
    {
        array_push($this->messsages, [
            'level' => $level->value,
            'content' => $content,
        ]);
    }

    public function danger(string $content): self
    {
        $this->add(MessageLevel::DANGER, $content);
        return $this;
    }

    public function warning(string $content): self
    {
        $this->add(MessageLevel::WARNING, $content);
        return $this;
    }

    public function success(string $content): self
    {
        $this->add(MessageLevel::SUCCESS, $content);
        return $this;
    }

    public function get(): array
    {
        return $this->messsages;
    }
}