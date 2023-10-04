<?php

declare(strict_types=1);

namespace Domain;

use Domain\Exceptions\ViewNotFoundException;

class View
{
    /**
     * @param string $view
     * @param array $params
     */
    public function __construct(protected string $view, protected array $params = [])
    {
    }

    /**
     * @param string $view
     * @param array $params
     * @return static
     */
    public static function make(string $view, array $params = []): static
    {
        return new static($view, $params);
    }

    /**
     * @return string
     * @throws ViewNotFoundException
     */
    public function render()
    {
        $viewPath = VIEW_PATH . '/' . $this->view . '.php';

        if (!file_exists($viewPath)) {
            throw new ViewNotFoundException();
        }

        foreach ($this->params as $key => $value) {
            $$key = $value;
        }

        ob_start();

        include $viewPath;

        return (string)ob_get_clean();
    }

    /**
     * @return string
     * @throws ViewNotFoundException
     */
    public function __toString(): string
    {
        return $this->render();
    }

    /**
     * @param string $name
     * @return mixed|null
     */
    public function __get(string $name)
    {
        return $this->params[$name] ?? null;
    }
}