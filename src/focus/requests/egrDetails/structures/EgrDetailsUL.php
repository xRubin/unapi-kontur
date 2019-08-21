<?php

namespace unapi\kontur\focus\requests\egrDetails\structures;

use unapi\interfaces\DtoInterface;
use unapi\kontur\focus\requests\egrDetails\definitions;

class EgrDetailsUL implements DtoInterface
{
    /** @var string|null */
    private $okpo;
    /** @var string|null */
    private $pfrRegNumber;
    /** @var string|null */
    private $fssRegNumber;
    /** @var string|null */
    private $fomsRegNumber;
    /** @var Activities|null */
    private $activities;
    /** @var RegInfo|null */
    private $regInfo;
    /** @var definitions\NalogRegBody|null */
    private $nalogRegBody;
    /** @var definitions\NalogRegBody|null */
    private $regBody;
    /** @var definitions\Shareholders|null */
    private $shareholders;
    /** @var definitions\StatedCapital|null */
    private $statedCapital;
    /** @var FoundersFLArray */
    private $foundersFL;
    /** @var FoundersULArray */
    private $foundersUL;
    /** @var FoundersForeignArray */
    private $foundersForeign;
    /** @var PredecessorsArray */
    private $predecessors;
    /** @var SuccessorsArray */
    private $successors;
    /** @var EgrRecordsArray */
    private $egrRecords;
    /** @var History */
    private $history;

    /**
     * @return null|string
     */
    public function getOkpo(): ?string
    {
        return $this->okpo;
    }

