<?php


namespace App\Handlers\Employee\Interfaces;

use App\Repositories\Interfaces\EloquentEmployeeRepositoryInterface;
use Illuminate\Http\Request;

/**
 * Interface UpdateHandlerInterface
 * @package App\Handlers\Company\Interfaces
 */
interface UpdateHandlerInterface
{
    /**
     * UpdateHandlerInterface constructor.
     * @param EloquentEmployeeRepositoryInterface $eloquentEmployeeRepository
     */
    public function __construct(EloquentEmployeeRepositoryInterface $eloquentEmployeeRepository);

    /**
     * @return Request
     */
    public function getRequest(): Request;

    /**
     * @param Request $request
     */
    public function setRequest(Request $request): void;

    /**
     * @return mixed
     */
    public function handle(int $id): bool;
}