<?php
class BookItem
{
    private $BookName;
    private $BookPrice;
    private $BookAuthor;
    private $BookCode;

    /**
     * BookItems constructor.
     * @param $BookName
     * @param $BookPrice
     * @param $BookAuthor
     * @param $BookCode
     */
    public function __construct(string $BookName,string $BookAuthor,int $BookPrice,string $BookCode)
    {
        $this->BookName = $BookName;
        $this->BookPrice = $BookPrice;
        $this->BookAuthor = $BookAuthor;
        $this->BookCode = $BookCode;
    }

    /**
     * @return mixed
     */
    public function getBookName():string
    {
        return $this->BookName;
    }

    /**
     * @param mixed $BookName
     */
    public function setBookName(string $BookName): void
    {
        $this->BookName = $BookName;
    }

    /**
     * @return mixed
     */
    public function getBookPrice():int
    {
        return $this->BookPrice;
    }

    /**
     * @param mixed $BookPrice
     */
    public function setBookPrice(int $BookPrice): void
    {
        $this->BookPrice = $BookPrice;
    }

    /**
     * @return mixed
     */
    public function getBookAuthor():string
    {
        return $this->BookAuthor;
    }

    /**
     * @param mixed $BookAuthor
     */
    public function setBookAuthor(string $BookAuthor): void
    {
        $this->BookAuthor = $BookAuthor;
    }

    /**
     * @return mixed
     */
    public function getBookCode():string
    {
        return $this->BookCode;
    }

    /**
     * @param mixed $BookCode
     */
    public function setBookCode(string $BookCode): void
    {
        $this->BookCode = $BookCode;
    }


}
?>
