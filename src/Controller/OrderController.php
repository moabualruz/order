<?php
declare(strict_types=1);

namespace Order\Controller;

use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\Persistence\ManagerRegistry;
use Order\Entity\Order;
use Order\Repository\OrderRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function json_decode;

class OrderController extends AbstractController
{
    private OrderRepository $orderRepository;
    private ManagerRegistry $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
        $this->orderRepository = new OrderRepository($doctrine->getManager(), new ClassMetadata(Order::class));
    }

    /**
     * @Route("/orders/", name="create", methods={"POST"})
     */
    public function create(Request $request): JsonResponse
    {

        $data = json_decode($request->getContent(), true);
        $order = (new Order())->fromArray($data);

        $this->orderRepository->save($order);

        return new JsonResponse(['status' => 'Order created!'], Response::HTTP_CREATED);
    }

    /**
     * @Route("/orders/{id}", name="read", methods={"GET"})
     */
    public function read(int $id): JsonResponse
    {
        $this->orderRepository = $this->orderRepository ?? $this->doctrine->getRepository(Order::class);
        $order = $this->orderRepository->findOneBy(['id' => $id]);

        return new JsonResponse($order->toArray(), Response::HTTP_OK);
    }

    /**
     * @Route("/orders/{id}", name="update", methods={"PUT"})
     */
    public function update(int $id, Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $order = (new Order())->fromArray($data)->setId($id);

        $this->orderRepository->save($order);

        return new JsonResponse(['status' => 'Order updated!'], Response::HTTP_ACCEPTED);
    }

    /**
     * @Route("/orders/{id}", name="delete", methods={"DELETE"})
     */
    public function delete($id): JsonResponse
    {
        $order = $this->orderRepository->findOneBy(['id' => $id]);

        $this->orderRepository->remove($order);

        return new JsonResponse(['status' => 'Order deleted'], Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/orders", name="list", methods={"GET"})
     */
    public function getAll(): JsonResponse
    {
        $orders = $this->orderRepository->findAll();
        $data = [];

        foreach ($orders as $order) {
            $data[] = $order->toArray();
        }

        return new JsonResponse($data, Response::HTTP_OK);
    }
}