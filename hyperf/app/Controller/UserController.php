<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: chenchangqin
 * Date: 2020-07-14
 * Time: 18:07
 */

namespace App\Controller;

use App\Service\UserService;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Contract\RequestInterface;

/**
 * @Controller()
 */
class UserController extends AbstractController
{

    /**
     * @Inject
     * @var UserService
     */
    private $userService;

    /**
     * @param RequestInterface $request
     * @return array
     */
    public function index(RequestInterface $request)
    {
        $method = $request->getMethod();

        $result = $this->userService->userIndex();

        return [
            'method' => $method,
            'result' => $result
        ];
    }

    /**
     * @param RequestInterface $request
     * @param int              $id
     * @return array
     */
    public function info(RequestInterface $request,int $id)
    {
        $result = $this->userService->user($id);

        $method = $request->getMethod();
        return [
            'method' => $method,
            'result' => $result
        ];
    }

    /**
     * @param RequestInterface $request
     * @param int              $id
     * @return array
     */
    public function update(RequestInterface $request,int $id)
    {
        $data = $request->post();
        $result = $this->userService->userUpdate($id,$data);

        $method = $request->getMethod();
        return [
            'method' => $method,
            'result' => $result
        ];
    }

    /**
     * @param int $id
     * @return array
     */
    public function delete(int $id)
    {
        $result = $this->userService->userDelete($id);

        return [
            'result' => $result
        ];
    }

    public function create(RequestInterface $request)
    {
        $data = $request->post();
    }

}