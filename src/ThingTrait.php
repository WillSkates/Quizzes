<?php
/*
 * This file is part of Quizzes
 *
 * (c) William Skates <will@stuffby.ws>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Quizzes;

/**
 * A list of properties and getters and setters
 * required in all entities.
 *
 * Choices and descriptions taken from http://schema.org/Thing.
 * @see http://schema.org/Thing Choices and descriptions
 */
trait ThingTrait
{

	/**
	 * The name of the item.
	 * @var string
	 */
	protected $name;

	/**
	 * A short description of the item.
	 * @var string
	 */
	protected $description;

	/**
	 * An alias for the item.
	 * @var string
	 */
	protected $alias;

	/**
	 * URL of the item.
	 * @var string
	 */
	protected $url;

	/**
	 * The unique identifier for this item.
	 * @var string
	 */
	protected $uuid;

    /**
     * Gets the name of the item.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name of the item.
     *
     * @param string $name the name
     *
     * @return self
     */
    protected function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the A short description of the item.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the A short description of the item.
     *
     * @param string $description the description
     *
     * @return self
     */
    protected function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Gets the An alias for the item.
     *
     * @return string
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * Sets the An alias for the item.
     *
     * @param string $alias the alias
     *
     * @return self
     */
    protected function setAlias($alias)
    {
        $this->alias = $alias;

        return $this;
    }

    /**
     * Gets the URL of the item.
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Sets the URL of the item.
     *
     * @param string $url the url
     *
     * @return self
     */
    protected function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Gets the unique identifier for this item.
     *
     * @return string
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * Sets the unique identifier for this item.
     *
     * @param string $uuid the uuid
     *
     * @return self
     */
    protected function setUuid($uuid)
    {
        $this->uuid = $uuid;

        return $this;
    }
}