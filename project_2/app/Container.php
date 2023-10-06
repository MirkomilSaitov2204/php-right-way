<?php

declare(strict_types=1);

namespace Domain;

use Domain\Exceptions\ContainerException;
use Domain\Exceptions\NotFoundException;
use Psr\Container\ContainerInterface;

class Container implements ContainerInterface
{

    private array $entries = [];

    public function get(string $id)
    {
        if ($this->has($id)){

            $entry = $this->entries[$id];

            if (is_callable($entry))
                return $entry($this);

            $id = $entry;
        }

        return  $this->resolve($id);
    }


    public function resolve(string $id)
    {
        //1 . Inspect the class that we are trying to get from the container
        $reflactionClass = new \ReflectionClass($id);

        if (!$reflactionClass->isInstantiable())
            throw new ContainerException("Class $id is not instantiable");


        //2. Inspect the constructor of the class
        $constructor = $reflactionClass->getConstructor();

        if (!$constructor)
            return new $id;

        //3. Inspect the constructor parameters (dependencies)
        $parameters = $constructor->getParameters();
        if (!$parameters)
            return new $id;


        //4. If the constructor parameter is a class then try to resolve that class using the container

        $dependencies = array_map(function(\ReflectionParameter $param) use($id){
            $name = $param->getName();
            $type = $param->getType();

            if (!$type)
                throw new ContainerException("Failed to resolve class $id because param $name is missing type hint");

            if ($type instanceof \ReflectionUnionType)
                throw new ContainerException("Failed to resolve class $id because of union type for param $name ");

            if ($type instanceof \ReflectionNamedType && ! $type->isBuiltin()){
                return $this->get($type->getName());
            }

            throw new ContainerException("Failed to resolve class $id because invalid param $name ");


        }, $parameters);

        return  $reflactionClass->newInstanceArgs($dependencies);
    }

    public function has(string $id): bool
    {
        return isset($this->entries[$id]);
    }

    public function set(string $id, callable|string $concrete)
    {
        $this->entries[$id] = $concrete;
    }
}