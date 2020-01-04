<?php

namespace App\Entity;

final class City
{
    private string $name;

    private string $postalCode;

    private string $normalizedName;

    /**
     * City constructor.
     *
     * @param string $name
     * @param string $postalCode
     * @param string $normalizedName
     */
    public function __construct(string $name, string $postalCode, string $normalizedName)
    {
        $this->name           = $name;
        $this->postalCode     = $postalCode;
        $this->normalizedName = $normalizedName;
    }

    /**
     * @return string
     */
    public function getName()
    : string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getNormalizedName()
    : string
    {
        return $this->normalizedName;
    }

    /**
     * @return string
     */
    public function getPostalCode()
    : string
    {
        return $this->postalCode;
    }
}