    /**
     * @param null|string $okpo
     * @return EgrDetailsUL
     */
    public function setOkpo(?string $okpo): EgrDetailsUL
    {
        $this->okpo = $okpo;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getPfrRegNumber(): ?string
    {
        return $this->pfrRegNumber;
    }

    /**
     * @param null|string $pfrRegNumber
     * @return EgrDetailsUL
     */
    public function setPfrRegNumber(?string $pfrRegNumber): EgrDetailsUL
    {
        $this->pfrRegNumber = $pfrRegNumber;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getFssRegNumber(): ?string
    {
        return $this->fssRegNumber;
    }

    /**
     * @param null|string $fssRegNumber
     * @return EgrDetailsUL
     */
    public function setFssRegNumber(?string $fssRegNumber): EgrDetailsUL
    {
        $this->fssRegNumber = $fssRegNumber;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getFomsRegNumber(): ?string
    {
        return $this->fomsRegNumber;
    }

    /**
     * @param null|string $fomsRegNumber
     * @return EgrDetailsUL
     */
    public function setFomsRegNumber(?string $fomsRegNumber): EgrDetailsUL
    {
        $this->fomsRegNumber = $fomsRegNumber;
        return $this;
    }

    /**
     * @return null|Activities
     */
    public function getActivities(): ?Activities
    {
        return $this->activities;
    }

    /**
     * @param null|Activities $activities
     * @return EgrDetailsUL
     */
    public function setActivities(?Activities $activities): EgrDetailsUL
    {
        $this->activities = $activities;
        return $this;
    }

    /**
     * @return null|RegInfo
     */
    public function getRegInfo(): ?RegInfo
    {
        return $this->regInfo;
    }

    /**
     * @param null|RegInfo $regInfo
     * @return EgrDetailsUL
     */
    public function setRegInfo(?RegInfo $regInfo): EgrDetailsUL
    {
        $this->regInfo = $regInfo;
        return $this;
    }

    /**
     * @return null|definitions\NalogRegBody
     */
    public function getNalogRegBody(): ?definitions\NalogRegBody
    {
        return $this->nalogRegBody;
    }

    /**
     * @param null|definitions\NalogRegBody $nalogRegBody
     * @return EgrDetailsUL
     */
    public function setNalogRegBody(?definitions\NalogRegBody $nalogRegBody): EgrDetailsUL
    {
        $this->nalogRegBody = $nalogRegBody;
        return $this;
    }

    /**
     * @return null|definitions\NalogRegBody
     */
    public function getRegBody(): ?definitions\NalogRegBody
    {
        return $this->regBody;
    }

    /**
     * @param null|definitions\NalogRegBody $regBody
     * @return EgrDetailsUL
     */
    public function setRegBody(?definitions\NalogRegBody $regBody): EgrDetailsUL
    {
        $this->regBody = $regBody;
        return $this;
    }

    /**
     * @return null|definitions\Shareholders
     */
    public function getShareholders(): ?definitions\Shareholders
    {
        return $this->shareholders;
    }

    /**
     * @param null|definitions\Shareholders $shareholders
     * @return EgrDetailsUL
     */
    public function setShareholders(?definitions\Shareholders $shareholders): EgrDetailsUL
    {
        $this->shareholders = $shareholders;
        return $this;
    }

    /**
     * @return null|definitions\StatedCapital
     */
    public function getStatedCapital(): ?definitions\StatedCapital
    {
        return $this->statedCapital;
    }

    /**
     * @param null|definitions\StatedCapital $statedCapital
     * @return EgrDetailsUL
     */
    public function setStatedCapital(?definitions\StatedCapital $statedCapital): EgrDetailsUL
    {
        $this->statedCapital = $statedCapital;
        return $this;
    }

    /**
     * @return FoundersFLArray
     */
    public function getFoundersFL(): FoundersFLArray
    {
        return $this->foundersFL;
    }

    /**
     * @param FoundersFLArray $foundersFL
     * @return EgrDetailsUL
     */
    public function setFoundersFL(FoundersFLArray $foundersFL): EgrDetailsUL
    {
        $this->foundersFL = $foundersFL;
        return $this;
    }

    /**
     * @return FoundersULArray
     */
    public function getFoundersUL(): FoundersULArray
    {
        return $this->foundersUL;
    }

    /**
     * @param FoundersULArray $foundersUL
     * @return EgrDetailsUL
     */
    public function setFoundersUL(FoundersULArray $foundersUL): EgrDetailsUL
    {
        $this->foundersUL = $foundersUL;
        return $this;
    }

    /**
     * @return FoundersForeignArray
     */
    public function getFoundersForeign(): FoundersForeignArray
    {
        return $this->foundersForeign;
    }

    /**
     * @param FoundersForeignArray $foundersForeign
     * @return EgrDetailsUL
     */
    public function setFoundersForeign(FoundersForeignArray $foundersForeign): EgrDetailsUL
    {
        $this->foundersForeign = $foundersForeign;
        return $this;
    }

    /**
     * @return PredecessorsArray
     */
    public function getPredecessors(): PredecessorsArray
    {
        return $this->predecessors;
    }

    /**
     * @param PredecessorsArray $predecessors
     * @return EgrDetailsUL
     */
    public function setPredecessors(PredecessorsArray $predecessors): EgrDetailsUL
    {
        $this->predecessors = $predecessors;
        return $this;
    }

    /**
     * @return SuccessorsArray
     */
    public function getSuccessors(): SuccessorsArray
    {
        return $this->successors;
    }

    /**
     * @param SuccessorsArray $successors
     * @return EgrDetailsUL
     */
    public function setSuccessors(SuccessorsArray $successors): EgrDetailsUL
    {
        $this->successors = $successors;
        return $this;
    }

    /**
     * @return EgrRecordsArray
     */
    public function getEgrRecords(): EgrRecordsArray
    {
        return $this->egrRecords;
    }

    /**
     * @param EgrRecordsArray $egrRecords
     * @return EgrDetailsUL
     */
    public function setEgrRecords(EgrRecordsArray $egrRecords): EgrDetailsUL
    {
        $this->egrRecords = $egrRecords;
        return $this;
    }

    /**
     * @return History
     */
    public function getHistory(): History
    {
        return $this->history;
    }

    /**
     * @param History $history
     * @return EgrDetailsUL
     */
    public function setHistory(History $history): EgrDetailsUL
    {
        $this->history = $history;
        return $this;
    }

    /**
     * @param array $data
     * @return static
     */
    public static function toDto(array $data): DtoInterface
    {
        $result = new self();

        if (array_key_exists('okpo', $data))
            $result->setOkpo($data['okpo']);

        if (array_key_exists('pfrRegNumber', $data))
            $result->setPfrRegNumber($data['pfrRegNumber']);

        if (array_key_exists('fssRegNumber', $data))
            $result->setFssRegNumber($data['fssRegNumber']);

        if (array_key_exists('fomsRegNumber', $data))
            $result->setFomsRegNumber($data['fomsRegNumber']);

        if (array_key_exists('activities', $data))
            $result->setActivities(Activities::toDto($data['activities']));

        if (array_key_exists('regInfo', $data))
            $result->setRegInfo(RegInfo::toDto($data['regInfo']));

        if (array_key_exists('nalogRegBody', $data))
            $result->setNalogRegBody(definitions\NalogRegBody::toDto($data['nalogRegBody']));

        if (array_key_exists('regBody', $data))
            $result->setRegBody(definitions\NalogRegBody::toDto($data['regBody']));

        if (array_key_exists('shareholders', $data))
            $result->setShareholders(definitions\Shareholders::toDto($data['shareholders']));

        if (array_key_exists('statedCapital', $data))
            $result->setStatedCapital(definitions\StatedCapital::toDto($data['statedCapital']));

        $result->setFoundersFL(FoundersFLArray::toDto(array_key_exists('foundersFL', $data) ? $data['foundersFL'] : []));
        $result->setFoundersUL(FoundersULArray::toDto(array_key_exists('foundersUL', $data) ? $data['foundersUL'] : []));
        $result->setFoundersForeign(FoundersForeignArray::toDto(array_key_exists('foundersForeign', $data) ? $data['foundersForeign'] : []));
        $result->setPredecessors(PredecessorsArray::toDto(array_key_exists('predecessors', $data) ? $data['predecessors'] : []));
        $result->setSuccessors(SuccessorsArray::toDto(array_key_exists('successors', $data) ? $data['successors'] : []));
        $result->setEgrRecords(EgrRecordsArray::toDto(array_key_exists('egrRecords', $data) ? $data['egrRecords'] : []));
        $result->setHistory(History::toDto(array_key_exists('history', $data) ? $data['history'] : []));

        return $result;
    }
}