<?php

namespace unapi\kontur\focus\requests\egrDetails\structures;

use unapi\interfaces\DtoInterface;
use unapi\kontur\focus\requests\egrDetails\definitions\Activity;

class Activities implements DtoInterface
{
    /** @var Activity|null */
    private $principalActivity;
    /** @var ActivitiesArray */
    private $complementaryActivities;
    /** @var string|null */
    private $okvedVersion;

    /**
     * @return null|Activity
     */
    public function getPrincipalActivity(): ?Activity
    {
        return $this->principalActivity;
    }

    /**
     * @param null|Activity $principalActivity
     * @return Activities
     */
    public function setPrincipalActivity(?Activity $principalActivity): Activities
    {
        $this->principalActivity = $principalActivity;
        return $this;
    }

    /**
     * @return ActivitiesArray
     */
    public function getComplementaryActivities(): ActivitiesArray
    {
        return $this->complementaryActivities;
    }

    /**
     * @param ActivitiesArray $complementaryActivities
     * @return Activities
     */
    public function setComplementaryActivities(ActivitiesArray $complementaryActivities): Activities
    {
        $this->complementaryActivities = $complementaryActivities;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getOkvedVersion(): ?string
    {
        return $this->okvedVersion;
    }

    /**
     * @param null|string $okvedVersion
     * @return Activities
     */
    public function setOkvedVersion(?string $okvedVersion): Activities
    {
        $this->okvedVersion = $okvedVersion;
        return $this;
    }

    /**
     * @param array $data
     * @return static
     */
    public static function toDto(array $data): DtoInterface
    {
        $result = new self();

        if (array_key_exists('principalActivity', $data))
            $result->setPrincipalActivity(Activity::toDto($data['principalActivity']));

        $result->setComplementaryActivities(ActivitiesArray::toDto(array_key_exists('complementaryActivities', $data) ? $data['complementaryActivities'] : []));

        if (array_key_exists('okvedVersion', $data))
            $result->setOkvedVersion((string)$data['okvedVersion']);

        return $result;
    }
}