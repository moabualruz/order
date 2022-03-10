<?php
declare(strict_types=1);

namespace Order\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Order\Utils\ObjectAndArray;

/**
 * OrderItem
 *
 * @ORM\Table(name="`order_item`", indexes={@ORM\Index(name="`idx_order_item_order`", columns={"`orderId`"}), @ORM\Index(name="`idx_order_item_product`", columns={"`productId`"})})
 * @ORM\Entity
 */
class OrderItem
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
     * @var int
     *
     * @ORM\Column(name="`productId`", type="bigint", nullable=false)
     */
    private int $productId;

    /**
     * @var string
     *
     * @ORM\Column(name="`sku`", type="string", length=100, nullable=false)
     */
    private string $sku;

    /**
     * @var float
     *
     * @ORM\Column(name="`price`", type="float", precision=10, scale=0, nullable=false)
     */
    private float $price = 0.0;

    /**
     * @var float
     *
     * @ORM\Column(name="`discount`", type="float", precision=10, scale=0, nullable=false)
     */
    private float $discount = 0.0;

    /**
     * @var int
     *
     * @ORM\Column(name="`quantity`", type="smallint", nullable=false)
     */
    private int $quantity = 0;

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
     * @var Order
     *
     * @ORM\ManyToOne(targetEntity="Order")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="orderId", referencedColumnName="id")
     * })
     */
    private Order $order;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return OrderItem
     */
    public function setId(int $id): OrderItem
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getProductId(): int
    {
        return $this->productId;
    }

    /**
     * @param int $productId
     * @return OrderItem
     */
    public function setProductId(int $productId): OrderItem
    {
        $this->productId = $productId;
        return $this;
    }

    /**
     * @return string
     */
    public function getSku(): string
    {
        return $this->sku;
    }

    /**
     * @param string $sku
     * @return OrderItem
     */
    public function setSku(string $sku): OrderItem
    {
        $this->sku = $sku;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     * @return OrderItem
     */
    public function setPrice(float $price): OrderItem
    {
        $this->price = $price;
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
     * @return OrderItem
     */
    public function setDiscount(float $discount): OrderItem
    {
        $this->discount = $discount;
        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     * @return OrderItem
     */
    public function setQuantity(int $quantity): OrderItem
    {
        $this->quantity = $quantity;
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
     * @return OrderItem
     */
    public function setCreatedAt(DateTime $createdAt): OrderItem
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
     * @return OrderItem
     */
    public function setUpdatedAt(?DateTime $updatedAt): OrderItem
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
     * @return OrderItem
     */
    public function setExtraData(?string $extraData): OrderItem
    {
        $this->extraData = $extraData;
        return $this;
    }

    /**
     * @return Order
     */
    public function getOrder(): Order
    {
        return $this->order;
    }

    /**
     * @param Order $order
     * @return OrderItem
     */
    public function setOrder(Order $order): OrderItem
    {
        $this->order = $order;
        return $this;
    }

    use ObjectAndArray;
}
