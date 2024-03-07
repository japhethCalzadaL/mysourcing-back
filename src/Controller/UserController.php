<?php
namespace App\Controller;

use App\DTO\UserDTO;
use App\Entity\Users;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class UserController extends AbstractController
{
    #[Route('/user', name: 'user', methods: ["GET", "HEAD"])]
    public function userList(EntityManagerInterface $entityManager)
    {
        $collection = new ArrayCollection();

        /** @var User $User */
        $users = $entityManager->getRepository(Users::class)->findAll();
        foreach ($users as $item) {
            $data = $item->jsonSerialize();
            $collection->add($data);
        }

        return $this->json([
            'status' => "OK",
            'users' =>  $collection
        ],Response::HTTP_OK );
    }

    #[Route('/user', name: 'userCreate', methods: ["POST"])]
    public function user(
        Request $request,  
        SerializerInterface $serializer, 
        ValidatorInterface $validator,
        EntityManagerInterface $entityManager,
        LoggerInterface $logger
    ): Response {
        /** @var UserDTO $userDTO */
        $userDTO = null;

        try{
            $userDTO = $serializer->deserialize(
                $request->getContent(),
                UserDTO::class,
                'json'
            );

            $errors = $validator->validate($userDTO);
            if (0 < count($errors)) {
                $details = [];
                /** @var ConstraintViolationInterface $error */
                foreach ($errors as $error) {
                    $details[] = [
                        'field'         => $error->getPropertyPath(),
                        'invalidValue'  => $error->getInvalidValue(),
                        'message'       => $error->getMessage()
                    ];
                }
                $logger->error(sprintf('Exception: %s', $error->getInvalidValue()));
                $logger->error(sprintf('Exception: %s', $error->getMessage()));

                return $this->json(
                    [
                        'status'    => 'BAD_REQUEST',
                        'message'   => 'Ha habido un error. Aquí los detalles',
                        'details'   => $details
                    ],Response::HTTP_INTERNAL_SERVER_ERROR
                );
            }
            
            $user = $serializer->deserialize(
                $request->getContent(),
                Users::class,
                'json'
            );
            
            $entityManager->persist($user);
            $entityManager->flush();

        } catch (\Exception $ex){
            $logger->error($ex);
            $logger->error($ex->getMessage());
            $logger->error($ex->getTraceAsString());

            return $this->json([
                'status' => "BAD_REQUEST",
                'error' => "No hubo respuesta satisfactoria"
            ],Response::HTTP_BAD_REQUEST);
        }

        return $this->json([
            'status' => "CREATED"
        ], Response::HTTP_CREATED);
    }


}