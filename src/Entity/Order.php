<?php
declare(strict_types=1);

namespace Order\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Order\Utils\ObjectAndArray;

/**
 * Order
 *
 * @ORM\Table(name="`order`", indexes={@ORM\Index(name="`idx_order_user`", columns={"`userId`"})})
 * @ORM\Entity
 */
class Order
{
    /**
     * @var int
     *
     * @ORM\Column(name="`id`", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private int $id;

    /**
     * @var int|null
     *
     * @ORM\Column(name="`userId`", type="bigint", nullable=true)
     */
    private ?int $userId;

    /**
     * @var string
     *
     * @ORM\Column(name="`sessionId`", type="string", length=100, nullable=false)
     */
    private string $sessionId;

    /**
     * @var string
     *
     * @ORM\Column(name="`token`", type="string", length=100, nullable=false)
     */
    private string $token;

    /**
     * @var int
     *
     * @ORM\Column(name="`status`", type="smallint", nullable=false)
     */
    private int $status = 0;

    /**
     * @var float
     *
     * @ORM\Column(name="`subTotal`", type="float", precision=10, scale=0, nullable=false)
     */
    private float $subTotal = 0.0;

    /**
     * @var float
     *
     * @ORM\Column(name="`itemDiscount`", type="float", precision=10, scale=0, nullable=false)
     */
    private float $itemDiscount = 0.0;

    /**
     * @var float
     *
     * @ORM\Column(name="`tax`", type="float", precision=10, scale=0, nullable=false)
     */
    private float $tax = 0.0;

    /**
     * @var float
     *
     * @ORM\Column(name="`shipping`", type="float", precision=10, scale=0, nullable=false)
     */
    private float $shipping = 0.0;

    /**
     * @var float
     *
     * @ORM\Column(name="`total`", type="float", precision=10, scale=0, nullable=false)
     */
    private float $total = 0.0;

    /**
     * @var string|null
     *
     * @ORM\Column(name="`voucher`", type="string", length=50, nullable=true)
     */
    private ?string $voucher;

    /**
     * @var float
     *
     * @ORM\Column(name="`discount`", type="float", precision=10, scale=0, nullable=false)
     */
    private float $discount = 0.0;

    /**
     * @var float
     *
     * @ORM\Column(name="`grandTotal`", type="float", precision=10, scale=0, nullable=false)
     */
    private float $grandTotal = 0.0;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="`createdAt`", type="datetime", nullable=false)
     */
    private DateTime $createdAt;

    /**
     * @var DateTime|null
     *
     * @ORM\Column(name="`updatedAt`", type="datetime", nullable=true)
     */
    private ?DateTime $updatedAt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="`extraData`", type="text", length=65535, nullable=true)
     */
    private ?string $extraData;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Order
     */
    public function setId(int $id): Order
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getUserId(): ?int
    {
        return $this->userId;
    }

    /**
     * @param int|null $userId
     * @return Order
     */
    public function setUserId(?int $userId): Order
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return string
     */
    public function getSessionId(): string
    {
        return $this->sessionId;
    }

    /**
     * @param string $sessionId
     * @return Order
     */
    public function setSessionId(string $sessionId): Order
    {
        $this->sessionId = $sessionId;
        return $this;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @param string $token
     * @return Order
     */
    public function setToken(string $token): Order
    {
        $this->token = $token;
        return $this;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     * @return Order
     */
    public function setStatus(int $status): Order
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return float
     */
    public function getSubTotal(): float
    {
        return $this->subTotal;
    }

    /**
     * @param float $subTotal
     * @return Order
     */
    public function setSubTotal(float $subTotal): Order
    {
        $this->subTotal = $subTotal;
        return $this;
    }

    /**
     * @return float
     */
    public function getItemDiscount(): float
    {
        return $this->itemDiscount;
    }

    /**
     * @param float $itemDiscount
     * @return Order
     */
    public function setItemDiscount(float $itemDiscount): Order
    {
        $this->itemDiscount = $itemDiscount;
        return $this;
    }

    /**
     * @return float
     */
    public function getTax(): float
    {
        return $this->tax;
    }

    /**
     * @param float $tax
     * @return Order
     */
    public function setTax(float $tax): Order
    {
        $this->tax = $tax;
        return $this;
    }

    /**
     * @return float
     */
    public function getShipping(): float
    {
        return $this->shipping;
    }

    /**
     * @param float $shipping
     * @return Order
     */
    public function setShipping(float $shipping): Order
    {
        $this->shipping = $shipping;
        return $this;
    }

    /**
     * @return float
     */
    public function getTotal(): float
    {
        return $this->total;
    }

    /**
     * @param float $total
     * @return Order
     */
    public function setTotal(float $total): Order
    {
        $this->total = $total;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVoucher(): ?string
    {
        return $this->voucher;
    }

    /**
     * @param string|null $voucher
     * @return Order
     */
    public function setVoucher(?string $voucher): Order
    {
        $this->voucher = $voucher;
        return $this;
    }

    /**
     * @return float
     */
    public function getDiscount(): float
    {
        return $this->discount;
    }

    /**
     * @param float $discount
     * @return Order
     */
    public function setDiscount(float $discount): Order
    {
        $this->discount = $discount;
        return $this;
    }

    /**
     * @return float
     */
    public function getGrandTotal(): float
    {
        return $this->grandTotal;
    }

    /**
     * @param float $grandTotal
     * @return Order
     */
    public function setGrandTotal(float $grandTotal): Order
    {
        $this->grandTotal = $grandTotal;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param DateTime $createdAt
     * @return Order
     */
    public function setCreatedAt(DateTime $createdAt): Order
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getUpdatedAt(): ?DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param DateTime|null $updatedAt
     * @return Order
     */
    public function setUpdatedAt(?DateTime $updatedAt): Order
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getExtraData(): ?string
    {
        return $this->extraData;
    }

    /**
     * @param string|null $extraData
     * @return Order
     */
    public function setExtraData(?string $extraData): Order
    {
        $this->extraData = $extraData;
        return $this;
    }

    use ObjectAndArray;
}
