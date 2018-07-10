<?php

namespace FC\DependencyInjector;

/**
 * Dependency Injector class consisting in an array to contain whatever is needed further down the line
 */
final class Di
{
    private $dependencies = [];

    public function __construct(){}
    
    /**
     * Verify the existence of a dependency inside the container using its alias (name)
     *
     * @param string $alias dependency name
     * @return boolean true = found, false = not found
     */
    public function has(string $alias): bool
    {
        return array_key_exists($alias, $this->dependencies);
    }

    /**
     * Add a dependency to the container
     *
     * @param string $alias
     * @param $object can be any type of variable: object, string, int, ...
     * @return void
     */
    public function set(string $alias, $object): void
    {
        if (!$this->has($alias)) {
            $this->dependencies[$alias] = $object;
        } else {
            throw Exceptions\DependencyInjectorException::Duplicated($alias);
        }
    }

    /**
     * Reset a dependency already existing in the container.
     * Add a new one if it does not exists yet.
     *
     * @param string $alias
     * @param $object can be any type of variable: object, string, int, ...
     * @return void
     */
    public function reset(string $alias, $object): void
    {
        $this->dependencies[$alias] = $object;
    }

    /**
     * Get a dependency from the container using its alias
     * The return can be of any type of variable: object, string, int, ...
     *
     * @param string $alias dependency name
     * @return any valid type of variable: : object, string, int, ...
     */
    public function get(string $alias)
    {
        if (isset($this->dependencies[$alias])) {
            return $this->dependencies[$alias];
        }
        throw Exceptions\DependencyInjectorException::NotFound($alias);
    }

    /**
     * Remove a dependency from the container
     *
     * @param string $alias
     * @return bool true if the alias exists, false otherwise
     */
    public function delete(string $alias): bool
    {
        if (!$this->has($alias)) {
            unset($this->dependencies[$alias]);
            return true;
        } else {
            return false;
        }
    }

    /**
     * Alias to the function set
     *
     * @see function set
     */
    public function add(string $alias, $object)
    {
        self::set($alias, $object);
    }

    /**
     * Alias to the function get
     *
     * @see function get
     */
    public function retrieve(string $alias)
    {
        return self::get($alias);
    }

    /**
     * Alias to the function delete
     *
     * @see function delete
     */
    public function remove(string $alias)
    {
        return self::delete($alias);
    }

    /**
     * Alias to the function 'has'
     *
     * @see function has
     */
    public function contain(string $alias)
    {
        return self::has($alias);
    }
}

