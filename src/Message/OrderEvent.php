<?php
declare(strict_types=1);

namespace Order\Message;

use Exception;
use Order\Entity\Order;
use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
use function json_encode;

class OrderEvent
{
    private Order $orderData;
    private string $action;
    private AMQPStreamConnection $connection;
    private AMQPChannel $channel;

    public function __construct(Order $orderData, string $action)
    {
        $this->orderData = $orderData;
        $this->action = $action;

        $this->connection = new AMQPStreamConnection('rabbitmq', 5672, 'moruz', 'm0ru2');
        $this->channel = $this->connection->channel();
    }

    public function getOrderData(): Order
    {
        return $this->orderData;
    }

    /**
     * @throws Exception
     */
    public function dispatch()
    {
        $this->channel->queue_declare('orders', false, true, false, false);

        $orderArray = $this->orderData->toArray();

        $msg = new AMQPMessage(json_encode(['orderData' => $orderArray, 'action' => $this->action]));
        $this->channel->basic_publish($msg, '', 'orders');
        $this->channel->close();
        $this->connection->close();
    }
}