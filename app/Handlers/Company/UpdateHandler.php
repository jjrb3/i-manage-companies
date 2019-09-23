<?php


namespace App\Handlers\Company;


use App\Handlers\Company\Interfaces\UpdateHandlerInterface;
use App\Repositories\Interfaces\EloquentCompanyRepositoryInterface;
use Exception;
use Illuminate\Http\Request;

/**
 * Class UpdateHandler
 * @package App\Handlers\Company
 */
class UpdateHandler extends UploadFileHandler implements UpdateHandlerInterface
{
    /**
     * @var EloquentCompanyRepositoryInterface
     */
    private $eloquentCompanyRepository;

    /**
     * GetListHandler constructor.
     * @param EloquentCompanyRepositoryInterface $eloquentCompanyRepository
     */
    public function __construct(EloquentCompanyRepositoryInterface $eloquentCompanyRepository)
    {
        $this->eloquentCompanyRepository = $eloquentCompanyRepository;
    }

    /**
     * @return Request
     */
    public function getRequest(): Request
    {
        return $this->request;
    }

    /**
     * @param Request $request
     */
    public function setRequest(Request $request): void
    {
        $this->request = $request;
    }

    /**
     * @return \App\Models\Company|bool|mixed
     * @throws Exception
     */
    public function handle(int $id): bool
    {
        $companyParameters = $this->request->all();

        if ($fileName = $this->uploadImage()) {
            $companyParameters['logo'] = $fileName;
        }

        unset($companyParameters['_token']);

        return $this->update($id, $companyParameters);
    }

    /**
     * @param int $id
     * @param array $companyParameters
     * @return bool
     * @throws Exception
     */
    private function update(int $id, array $companyParameters): bool
    {
        return $this->eloquentCompanyRepository->updateById($id, $companyParameters);
    }
}