<?php


class DvdItem
{
    private $DvdName;
    private $DvdPrice;
    private $DvdTime;

    /**
     * DvdItems constructor.
     * @param $DvdName
     * @param $DvdPrice
     * @param $DvdTime
     */
    public function __construct(string $DvdName,int $DvdPrice,int $DvdTime)
    {
        $this->DvdName = $DvdName;
        $this->DvdPrice = $DvdPrice;
        $this->DvdTime = $DvdTime;
    }

    /**
     * @return mixed
     */
    public function getDvdName():string
    {
        return $this->DvdName;
    }

    /**
     * @param mixed $DvdName
     */
    public function setDvdName(string $DvdName): void
    {
        $this->DvdName = $DvdName;
    }

    /**
     * @return mixed
     */
    public function getDvdPrice():int
    {
        return $this->DvdPrice;
    }

    /**
     * @param mixed $DvdPrice
     */
    public function setDvdPrice(int $DvdPrice): void
    {
        $this->DvdPrice = $DvdPrice;
    }

    /**
     * @return mixed
     */
    public function getDvdTime():int
    {
        return $this->DvdTime;
    }

    /**
     * @param mixed $DvdTime
     */
    public function setDvdTime(int $DvdTime): void
    {
        $this->DvdTime = $DvdTime;
    }
}
?>