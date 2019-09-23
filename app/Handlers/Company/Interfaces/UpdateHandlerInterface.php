<?php


namespace App\Handlers\Company\Interfaces;

use App\Repositories\Interfaces\EloquentCompanyRepositoryInterface;
use Illuminate\Http\Request;

/**
 * Interface UpdateHandlerInterface
 * @package App\Handlers\Company\Interfaces
 */
interface UpdateHandlerInterface
{
    /**
     * GetListHandlerInterface constructor.
     * @param EloquentCompanyRepositoryInterface $eloquentCompanyRepository
     */
    public function __construct(EloquentCompanyRepositoryInterface $eloquentCompanyRepository);

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