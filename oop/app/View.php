<?php

declare(strict_types=1);

namespace App;

use App\Exceptions\ViewNotFoundException;

class View
{

    /**
     * @param string $view
     * @param array $params
     */
    public function __construct(
        protected string $view,
        protected array $params = []
    )
    {
    }

    public function render(): string
    {
        $path = VIEW_PATH . '/' . $this->view . '.php';

        if (!file_exists($path))
            throw  new ViewNotFoundException();

        foreach ($this->params as $key => $value){
            $$key = $value;
        }

//        extract($this->params);

        ob_start();
        include $path;

        return (string) ob_get_clean();
    }

    public static function make(string $view, array $params = []): static
    {
        return  new static($view, $params);
    }

    public function __toString(): string
    {
        return  $this->render();
    }

    public function __get(string $name)
    {
        return $this->params[$name] ?? null;
    }
}